<?php

namespace Modules\Customer\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use App\Models\UserPlan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ad\Entities\Ad;
use Modules\Customer\Http\Requests\CustomerCreateFormRequest;
use Modules\Customer\Http\Requests\CustomerUpdateFormRequest;
use Modules\Plan\Entities\Plan;
use Tymon\JWTAuth\Claims\Custom;
use Mail;
use App\Mail\MakeActiveNotificationToUser;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     * @return Renderable
     */
    public function index()
    {
        if (!userCan('customer.view')) {
            return abort(403);
        }

        $query = Customer::query()->orderBy('id', 'desc');
        
         // keyword search
         if (request()->has('keyword') && request()->keyword != null) {
            $keyword = request('keyword');
            $query->where('name', "LIKE", "%$keyword%")
                ->orWhere('username', "LIKE", "%$keyword%")
                ->orWhere('email', "LIKE", "%$keyword%");
        }

        // sorting
        if (request()->has('sort_by') && request()->sort_by != null) {
            switch (request()->sort_by) {
                case 'latest':
                    $query->orderBy('id', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('id', 'asc');
                    break;
                default:
                    return $query->latest();
                    break;
            }
        }

        // filtering
        if (request()->has('filter_by') && request()->filter_by != null) {
            switch (request()->filter_by) {
                case 'verified':
                    $query->whereNotNull('email_verified_at');
                    break;
                case 'unverified':
                    $query->whereNull('email_verified_at');
                    break;
            }
        }

        $query->withCount('transactions')->with('userPlan');

        // perpage
        if (request()->has('perpage') && request()->perpage != null) {
            switch (request()->perpage) {
                case '10':
                    $customers = $query->paginate(10);
                    break;
                case '25':
                    $customers = $query->paginate(25);
                    break;
                case '50':
                    $customers = $query->paginate(50);
                    break;
                case '100':
                    $customers = $query->paginate(100);
                    break;
                case 'all':
                    $customers = $query->get();
                    break;
            }
        }else{
            $customers = $query->paginate(10);
        }

        if (request()->perpage != 'all') {
            $customers = $customers->withQueryString();
        }

        return view('customer::index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('customer::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CustomerCreateFormRequest $request
     * @return Renderable
     */
    public function store(CustomerCreateFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = $request->image->move('uploads/customer',$request->image->hashName());
            $data['image'] = $url;
        }

        Customer::create($data);

        flashSuccess('Customer Created Successfully');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Customer $customer)
    {
        $ads = $customer->ads;
        $transactions = $customer->transactions()->latest()->get();

        return view('customer::show', compact('customer','ads','transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Customer $customer)
    {
        return view('customer::edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     * @param CustomerUpdateFormRequest $request
     * @param Customer $customer
     * @return Renderable
     */
    public function update(CustomerUpdateFormRequest $request, Customer $customer)
    {
        $data = $request->all();
        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = $request->image->move('uploads/customer',$request->image->hashName());
            $data['image'] = $url;
        }

        $customer->update($data);

        flashSuccess('Customer Updated Successfully');
        return redirect()->route('module.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Customer $customer)
    {
        // $user_plan = UserPlan::where('customer_id',$customer->id)->where('is_active',1)->first();
        $user_ad = Ad::where('customer_id',$customer->id)->first();
        if($user_ad){
            flashError('Customer Not Deleted ! Have an another Table');
            return back();
        }else{
            if ($customer) {
                $customer->delete();
            }
            flashSuccess('Customer Deleted Successfully');
            return back();
        }    
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function emailVerify(Request $request)
    {
        $customer = Customer::where('username', $request->username)->firstOrFail();

        if ($customer->email_verified_at) {
            $customer->update(['email_verified_at' => null]);
        }else{
            $customer->update(['email_verified_at' => now()]);
        }

        if ($customer->email_verified_at) {
            return response()->json(['message' => 'Email Verified Successfully']);
        } else {
            return response()->json(['message' => 'Email Unverified Successfully']);
        }
    }

    public function ads(Customer $customer){
        $ads = $customer->ads->load('category:id,name,slug','subcategory:id,name,slug','brand:id,name,slug','town:id,name','city:id,name');

        return view('customer::ads', compact('ads','customer'));
    }

    public function planPurchaseConfirm(Request $request){
        $userPlan = UserPlan::CustomerData($request->customer_id)->first();

        $userPlan->is_active = $request->is_active == "Active" ? 1 : 2;

        $userPlan->save();
        Customer::where('id',$request->customer_id)->update(['plan_purcase_image' => null]);

        flashSuccess("Customer Plan Successfully $request->is_active");
        return back();
    }


    public function status($customer_id, $status){
        $user_plan = UserPlan::where('customer_id', $customer_id)->first();
        $plan = Plan::find($user_plan->plans_id);
        $user_plan->is_active = $status;
        $user_plan->save();
        $transaction =new Transaction();
        $transaction->payment_id = 1;
        $transaction->payment_type = "Manual";
        $transaction->plan_id = $user_plan->plans_id;
        $transaction->customer_id = $customer_id;
        $transaction->amount = $plan->price;
        $transaction->save();
        //send mail to customer
        $customer_details = Customer::where('id', $customer_id)->first();
        $customer_email = $customer_details->email;
        Mail::to($customer_email)->send(new MakeActiveNotificationToUser);        
        flashSuccess('Account Status Change Successfully');
        return back();
    }




}
