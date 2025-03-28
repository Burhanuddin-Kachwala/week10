<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['order_id', 'payment_method', 'amount', 'transaction_id', 'status'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
