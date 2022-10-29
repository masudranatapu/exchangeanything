<?php

namespace Modules\Wishlist\Database\factories;

use App\Models\User;
use App\Models\Customer;
use App\Models\SuperAdmin;
use Modules\Ad\Entities\Ad;
use Modules\Product\Entities\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Wishlist\Entities\Wishlist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::inRandomOrder()->value('id'),
            'ad_id' => Ad::inRandomOrder()->value('id'),
        ];
    }
}
