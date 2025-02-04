<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\AuthenticationController;

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

Route::prefix('v1')->group(function () {
    Route::prefix('auth/admin')->group(function () {
        Route::post('login', [AuthenticationController::class, 'login'])->name('admin.login');
        Route::post('logout', [AuthenticationController::class, 'logout'])->name('admin.logout')->middleware('auth:sanctum');
    });

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::apiResource('admin', AdminController::class)->names('admin');

        Route::prefix('admin')->group(function () {

        });
    });
});