<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UseIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $authUser = auth('customer')->user();
        $userPlan = App\Models\UserPlan::CustomerData($authUser)->first();
        if($userPlan->is_active == 1){
            return $next($request);

        }else{
            return redirect()->route('dashboard');
        }
    }
}
