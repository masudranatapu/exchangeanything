<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;

class CmsSettingController extends Controller
{


    /**
     * Update posting rules text
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function postingRulesUpdate(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        $cms =  Cms::first();
        if ($request->hasFile('posting_rules_background') && $request->file('posting_rules_background')->isValid()) {
            deleteImage($cms->posting_rules_background);
            $url = $request->posting_rules_background->move('uploads/banners',$request->posting_rules_background->hashName());
            $cms->update($request->only('posting_rules_body') + ['posting_rules_background' => $url]);
        } else {
            $request->validate([
                'posting_rules_body'    =>  ['required']
            ]);
            $cms->update($request->only('posting_rules_body'));
        }

        return redirect()->back()->with('success', 'Posting rules update successfully!');
    }

    /**
     * About information update
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateAbout(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        $cms =  Cms::first();
        $rules = ['about_body'    =>  ['required']];
        $data = $request->only('about_body');

        if ($request->hasFile('about_background') && $request->file('about_background')->isValid()) {
            deleteImage($cms->about_background);
            $data['about_background'] =  $request->about_background->move('uploads/banners',$request->about_background->hashName());
        }
        $data['about_heading'] =  $request->about_heading;

        $request->validate($rules);
        $cms->update($data);

        return redirect()->back()->with('success', 'About update successfully!');
    }

    /**
     * Terms information update
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateTerms(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        $cms = Cms::first();

        if ($request->hasFile('terms_background') && $request->file('terms_background')->isValid()) {
            deleteImage($cms->terms_background);
            $url = $request->terms_background->move('uploads/banners',$request->terms_background->hashName());
            $cms->update($request->only('terms_body') + ['terms_background' => $url]);
        } else {
            $request->validate([
                'terms_body'    =>  ['required']
            ]);
            $cms->update($request->only('terms_body'));
        }

        return redirect()->back()->with('success', 'Term & Condition update successfully!');
    }

    /**
     * privacy information update
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updatePrivacy(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        $cms =  Cms::first();
        if ($request->hasFile('privacy_background') && $request->file('privacy_background')->isValid()) {
            deleteImage($cms->privacy_background);
            $url = $request->privacy_background->move('uploads/banners',$request->privacy_background->hashName());
            $cms->update($request->only('privacy_body') + ['privacy_background' => $url]);
        } else {
            $request->validate([
                'privacy_body'    =>  ['required']
            ]);
            $cms->update($request->only('privacy_body'));
        }

        return redirect()->back()->with('success', 'Privacy Policy update successfully!');
    }


    /**
     * Update Home page static images
     *
     * @@author Mithun Halder <mithunrptc@gmail.com>
     * @param Request $request
     * @return void
     */
    public function updateHome(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        $cms =  Cms::first();
        $data = [];

        if ($request->hasFile('index1_main_banner') && $request->file('index1_main_banner')->isValid()) {
            deleteImage($cms->index1_main_banner);
            $data['index1_main_banner'] =  $request->index1_main_banner->move('uploads/banners',$request->index1_main_banner->hashName());
        }
        if ($request->hasFile('index1_counter_background') && $request->file('index1_counter_background')->isValid()) {
            deleteImage($cms->index1_counter_background);
            $data['index1_counter_background'] =  $request->index1_counter_background->move('uploads/banners',$request->index1_counter_background->hashName());
        }
        if ($request->hasFile('index1_mobile_app_banner') && $request->file('index1_mobile_app_banner')->isValid()) {
            deleteImage($cms->index1_mobile_app_banner);
            $data['index1_mobile_app_banner'] =  $request->index1_mobile_app_banner->move('uploads/banners',$request->index1_mobile_app_banner->hashName());
        }
        if ($request->hasFile('index2_search_filter_background') && $request->file('index2_search_filter_background')->isValid()) {
            deleteImage($cms->index2_search_filter_background);
            $data['index2_search_filter_background'] =  $request->index2_search_filter_background->move('uploads/banners',$request->index2_search_filter_background->hashName());
        }
        if ($request->hasFile('index2_get_membership_background') && $request->file('index2_get_membership_background')->isValid()) {
            deleteImage($cms->index2_get_membership_background);
            $data['index2_get_membership_background'] =  $request->index2_get_membership_background->move('uploads/banners',$request->index2_get_membership_background->hashName());
        }
        if ($request->hasFile('index3_search_filter_background') && $request->file('index3_search_filter_background')->isValid()) {
            deleteImage($cms->index3_search_filter_background);
            $data['index3_search_filter_background'] =  $request->index3_search_filter_background->move('uploads/banners',$request->index3_search_filter_background->hashName());
        }

        $data['index1_title'] = $request->index1_title;
        $data['index1_description'] = $request->index1_description;
        $data['index3_title'] = $request->index3_title;
        $data['index3_short_title'] = $request->index3_short_title;
        $data['download_app'] = $request->download_app;
        $data['newsletter_content'] = $request->newsletter_content;
        $data['membership_content'] = $request->membership_content;
        $data['create_account'] = $request->create_account;
        $data['post_ads'] = $request->post_ads;
        $data['start_earning'] = $request->start_earning;

        $cms->update($data);

        return redirect()->back()->with('success', 'Home Settings update successfully!');
    }

