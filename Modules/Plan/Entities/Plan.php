<?php

namespace Modules\Plan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Plan\Database\factories\PriceplanFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'label', 'price', 'ad_limit', 'featured_limit', 'customer_support', 'multiple_image', 'badge', 'recommended', 'new_featured', 'join_community_chat', 'immediate_access_to_new_ads', 'priority_situation', 'embed_yt_video_and_links', 'browse_without_banner_ads','package_duration','order'
    ];

    protected $casts = [
        'customer_support' => 'boolean',
        'multiple_image' => 'boolean',
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
