<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Modules\Wishlist\Entities\Wishlist;
use App\Notifications\LoginNotification;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Category\Transformers\CategoryResource;
use Modules\Location\Entities\Town;
use Modules\Ad\Entities\Ad;
use Modules\Category\Entities\Category;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::CUSTOMER_HOME;

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function showLoginForm()
    {
        if(!session()->has('url.intended')){
            session(['url.intended' => url()->previous()]);
        }

        $data['verified_users'] = Customer::where('email_verified_at', '!=', null)->count();

        $categories = CategoryResource::collection(Category::active()->latest()->get());
        $data['categories'] = collectionToResource($categories);
        $data['towns'] = Town::orderBy('name')->get();
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        return view('frontend.sign-in', $data);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        $loginData = request()->input('login_data');

        if (filter_var($loginData, FILTER_VALIDATE_EMAIL)) {
            $type = 'email';
        } else {
            $type = 'username';
        }

        request()->merge([$type => $loginData]);
        return $type;
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        storePlanInformation();
        $this->loggedinNotification();

        resetSessionWishlist();

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::guard('customer')->user()->deactive_account == 1) {
                Auth::guard('customer')->logout();
                return back();
            } else {
                return redirect()->route('frontend.dashboard');
            }
        }
    }

    public function loggedinNotification()
    {
        // Send login notification
        $user = Customer::find(auth('customer')->id());
        $user->notify(new LoginNotification($user));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {

        storePlanInformation();
        resetSessionWishlist();

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }
}
