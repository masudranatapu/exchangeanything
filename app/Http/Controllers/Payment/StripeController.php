<?php

namespace App\Http\Controllers\Payment;

use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Modules\Plan\Entities\Plan;
use App\Http\Traits\PaymentTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\MembershipUpgradeNotification;
use Carbon\Carbon;

class StripeController extends Controller
{
    use PaymentTrait;

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {

        try {
            $user = auth('customer')->user();
            Stripe::setApiKey(env('STRIPE_SECRET'));
            if (isset($request->transaction_type) && $request->transaction_type == 2) {
                $plan = DB::table('get_certified_plans')->where('id', $request->plan_id)->first();
                // $valid_till = Carbon::now();
                if ($plan && $plan->package_duration == 1) {
                    $valid_till = Carbon::now()->addYears(50);
                }elseif ($plan && $plan->package_duration == 2) {
                    $valid_till = Carbon::now()->addYears();
                }else {
                    $valid_till = Carbon::now()->addMonths();
                }

                DB::table('customers')->where('id', $user->id)->update([
                    'certified_seller' => 1,
                    'certificate_validity' => $valid_till,
                ]);
            } else {
                $plan = Plan::findOrFail($request->plan_id);
                $this->userPlanInfoUpdate($plan);
            }

            $this->createTransaction($request->stripeToken, 'Stripe', $plan->price, $request->plan_id, $request->transaction_type ?? 1);
            // $user->notify(new MembershipUpgradeNotification($user, $plan->label));
            storePlanInformation();

            session()->flash('success', 'Payment Successfully');
            if (isset($request->transaction_type) && $request->transaction_type == 2) {
                return redirect()->route('frontend.getCertified');
            } else {
                return redirect()->route('frontend.plans-billing');
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
