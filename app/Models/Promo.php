<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promo extends Model
{
    use HasFactory;

    protected $table = "promos";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "id",
        "promo_name",
        "promo_image",
        "promo_description",
    ];

    public function ProductPromo(): HasMany
    {
        return $this->hasMany(ProductPromo::class);
    }
}
