<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'profile';

    protected $fillable = [
        'name',
        'description'
    ];

    public function users(): HasMany {
        return $this->hasMany(User::class, 'profile_id', 'id');
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'profile_permission', 'profile_id', 'permission_id')
               ->withTimestamps(); 
    }
}
