<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Theme;
use App\Models\UserPlan;
use App\Models\Setting;
use App\Models\Customer;
use App\Models\BlogComment;
use Illuminate\Support\Facades\DB;
use Modules\Ad\Entities\Ad;
use Illuminate\Http\Request;
use Modules\Faq\Entities\Faq;
use App\Models\PaymentSetting;
use Modules\Blog\Entities\Post;
use Modules\Plan\Entities\Plan;
use Modules\Location\Entities\City;
use Modules\Location\Entities\Town;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Modules\Faq\Entities\FaqCategory;
use Modules\Ad\Transformers\AdResource;
use Modules\Category\Entities\Category;
use App\Notifications\LogoutNotification;
use Modules\Blog\Entities\PostCategory;
use Modules\Testimonial\Entities\Testimonial;
use Modules\Category\Transformers\CategoryResource;
use function GuzzleHttp\Promise\all;
use App\Http\Traits\PaymentTrait;
use Session;
use Mail;
use App\Mail\MakePaymentNotificationToUser;
use App\Mail\MakePaymentNotificationToAdmin;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Modules\Newsletter\Entities\Email;

class FrontendController extends Controller
{
    /**
     * View Home page
     * @return \Illuminate\Http\Response
     * @return void
     */

    use PaymentTrait;

    public function index()
    {
        $data = [];
        $topCategories = CategoryResource::collection(Category::active()->with('subcategories', function ($q) {
            $q->where('status', 1);
        })->withCount('ads as ad_count')->latest('ad_count')->take(12)->get());
        $home_page = Theme::first()->home_page;
        $topCities = City::withCount('ads as ad_count')->latest('ad_count')->take(6)->get();

        $data['topCategories'] = collectionToResource($topCategories);
        $data['topCities'] = $topCities;
        $data['totalAds'] = Ad::activeCategory()->active()->count();

        if ($home_page == 1) {
            return $this->homePage1($data);
        } elseif ($home_page == 2) {
            return $this->homePage2($data);
        } else {
            return $this->homePage3($data);
        }
    }


    /**
     * Return homapge 1 layouts views
     *
     * @param array $data
     *
     * @return View
     */
    public function homePage1($data)
    {
        $ad_data = Ad::activeCategory()->with(['customer', 'city', 'category:id,name,icon'])->active();
        $ads = AdResource::collection($ad_data->get());
        $categories = CategoryResource::collection(Category::active()->with('subcategories', function ($q) {
            $q->where('status', 1);
        })->get());
        $recommendedAds = AdResource::collection($ad_data->where('featured', true)->take(12)->latest()->get());
        $latestAds = AdResource::collection(Ad::activeCategory()->with(['customer', 'city', 'category:id,name,icon'])->active()->where('featured', '!=', 1)->take(12)->latest()->get());

        $data['ads'] = collectionToResource($ads);
        $data['categories'] = collectionToResource($categories);
        $data['recommendedAds'] = collectionToResource($recommendedAds);
        $data['latestAds'] = collectionToResource($latestAds);

        $data['verified_users'] = Customer::whereNotNull('email_verified_at')->count();
        $data['city_count'] = City::count();

        $data['pro_members_count'] = Customer::whereHas('userPlan', function ($q) {
            $q->where('badge', true);
        })->count();

        return view('frontend.index', $data);
    }


    /**
     * Return homepage 2 layouts views
     *
     * @param Array $data
     *
     * @return View
     */
    public function homePage2($data)
    {
        $categories = CategoryResource::collection(Category::active()->withCount('ads as ad_count')->latest()->get());
        $recentads = AdResource::collection(Ad::activeCategory()->with('category', 'customer', 'city')->active()->latest('id')->get()->take(4));
        $featured_ad_data = Ad::activeCategory()->with(['customer', 'city', 'category:id,name,icon',])->active()->take(6)->latest()->get();
        $featuredad = AdResource::collection($featured_ad_data);
        $latestAds = AdResource::collection(Ad::activeCategory()->with(['customer', 'city', 'category:id,name,icon'])->active()->where('featured', '!=', 1)->take(6)->latest()->get());

        $data['categories'] = collectionToResource($categories);
        $data['featuredAds'] = Ad::where('featured', 1)->get();
        $data['latestAds'] = collectionToResource($latestAds);
        $data['recentads'] = $recentads;
        $data['towns'] = Town::orderBy('name')->get();
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        return view('frontend.index_02', $data);
    }

