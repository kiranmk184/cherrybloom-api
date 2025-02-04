<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Order\Database\Factories\OrderItemFactory;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'sku',
        'type',
        'name',
        'coupon_code',
        'weight',
        'total_weight',
        'quantity_ordered',
        'quantity_shipped',
        'quantity_invoiced',
        'quantity_cancelled',
        'quantity_refunded',
        'price',
        'base_price',
        'total',
        'base_total',
        'total_invoiced',
        'base_total_invoiced',
        'amount_refunded',
        'base_amount_refunded',
        'discount_percent',
        'discount_amount',
        'base_discount_amount',
        'discount_invoiced',
        'base_discount_invoiced',
        'discount_refunded',
        'base_discount_refunded',
        'tax_percent',
        'tax_amount',
        'base_tax_amount',
        'tax_amount_invoiced',
        'base_tax_amount_invoiced',
        'tax_amount_refunded',
        'base_tax_amount_refunded',
        'parent_id',
        'product_id',
        'product_type',
        'order_id',
        'additional',
    ];

    // protected static function newFactory(): OrderItemFactory
    // {
    //     // return OrderItemFactory::new();
    // }
}
