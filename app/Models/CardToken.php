<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardToken extends Model
{
    protected $table = 'card_token';

    protected $fillable = [
        'token',
        'encrypted_data',
        'masked_number',
        'brand',
        'client_id',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
