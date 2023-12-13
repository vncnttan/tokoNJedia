<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "name",
        "price",
        "description",
        "image",
        "merchant_id",
        "product_category_id",
        "stock"
    ];


    public function Merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class, "merchant_id", "id");
    }
    public function ProductCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, "product_category_id");
    }
    public function Reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function TransactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }
    public function Cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function ProductImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function ProductVariants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public static function search($query){
        $user = Auth::user();
        $products = $user->Merchant->Products()->where('name', 'like', '%' . $query . '%')->get();
        return $products;
    }

    public function ProductPromo(): HasMany
    {
        return $this->hasMany(ProductPromo::class, "product_id", "id");
    }

    public function FlashSaleProducts(): HasMany
    {
        return $this->hasMany(FlashSaleProduct::class, "product_id", "id");
    }

}
