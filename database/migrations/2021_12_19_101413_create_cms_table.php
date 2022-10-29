<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->id();
            $table->string('index1_main_banner')->nullable();
            $table->string('index1_counter_background')->nullable();
            $table->string('index1_mobile_app_banner')->nullable();
            $table->string('index2_search_filter_background')->nullable();
            $table->string('index2_get_membership_background')->nullable();
            $table->string('index3_search_filter_background')->nullable();

            // Home
            $table->string('index1_title')->nullable();
            $table->string('index3_title')->nullable();
            $table->string('index1_description')->nullable();
            $table->string('download_app')->nullable();
            $table->string('newsletter_content')->nullable();
            $table->string('membership_content')->nullable();
            $table->string('create_account')->nullable();
            $table->string('post_ads')->nullable();
            $table->string('start_earning')->nullable();

            //Terms & Condition
            $table->string('terms_background')->nullable();
            $table->text('terms_body')->nullable();

            //About
            $table->string('about_video_thumb')->nullable();
            $table->text('about_body')->nullable();

            //Privacy
            $table->string('privacy_background')->nullable();
            $table->text('privacy_body')->nullable();

            //Contact
            $table->string('contact_background')->nullable();

            //Get Membership
            $table->string('get_membership_background')->nullable();
            $table->string('get_membership_image')->nullable();

            //Pricing Plan Background
            $table->string('pricing_plan_background')->nullable();

            //Faq
            $table->string('faq_background')->nullable();
            $table->string('faq_content')->nullable();

            // Login or Register
            $table->string('manage_ads_content')->nullable();
            $table->string('chat_content')->nullable();
            $table->string('verified_user_content')->nullable();

            //Dashboard Overview
            $table->string('dashboard_overview_background')->nullable();
            $table->string('dashboard_post_ads_background')->nullable();
            $table->string('dashboard_my_ads_background')->nullable();
            $table->string('dashboard_plan_background')->nullable();
            $table->string('dashboard_account_setting_background')->nullable();

            $table->string('posting_rules_background')->nullable();
            $table->text('posting_rules_body')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms');
    }
}
