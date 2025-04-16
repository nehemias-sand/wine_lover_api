<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembershipPlan extends Pivot
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'membership_plan';

    public $incrementing = false;

    protected $fillable = [
        'membership_id',
        'plan_id',
        'price',
        'cashback_percentage',
    ];

    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class, 'membership_id', 'id');
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }
}
