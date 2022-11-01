<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Setting;
use App\Models\Timezone;
use App\Mail\SendTestMail;
use Illuminate\Http\Request;
use App\Models\ModuleSetting;
use App\Models\SocialSetting;
use App\Models\PaymentSetting;
use Illuminate\Support\Facades\Mail;
use Modules\Currency\Entities\Currency;
use Modules\Language\Entities\Language;
use File;
use DB;

class SettingsController extends Controller
{
    /**
     * Website setting page.
     *
     * @param  string $page
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        if (!userCan('setting.view')) {
            return abort(403);
        }

        $setting = Setting::first();

        switch ($page) {
            case 'website':
                if (!session('website_setting_section')) {
                    session(['website_setting_section' => 'basic']);
                }

                return view('backend.settings.pages.website', compact('setting'));
                break;
            case 'system':
                $languages = Language::all();
                $timeszones = Timezone::all();
                $currencies = Currency::all(['id', 'code', 'symbol']);

                return view('backend.settings.pages.system', compact('setting', 'timeszones', 'languages', 'currencies'));
                break;
            case 'layout':
                return view('backend.settings.pages.layout');
                break;
            case 'color':
                return view('backend.settings.pages.color-picker');
                break;
            case 'custom':
                return view('backend.settings.pages.custom', compact('setting'));
                break;
            case 'mail':
                return view('backend.settings.pages.mail');
                break;
            case 'email_template':
                return view('backend.settings.pages.email_template');
                break;
            case 'payment':
                $paymentsetting = PaymentSetting::first();
                return view('backend.settings.pages.payment', compact('paymentsetting'));
                break;
            case 'module':
                $modulesetting = ModuleSetting::first();
                return view('backend.settings.pages.module', compact('modulesetting'));
                break;
            case 'seo':
                return view('backend.settings.pages.seo', compact('setting'));
                break;

            case 'cms':
                $cms = Cms::first();
                return view('backend.settings.pages.cms', compact('cms'));
                break;

            case 'ads':
                $setting = Setting::first();
                return view('backend.settings.pages.ads', compact('setting'));
                break;

            case 'social_login':
                $socialsetting = SocialSetting::first();

                return view('backend.settings.pages.social_login', compact('socialsetting'));
                break;
            default:
                abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $page)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        switch ($page) {
            case 'website':
                $this->validate($request, [
                    'name' => "sometimes|required",
                    'email' => "sometimes|required",
                    'phone' => "sometimes|required",
                    'address' => "sometimes|required",
                    'map_address' => "sometimes|required",
                ]);
                $setting = Setting::first();
                if($request->ads_admin_approval !=null){
                    $setting->ads_admin_approval = 1;
                }else{
                    $setting->ads_admin_approval = $request->ads_admin_approval ?? false;
                } 
                $setting->update();
                $this->websiteUpdate($request);
                
                $message = 'Site Settings Content';
                break;
            case 'system':
                $this->validate($request, [
                    'timezone' => "required",
                    'app_name' => "required",
                    'app_url' => "required",
                    'db_connection' => "required",
                    'db_host' => "required",
                    'db_port' => "required",
                    'db_name' => "required",
                    'db_username' => "required",
                    'db_password' => "required",
                ]);

                $this->systemUpdate($request);

                return response()->json(['message' => 'Setting Updated Successfully']);
                $message = 'System Settings';
                break;
            case 'color':
                if (setting('dark_mode')) {
                    flashWarning("You can't cahnge color.Beacause you're in dark mode.");
                    return back();
                } else {
                    $this->colorUpdate($request);
                    $message = 'Color Setting';
                }
                break;
            case 'custom':
                $this->custumCSSJSUpdate($request);
                $message = 'Custom Setting';
                break;
            case 'mail':
                $this->validate($request, [
                    'host' => "required",
                    'port' => "required|min:2|max:20",
                    'username' => "required|string|min:4",
                    'password' => "required|min:4",
                    'encryption' => "required|string",
                    'from_address' => "required|email",
                    'from_name' => "required|string",
                ]);
                return $this->mailSUpdate($request);
                $message = 'Mail Setting';
                break;
            case 'dark_mode':
                $this->modeUpdate($request);
                $message = 'Mode';

                break;
            case 'layout':
                $this->layoutUpdate($request);
                $message = 'Layout Setting';
                break;
            case 'module':
                $this->moduleUpdate($request);
                $message = 'Module Setting';
                break;
            default:
                abort(404);
        }

        flashSuccess($message . ' Updated Successfully');
        return back();
    }

    /**
     * Layout Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function layoutUpdate($request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }
        $layout = $request->only(['default_layout']);
        return Setting::first()->update($layout);
    }

    /**
     * Module Setting Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    public function moduleUpdate($request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        $blog = $request->blog ?? false;
        $newsletter = $request->newsletter ?? false;
        $language = $request->language ?? false;
        $price_plan = $request->price_plan ?? false;
        $testimonial = $request->testimonial ?? false;
        $faq = $request->faq ?? false;
        $contact = $request->contact ?? false;
        $appearance = $request->appearance ?? false;

        return ModuleSetting::first()->update([
            'blog' => $blog,
            'newsletter' => $newsletter,
            'language' => $language,
            'price_plan' => $price_plan,
            'testimonial' => $testimonial,
            'faq' => $faq,
            'contact' => $contact,
            'appearance' => $appearance,
        ]);
    }

    /**
     * Website Data Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    protected function websiteUpdate($request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }
        $setting = Setting::first();

        switch ($request->section) {
            case 'basic':
                $data = $request->only(['email', 'phone', 'address', 'map_address']);
                session(['website_setting_section' => 'basic']);

                return $setting->update($data);
                break;
            case 'social_links':
                session(['website_setting_section' => 'social_links']);
                return $setting->update($request->only(['facebook', 'twitter', 'instagram', 'youtube', 'telegam', 'discord']));
                break;
            case 'logo':
                session(['website_setting_section' => 'logo']);
                if ($request->hasFile('logo_image') && $request->file('logo_image')->isValid()) {
                    $url = $request->logo_image->move('uploads/website', $request->logo_image->hashName());
                    $setting->update(['logo_image' => $url]);
                }

                if ($request->hasFile('logo_image2') && $request->file('logo_image2')->isValid()) {
                    $url = $request->logo_image2->move('uploads/website', $request->logo_image2->hashName());
                    $setting->update(['logo_image2' => $url]);
                }

                if ($request->hasFile('favicon_image') && $request->file('favicon_image')->isValid()) {
                    $url = $request->favicon_image->move('uploads/website', $request->favicon_image->hashName());
                    $setting->update(['favicon_image' => $url]);
                }

                if ($request->hasFile('loader_image') && $request->file('loader_image')->isValid()) {
                    $url = $request->loader_image->move('uploads/website', $request->loader_image->hashName());
                    $setting->update(['loader_image' => $url]);
                }
                return true;
                break;
        }
    }

    /**
     * System Data Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    protected function systemUpdate($request)
    {
        $timezone = $request->timezone;
        $app_name = $request->app_name;
        $app_url = $request->app_url;
        $db_connection = $request->db_connection;
        $db_host = $request->db_host;
        $db_port = $request->db_port;
        $db_name = $request->db_name;
        $db_username = $request->db_username;
        $db_password = $request->db_password;
        $default_lang = $request->default_language;
        $default_currency = $request->default_currency;

        if ($timezone && $timezone != config('app.timezone')) {
            envReplace('APP_TIMEZONE', $timezone);
        }

        if ($app_name != config('app.name')) {
            \Artisan::call('env:set APP_NAME="' . $app_name . '"');
        }

        if ($request->app_debug) {
            \Artisan::call('env:set APP_DEBUG=true');
        } else {
            \Artisan::call('env:set APP_DEBUG=false');
        }

        if ($app_url && $app_url != env('DB_CONNECTION')) {
            envReplace('APP_URL', $app_url);
        }

        // Database
        if ($db_connection && $db_connection != env('DB_CONNECTION')) {
            envReplace('DB_CONNECTION', $db_connection);
        }
        if ($db_host && $db_host != env('DB_HOST')) {
            envReplace('DB_HOST', $db_host);
        }
        if ($db_port && $db_port != env('DB_PORT')) {
            envReplace('DB_PORT', $db_port);
        }
        if ($db_name && $db_name != env('DB_DATABASE')) {
            envReplace('DB_DATABASE', $db_name);
        }
        if ($db_username && $db_username != env('DB_USERNAME')) {
            envReplace('DB_USERNAME', $db_username);
        }
        if ($db_password && $db_password != env('DB_PASSWORD')) {
            envReplace('DB_PASSWORD', $db_password);
        }

        // default language setting
        if ($default_currency && $default_currency != env('APP_DEFAULT_LANGUAGE')) {
            $currency = Currency::where('code', $default_currency)->firstOrFail();
            envReplace('APP_CURRENCY', $currency->code);
            envReplace('APP_CURRENCY_SYMBOL', $currency->symbol);
            envReplace('APP_CURRENCY_SYMBOL_POSITION', $currency->symbol_position);
        }

        // default currency setting
        if ($default_lang && $default_lang != env('APP_DEFAULT_LANGUAGE')) {
            envReplace('APP_DEFAULT_LANGUAGE', $default_lang);
        }

        // website
        $setting = Setting::first();
        $setting->website_loader = $request->website_loader ?? false;
        $setting->regular_ads_homepage = $request->regular_ads_homepage ?? false;
        $setting->featured_ads_homepage = $request->featured_ads_homepage ?? false;
        $setting->customer_email_verification = $request->customer_email_verification ?? false;
        $setting->ads_admin_approval = $request->ads_admin_approval ?? false;
        $setting->free_ad_limit = $request->free_ad_limit;
        $setting->free_featured_ad_limit = $request->free_featured_ad_limit;
        $setting->save();

        return true;
    }

    /**
     * color Data Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    protected function colorUpdate($request)
    {
        $color = $request->only(['sidebar_color', 'nav_color']);
        return Setting::first()->update($color);
    }

    /**
     * custom js and css Data Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    protected function custumCSSJSUpdate($request)
    {
        $custom_css_js = $request->only(['header_css', 'header_script', 'body_script']);
        return Setting::first()->update($custom_css_js);
    }

    /**
     * Mode Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    protected function modeUpdate($request)
    {
        $dark_mode = $request->only(['dark_mode']);
        return Setting::first()->update($dark_mode);
    }

    /**
     * Mode Update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     */
    protected function mailSUpdate($request)
    {
        if (env('MAIL_HOST') != $request->host) {
            envReplace('MAIL_HOST', $request->host);
        }
        if (env('MAIL_PORT') != $request->port) {
            envReplace('MAIL_PORT', $request->port);
        }
        if (env('MAIL_USERNAME') != $request->username) {
            envReplace('MAIL_USERNAME', $request->username);
        }
        if (env('MAIL_PASSWORD') != $request->password) {
            envReplace('MAIL_PASSWORD', $request->password);
        }
        if (env('MAIL_ENCRYPTION') != $request->encryption) {
            envReplace('MAIL_ENCRYPTION', $request->encryption);
        }
        if (env('MAIL_FROM_ADDRESS') != $request->from_address) {
            envReplace('MAIL_FROM_ADDRESS', $request->from_address);
        }
        if (env('MAIL_FROM_NAME') != $request->from_name) {
            \Artisan::call('env:set MAIL_FROM_NAME="' . $request->from_name . '"');
        }

        flashSuccess('Mail Setting Updated Successfully');
        return back();
    }

