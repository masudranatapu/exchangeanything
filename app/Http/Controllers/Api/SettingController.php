<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function appSetting()
    {
        $setting = Setting::first();
        $setting['app_name'] = env('APP_NAME');
        $setting['app_url'] = env('APP_URL');

        return response()->json([
            'success' => true,
            'data' => $setting,
        ], Response::HTTP_OK);
    }
}
