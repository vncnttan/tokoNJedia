<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = "product_categories";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = "id";

    protected $fillable = [
        "name"
    ];
    public static function search($query)
    {
        return ProductCategory::where('name', 'like', '%' . $query . '%');
    }

    public function Products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
