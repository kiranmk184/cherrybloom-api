<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Modules\Product\Database\Factories\ProductReviewFactory;

class ProductReview extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): ProductReviewFactory
    // {
    //     // return ProductReviewFactory::new();
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
        'customer_id',
        'product_id',
        'name',
        'title',
        'rating',
        'comment',
        'status',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productReviewImages(): HasMany
    {
        return $this->hasMany(ProductReviewImage::class);
    }
}
