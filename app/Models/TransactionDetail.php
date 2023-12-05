<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = "transaction_details";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "transaction_id",
        "product_id",
        "quantity"
    ];
    public function TransactionHeader(): BelongsTo
    {
        return $this->belongsTo(TransactionHeader::class, "transaction_id", "id");
    }
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
    public function ProductVariant() : BelongsTo {
        return $this->belongsTo(ProductVariant::class, "variant_id", "id");
    }
    public function Shipment(): BelongsTo
    {
        return $this->belongsTo(Shipment::class, "shipment_id", "id");
    }

    protected function setKeysForSaveQuery($query): Builder
    {
        return $query->where('transaction_id', $this->getAttribute('transaction_id'))
            ->where('product_id', $this->getAttribute('product_id'))
            ->where('variant_id', $this->getAttribute('variant_id'));
    }
}
