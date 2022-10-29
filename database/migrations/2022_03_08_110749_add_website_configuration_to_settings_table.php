<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWebsiteConfigurationToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->boolean('regular_ads_homepage')->default(0)->after('free_featured_ad_limit');
            $table->boolean('featured_ads_homepage')->default(1)->after('regular_ads_homepage');
            $table->boolean('customer_email_verification')->default(0)->after('featured_ads_homepage');
            $table->boolean('ads_admin_approval')->default(0)->after('customer_email_verification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('regular_ads_homepage');
            $table->dropColumn('featured_ads_homepage');
            $table->dropColumn('customer_email_verification');
            $table->dropColumn('ads_admin_approval');
        });
    }
}
