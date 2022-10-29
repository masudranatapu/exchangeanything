<?php

namespace Database\Seeders;

use Database\Seeders\CmsSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ThemeSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\RolePermissionSeeder;
use Modules\Faq\Database\Seeders\FaqCategorySeeder;
use Modules\Plan\Database\Seeders\PlanDatabaseSeeder;
use Modules\Currency\Database\Seeders\CurrencyDatabaseSeeder;
use Modules\Language\Database\Seeders\LanguageDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolePermissionSeeder::class, // Role Permission
            SettingSeeder::class, // Setting
            UserSeeder::class, // User
            FaqCategorySeeder::class, //FAQ Category
            ThemeSeeder::class, // Theme
            PlanDatabaseSeeder::class, //priceplan
            CmsSeeder::class, //Cms settings
            CurrencyDatabaseSeeder::class, //Currency Subscribers
            LanguageDatabaseSeeder::class, //Language
        ]);

        // $this->call([
        //     BrandDatabaseSeeder::class, // Brand
        //     RolePermissionSeeder::class, // Role Permission
        //     SettingSeeder::class, // Setting
        //     UserSeeder::class, // User
        //     CategoryDatabaseSeeder::class, // Category
        //     TestimonialDatabaseSeeder::class, // Testimonial
        //     FaqCategorySeeder::class, //FAQ Category
        //     FaqDatabaseSeeder::class, // FAQ
        //     LocationDatabaseSeeder::class, // Location
        //     AdDatabaseSeeder::class, // adList
        //     WishlistDatabaseSeeder::class, // Wishlist
        //     BlogDatabaseSeeder::class, // blog
        //     PlanDatabaseSeeder::class, //priceplan
        //     ThemeSeeder::class, // Theme
        //     TransactionSeeder::class, // transactions,
        //     CmsSeeder::class, //Cms settings
        //     NewsletterDatabaseSeeder::class, //Newsletter Subscribers
        //     CurrencyDatabaseSeeder::class, //Currency Subscribers
        //     LanguageDatabaseSeeder::class, //Language
        //     CustomerSeeder::class, //Customer Subscribers
        // ]);
    }
}