    /**
     * Return homepage 3 layouts views
     *
     * @param Array $data
     * @return View
     */
    public function homePage3($data)
    {
        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $plans = Plan::all();
        $featured_ad_data = Ad::activeCategory()->with(['customer', 'city', 'category:id,name,icon',])->active()->take(8)->latest()->get();
        $featuredad = AdResource::collection($featured_ad_data);
        $latestAds = AdResource::collection(Ad::activeCategory()->with(['customer', 'city', 'category:id,name,icon'])->active()->where('featured', '!=', 1)->take(8)->latest()->get());

        $data['featuredAds'] = Ad::where('featured', 1)->get();
        $data['latestAds'] = collectionToResource($latestAds);
        $data['categories'] = collectionToResource($categories);
        $data['towns'] = Town::orderBy('name')->get();
        $data['plans'] = $plans;
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        currentCurrency();

        return view('frontend.index_03', $data);
    }


    /**
     * View Testimonial page
     *
     * @param Testimonial
     * @return \Illuminate\Http\Response
     * @return void
     */
    public function about()
    {
        $data['testimonials'] = Testimonial::latest('id')->get();
        $data['cms'] = Cms::select(['about_body', 'about_heading', 'about_background'])->first();

        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['categories'] = collectionToResource($categories);
        $data['towns'] = Town::orderBy('name')->get();
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        return view('frontend.about', $data);
    }

    /**
     * View Faq page
     *
     * @param Faq
     * @return void
     */
    public function faq()
    {
        if (!enableModule('faq')) {
            abort(404);
        }
        $category_slug = request('category') ?? FaqCategory::first()->slug;
        $category = FaqCategory::where('slug', $category_slug)->first();
        $data['categories'] = FaqCategory::latest()->get(['id', 'name', 'slug', 'icon']);
        $data['faqs'] = Faq::where('faq_category_id', $category->id)->with('faq_category:id,name,icon')->get();

        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['adcategories'] = collectionToResource($categories);
        $data['towns'] = Town::orderBy('name')->get();
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        return view("frontend.faq", $data);
    }

    /**
     * View Contact page
     *
     * @return void
     */
    public function contact()
    {
        if (!enableModule('contact')) {
            abort(404);
        }

        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['categories'] = collectionToResource($categories);
        $data['towns'] = Town::orderBy('name')->get();
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        return view('frontend.contact', $data);
    }

    /**
     * View Single Ad page
     *
     * @return void
     */
    public function adDetails(Ad $ad)
    {

        if ($ad->status == 'pending') {
            if ($ad->customer_id != auth('customer')->id()) {
                abort(404);
            }
        }
        $admin_ads = DB::table('admin_ads')->where('status', 1)->inRandomOrder()->first();
        $verified_seller = Customer::findOrFail($ad->customer_id)->email_verified_at;
        $ad->increment('total_views');
        $ad = $ad->load(['customer', 'brand', 'adFeatures', 'galleries', 'town', 'city']);

        $categories = collectionToResource(CategoryResource::collection(Category::active()->latest()->get()));
        $towns = Town::orderBy('name')->get();
        $total_ads = Ad::activeCategory()->active()->count();
        $current = Carbon::now();
        $ad_post_day_diff = $ad->created_at->diffInDays($current);


        $plans_id = UserPlan::where('customer_id', $ad->customer->id)->first()->plans_id;
        $plan = Plan::find($plans_id);

        if($plan->immediate_access_to_new_ads == 0 && $ad_post_day_diff < 10){
            $immediate_access_to_new_ads = 1;
        }else{
            $immediate_access_to_new_ads = 0;
        }


        $lists = AdResource::collection(Ad::activeCategory()->select(['id', 'title', 'slug', 'price', 'thumbnail', 'category_id', 'city_id', 'estimate_calling_time'])
            ->with(['city', 'category'])
            ->where('category_id', $ad->category_id)
            ->where('id', '!=', $ad->id)
            ->active()
            ->latest('id')->take(10)->get());

        if ($ad->status === 'expired' && $ad->customer->id !== auth('customer')->id()) {
            return abort(404);
        } else {

            return view('frontend.single-ad', compact('ad', 'lists', 'verified_seller', 'categories', 'towns', 'total_ads', 'immediate_access_to_new_ads', 'admin_ads'));
        }
    }