    /**
     * Send test mail.
     *
     * @return \Illuminate\Http\Response
     */
    public function testMailSend(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        try {
            Mail::to($request->email)->send(new SendTestMail());

            flashSuccess('Test mail sent Successfully');
            return back();
        } catch (\Throwable $th) {
            flashError('Something went wrong. Please check your mail settings.');
            return back();
        }
    }

    /**
     * Update SEO Settings
     *
     * @author Mithun Halder
     * @return void
     */
    public function updateSeo(Request $request)
    {
        Setting::first()->update($request->only(['seo_meta_title', 'seo_meta_description', 'seo_meta_keywords']));

        return redirect()->back()->with('success', 'SEO Settings update successfully!');
    }

    public function adsSettingUpdate(Request $request){
        $setting = Setting::first();
        $setting->ads_expire_day = $request->ads_expire_day;
        $setting->ads_expire_notify = $request->ads_expire_notify;
        $setting->save();

        return redirect()->back()->with('success', 'Ads Setting updated successfully!');
    }

    public function showAdminAds()
    {
        $adminads = DB::table('admin_ads')->latest()->paginate(10);
        return view('backend.settings.ads.index', compact('adminads'));
    }

    public function storAdminAds(Request $request)
    {
        //
        $this->validate($request, [
            'ads_name' => 'required',
            'ads_img' => 'required',
            'ads_link'  => 'required'
        ]);

        // if($request->status == 1){
        //     DB::table('admin_ads')->where('status', 1)->update([
        //         'status' => 0,
        //     ]);
        // }

        $admin_ads_image = $request->file('ads_img');
        $slug = 'ads-image';
        $admin_ads_image_name = $slug.'-'.uniqid().'.'.$admin_ads_image->getClientOriginalExtension();
        $upload_path = 'media/adminads/';
        $admin_ads_image->move($upload_path, $admin_ads_image_name);

        $image_url = $upload_path.$admin_ads_image_name;
        
        DB::table('admin_ads')->insert([
            'ads_name' => $request->ads_name,
            'ads_img' => $image_url,
            'ads_link' => $request->ads_link,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Admin Ads successfully created ');
    }
    public function updateAdminAds(Request $request, $id)
    {
        $this->validate($request, [
            'ads_name' => 'required',
        ]);
        

        // if($request->status == 1){
        //     DB::table('admin_ads')->where('status', 1)->update([
        //         'status' => 0,
        //     ]);
        // }

        $admin_ads_image = $request->file('ads_img');
        $slug = 'ads-image';
        if(isset($admin_ads_image)) {

            $admin_ads_image_name = $slug.'-'.uniqid().'.'.$admin_ads_image->getClientOriginalExtension();
            $upload_path = 'media/adminads/';
            $admin_ads_image->move($upload_path, $admin_ads_image_name);

            $adminadsimage = DB::table('admin_ads')->where('id', $id)->first();
            if(File::exists(public_path('media/adminads/'.$adminadsimage->ads_img))){
               File::delete();
            }
            $image_url = $upload_path.$admin_ads_image_name;

            DB::table('admin_ads')->where('id', $id)->update([
                'ads_name' => $request->ads_name,
                'ads_img' => $image_url,
                'ads_link' => $request->ads_link,
                'status' => $request->status,
            ]);
            return redirect()->back()->with('success', 'Admin Ads successfully updated ');
        }else {

            DB::table('admin_ads')->where('id', $id)->update([
                'ads_name' => $request->ads_name,
                'ads_link' => $request->ads_link,
                'status' => $request->status,
            ]);
            return redirect()->back()->with('success', 'Admin Ads successfully update without image');
        }
    }
    public function deleteAdminAds($id)
    {
        $adminads = DB::table('admin_ads')->where('id', $id)->first();
        $deleteadminadsimage = $adminads->ads_img;

        if(file_exists($deleteadminadsimage)) {
            unlink($deleteadminadsimage);
        }

        $adminadsmy = DB::table('admin_ads')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Admin Ads successfully deleted');
    }
    public function statusAdminAds(Request $request)
    {
        // if($request->get_active_status == 1){
        //     $status = DB::table('admin_ads')->where('status', 1)->get();
        //     if($status->count() > 0 ){
        //         return redirect()->back()->with('error', 'Already active a data ');
        //     }
        // }
        
        DB::table('admin_ads')->where('id', $request->admin_ads_id)->update([
            'status' => $request->get_active_status,
        ]);

        return redirect()->back()->with('success', 'Admin Ads status successfully updated');
    }
}
