<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Room extends Model
{
    use HasFactory;
    protected $table = "rooms";
    public $incrementing = false;
    protected $keyType = 'string';
    public $primaryKey = "id";
    protected $fillable = [
        "id"
    ];

    public function Merchants(){
        return $this->morphedByMany(Merchant::class, "roomable");
    }
    public function Users(){
        return $this->morphedByMany(User::class, "roomable");
    }

    public function Messages(){
        return $this->hasMany(Message::class, "room_id");
    }

}
