<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Order\Database\Factories\RefundFactory;

class Refund extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'increment_id',
        'state',
        'email_sent',
        'total_quantity',
        'base_currency_code',
        'channel_currency_code',
        'order_currency_code',
        'adjustment_refund',
        'base_adjustment_refund',
        'adjustment_fee',
        'base_adjustment_fee',
        'sub_total',
        'base_sub_total',
        'grand_total',
        'base_grand_total',
        'shipping_amount',
        'base_shipping_amount',
        'tax_amount',
        'base_tax_amount',
        'discount_percent',
        'discount_amount',
        'base_discount_amount',
        'order_id',
    ];

    // protected static function newFactory(): RefundFactory
    // {
    //     // return RefundFactory::new();
    // }
}
