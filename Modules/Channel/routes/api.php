<?php

use Illuminate\Support\Facades\Route;
use Modules\Channel\Http\Controllers\ChannelController;
use Modules\Channel\Http\Controllers\CMSPageController;
use Modules\Channel\Http\Controllers\CMSPageTranslationController;
use Modules\Channel\Http\Controllers\CurrencyController;
use Modules\Channel\Http\Controllers\CurrencyExchangeRateController;
use Modules\Channel\Http\Controllers\SliderController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('channel', ChannelController::class)->names('channel');
    Route::apiResource('cms_page', CMSPageController::class)->names('cms_page');
    Route::apiResource('cms_page_translation', CMSPageTranslationController::class)->names('cms_page_translation');
    Route::apiResource('currency', CurrencyController::class)->names('currency');
    Route::apiResource('currency_exchange_rate', CurrencyExchangeRateController::class)->names('currency_exchange_rate');
    Route::apiResource('slider', SliderController::class)->names('slider');
});