    /**
     * View ad list page
     *
     * @return void
     */
    public function adList()
    {
        $data['adlistings'] = Ad::where('featured', 1)->activeCategory()->with(['category', 'city'])->latest('id')->active()->paginate(21);
        $data['categories'] = Category::active()->with('subcategories', function ($q) {
            $q->where('status', 1);
        })->latest('id')->get();
        $data['cities'] = City::latest()->get();
        $data['towns'] = Town::orderBy('name')->get();
        $data['adMaxPrice'] = $price = \DB::table('ads')->max('price');
        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        return view('frontend.ad-list', $data);
    }

    public function ad_list(){
        $data['adlistings'] = Ad::activeCategory()->with(['category', 'city'])->latest('id')->active()->paginate(21);
        $data['categories'] = Category::active()->with('subcategories', function ($q) {
            $q->where('status', 1);
        })->latest('id')->get();
        $data['cities'] = City::latest()->get();
        $data['towns'] = Town::orderBy('name')->get();
        $data['adMaxPrice'] = $price = \DB::table('ads')->max('price');
        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['total_ads'] = Ad::activeCategory()->active()->count();
        return view('frontend.ad-list', $data);
    }

    /**
     * View Get membership page
     *
     * @return void
     */
    public function getMembership()
    {
        if (!enableModule('price_plan')) {
            abort(404);
        }

        $data['plans'] = Plan::latest()->get();
        currentCurrency();
        return view('frontend.get-membership', $data);
    }

    /**
     * View Priceplan page
     *
     * @return void
     */
    public function pricePlan()
    {
        if (!enableModule('price_plan')) {
            abort(404);
        }

        $data['plans'] = Plan::orderBy('order','asc')->get();
        currentCurrency();

        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['categories'] = collectionToResource($categories);
        $data['towns'] = Town::orderBy('name')->get();
        $data['total_ads'] = Ad::activeCategory()->active()->count();


        return view('frontend.price-plan', $data);
    }

