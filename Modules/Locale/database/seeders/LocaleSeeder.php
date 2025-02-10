<?php

namespace Modules\Locale\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Locale\Enum\DirectionEnum;

class LocaleSeeder extends Seeder
{
    protected $timestamp = true;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locales')->insert([
            'name' => 'English',
            'code' => 'en',
            'direction' => 'ltr',
            'locale_img' => null
        ]);
    }
}
