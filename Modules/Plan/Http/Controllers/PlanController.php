<?php

namespace Modules\Plan\Http\Controllers;

use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Modules\Plan\Entities\Plan;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Plan\Http\Requests\PlanFormRequest;
use DB;
use Carbon\Carbon;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (!userCan('plan.view')) {
            return abort(403);
        }
        $data['plans'] = Plan::get();
        $data['getcertifiedplans'] = DB::table('get_certified_plans')->get();
        return view('plan::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        if (!userCan('plan.create')) {
            return abort(403);
        }
        return view('plan::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PlanFormRequest $request)
    {
        if (!userCan('plan.create')) {
            return abort(403);
        }

        // dd($request->all());

        Plan::create($request->all());

        flashSuccess('Plan Created Successfully');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Plan $plan)
    {
        if (!userCan('plan.update')) {
            return abort(403);
        }
        return view('plan::edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PlanFormRequest $request, Plan $plan)
    {
        if (!userCan('plan.update')) {
            return abort(403);
        }
        $plan->update($request->all());

        flashSuccess('Plan Updated Successfully');
        return redirect()->route('module.plan.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Plan $plan)
    {
        if (!userCan('plan.delete')) {
            return abort(403);
        }

        $plan->delete();

        flashSuccess('Plan Deleted Successfully');
        return back();
    }

    public function markRecommended(Request $request)
    {
        if($request->plan_id == 0){
            DB::table('plans')->update([
                'recommended' => 0,
            ]);
        }else{
            DB::table('plans')->update([
                'recommended' => 0,
            ]);
            DB::table('plans')->where('id', $request->plan_id)->update([
                'recommended' => 1,
            ]);
        }

        flashSuccess('Plan Updated Successfully');
        return redirect()->back();

        // \DB::table('plans')->update(['recommended' => false]);
        // Plan::findOrFail(request('plan_id'))->update(['recommended' => true]);

        // flashSuccess('Plan Updated Successfully');
        // return back();
        
    }

    public function allTransactions(){
        $transactions = Transaction::with('plan')->latest()->get();

        return view('plan::transactions', compact('transactions'));
    }


    public function editCertified($id)
    {
        $certified  = DB::table('get_certified_plans')->where('id', $id)->first();
        return view('plan::editcertified', compact('certified'));
        
    }

    public function UpdateCertified(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'certified_badge' => 'required',
            'review_request' => 'required',
            'share_review' => 'required',
            'package_duration' => 'required'
        ]);
        
        $certified_image = $request->file('badge_image');
        $slug = 'certified';
        
        if(isset($certified_image)){
            $certified_image_name = $slug.'-'.uniqid().'.'.$certified_image->getClientOriginalExtension();
            $upload_path = 'media/certified/';
            $certified_image->move($upload_path, $certified_image_name);
    
            $getcertifiedplans = DB::table('get_certified_plans')->where('id', $id)->first();
            if(file_exists($getcertifiedplans->badge_image)){
                unlink($getcertifiedplans->badge_image);
            };

            $image_url = $upload_path.$certified_image_name;
    
        }else {
            $getcertifiedplans = DB::table('get_certified_plans')->where('id', $id)->first();
            $image_url = $getcertifiedplans->badge_image;

        }

        DB::table('get_certified_plans')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'package_duration' => $request->package_duration,
            'badge_image' => $image_url,
            'certified_badge' => $request->certified_badge,
            'review_request' => $request->review_request,
            'share_review' => $request->share_review,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
        
        flashSuccess('Certified plans Updated Successfully');
        
        return redirect()->route('module.plan.index');

    }

}
