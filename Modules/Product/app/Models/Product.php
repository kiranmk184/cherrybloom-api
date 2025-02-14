<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

// use Modules\Product\Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): ProductFactory
    // {
    //     // return ProductFactory::new();
    // }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'sku',
        'type',
        'additional',
        'attribute_family_id',
        'parent_id',
    ];

    public function flatProduct(): HasOne
    {
        return $this->hasOne(FlatProduct::class);
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productVideos(): HasMany
    {
        return $this->hasMany(ProductVideo::class);
    }

    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function productDownloadableLinks(): HasMany
    {
        return $this->hasMany(ProductDownloadableLink::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
