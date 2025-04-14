<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'department';

    protected $fillable = [
        'name'
    ];

    public function municipalities(): HasMany {
        return $this->hasMany(Municipality::class, 'department_id', 'id');
    }
}
