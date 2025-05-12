<?php

namespace App\Models;

use Carbon\Carbon;
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
        'current_cashback',
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

    public function cardTokens(): HasMany
    {
        return $this->hasMany(CardToken::class, 'client_id', 'id');
    }

    public function membershipPlans(): HasMany
    {
        return $this->hasMany(ClientMembershipPlan::class, 'client_id', 'id');
    }

    public function currentMembershipPlan(): ?ClientMembershipPlan
    {
        $plan = $this->membershipPlans()
            ->whereNull('deleted_at')
            ->where('active', '=', true)
            ->orderByDesc('end_date')
            ->first();

        return $plan && Carbon::parse($plan->end_date)->isFuture()
            ? $plan
            : null;
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }

    public function cashbackHistory(): HasMany
    {
        return $this->hasMany(CashbackHistory::class, 'client_id', 'id');
    }
}
