<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;
    protected $table = "rooms";
    public $incrementing = false;
    protected $keyType = 'string';

    public function UserRoom(): HasMany
    {
        return $this->hasMany(UserRoom::class, "room_id");
    }
}
