<?php

namespace App\Http\Controllers\Payment;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Plan\Entities\Plan;
use App\Http\Traits\PaymentTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\MembershipUpgradeNotification;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    use PaymentTrait;

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        // dd($request->transaction_type);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.successTransaction', [
                    'plan_id' => $request->plan_id,
                    'amount' => $request->amount,
                    'transaction_type' => $request->transaction_type ?? 1,
                ]),
                "cancel_url" => route('paypal.cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => config('adlisting.currency'),
                        "value" => $request->amount,
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            session()->flash('error', 'Something went wrong.');
            return back();
        } else {
            session()->flash('error', 'Something went wrong.');
            return back();
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request, $plan_id, $amount, $transaction_type)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        $user = auth('customer')->user();

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // After Payment Successfully
            if (isset($transaction_type) && $transaction_type == 2) {
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
            $this->createTransaction($response['id'], 'paypal', $amount, $plan_id, $transaction_type ?? 0);

            // $user->notify(new MembershipUpgradeNotification($user, $plan->label));
            storePlanInformation();

            session()->flash('success', 'Payment Successfully');

            if (isset($transaction_type) && $transaction_type == 2) {
                return redirect()->route('frontend.getCertified');
            } else {
                return redirect()->route('frontend.plans-billing');
            }
        } else {
            session()->flash('error', 'Transaction is Invalid');
            return back();
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        session()->flash('error', 'Payment Failed');
        return back();
    }
}
