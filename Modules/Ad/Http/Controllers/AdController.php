<?php

namespace Modules\Ad\Http\Controllers;

use App\Models\Customer;
use App\Models\UserPlan;
use Illuminate\Support\Str;
use Modules\Ad\Entities\Ad;
use Modules\Brand\Entities\Brand;
use App\Http\Traits\AdCreateTrait;
use Illuminate\Routing\Controller;
use Modules\Location\Entities\City;
use Modules\Location\Entities\Town;
use Modules\Category\Entities\Category;
use Modules\Category\Entities\SubCategory;
use App\Notifications\AdCreateNotification;
use Modules\Ad\Http\Requests\AdFormRequest;
use App\Notifications\AdApprovedNotification;
use Symfony\Component\HttpFoundation\File\File;

class AdController extends Controller
{
    use AdCreateTrait;

    /**
     * Display a listing of the ads.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!userCan('ad.view')) {
            return abort(403);
        }

        $query = Ad::query();

        // keyword search
        if (request()->has('keyword') && request()->keyword != null) {
            $query->where('title', "LIKE", "%" . request('keyword') . "%");
        }

        // sorting
        if (request()->has('sort_by') && request()->sort_by != null) {
            switch (request()->sort_by) {
                case 'latest':
                    $query->orderBy('id', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('id', 'asc');
                    break;
                case 'low_to_high':
                    $query->orderBy('price', 'asc');
                    break;
                case 'high_to_low':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    return $query->latest();
                    break;
            }
        }

        // filtering
        if (request()->has('filter_by') && request()->filter_by != null) {
            switch (request()->filter_by) {
                case 'expired':
                    $query->where('status', 'expired');
                    break;
                case 'active':
                    $query->where('status', 'active');
                    break;
                case 'pending':
                    $query->where('status', 'pending');
                    break;
                case 'declined':
                    $query->where('status', 'declined');
                    break;
                case 'featured':
                    $query->where('featured', 1)->latest();
                    break;
                case 'most_viewed':
                    $query->latest('total_views');
                    break;
                case 'all':
                    $query;
                    break;
            }
        }

        // perpage
        if (request()->has('perpage') && request()->perpage != null) {
            switch (request()->perpage) {
                case '10':
                    $ads = $query->paginate(10);
                    break;
                case '25':
                    $ads = $query->paginate(25);
                    break;
                case '50':
                    $ads = $query->paginate(50);
                    break;
                case '100':
                    $ads = $query->paginate(100);
                    break;
                case 'all':
                    $ads = $query->get();
                    break;
            }
        }else{
            $ads = $query->paginate(10);
        }

        if (request()->perpage != 'all') {
            $ads = $ads->withQueryString();
        }

        return view('ad::index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!userCan('ad.create')) {
            return abort(403);
        }

        $cities = City::all();
        $brands = Brand::all();
        $customers = Customer::all();
        $categories = Category::active()->with('subcategories', function($q){
            $q->where('status', 1);
        })->get();

        if ($categories->count() < 1) {
            flashWarning("You don't have any active category. Please create or active category first.");
            return redirect()->route('module.category.create');
        }

        if ($customers->count() < 1) {
            flashWarning("You don't have any customer. Please create customer first.");
            return redirect()->route('module.customer.create');
        }

        if ($brands->count() < 1) {
            flashWarning("You don't have any brand. Please create brand first.");
            return redirect()->route('module.brand.create');
        }

        if ($cities->count() < 1) {
            flashWarning("You don't have any city. Please create city first.");
            return redirect()->route('module.city.create');
        }

        return view('ad::create', [
            'cities' => $cities,
            'brands' => $brands,
            'customers' => $customers
        ]);
    }

    public function getSubcategory($id)
    {
        echo json_encode(SubCategory::active()->where('category_id', $id)->get());
    }

    public function getTown($id)
    {
        echo json_encode(Town::where('city_id', $id)->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param AdFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdFormRequest $request)
    {
        if (!userCan('ad.create')) {
            return abort(403);
        }

        $ad = new Ad();
        $ad->title = $request->title;
        $ad->slug = Str::slug($request->title);
        $ad->customer_id = $request->customer_id;
        $ad->category_id = $request->category_id;
        $ad->subcategory_id = $request->subcategory_id;
        $ad->brand_id = $request->brand_id;
        $ad->city_id = $request->city_id;
        $ad->town_id = $request->town_id;
        $ad->model = $request->model;
        $ad->condition = $request->condition;
        $ad->authenticity = $request->authenticity;
        $ad->negotiable = $request->negotiable ? $request->negotiable : 0;
        $ad->price = $request->price;
        $ad->description = $request->description;
        $ad->phone = $request->phone;
        $ad->phone_2 = $request->phone_2;
        $ad->featured = $request->featured ? $request->featured : 0;
        $ad->status = setting('ads_admin_approval') ? 'pending': 'active';
        $ad->save();

        // image uploading
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $url = $request->thumbnail->move('uploads/addss',$request->thumbnail->hashName());
            $ad->update(['thumbnail' => $url]);
        }

        // feature inserting
        foreach ($request->features as $feature) {
            if ($feature) {
                $ad->adFeatures()->create(['name' => $feature]);
            }
        }

        !setting('ads_admin_approval') ? $this->userPlanInfoUpdate($ad->featured,$request->customer_id) : '';

        flashSuccess('Ad Created Successfully. Please add the ad gallery images.');
        return redirect()->route('module.ad.show_gallery', $ad->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        if (!userCan('ad.view')) {
            return abort(403);
        }

        $ad->load('adFeatures', 'galleries', 'city', 'town', 'category', 'subcategory', 'customer', 'galleries', 'brand');
        return view('ad::show', compact('ad'));
    }


    public function edit(Ad $ad)
    {
        $data['brands'] = Brand::get();
        $data['customers'] = Customer::get();

        $data['cities'] = City::get();
        $data['towns'] = Town::where('city_id', $ad->city->id)->get();

        $data['categories'] = Category::active()->get();
        $data['subcategories'] = SubCategory::active()->where('category_id', $ad->category->id)->get();
        return view('ad::edit', compact('ad'), $data);
    }

    public function update(AdFormRequest $request, Ad $ad)
    {
        if (!userCan('ad.update')) {
            return abort(403);
        }

        $ad->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'customer_id' => $request->customer_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'city_id' => $request->city_id,
            'town_id' => $request->town_id,
            'model' => $request->model,
            'condition' => $request->condition,
            'authenticity' => $request->authenticity,
            'negotiable' => $request->negotiable ? $request->negotiable : 0,
            'price' => $request->price,
            'description' => $request->description,
            'phone' => $request->phone,
            'phone_2' => $request->phone_2,
            'featured' => $request->featured ? $request->featured : 0,
        ]);

        // image updating
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            deleteImage($ad->thumbnail);
            $url = $request->thumbnail->move('uploads/addss',$request->thumbnail->hashName());
            $ad->update(['thumbnail' => $url]);
        }

        // feature inserting
        $ad->adFeatures()->delete();
        foreach ($request->features as $feature) {
            if ($feature) {
                $ad->adFeatures()->create(['name' => $feature]);
            }
        }

        flashSuccess('Ad Updated Successfully');
        return redirect()->route('module.ad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        if (!userCan('ad.delete')) {
            return abort(403);
        }

        try {

            if (file_exists(public_path($ad->thumbnail))) {
                @unlink(public_path($ad->thumbnail));
            }

            $ad->delete();

            flashSuccess('Ad Deleted Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError();
            return back();
        }
    }

    public function status(Ad $ad, $status){
        $customer = $ad->customer;
        $ad_status = $ad->status;

        if ($ad) {
            $ad->update(['status' => $status]);
            flashSuccess('Ad Status Updated Successfully');

            if ($ad_status == 'pending') {
                if ($status == 'active') {
                    $this->userPlanInfoUpdate($ad->featured,$ad->customer_id);
                    $customer->notify(new AdApprovedNotification($customer, $ad));
                    $customer->notify(new AdCreateNotification($customer, $ad));
                }
            }

            return back();
        }

        flashError();
        return back();
    }
}

