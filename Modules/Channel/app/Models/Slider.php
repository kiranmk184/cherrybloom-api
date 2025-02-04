<?php

namespace Modules\Channel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Channel\Database\Factories\SliderFactory;

class Slider extends Model
{
    use HasFactory;

    // protected static function newFactory(): SliderFactory
    // {
    //     // return SliderFactory::new();
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
        'title',
        'path',
        'content',
        'channel_id',
        'slider_path',
        'locale',
        'position',
        'expired_at',
        'sort_order',
    ];

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }
}
