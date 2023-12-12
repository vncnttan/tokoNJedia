<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransactionHeader extends Model
{
    use HasFactory;
    protected $table = "transaction_headers";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        "user_id",
        "date",
        "destination_address",
    ];
    public function TransactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, "transaction_id", "id");
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function Location(): BelongsTo
    {
        return $this->belongsTo(Location::class, "location_id", "id");
    }

    public function ElectricTransactionDetails(): HasMany
    {
        return $this->hasMany(ElectricTransactionDetail::class, "transaction_id", "id");
    }

    public function Reviews(): HasMany
    {
        return $this->hasMany(Review::class, "transaction_id", "id");
    }
}
