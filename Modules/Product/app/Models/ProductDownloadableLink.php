<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Modules\Product\Database\Factories\ProductDownloadableLinkFactory;

class ProductDownloadableLink extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): ProductDownloadableLinkFactory
    // {
    //     // return ProductDownloadableLinkFactory::new();
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
        'product_id',
        'url',
        'file',
        'file_name',
        'type',
        'price',
        'sample_url',
        'sample_file',
        'sample_file_name',
        'sample_type',
        'downloads',
        'sort_order',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productDownloadableLinkTranslations(): HasMany
    {
        return $this->hasMany(ProductDownloadableLinkTranslation::class, 'product_dl_lk_id');
    }
}

