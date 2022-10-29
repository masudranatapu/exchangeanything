<?php

namespace App\Http\Traits;

use Illuminate\Http\Response;
use App\Notifications\AdDeleteNotification;

trait MobileTrait
{
    protected function permissionCheck($customer_id){
        if ($customer_id) {
            if ($customer_id != auth('api')->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You are not allowed to do this action'
                ], Response::HTTP_FORBIDDEN);
            }
        }
    }

    protected function addeleteNotification()
    {
        $user = auth('api')->user();
        $user->notify(new AdDeleteNotification($user));
    }
}
