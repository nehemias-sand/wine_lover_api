<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'client';

    protected $fillable = [
        'names',
        'surnames',
        'identity_number',
        'birthday_date',
        'phone',
        'user_id',
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->names} {$this->surnames}";
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'client_id', 'id');
    }

    public function membershipPlans(): HasMany
    {
        return $this->hasMany(ClientMembershipPlan::class, 'client_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }
}
