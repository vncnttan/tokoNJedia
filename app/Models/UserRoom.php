<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRoom extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function Room(): BelongsTo
    {
        return $this->belongsTo(Room::class, "room_id");
    }
}
