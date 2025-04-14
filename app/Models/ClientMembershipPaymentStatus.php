<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientMembershipPaymentStatus extends Pivot
{
    protected $table = 'client_membership_payment_status';

    public $incrementing = false;

    protected $fillable = [
        'client_membership_plan_id',
        'payment_method_id',
        'payment_status_id',
        'details',
    ];

    public function clientPlan(): BelongsTo
    {
        return $this->belongsTo(ClientMembershipPlan::class, 'client_membership_plan_id', 'id');
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }

    public function paymentStatus(): BelongsTo
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id', 'id');
    }
}
