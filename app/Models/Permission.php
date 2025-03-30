<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'permission';

    protected $fillable = [
        'name',
        'description',
        'permission_type_id'
    ];

    public function permissionType(): BelongsTo {
        return $this->belongsTo(PermissionType::class, 'permission_type_id', 'id');
    }
}
