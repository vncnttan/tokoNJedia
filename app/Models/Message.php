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
        "id",
        "message",
        "room_id",
        "user_id"
    ];
    public function Room(): BelongsTo
    {
        return $this->belongsTo(Room::class, "room_id");
    }
    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }
}
