<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='payment_status';

    protected $fillable = [
        'name'
    ];

    public function clientMemberships(): HasMany
    {
        return $this->hasMany(ClientMembershipPaymentStatus::class, 'payment_status_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(OrderPaymentStatus::class, 'payment_status_id', 'id');
    }
}
