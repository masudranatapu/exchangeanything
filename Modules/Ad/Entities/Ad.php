<?php

namespace Modules\Ad\Entities;

use App\Models\Customer;
use Modules\Brand\Entities\Brand;
use Modules\Ad\Entities\AdFeature;
use Modules\Location\Entities\City;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Modules\Wishlist\Entities\Wishlist;
use Modules\Ad\Database\factories\AdFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\SubCategory;
use Modules\Location\Entities\Town;

class Ad extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['image_url'];

    protected static function newFactory()
    {
        return AdFactory::new();
    }

    public function getImageUrlAttribute()
    {
        if (is_null($this->thumbnail)) {
            return asset('backend/image/default-ad.png');
        }

        return asset($this->thumbnail);
    }

    /**
     *  Customer scope
     * @return mixed
     */
    public function scopeCustomerData($query,$api = false)
    {
        if ($api) {
            return $query->where('customer_id', auth('api')->id());
        }else{
            return $query->where('customer_id', auth('customer')->id());
        }
    }

    /**
     *  Active ad scope
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     *  Active Category scope
     * @return mixed
     */
    public function scopeActiveCategory($query)
    {
        return $query->whereHas('category', function($q){
            $q->where('status', 1);
        });
    }

    /**
     *  Active Category scope
     * @return mixed
     */
    public function scopeActiveSubcategory($query)
    {
        return $query->whereHas('subcategory', function($q){
            $q->where('status', 1);
        });
    }

    /**
     *  Inactive Category scope
     * @return mixed
     */
    public function scopeInactiveCategory($query)
    {
        return $query->whereHas('category', function($q){
            $q->where('status', 0);
        });
    }

    /**
     *  Has many
     * @return BelongsTo|Collection|City[]
     */
    function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }


    /**
     *  BelongTo
     * @return BelongsTo|Collection|Category[]
     */
    function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     *  BelongTo
     * @return BelongsTo|Collection|Category[]
     */
    function subcategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     *  BelongTo
     * @return BelongsTo|Collection|Customer[]
     */
    function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     *  Has Many
     * @return HasMany|Collection|AdGallery[]
     */
    function galleries(): HasMany
    {
        return $this->hasMany(AdGallery::class);
    }


    /**
     *  BelongTo
     * @return BelongsTo|Collection|Customer[]
     */
    function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'ad_id');
    }

    public function adFeatures()
    {
        return $this->hasMany(AdFeature::class, 'ad_id');
    }

    /**
     * Ad town
     *
     * @return BelongsTo
     */
    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class, 'town_id');
    }
}
