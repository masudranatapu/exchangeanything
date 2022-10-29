<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use App\Models\Transaction;
use Modules\Ad\Entities\Ad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Rules\MatchOldPassword;
use Modules\Plan\Entities\Plan;
use App\Http\Traits\MobileTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;
use Illuminate\Support\Facades\Hash;
use App\Actions\Frontend\ProfileUpdate;
use App\Http\Requests\Api\ProfileUpdateFormRequest;
use App\Http\Resources\Api\CustomerPlanResource;
use Modules\Wishlist\Entities\Wishlist;
use App\Http\Resources\InvoiceMobileResource;
use App\Notifications\AdWishlistNotification;
use Modules\Ad\Transformers\AdResourceMobile;
use App\Http\Resources\CustomerFavouriteAdsResource;
use App\Http\Resources\CustomerNotificationResource;

class CustomerController extends Controller
{
    use MobileTrait;

    public function passwordUpdate(Request $request)
    {
        $customer = Customer::findOrFail(auth('api')->id());

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $password_check = Hash::check($request->current_password, $customer->password);

        if ($password_check) {
            $customer->update(['password' => bcrypt($request->password)]);

            return response()->json([
                'success' => true,
                'message' => 'Password Updated',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Current password did'nt match with our records",
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProfileUpdateFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(ProfileUpdateFormRequest $request)
    {
        try {
            $customer = ProfileUpdate::update($request, auth('api')->user());

            if ($customer) {
                return response()->json([
                    'message' => 'Profile Updated',
                    'customer' => $customer
                ], Response::HTTP_OK);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function allAds(Request $request)
    {
        $filter =  $request->filter;
        $paginate = $request->paginate ?? false;

        $ads =  Ad::with('category')->whereCustomerId(auth('api')->id())->latest();

        if ($filter == 'active') {
            $ads = $ads->whereStatus('active');
        } elseif ($filter == 'expired') {
            $ads = $ads->whereStatus('expired');
        }

        if ($paginate) {
            $ads = $ads->simplePaginate($paginate);
        } else {
            $ads = $ads->get();
        }

        return AdResourceMobile::collection($ads);
    }

    public function recentAds(Request $request)
    {
        $paginate = $request->paginate ?? false;

        $recent_ads = Ad::customerData(true)->with('category')->latest('id');

        if ($paginate) {
            $recent_ads = $recent_ads->simplePaginate($paginate);
        } else {
            $recent_ads = $recent_ads->get();
        }

        return AdResourceMobile::collection($recent_ads);
    }

    public function activeAd(Ad $ad)
    {
        if ($ad->customer_id != auth('api')->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Ad is already expired'
            ], Response::HTTP_ACCEPTED);
        }

        if ($ad->status != 'expired') {
            return response()->json([
                'success' => false,
                'message' => 'Ad is already active'
            ], Response::HTTP_ACCEPTED);
        }

        $ad->update([
            'status' => 'active'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ad mark as active'
        ], Response::HTTP_OK);
    }

    public function expireAd(Ad $ad)
    {
        if ($ad->customer_id != auth('api')->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You are not allowed to do this action'
            ], Response::HTTP_FORBIDDEN);
        }

        if ($ad->status != 'active') {
            return response()->json([
                'success' => false,
                'message' => 'Ad is already expired'
            ], Response::HTTP_ACCEPTED);
        }

        $ad->update([
            'status' => 'expired'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ad mark as expire'
        ], Response::HTTP_OK);
    }

    public function deleteAd(Ad $ad)
    {
        if ($ad->customer_id != auth('api')->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You are not allowed to do this action'
            ], Response::HTTP_FORBIDDEN);
        }

        $ad->delete();
        $this->addeleteNotification();

        return response()->json([
            'success' => true,
            'message' => 'Ad deleted successfully'
        ], Response::HTTP_OK);
    }

    public function deleteCustomer()
    {
        $customer = auth('api')->user();
        $customer->delete();
        auth('api')->logout();

        return response()->json([
            'success' => true,
            'message' => 'Account deleted successfully'
        ], Response::HTTP_OK);
    }

    public function favouriteAddRemove(Ad $ad)
    {
        $customer = auth('api')->user();

        $data = Wishlist::where('ad_id', $ad->id)->whereCustomerId($customer->id)->first();

        if ($data) {
            $data->delete();

            $customer->notify(new AdWishlistNotification($customer, 'add', $ad->slug));

            return response()->json([
                'success' => true,
                'message' => 'Ad removed from wishlist'
            ], Response::HTTP_OK);
        } else {
            Wishlist::create([
                'ad_id' => $ad->id,
                'customer_id' => $customer->id
            ]);

            $customer->notify(new AdWishlistNotification($customer, 'add', $ad->slug));

            return response()->json([
                'success' => true,
                'message' => 'Ad added to wishlist'
            ], Response::HTTP_OK);
        }
    }

    public function recentInvoice()
    {
        return InvoiceMobileResource::collection(Transaction::with('plan:id,label')->customerData(true)->latest()->get()->take(5));
    }

    public function favouriteAds(Request $request)
    {
        $paginate = $request->paginate ?? false;

        $ads =  Wishlist::with('ad')->whereCustomerId(auth('api')->id())->latest();

        if ($paginate) {
            $ads = $ads->simplePaginate($paginate);
        } else {
            $ads = $ads->get();
        }

        return CustomerFavouriteAdsResource::collection($ads);
    }

    public function activityLogs()
    {

        $notifications = auth('api')->user()->notifications()->latest()->limit(5)->get();;

        return CustomerNotificationResource::collection($notifications);
    }

    public function dashboardOverview()
    {
        $ads = Ad::customerData(true)->get();
        $posted_ads_count = $ads->count();
        $expire_ads_count = $ads->where('status', 'expired')->count();
        $active_ads_count = $ads->where('status', 'active')->count();
        $favourite_count = Wishlist::whereCustomerId(auth('api')->id())->count();

        return response()->json([
            'success' => true,
            'data' => [
                'posted_ads_count' => $posted_ads_count,
                'active_ads_count' => $active_ads_count,
                'expire_ads_count' => $expire_ads_count,
                'favourite_ads_count' => $favourite_count
            ]
        ], Response::HTTP_OK);
    }

    public function adsViewsSummery()
    {
        $bar_chart_datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        for ($i = 0; $i < 12; $i++) {
            $bar_chart_datas[$i] = (int)Ad::customerData(true)
                ->select('total_views')
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $i + 1)
                ->sum('total_views');
        }

        return response()->json([
            'success' => true,
            'data' => [
                'month_wise_views' => $bar_chart_datas
            ]
        ], Response::HTTP_OK);
    }

    public function planLimit()
    {
        return response()->json([
            'success' => true,
            'plan' => new CustomerPlanResource(auth('api')->user()->userPlan)
        ], Response::HTTP_OK);
    }

    public function planUpgradeTesting(Request $request)
    {
        dd(1);
        auth('api')->user()->userPlan->update([
            'ad_limit' => $request->ad_limit,
            'featured_limit' => $request->featured_limit,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Plan updated successfully',
            'plan' => new CustomerPlanResource(auth('api')->user()->userPlan)
        ], Response::HTTP_OK);
    }
}
