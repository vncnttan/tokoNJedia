<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = "transaction_details";
    protected $fillable = [
        "transaction_id",
        "product_id",
        "quantity"
    ];
    public function TransactionHeader(): BelongsTo
    {
        return $this->belongsTo(TransactionHeader::class, "transaction_header");
    }
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id");
    }
}
