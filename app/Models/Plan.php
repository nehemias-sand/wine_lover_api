<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'plan';

    protected $fillable = [
        'name',
        'months',
        'description'
    ];

    public function memberships(): HasMany
    {
        return $this->hasMany(MembershipPlan::class, 'plan_id', 'id');
    }

    public function clientMemberships(): HasMany
    {
        return $this->hasMany(ClientMembershipPlan::class, 'plan_id', 'id');
    }
}
