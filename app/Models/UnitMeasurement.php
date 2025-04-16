<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitMeasurement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='unit_measurement';

    protected $fillable = [
        'name',
        'abbreviation'
    ];

    public function presentations(): HasMany
    {
        return $this->hasMany(Presentation::class, 'unit_measurement_id', 'id');
    }
}
