<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function Location(): HasOne
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
}
