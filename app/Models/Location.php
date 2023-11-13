<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Location extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    // public function Merchant(): BelongsTo
    // {
    //     return $this->belongsTo(Merchant::class);
    // }
    public function Locationable(): MorphTo
    {
        return $this->morphTo();
    }

    // public function User(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
}