    /**
     * View Signup page
     *
     * @return void
     */
    public function signUp($package_id = null)
    {
        $verified_users = Customer::where('email_verified_at', '!=', null)->count();

        if (empty($package_id )){
            // flashError('Please get membership plan');
            return redirect()->route('frontend.priceplan');
        }

        $categories = collectionToResource(CategoryResource::collection(Category::active()->latest()->get()));
        $towns = Town::orderBy('name')->get();
        $total_ads = Ad::activeCategory()->active()->count();
        return view('frontend.sign-up', compact('verified_users', 'package_id', 'categories', 'towns', 'total_ads'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Customer
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $setting = setting();

        $request->validate([
            'name' => "required",
            'username' => "required|unique:customers,username",
            'email' => "required|email|unique:customers,email",
            'phone' => "required",
            'country_id' => "required",
            'region_id' => "required",
            'password' => "required|confirmed|min:8|max:50",
        ]);

        $phone = $request->phone;

        $customer = Customer::create([
            'code' => generateId(),
            'name' => $request->name,
            'web' => $request->web,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $phone,
            'country_id' => $request->country_id,
            'region_id' => $request->region_id,
            'country_code' => $request->countrycode,
            'iso2' => $request->iso2,
            'subscribe' => 1,
            'password' => bcrypt($request->password),
        ]);
        
        $usersubscribe = Customer::where('email', $request->email)->first();

        if($usersubscribe){
            if($usersubscribe->subscribe == NULL){
                Customer::where('email', $request->email)->update([
                    'subscribe' => 1,
                ]);
                Email::create(['email' => $request->email]);
            }else {
                Email::create(['email' => $request->email]);
            }
        }else{
            Email::create(['email' => $request->email]);
        }

        if (!empty($request->package_id)) {
            $plan = Plan::where('id', $request->package_id)->first();

            if (empty($plan)) {
                flashError('Your package id invalid.Please try again');
                return redirect()->route('frontend.dashboard');
            }

            
            if($plan->priority_situation==1){
                $featured_limit = 10;
            }else{
                $featured_limit = 0;
            }

            $userPlan = UserPlan::create([
                'customer_id' => $customer->id,
                'plans_id' => $request->package_id,
                'ad_limit' => $plan->ad_limit,
                'featured_limit' => $featured_limit,
                'customer_support' => $plan->customer_support,
                // 'multiple_image' => $plan->multiple_image,
                'badge' => $plan->badge,
                'is_active' => 3,
                'created_at' => now()
            ]);


        }

        if ($customer) {
            Auth::guard('customer')->logout();
            Auth::guard('super_admin')->logout();
            flashSuccess('Registration Successful!');
            Auth::guard('customer')->login($customer);

            if ($setting->customer_email_verification) {
                return redirect()->route('verification.notice');
            } else {
                return redirect()->route('frontend.dashboard');
            }
        }
    }

    public function valid_user_name(Request $request){
        $user_name = $request->valid_user_name;
        // dd($user_name);
        // exit;
        $result = Customer::where('username', $user_name)->get();
        if(count($result) > 0){
            $data['status'] = 1;
            echo json_encode($data);
        } else {
            $data['status'] = 0;
            echo json_encode($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function frontendLogout()
    {
        $this->loggedoutNotification();
        auth()->guard('customer')->logout();

        return redirect()->route('customer.login');
    }

    public function loggedoutNotification()
    {
        // Send login notification
        $user = Customer::find(auth('customer')->id());
        $user->notify(new LogoutNotification($user));
    }

    /**
     * View Terms & Condition page
     *
     * @return void
     */
    public function blog(Request $request)
    {
        if (!enableModule('blog')) {
            abort(404);
        }

        $query = Post::with('author')->withCount('comments');

        if ($request->has('category') && $request->category != null) {
            $query->whereHas('category', function ($q) {
                $q->where('slug', request('category'));
            });
        }

        if ($request->has('keyword') && $request->keyword != null) {
            $query->where('title', 'LIKE', "%$request->keyword%");
        }

        $categories = collectionToResource(CategoryResource::collection(Category::active()->latest()->get()));
        $towns = Town::orderBy('name')->get();
        $total_ads = Ad::activeCategory()->active()->count();

        return view('frontend.blog', [
            'blogs' => $query->paginate(6)->withQueryString(),
            'recentBlogs' => Post::withCount('comments')->latest()->take(4)->get(),
            'topCategories' => PostCategory::latest()->take(6)->get(),
            'categories' => $categories,
            'towns' => $towns,
            'total_ads' => $total_ads,
        ]);
    }

    /**
     * View Terms & Condition page
     *
     * @return void
     */
    public function singleBlog(Post $blog)
    {
        if (!enableModule('blog')) {
            abort(404);
        }

        $recentPost = Post::withCount('comments')->latest('id')->take(6)->get();
        $categories = PostCategory::latest()->take(6)->get();
        $blog->load('author', 'category')->loadCount('comments');
        $towns = Town::orderBy('name')->get();
        $total_ads = Ad::activeCategory()->active()->count();
        $comments = BlogComment::where('post_id', $blog->id)->where('status', 1)->where('comment_id', NULL)->get();

        return view('frontend.blog-single', compact('blog', 'categories', 'recentPost', 'towns', 'total_ads', 'comments'));
    }


    /**
     * View Privacy Policy page
     *
     * @return void
     */
    public function privacy()
    {
        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['categories'] = collectionToResource($categories);
        $data['towns'] = Town::orderBy('name')->get();
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        return view('frontend.privacy', $data)->withCms(Cms::select(['privacy_body', 'privacy_background'])->first());
    }


    /**
     * View Terms & Condition page
     *
     * @return void
     */
    public function terms()
    {
        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['categories'] = collectionToResource($categories);
        $data['towns'] = Town::orderBy('name')->get();
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        return view('frontend.terms', $data)->withCms(Cms::select(['terms_body', 'terms_background'])->first());
    }

    // posting Rules
    public function posting_rules()
    {

    }

    /**
     * View Cookie & Policy page
     *
     * @return void
     */
    public function cookiePolicy()
    {

        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['categories'] = collectionToResource($categories);
        $data['towns'] = Town::orderBy('name')->get();
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        return view('frontend.cookie-policy', $data)->withCms(Cms::select(['cookie_body', 'cookie_background'])->first());
    }

    /**
     *
     * @param int $post_id
     * @return array
     */

    public function commentsCount(Request $request)
    {
        $this->validate($request, [
            'name' => "required",
            'email' => "required",
            'body' => "required",
        ]);

        BlogComment::insert([
            'post_id'=>$request->post_id,
            'name'=>$request->name,
            'body'=>$request->body,
            'email'=>$request->email,
            'image'=> 0,
            'status'=> 0,
            'created_at'=> Carbon::now(),
        ]);

        Toastr::success('Thanks for your comment, it is under review :-)','Success');
        return redirect()->back();
    }

    /**
     *
     * @param int $post_id
     * @return array
     */
    public function pricePlanDetails($plan_label)
    {
        if (!auth('customer')->check()) {
            abort(404);
        }

        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['categories'] = collectionToResource($categories);
        $data['towns'] = Town::orderBy('name')->get();
        $data['total_ads'] = Ad::activeCategory()->active()->count();


        $data['plan'] = Plan::where('label', $plan_label)->first();
        $data['payment_setting'] = PaymentSetting::first();
        return view('frontend.plan-details', $data);
    }

    public function planPurchase(Request $request)
    {

        $plans = Plan::where('id', $request->plan_id)->first();
        // dd($plans->id);

        DB::beginTransaction();
        try {

            $this->userPlanInfoUpdate($plans);
            Customer::where('id', \auth('customer')->id())->update(['payment_note' => $request->payment_note]);
            UserPlan::where('customer_id', \auth('customer')->id())->update(['is_active' => 0, 'plans_id' => $plans->id]);
            // all are good

            $customer_details = Customer::where('id', \auth('customer')->id())->first();
            $customer_email = $customer_details->email;
            $setting_email = Setting::find(1)->email;


        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            flashError('Something went wrong. Please try again');
            return redirect()->back();
        }
        DB::commit();
        Mail::to($customer_email)->send(new MakePaymentNotificationToUser);
        Mail::to($setting_email)->send(new MakePaymentNotificationToAdmin($customer_details));
        return redirect()->route('frontend.dashboard');


    }

    public function adGalleryDetails(Ad $ad)
    {
        $ad->load('galleries');
        return view('frontend.single-ad-gallery', compact('ad'));
    }
    // public function adlistSearchAjax($name)
    // {
    //     $cities = City::where('name', $name)->first();
    //     $towns = Town::where('city_id', $cities->id)->get();
    //     return json_encode($towns);
    // }

    public function adlistSearchAjax($id)
    {
        $towns = Town::where('city_id', $id)->get();
        return json_encode($towns);
    }

     public function CountryToCity(Request $request, $id)
    {
         $town  = DB::table('towns')->where('city_id', $id)->orderBy('name')->get();
         $city  = DB::table('cities')->where('id', $id)->first();
         $html = '';
        if($town && count($town) > 0 ){
            $html .= '<ul>';
            foreach($town as $k => $val){
                $town_ads_count  = DB::table('ads')->where('town_id', $val->id)->count();
                $route = route('frontend.adlist.search',['city' => $city->name, 'town' => $val->name ]);
                $html .= '<li>
                            <a class="nav-link" href="'.$route.'">
                            '.$val->name.'
                                <span>('.$town_ads_count.')</span>
                            </a>
                        </li>';
            }
            $html .= '</ul>';
        }else{
            $html .= '<ul>';
                $html .= '<li class="not_found"><a href="#">'.'Data not found'.'</a></li>';
            $html .= '</ul>';
        }
        $response['html'] = $html;
        $response['city'] = $city;

        return response()->json($response);
    }


    public function CategoryWiseSubcategory(Request $request, $id)
    {
        $subcategory    = DB::table('sub_categories')->where('category_id', $id)->orderBy('name')->get();
        $category_name  = DB::table('categories')->where('id', $id)->first();
        $html = '';
        if($subcategory && count($subcategory) > 0 ){
            $html .= '<ul>';
            foreach($subcategory as $k => $val){
                $subcat_ads_count  = DB::table('ads')->where('subcategory_id', $val->id)->count();
                $route = route('frontend.adlist.search',['category' => $category_name->slug, 'subcategory[]' => $val->slug ]);
                $html .= '<li>
                            <a class="nav-link" href="'.$route.'">
                                '.$val->name.'
                                <span>('.$subcat_ads_count.')</span>
                            </a>
                         </li>';
            }
            $html .= '</ul>';
        }else{
            $html .= '<ul>';
                $html .= '<li class="not_found"><a href="#">'.'Subcategory Not Found!'.'</a></li>';
            $html .= '</ul>';
        }
        $response['html'] = $html;
        $response['category_name'] = $category_name;
        return response()->json($response);
    }


    // public function CityWiseTown(Request $request, $id)
    // {
    //      $town = DB::table('towns')->where('city_id', $id)->get();
    //      return response()->json($town);
    // }
}
