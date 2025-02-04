<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Order\Database\Factories\OrderFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'increment_id',
        'status',
        'channel_name',
        'is_guest',
        'customer_email',
        'customer_first_name',
        'customer_last_name',
        'customer_company_name',
        'customer_vat_id',
        'shipping_method',
        'shipping_title',
        'coupon_code',
        'is_gift',
        'total_item_count',
        'total_quantity_ordered',
        'base_currency_code',
        'channel_currency_code',
        'order_currency_code',
        'grand_total',
        'grand_total_invoiced',
        'grand_total_refunded',
        'base_grand_total_refunded',
        'discount_percent',
        'discount_amount',
        'base_discount_amount',
        'discount_invoiced',
        'base_discount_invoiced',
        'discount_refunded',
        'base_discount_refunded',
        'tax_amount',
        'base_tax_amount',
        'tax_amount_invoiced',
        'tax_amount_refunded',
        'base_tax_amount_refunded',
        'base_shipping_amount',
        'shipping_refunded',
        'base_shipping_refunded',
        'customer_id',
        'customer_type',
        'channel_id',
        'channel_type',
        'cart_id',
        'shipping_discount_amount',
        'base_shipping_discount_amount',
    ];

    // protected static function newFactory(): OrderFactory
    // {
    //     // return OrderFactory::new();
    // }
}
