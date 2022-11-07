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
}
