<?php

namespace Database\Seeders;

use App\Models\Cms;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cms::create([
            // Home
            'index1_title' =>  'Buy, Sell And Find Just About Anythink.',
            'index3_title' => 'The Largest Classified Ads Listing In The World.',
            'index1_description' => 'Buy And Sell Everything From Used Cars To Mobile Phones And Computers, Or Search For Property And More All Over The World!',
            'download_app' => 'Sed Luctus Nibh At Consectetur Tempor. Proin Et Ipsum Tincidunt, Maximus Turpis Id, Mollis Lacus. Maecenas Nec Risus A Urna Sollicitudin Aliquet. Maecenas Pretium Tristique Sapien',
            'newsletter_content' => 'Vestibulum Consectetur Placerat Tellus. Sed Faucibus Fermentum Purus, At Facilisis.',
            'membership_content' => 'Vestibulum Consectetur Placerat Tellus. Sed Faucibus Fermentum Purus, At Facilisis Neque Auctor.',

            'create_account' => 'Vestibulum Ante Ipsum Primis In Faucibus Orci Luctus Et Ultrices Posuere Cubilia Curae. Donec Non Lorem Erat. Sed Vitae Vene.',

            'post_ads' => 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Mauris Eu Aliquet Odio. Nulla Pretium Congue Eros, Nec Rhoncus Mi.',
            'start_earning' => 'Vestibulum Quis Consectetur Est. Fusce Hendrerit Neque At Facilisis Facilisis. Praesent A Pretium Elit. Nulla Aliquam Puru.',

            //About
            'about_body' =>  'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Mauris Eu Aliquet Odio. Nulla Pretium Congue Eros, Nec Rhoncus Mi.',
            'about_video_thumb' => 'https://youtu.be/s7wmiS2mSXY',

            // Terms & Condition
            'terms_body' => '<p>Praesent Finibus Dictum Nisl Sit Amet Vulputate. Fusce A Metus Eu Velit Posuere Semper A Bibendum Ante. Donec Eu Tellus Dapibus, Semper Orci Eget, Commodo Lacu Praesent Ullamcorper.</p>',

            //Privacy
            'privacy_body' =>  '<p>Praesent Finibus Dictum Nisl Sit Amet Vulputate. Fusce A Metus Eu Velit Posuere Semper A Bibendum Ante. Donec Eu Tellus Dapibus, Semper Orci Eget, Commodo Lacu Praesent Ullamcorper.</p>',

            //Faq
            'faq_content' => 'Praesent Finibus Dictum Nisl Sit Amet Vulputate. Fusce A Metus Eu Velit Posuere Semper A Bibendum Ante. Donec Eu Tellus Dapibus, Semper Orci Eget, Commodo Lacu Praesent Ullamcorper.',

            // Login or Register
            'manage_ads_content' => 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Etiam Commodo Vel Ligula.',
            'chat_content' => 'Class Aptent Taciti Sociosqu Ad Litora Torquent Per Conubia Nostra, Per Inceptos Himenaeos.',
            'verified_user_content' => 'Class Aptent Taciti Sociosqu Ad Litora Torquent Per Conubia Nostra, Per Inceptos Himenaeos.',
            'posting_rules_body' => '<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Mauris Eu Aliquet Odio. Nulla Pretium Congue Eros, Nec Rhoncus Mi<p>',
        ]);

        // $table->string('index1_main_banner')->nullable();
        // $table->string('index1_counter_background')->nullable();
        // $table->string('index1_mobile_app_banner')->nullable();
        // $table->string('index2_search_filter_background')->nullable();
        // $table->string('index2_get_membership_background')->nullable();
        // $table->string('index3_search_filter_background')->nullable();

        // Home
        // $table->string('index1_title')->nullable();
        // $table->string('index3_title')->nullable();
        // $table->string('index1_description')->nullable();
        // $table->string('download_app')->nullable();
        // $table->string('newsletter_content')->nullable();
        // $table->string('membership_content')->nullable();
        // $table->string('create_account')->nullable();
        // $table->string('post_ads')->nullable();
        // $table->string('start_earning')->nullable();

        //Terms & Condition
        // $table->string('terms_background')->nullable();
        // $table->text('terms_body')->nullable();

        //About
        // $table->string('about_video_thumb')->nullable();
        // $table->text('about_body')->nullable();

        //Privacy
        // $table->string('privacy_background')->nullable();
        // $table->text('privacy_body')->nullable();

        //Contact
        // $table->string('contact_background')->nullable();

        //Get Membership
        // $table->string('get_membership_background')->nullable();
        // $table->string('get_membership_image')->nullable();

        //Pricing Plan Background
        // $table->string('pricing_plan_background')->nullable();

        //Faq
        // $table->string('faq_background')->nullable();
        // $table->string('faq_content')->nullable();

        // Login or Register
        // $table->string('manage_ads_content')->nullable();
        // $table->string('chat_content')->nullable();
        // $table->string('verified_user_content')->nullable();

        //Dashboard Overview
        // $table->string('dashboard_overview_background')->nullable();
        // $table->string('dashboard_post_ads_background')->nullable();
        // $table->string('dashboard_my_ads_background')->nullable();
        // $table->string('dashboard_plan_background')->nullable();
        // $table->string('dashboard_account_setting_background')->nullable();

        // $table->string('posting_rules_background')->nullable();
        // $table->text('posting_rules_body')->nullable();
    }
}
