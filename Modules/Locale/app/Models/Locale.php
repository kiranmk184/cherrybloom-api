<?php

namespace Modules\Locale\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Locale\Enum\DirectionEnum;

// use Modules\Locale\Database\Factories\LocaleFactory;

class Locale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'code', 'name', 'direction', 'locale_img'
    ];

    protected $casts = [
        'direction' => DirectionEnum::class,
    ];

    // protected static function newFactory(): LocaleFactory
    // {
    //     // return LocaleFactory::new();
    // }
}
