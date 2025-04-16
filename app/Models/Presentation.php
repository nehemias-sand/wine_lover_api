<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presentation extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'presentation';

    protected $fillable = [
        'amount',
        'unit_measurement_id',
    ];

    public function unitMeasurement(): BelongsTo
    {
        return $this->belongsTo(UnitMeasurement::class, 'unit_measurement_id', 'id');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'presentation_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(ProductPresentation::class, 'presentation_id', 'id');
    }
}
