<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Merchant;
use App\Models\User;


class Message extends Model
{
    use HasFactory;
    protected $table = "messages";
    public $incrementing = false;
    protected $keyType = 'string';
    public $primaryKey = "id";

    protected $fillable = [
        "id",
        "message",
        "room_id",
        "user_id",
        "read_at"
    ];
    protected $date = "read_at";
    public function Room(): BelongsTo
    {
        return $this->belongsTo(Room::class, "room_id");
    }
    public function Messageable()
    {
        return $this->morphTo();
    }
    public function isRead(){
        return $this->read_at != null;
    }
}
