<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        $userPlan =  session('user_plan') ? session('user_plan') : auth()->guard('customer')->user()->userPlan;
        $plan    = Plan::find($userPlan->plans_id);

        if ((int) $userPlan->ad_limit <= 0) {
            if ($plan->ad_limit == 0) {
                return $next($request);
            } else {

                session()->forget('user_plan');
                session()->put('user_plan', auth()->guard('customer')->user()->userPlan);
                return redirect()->route('frontend.expiredPlan');
            }
        }

        // return $next($request);


        session()->put('user_plan', auth()->guard('customer')->user()->userPlan);

        return redirect()->route('frontend.expiredPlan');
    }
}