    /**
     * Update Get Membership Page static images
     *
     * @author Mithun Halder <mithunrptc@gmail.com>
     * @param Request $request
     * @return void
     */
    public function updateGetMembership(Request $request)
    {

        if (!userCan('setting.update')) {
            return abort(403);
        }

        $cms =  Cms::first();
        $data = [];

        if ($request->hasFile('get_membership_background') && $request->file('get_membership_background')->isValid()) {
            deleteImage($cms->get_membership_background);
            $data['get_membership_background'] =  $request->get_membership_background->move('uploads/banners',$request->get_membership_background->hashName());
        }
        if ($request->hasFile('get_membership_image') && $request->file('get_membership_image')->isValid()) {
            deleteImage($cms->get_membership_image);
            $data['get_membership_image'] =  $request->get_membership_image->move('uploads/banners',$request->get_membership_image->hashName());
        }
        $data['membership_content'] = $request->membership_content;

        $cms->update($data);

        return redirect()->back()->with('success', 'Get Membership Settings update successfully!');
    }



    /**
     * Update Pricing Plan Static Images
     *
     *
     * @author Mithun Halder <mithunrptc@gmail.com>
     * @param Request $request
     * @return void
     */
    public function updatePricingPlan(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        if ($request->hasFile('pricing_plan_background') && $request->file('pricing_plan_background')->isValid()) {
            $cms =  Cms::first();
            deleteImage($cms->pricing_plan_background);
            $url = $request->pricing_plan_background->move('uploads/banners',$request->pricing_plan_background->hashName());
            $cms->update(['pricing_plan_background' => $url]);
        }

        return redirect()->back()->with('success', 'Pricing Plan Settings update successfully!');
    }


    /**
     * Update Faqs static Images
     *
     * @author Mithun Halder <mithunrptc@gmail.com>
     *
     * @param Request $request
     * @return void
     */
    public function updateFaq(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        $cms =  Cms::first();
        $data = [];

        if ($request->hasFile('faq_background') && $request->file('faq_background')->isValid()) {
            deleteImage($cms->faq_background);
            $url =  $request->faq_background->move('uploads/banners',$request->faq_background->hashName());
            $cms->update(['faq_background' => $url]);
        }

        $data['faq_content'] = $request->faq_content;
        $cms->update($data);

        return redirect()->back()->with('success', 'Faqs Settings update successfully!');
    }


