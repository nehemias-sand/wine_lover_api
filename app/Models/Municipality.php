<?php

namespace App\Models;

use Database\Seeders\DepartmentTableSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipality extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'municipality';

    protected $fillable = [
        'name',
        'department_id'
    ];

    public function department(): BelongsTo {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class, 'municipality_id', 'id');
    }
}
