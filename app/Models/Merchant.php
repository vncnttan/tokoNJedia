<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Merchant extends Model
{
    use HasFactory;
    protected $table = "merchants";

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        "name",
        "image",
        "user_id"
    ];

    public function Rooms(){
        return $this->morphToMany(Room::class, "roomable");
    }
    public function Messages()
    {
        return $this->morphMany(Message::class, 'messageable');
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function Location(): MorphMany
    {
        return $this->MorphMany(Location::class, 'locationable');
    }
    public function Followers(): HasMany
    {
        return $this->hasMany(MerchantFollower::class);
    }
}
