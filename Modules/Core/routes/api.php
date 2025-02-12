<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\RoleController;

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
    // Route::apiResource('role', RoleController::class)->names('core')->middleware('permission:role.view');
    Route::get('role', [RoleController::class, 'index'])->name('role.index')->middleware('permission:role.view');
    Route::get('role/{id}', [RoleController::class, 'show'])->name('role.show')->middleware('permission:role.view');
    Route::post('role', [RoleController::class, 'store'])->name('role.store')->middleware('permission:role.create');
    Route::put('role/{id}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:role.update');
    Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:role.delete');
});