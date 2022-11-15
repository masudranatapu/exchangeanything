<?php

namespace Modules\Plan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Plan\Database\factories\PriceplanFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'label', 'price', 'ad_limit', 'featured_limit', 'badge', 'recommended', 'package_duration'
    ];

    protected $casts = [
        'customer_support' => 'boolean',
        'badge' => 'boolean',
        'new_featured' => 'array',
    ];


    // public function setNewFeaturedAttribute($value)
    // {

    //     $this->attributes['new_featured'] = json_encode($value);
    // }


    protected static function newFactory()
    {
        return PriceplanFactory::new();
    }
}
