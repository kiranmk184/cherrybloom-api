<?php

namespace Modules\Channel\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Modules\Channel\Database\Factories\CMSPageFactory;

class CMSPage extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): CMSPageFactory
    // {
    //     // return CMSPageFactory::new();
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
        'layout'
    ];

    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(Channel::class, 'channel_cms_page', 'channel_id', 'cms_page_id');
    }

    public function cmsPageTranslations(): HasMany
    {
        return $this->hasMany(CMSPageTranslation::class, 'cms_page_id');
    }
}
