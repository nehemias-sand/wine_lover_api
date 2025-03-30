<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'district';

    protected $fillable = [
        'name',
        'municipality_id'
    ];

    public function municipality(): BelongsTo {
        return $this->belongsTo(Municipality::class, 'municipality_id','id');
    }

}
