<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Order\Database\Factories\OrderTransactionFactory;

class OrderTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'transaction_id',
        'status',
        'type',
        'payment_method',
        'data',
        'invoice_id',
        'order_id',
        'amount',
    ];

    // protected static function newFactory(): OrderTransactionFactory
    // {
    //     // return OrderTransactionFactory::new();
    // }
}
