<?php

namespace Modules\Plan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Plan\Database\factories\PriceplanFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'label', 'price', 'ad_limit', 'featured_limit', 'customer_support', 'multiple_image', 'badge', 'recommended', 'new_featured','package_duration','order'
    ];

    protected $casts = [
        'customer_support' => 'boolean',
        'badge' => 'boolean',
        'new_featured' => 'array',
    ];


    public function setNewFeaturedAttribute($value)
    {

        $this->attributes['new_featured'] = json_encode($value);
    }


    protected static function newFactory()
    {
        return PriceplanFactory::new();
    }
}
