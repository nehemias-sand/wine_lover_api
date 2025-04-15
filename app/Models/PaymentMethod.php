<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'payment_method';

    protected $fillable = [
        'name'
    ];

    public function clientMembershipStatuses(): HasMany
    {
        return $this->hasMany(ClientMembershipPaymentStatus::class, 'payment_method_id', 'id');
    }

    public function orderStatuses(): HasMany
    {
        return $this->hasMany(OrderPaymentStatus::class, 'payment_method_id', 'id');
    }
}
