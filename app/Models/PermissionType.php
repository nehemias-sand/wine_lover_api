<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'permission_type';

    protected $fillable = [
        'name'
    ];

    public function permissions(): HasMany {
        return $this->hasMany(Permission::class, 'permission_type_id', 'id');
    }
}
