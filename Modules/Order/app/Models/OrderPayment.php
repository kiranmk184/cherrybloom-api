<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Order\Database\Factories\OrderPaymentFactory;

class OrderPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'method',
        'method_title',
        'order_id',
        'additional',
    ];

    // protected static function newFactory(): OrderPaymentFactory
    // {
    //     // return OrderPaymentFactory::new();
    // }
}
