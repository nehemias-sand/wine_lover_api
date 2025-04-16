<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientMembershipPlan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'membership_plan';

    public $incrementing = false;

    protected $fillable = [
        'end_date',
        'price',
        'automatic_renewal',
        'client_id',
        'membership_id',
        'plan_id',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class, 'membership_id', 'id');
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function paymentStatuses(): HasMany
    {
        return $this->hasMany(ClientMembershipPaymentStatus::class, 'client_membership_plan_id', 'id');
    }
}
