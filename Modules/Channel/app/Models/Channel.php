<?php

namespace Modules\Channel\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Modules\Channel\Database\Factories\ChannelFactory;

class Channel extends Model
{
    use HasFactory, HasUuids;

    // protected static function newFactory(): ChannelFactory
    // {
    //     // return ChannelFactory::new();
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
        'code',
        'timezone',
        'theme',
        'hostname',
        'favicon',
        'logo',
        'is_maintenance_on',
        'allowed_ips',
        'default_locale_id',
        'base_currency_id',
        'root_category_id',
    ];

    public function sliders(): HasMany
    {
        return $this->hasMany(Slider::class);
    }

    public function currencies(): BelongsToMany
    {
        return $this->belongsToMany(Currency::class);
    }

    public function baseCurrency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function cmsPages(): BelongsToMany
    {
        return $this->belongsToMany(CMSPage::class, 'channel_cms_page', 'channel_id', 'cms_page_id');
    }
}
