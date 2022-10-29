<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Ad\Entities\Ad;
use App\Models\Setting;
use Carbon\Carbon;
use Mail;
use App\Mail\AddExpireAlertNotification;
use App\Model\Customer;
class AdsExpireNotificationController extends Controller
{
    public function sendNotification(){
        $setting = Setting::first();
        $ads_expire_day = $setting->ads_expire_day;
        $ads_expire_notify = $setting->ads_expire_notify;

        if($ads_expire_day == null ||  $ads_expire_notify == null){
            return redirect()->back()->with('error', 'Please setup the Ads Expire Day and Notification Sending Day Before Expire from settings/ads'); 
        }

        //in this time notification will be send;
        $notification_time = $ads_expire_day - $ads_expire_notify;
       
       $ads = Ad::with('customer')->where('status', '!=' , 'expired')->get();
       foreach($ads as $ad){
        $start = Carbon::parse($ad->created_at);
        $now = Carbon::now();
        $created_days_count = $start->diffInDays($now);
        
        //add expiring start
        if($created_days_count > $ads_expire_day){
            $ad->status = 'expired';
            $ad->save();
        }

        //expire alert norification sending start
        if($notification_time == $created_days_count){
            $customer_email = $ad['customer']['email'];
            $email_data = $ad;
            $email_data['expire_date'] = $start->addDays($ads_expire_day);
            Mail::to($customer_email)->send(new AddExpireAlertNotification($email_data));
        }
       }
       return 'DONE';
    }
}
