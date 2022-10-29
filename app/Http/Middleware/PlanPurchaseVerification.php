<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PlanPurchaseVerification
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userPlan = auth()->guard('customer')->user()->userPlan;

        if (empty($userPlan) || $userPlan->is_active != 1) {
            return redirect()->route('frontend.dashboard');
        }

        return $next($request);
    }
}
