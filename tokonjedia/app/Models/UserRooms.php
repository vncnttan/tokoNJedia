<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRooms extends Model
{
    use HasFactory;
    public function User(){
        return $this->belongsTo(User::class, "user_id");
    }
    public function Room(){
        return $this->belongsTo(Room::class, "room_id");
    }
}
