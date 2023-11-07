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
    protected $fillable = [
        "user_id",
        "date",
        "destination_address",
        "payment_method_id"
    ];
    public function TransactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
