<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presentation extends Model
{
    protected $table = 'presentation';

    protected $fillable = [
        'cantidad',
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
