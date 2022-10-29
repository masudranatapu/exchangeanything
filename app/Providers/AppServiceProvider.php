<?php

namespace App\Providers;

use App\Models\Cms;
use App\Models\Theme;
use App\Models\Setting;
use App\Models\ModuleSetting;
use App\Models\PaymentSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Category\Entities\Category;
use Modules\Language\Entities\Language;
use Illuminate\Support\Facades\Validator;
use Modules\Category\Transformers\CategoryResource;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!app()->runningInConsole()) {
            $moduleSetting = ModuleSetting::first();
            View::share('top_categories', CategoryResource::collection(Category::active()->withCount('ads as ad_count')->latest('ad_count')->take(8)->get()));
            View::share('footer_categories', Category::active()->latest()->get());
            View::share('categories', Category::active()->with('subcategories', function ($q) {
                $q->where('status', 1);
            })->get());
            View::share('settings', Setting::first());
            View::share('payment_settings', PaymentSetting::first());
            View::share('theme_page', Theme::first()->home_page);
            View::share('blog_enable', $moduleSetting->blog);
            View::share('newsletter_enable', $moduleSetting->newsletter);
            View::share('contact_enable', $moduleSetting->contact);
            View::share('faq_enable', $moduleSetting->faq);
            View::share('testimonial_enable', $moduleSetting->testimonial);
            View::share('priceplan_enable', $moduleSetting->price_plan);
            View::share('language_enable', $moduleSetting->language);
            View::share('appearance_enable', $moduleSetting->appearance);
            View::share('cms', Cms::first());
            View::share('languages', Language::all(['id', 'name', 'code', 'icon']));
            Paginator::useBootstrap();

            //Add this custom validation rule.
            Validator::extend('alpha_spaces', function ($attribute, $value) {
                return preg_match('/^[\pL\s]+$/u', $value);
            });
        }

        session()->put('lang', 'en');
        app()->setLocale('en');
    }

}
