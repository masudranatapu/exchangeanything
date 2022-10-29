<?php

namespace App\Http\Controllers;

use Modules\Ad\Entities\Ad;
use Illuminate\Http\Request;
use Modules\Location\Entities\City;
use Modules\Category\Entities\Category;
use Modules\Category\Entities\SubCategory;
use Modules\Location\Entities\Town;

class FilterController extends Controller
{
    /**
     * Search & filter post by keyword, category
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $query = Ad::activeCategory()->with('city', 'town' , 'category')->active();

        if ($request->has('category') && $request->category != null) {
            $category = $request->category;

            $query->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        }

        if ($request->has('subcategory') && $request->subcategory != null) {
            $subcategory = $request->subcategory;

            $query->whereHas('subcategory', function ($q) use ($subcategory) {
                $q->whereIn('slug', $subcategory);
            });
        }

        if ($request->has('keyword') && $request->keyword != null) {
            $query->where('title', 'LIKE', "%$request->keyword%");
        }

        if ($request->has('town') && $request->town != null) {
            $query->whereHas('town', function ($q) {
                $q->where('name', request('town'));
            });
        }

        if ($request->has('country') && $request->country != null) {
            $query->whereHas('city', function ($q) {
                $q->where('name', request('country'));
            });
        }

        if ($request->has('city') && $request->city != null) {
            $query->whereHas('city', function ($q) {
                $q->where('name', request('city'));
            });
        }
        if ($request->has('seller_type') && $request->seller_type != null) {
            // $query->where('title', 'LIKE',"%$request->keyword%");
        }

        if ($request->has('condition') && $request->condition != null) {
            $query->where('condition', $request->condition);
        }

        if ($request->has('price_min') && $request->price_min != null) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->has('price_max') && $request->price_max != null) {
            $query->where('price', '<=', $request->price_max);
        }

        $data['adlistings'] =  $query->paginate(request('per_page', 15))->withQueryString();
        $data['categories'] = Category::active()->with('subcategories', function($q){
            $q->where('status',1);
        })->latest('id')->get();
        $data['cities'] = City::latest()->get();
        $data['towns'] = Town::orderBy('name')->get();
        $data['adMaxPrice'] = $price = \DB::table('ads')->max('price');
        $data['total_ads'] = Ad::activeCategory()->active()->count();

        return view('frontend.ad-list', $data);
    }
}
