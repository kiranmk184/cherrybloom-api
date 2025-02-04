<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Product\Database\Factories\ProductReviewImageFactory;

class ProductReviewImage extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): ProductReviewImageFactory
    // {
    //     // return ProductReviewImageFactory::new();
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
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_review_id',
        'type',
        'path',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function productReview(): BelongsTo
    {
        return $this->belongsTo(ProductReview::class);
    }
}
