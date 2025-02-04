<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Product\Database\Factories\FlatProductFactory;

class FlatProduct extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): FlatProductFactory
    // {
    //     // return FlatProductFactory::new();
    // }

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'parent_id',
        'sku',
        'product_number',
        'name',
        'description',
        'short_description',
        'url_key',
        'new',
        'featured',
        'status',
        'thumbnail',
        'price',
        'cost',
        'special_price',
        'special_price_from',
        'special_price_to',
        'color',
        'color_label',
        'size',
        'size_label',
        'weight',
        'width',
        'height',
        'depth',
        'locale',
        'channel',
        'min_price',
        'max_price',
        'meta_title',
        'meta_keywork',
        'meta_description',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
