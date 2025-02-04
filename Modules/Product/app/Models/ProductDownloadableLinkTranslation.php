<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Product\Database\Factories\ProductDownloadableLinkTranslationFactory;

class ProductDownloadableLinkTranslation extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): ProductDownloadableLinkTranslationFactory
    // {
    //     // return ProductDownloadableLinkTranslationFactory::new();
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
        'locale',
        'title',
        'product_dl_lk_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function productDownloadableLink(): BelongsTo
    {
        return $this->belongsTo(ProductDownloadableLink::class, 'product_dl_lk_id');
    }
}
