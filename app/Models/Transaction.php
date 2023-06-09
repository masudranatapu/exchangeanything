<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Plan\Entities\Plan;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id', 'payment_type', 'customer_id', 'amount', 'plan_id', 'transaction_type',
    ];

    /**
     * Transaction customer
     *
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
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
     * Transaction plan
     *
     * @return BelongsTo
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}
