<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;

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
    // Route::apiResource('category', CategoryController::class)->names('category');
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index')->middleware('permission:category.view');
        Route::get('{id}', [CategoryController::class, 'show'])->name('category.show')->middleware('permission:category.view');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store')->middleware('permission:category.store');
        Route::put('{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('permission:category.update');
        Route::delete('{id}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware('permission:category.delete');
    });
});
