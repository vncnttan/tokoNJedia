<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElectricTransactionDetail extends Model
{
    use HasFactory;

    public function TransactionHeader(): BelongsTo
    {
        return $this->belongsTo(TransactionHeader::class, 'transaction_id', 'id');
    }
}
