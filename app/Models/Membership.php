<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'membership';

    protected $fillable = [
        'name',
        'description'
    ];

    public function plans(): HasMany
    {
        return $this->hasMany(MembershipPlan::class, 'membership_id', 'id');
    }

    public function clientPlans(): HasMany
    {
        return $this->hasMany(ClientMembershipPlan::class, 'membership_id', 'id');
    }
}
