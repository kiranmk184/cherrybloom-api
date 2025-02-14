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
    Route::prefix('channel')->group(function () {
        Route::get('', [ChannelController::class, 'index'])->name('channel.index')->middleware('permission:channel.view');
        Route::get('{id}', [ChannelController::class, 'show'])->name('channel.show')->middleware('permission:channel.view');
        Route::post('', [ChannelController::class, 'store'])->name('channel.store')->middleware('permission:channel.store');
        Route::put('{id}', [ChannelController::class, 'update'])->name('channel.update')->middleware('permission:channel.update');
        Route::delete('{id}', [ChannelController::class, 'destroy'])->name('channel.destroy')->middleware('permission:channel.delete');
    });

    // todo: after implementing locales and translations
    // Route::apiResource('cms_page', CMSPageController::class)->names('cms_page');
    // Route::apiResource('cms_page_translation', CMSPageTranslationController::class)->names('cms_page_translation');
    // Route::apiResource('slider', SliderController::class)->names('slider');

    Route::prefix('currency')->group(function () {
        Route::get('', [CurrencyController::class, 'index'])->name('currency.index')->middleware("permission:currency.view");
        Route::get('{id}', [CurrencyController::class, 'show'])->name('currency.show')->middleware("permission:currency.view");
        Route::post('', [CurrencyController::class, 'store'])->name('currency.store')->middleware("permission:currency.store");
        Route::put('{id}', [CurrencyController::class, 'update'])->name('currency.update')->middleware("permission:currency.update");
        Route::delete('{id}', [CurrencyController::class, 'destroy'])->name('currency.destroy')->middleware("permission:currency.delete");

        Route::prefix('{currencyId}/currency_exchange_rate')->group(function () {
            Route::get('', [CurrencyExchangeRateController::class, 'index'])->name('currency_exchange_rate.index')->middleware('permission:currency_exchange_rate.view');
            Route::get('{id}', [CurrencyExchangeRateController::class, 'show'])->name('currency_exchange_rate.show')->middleware('permission:currency_exchange_rate.view');
            Route::post('', [CurrencyExchangeRateController::class, 'store'])->name('currency_exchange_rate.store')->middleware('permission:currency_exchange_rate.store');
            Route::put('{id}', [CurrencyExchangeRateController::class, 'update'])->name('currency_exchange_rate.update')->middleware('permission:currency_exchange_rate.update');
            Route::delete('{id}', [CurrencyExchangeRateController::class, 'destroy'])->name('currency_exchange_rate.destroy')->middleware('permission:currency_exchange_rate.delete');
        });
    });

});
