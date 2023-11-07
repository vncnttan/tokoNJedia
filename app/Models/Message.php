<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;
    protected $table = "messages";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "message",
        "room_id"
    ];
    public function Room(): BelongsTo
    {
        return $this->belongsTo(Room::class, "room_id");
    }
}
