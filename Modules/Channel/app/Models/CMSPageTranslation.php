<?php

namespace Modules\Channel\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Channel\Database\Factories\CMSPageTranslationFactory;

class CMSPageTranslation extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): CMSPageTranslationFactory
    // {
    //     // return CMSPageTranslationFactory::new();
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
        'cms_page_id',
        'page_title',
        'url_key',
        'html_content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'locale',
    ];

    public function cmsPage(): BelongsTo
    {
        return $this->belongsTo(CMSPage::class, 'cms_page_id');
    }
}
