<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['logo_image_url','logo2_image_url','favicon_image_url','loader_image_url'];

    public function getLogoImageUrlAttribute()
    {
        if (is_null($this->logo_image)) {
            return asset('frontend/images/logo.png');
        }

        return asset($this->logo_image);
    }

    public function getLogo2ImageUrlAttribute()
    {
        if (is_null($this->logo_image2)) {
            return asset('frontend/images/logo-white.png');
        }

        return asset($this->logo_image2);
    }

    public function getFaviconImageUrlAttribute()
    {
        if (is_null($this->favicon_image)) {
            return asset('frontend/images/icon/notepad.png');
        }

        return asset($this->favicon_image);
    }

    public function getLoaderImageUrlAttribute()
    {
        if (is_null($this->loader_image)) {
            return asset('frontend/images/loader.gif');
        }

        return asset($this->loader_image);
    }
}
