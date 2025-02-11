<?php

namespace Modules\Locale\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Locale\Models\Locale;
use Modules\Locale\Enum\DirectionEnum;

class LocaleSeeder extends Seeder
{
    protected $timestamp = true;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Locale::create([
            'name' => 'English',
            'code' => 'en',
            'direction' => DirectionEnum::LTR->value,
            'locale_img' => null
        ]);
    }
}
