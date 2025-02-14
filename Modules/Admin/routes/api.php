<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\AdminRoleController;
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
        Route::get('admin', [AdminController::class, 'index'])->name('admin.index')->middleware('permission:admin.view');
        Route::get('admin/{id}', [AdminController::class, 'show'])->name('admin.show')->middleware('permission:admin.view');
        Route::post('admin', [AdminController::class, 'store'])->name('admin.store')->middleware('permission:admin.store');
        Route::put('admin/{id}', [AdminController::class, 'update'])->name('admin.update')->middleware('permission:admin.update');
        Route::delete('admin/{id}', [AdminController::class, 'delete'])->name('admin.delete')->middleware('permission:admin.delete');

        Route::post('admin/{id}/role', [AdminRoleController::class, 'attach'])->name('admin.attach')->middleware('permission:admin.attach');
    });
});