<?php

namespace Modules\Location\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Location\Entities\City;
use Modules\Location\Entities\Town;
use Modules\Ad\Entities\Ad;
use DB;
use Carbon\Carbon;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $areas = DB::table('areas')->orderBy('city_name')->paginate(10);
        return view('location::area.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $countries = DB::table('cities')->orderBy('name')->get();
        return view('location::area.create', compact('countries'));
    }


    public function countryGetAjax($countryid)
    {
        $towns = DB::table('towns')->where('city_id', $countryid)->get();
        // return $towns;
        return json_encode($towns);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
        ]);

        DB::table('areas')->insert([
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_name' => $request->city_name,
            'created_at' => Carbon::now(),
        ]);

        flashSuccess('City created successfully');

        return redirect()->back();

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $areas = DB::table('areas')->where('id', $id)->first();
        $countries = DB::table('cities')->orderBy('name')->get();
        $towns = DB::table('towns')->where('city_id', $areas->country_id)->get();
        return view('location::area.edit', compact('areas', 'countries', 'towns'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'city_name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
        ]);
        
        DB::table('areas')->where('id', $id)->update([
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_name' => $request->city_name,
            'created_at' => Carbon::now(),
        ]);

        flashSuccess('City update successfully');
        return redirect()->route('module.area.index');
        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        DB::table('areas')->where('id', $id)->delete();
        flashSuccess('City delete successfully');
        return redirect()->back();
    }

}