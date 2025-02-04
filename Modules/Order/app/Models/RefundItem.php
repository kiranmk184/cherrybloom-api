<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Order\Database\Factories\RefundItemFactory;

class RefundItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'sku',
        'quantity',
        'price',
        'base_price',
        'total',
        'base_total',
        'tax_amount',
        'base_tax_amount',
        'discount_percent',
        'discount_amount',
        'base_discount_amount',
        'parent_id',
        'refund_id',
        'order_item_id',
        'product_id',
        'product_type',
        'additional',
    ];

    // protected static function newFactory(): RefundItemFactory
    // {
    //     // return RefundItemFactory::new();
    // }
}
