<?php

namespace Modules\Location\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Location\Entities\City;
use Modules\Location\Entities\Town;
use Modules\Ad\Entities\Ad;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (!userCan('city.view')) {
            return abort(403);
        }
        $cities = City::orderBy('name')->paginate(10);
        return view('location::city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        if (!userCan('city.create')) {
            return abort(403);
        }
        return view('location::city.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if (!userCan('city.create')) {
            return abort(403);
        }
        $request->validate([
            'name' => 'required|string|min:3|unique:cities,name',
        ]);

        $city = City::create($request->except('image'));

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = $request->image->move('uploads/city', $request->image->hashName());
            $city->update(['image' => $url]);
        }

        $city ? flashSuccess('Country created successfully') : flashError();
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(City $city)
    {
        $city->loadCount('ads');
        $ads = $city->ads;

        return view('location::city.show', compact('city', 'ads'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(City $city)
    {
        if (!userCan('city.update')) {
            return abort(403);
        }
        return view('location::city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, City $city)
    {
        if (!userCan('city.update')) {
            return abort(403);
        }

        $request->validate([
            'name' => "required|string|min:3|unique:cities,name,{$city->id}",
        ]);

        $city->update($request->except('image'));

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            deleteImage($city->image);
            $url = $request->image->move('uploads/city', $request->image->hashName());
            $city->update(['image' => $url]);
        }

        // result after update
        $city ? flashSuccess('Country updated successfully') : flashError();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(City $city)
    {
        if (!userCan('city.delete')) {
            return abort(403);
        }

        //city_id existign check in ads and towns table
        $city_id = Ad::where('city_id', $city->id)->first();
        $town_id = Town::where('city_id', $city->id)->first();
        if($city_id || $town_id){
            flashError("You can't delete this country, because this country contain ads and regions, if you delete this country you need to delete this countries ads and regions first");
            return back();
        }

        // file remove
        if ($city->image) {
            deleteImage($city->image);
        }

        // delete city
        $delete = $city->delete();

        // result after delete
        $delete ? flashSuccess('City deleted successfully') : flashError();
        return back();
    }

    public function getTowns($city_id)
    {
        return Town::where('city_id', $city_id)->get();
    }
}
