<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = "product_categories";
    protected $fillable = [
        "name"
    ];

    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
