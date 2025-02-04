<?php

namespace Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Order\Database\Factories\InvoiceItemFactory;

class InvoiceItem extends Model
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
        'product_id',
        'product_type',
        'invoice_id',
        'discount_percent',
        'discount_amount',
        'base_discount_amount',
    ];

    // protected static function newFactory(): InvoiceItemFactory
    // {
    //     // return InvoiceItemFactory::new();
    // }
}
