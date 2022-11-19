<?php

namespace App\Http\Middleware;

use App\Models\UserPlan;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Plan\Entities\Plan;

class CheckPlanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userPlan =  UserPlan::where('customer_id', auth()->guard('customer')->id())->first();
        $plan    = Plan::find($userPlan->plans_id);



        if ($plan->package_duration == 3) {



            if (Carbon::parse($userPlan->updated_at)->addMonth(1)->isFuture()) {
                if ((int) $userPlan->ad_limit <= 0) {
                    session()->forget('user_plan');
                    session()->put('user_plan', auth()->guard('customer')->user()->userPlan);
                    return redirect()->route('frontend.expiredPlan');
                } else {
                    return $next($request);
                    session()->forget('user_plan');
                    session()->put('user_plan', auth()->guard('customer')->user()->userPlan);
                }
            } else {
                session()->forget('user_plan');
                session()->put('user_plan', auth()->guard('customer')->user()->userPlan);
                return redirect()->route('frontend.expiredPlan');
            }
        } elseif ($plan->package_duration == 2) {
            if (Carbon::parse($userPlan->updated_at)->addYear(1)->isFuture()) {
                if ((int) $userPlan->ad_limit <= 0) {
                    session()->forget('user_plan');
                    session()->put('user_plan', auth()->guard('customer')->user()->userPlan);
                    return redirect()->route('frontend.expiredPlan');
                } else {
                    session()->forget('user_plan');
                    session()->put('user_plan', auth()->guard('customer')->user()->userPlan);
                    return $next($request);
                }
            } else {
                session()->put('user_plan', auth()->guard('customer')->user()->userPlan);
                return redirect()->route('frontend.expiredPlan');
            }
        } elseif ($plan->package_duration == 1) {
            session()->forget('user_plan');
            session()->put('user_plan', auth()->guard('customer')->user()->userPlan);
            return $next($request);
        }
    }
}
