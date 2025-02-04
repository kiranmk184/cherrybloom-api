<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\FlatProductController;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Controllers\ProductDownloadableLinkController;
use Modules\Product\Http\Controllers\ProductDownloadableLinkTranslationController;
use Modules\Product\Http\Controllers\ProductImageController;
use Modules\Product\Http\Controllers\ProductReviewController;
use Modules\Product\Http\Controllers\ProductReviewImageController;
use Modules\Product\Http\Controllers\ProductVideoController;

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
    Route::apiResource('product', ProductController::class)->except([
        'index',
        'show',
    ])->names('product');

    Route::apiResource('flat_product', FlatProductController::class)->names('flat_product');
    Route::apiResource('product_image', ProductImageController::class)->names('product_image');
    Route::apiResource('product_video', ProductVideoController::class)->names('product_video');
    Route::apiResource('product_review', ProductReviewController::class)->names('product_review');
    Route::apiResource('product_review_image', ProductReviewImageController::class)->names('product_review_image');
    Route::apiResource('product_dl_lk', ProductDownloadableLinkController::class)->names('product_dl_lk');
    Route::apiResource('product_dl_lk_t', ProductDownloadableLinkTranslationController::class)->names('product_dl_lk_translation');
});

Route::prefix('v1')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('{product}', [ProductController::class, 'show'])->name('product.show');
    });
});