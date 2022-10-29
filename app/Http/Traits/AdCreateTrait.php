<?php

namespace App\Http\Traits;

use App\Models\UserPlan;
use App\Notifications\AdCreateNotification;
use App\Notifications\AdUpdateNotification;
use App\Notifications\AdPendingNotification;

trait AdCreateTrait
{
    protected function forgetStepSession()
    {
        session()->forget('ad');
        session()->forget('edit_mode');
        session()->forget('step1');
        session()->forget('step2');
        session()->forget('step3');
        session()->forget('step1_success');
        session()->forget('step2_success');
    }

    protected function stepCheck()
    {
        storePlanInformation();
        session(['step1' => true]);
        session(['step2' => false]);
        session(['step3' => false]);
        session(['step1_success' => false]);
        session(['step2_success' => false]);
    }

    public function postStep1Back($slug = null)
    {
        session(['step1' => true]);
        session(['step2' => false]);
        session(['step3' => false]);
        session(['step1_success' => false]);
        session(['step2_success' => false]);

        if ($slug) {
            return redirect()->route('frontend.post.edit', $slug);
        } else {
            return redirect()->route('frontend.post');
        }
    }

    public function postStep2Back($slug = null)
    {
        session(['step1' => false]);
        session(['step2' => true]);
        session(['step3' => false]);
        session(['step1_success' => true]);
        session(['step2_success' => false]);

        if ($slug) {
            return redirect()->route('frontend.post.edit.step2', $slug);
        } else {
            return redirect()->route('frontend.post.step2');
        }
    }

    protected function step1Success()
    {
        session(['step1' => false]);
        session(['step2' => true]);
        session(['step3' => false]);
        session(['step1_success' => true]);
        session(['step2_success' => false]);
    }

    protected function step1Success2()
    {
        session(['step1' => false]);
        session(['step2' => false]);
        session(['step3' => true]);
        session(['step1_success' => true]);
        session(['step2_success' => true]);
    }

    protected function userPlanInfoUpdate($is_featured, $customer_id = null)
    {
        $userPlan = UserPlan::customerData($customer_id)->firstOrFail();

        if ($userPlan->ad_limit != 0) {
            $userPlan->ad_limit = $userPlan->ad_limit - 1;
        }

        if ($userPlan->featured_limit != 0 && $is_featured) {
            $userPlan->featured_limit = $userPlan->featured_limit - 1;
        }

        return $userPlan->save();
    }

    protected function adNotification($ad, $mode = 'create', $api = false)
    {
        $user = auth($api ? 'api' : 'customer')->user();

        if ($mode == 'create') {
            if (setting('ads_admin_approval')) {
                $user->notify(new AdPendingNotification($user, $ad));
            } else {
                //$user->notify(new AdCreateNotification($user, $ad));
            }
        } else {
            //$user->notify(new AdUpdateNotification($user, $ad));
        }
    }

    protected function setAdEditStep1Data($ad)
    {
        // step 1 data
        return [
            'id' => $ad->id,
            'title' => $ad->title,
            'slug' => $ad->slug,
            'price' => $ad->price,
            'category_id' => $ad->category_id,
            'subcategory_id' => $ad->subcategory_id,
            'brand_id' => $ad->brand_id,
            'model' => $ad->model,
            'condition' => $ad->condition,
            'authenticity' => $ad->authenticity,
            'negotiable' => $ad->negotiable,
            'featured' => $ad->featured,
        ];
    }

    protected function setAdEditStep2Data($ad)
    {
        // step 2 data
        return [
            'id' => $ad->id,
            'title' => $ad->title,
            'slug' => $ad->slug,
            'city_id' => $ad->city_id,
            'town_id' => $ad->town_id,
            'phone' => $ad->phone,
            'phone_2' => $ad->phone_2,
            'web' => $ad->web,
            'phone_number_showing_permission' => $ad->phone_number_showing_permission,
        ];
    }

    protected function setAdEditStep3Data($ad)
    {
        // step 3 data
        return [
            'id' => $ad->id,
            'title' => $ad->title,
            'slug' => $ad->slug,
            'description' => $ad->description,
            'features' => $ad->adFeatures,
            'galleries' => $ad->galleries,
            'thumbnail' => $ad->thumbnail,
        ];
    }

    protected function adLimitChecking()
    {
        $userPlan = auth('api')->user()->userPlan;

        if ($userPlan && $userPlan->ad_limit != 0) {
            return true;
        }

        return false;
    }

    protected function featuredAdChecking()
    {
        $userPlan = auth('api')->user()->userPlan;

        if ($userPlan && $userPlan->featured_limit != 0) {
            return true;
        }

        return false;
    }
}