    public function updateCookie(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }
        $cms =  Cms::first();
        $cms->cookie_body = $request->cookie_body;
        $cms->save();
        return redirect()->back()->with('success', 'Cookie Policy update successfully!');
    }

    /**
     * Update DAshboard static Images
     *
     * @author Mithun Halder <mithunrptc@gmail.com>
     *
     * @param Request $request
     * @return void
     */
    public function updateDashboard(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        $cms =  Cms::first();
        $rules = [];
        $data = [];

        if ($request->hasFile('dashboard_overview_background') && $request->file('dashboard_overview_background')->isValid()) {
            deleteImage($cms->dashboard_overview_background);
            $data['dashboard_overview_background'] = $request->dashboard_overview_background->move('uploads/banners',$request->dashboard_overview_background->hashName());
        }
        if ($request->hasFile('dashboard_post_ads_background') && $request->file('dashboard_post_ads_background')->isValid()) {
            deleteImage($cms->dashboard_post_ads_background);
            $data['dashboard_post_ads_background'] = $request->dashboard_post_ads_background->move('uploads/banners',$request->dashboard_post_ads_background->hashName());
        }

        if ($request->hasFile('dashboard_my_ads_background') && $request->file('dashboard_my_ads_background')->isValid()) {
            deleteImage($cms->dashboard_my_ads_background);
            $data['dashboard_my_ads_background'] = $request->dashboard_my_ads_background->move('uploads/banners',$request->dashboard_my_ads_background->hashName());
        }
        if ($request->hasFile('dashboard_favorite_ads_background') && $request->file('dashboard_favorite_ads_background')->isValid()) {
            deleteImage($cms->dashboard_favorite_ads_background);
            $data['dashboard_favorite_ads_background'] = $request->dashboard_favorite_ads_background->move('uploads/banners',$request->dashboard_favorite_ads_background->hashName());
        }
        if ($request->hasFile('dashboard_messenger_background') && $request->file('dashboard_messenger_background')->isValid()) {
            deleteImage($cms->dashboard_messenger_background);
            $data['dashboard_messenger_background'] = $request->dashboard_messenger_background->move('uploads/banners',$request->dashboard_messenger_background->hashName());
        }

        if ($request->hasFile('dashboard_plan_background') && $request->file('dashboard_plan_background')->isValid()) {
            deleteImage($cms->dashboard_plan_background);
            $data['dashboard_plan_background'] = $request->dashboard_plan_background->move('uploads/banners',$request->dashboard_plan_background->hashName());
        }
        if ($request->hasFile('dashboard_account_setting_background') && $request->file('dashboard_account_setting_background')->isValid()) {
            deleteImage($cms->dashboard_account_setting_background);
            $data['dashboard_account_setting_background'] = $request->dashboard_account_setting_background->move('uploads/banners',$request->dashboard_account_setting_background->hashName());
        }

        $cms->update($data);

        return redirect()->back()->with('success', 'Dashboard Settings update successfully!');
    }




    /**
     * Update Blog Background Image
     *
     * @author Mithun Halder <mithunrptc@gmail.com>
     * @param Request $request
     * @return void
     */
    public function updateBlog(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        if ($request->hasFile('blog_background') && $request->file('blog_background')->isValid()) {
            $cms =  Cms::first();
            deleteImage($cms->blog_background);
            $url =  $request->blog_background->move('uploads/banners',$request->blog_background->hashName());
            $cms->update(['blog_background' => $url]);
        }

        return redirect()->back()->with('success', 'Blog Settings update successfully!');
    }



    /**
     * Update Ads Background Image
     *
     *
     * @author Mithun Halder <mithunrptc@gmail.com>
     * @param Request $request
     * @return void
     */
    public function updateAds(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        if ($request->hasFile('ads_background') && $request->file('ads_background')->isValid()) {
            $cms =  Cms::first();
            deleteImage($cms->ads_background);
            $url =  $request->ads_background->move('uploads/banners',$request->ads_background->hashName());
            $cms->update(['ads_background' => $url]);
        }

        return redirect()->back()->with('success', 'Ads Settings update successfully!');
    }


    /**
     * Update Contact Background Image
     *
     * @author Mithun Halder <mithunrptc@gmail.com>
     *
     * @param Request $request
     * @return void
     */
    public function updateContact(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        if ($request->hasFile('contact_background') && $request->file('contact_background')->isValid()) {
            $cms =  Cms::first();
            deleteImage($cms->contact_background);
            $url =  $request->contact_background->move('uploads/banners',$request->contact_background->hashName());
            $cms->update(['contact_background' => $url]);
        }

        return redirect()->back()->with('success', 'Contact Settings update successfully!');
    }

    public function updateAuthContent(Request $request)
    {
        if (!userCan('setting.update')) {
            return abort(403);
        }

        $cms =  Cms::first();
        $data = [];

        $data['manage_ads_content'] = $request->manage_ads_content;
        $data['chat_content'] = $request->chat_content;
        $data['verified_user_content'] = $request->verified_user_content;
        $cms->update($data);

        return redirect()->back()->with('success', 'Content updated successfully!');
    }
}
