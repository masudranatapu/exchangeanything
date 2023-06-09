<?php

namespace App\Http\Traits;

use App\Models\UserPlan;
use App\Models\Transaction;

trait PaymentTrait
{
    /**
     * Update userplan information.
     *
     * @param Plan $plan
     * @return boolean
     */
    public function userPlanInfoUpdate($plan)
    {

        $userplan = UserPlan::customerData(auth('customer')->id())->first();


        if (!isset($userplan)) {
            $userplan = new UserPlan();
            $userplan->customer_id = auth('customer')->id();
        }



        if ($plan->ad_limit == 0) {
            $userplan->ad_limit = 0;
        } else {
            $userplan->ad_limit = $userplan->ad_limit + $plan->ad_limit;
        }
        if ($plan->priority_situation == 1) {
            $userplan->featured_limit = $userplan->featured_limit + 10;
        } else {
            $userplan->featured_limit = 0;
        }
        if (!$userplan->customer_support) {
            $userplan->customer_support = $plan->customer_support ? true : false;
        }
        // if (!$userplan->multiple_image) {
        //     $userplan->multiple_image = $plan->multiple_image ? true : false;
        // }
        if (!$userplan->badge) {
            $userplan->badge = $plan->badge ? true : false;
        }

        $userplan->plans_id = $plan->id;
        $userplan->is_active = 1;

        $userplan->save();

        return true;
    }

    /**
     * Create a new transaction instance.
     *
     * @param string $payment_id
     * @param string $payment_type
     * @param int $payment_amount
     * @param int $plan_id
     *
     * @return boolean
     */
    public function createTransaction(string $payment_id, string $payment_type, int $payment_amount, int $plan_id, int $transaction_type = 1 )
    {
        Transaction::create([
            'payment_id' => $payment_id,
            'customer_id' => auth('customer')->id(),
            'plan_id' => $plan_id,
            'transaction_type' => $transaction_type,
            'payment_type' => $payment_type,
            'amount' => $payment_amount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
