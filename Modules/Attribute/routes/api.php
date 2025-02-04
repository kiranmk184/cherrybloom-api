<?php

use Illuminate\Support\Facades\Route;
use Modules\Attribute\Http\Controllers\AttributeController;
use Modules\Attribute\Http\Controllers\AttributeFamilyController;
use Modules\Attribute\Http\Controllers\AttributeGroupController;

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
    Route::apiResource('attribute', AttributeController::class)->names('attribute');
    Route::apiResource('attribute_family', AttributeFamilyController::class)->names('attribute_family');
    Route::apiResource('attribute_group', AttributeGroupController::class)->names('attribute_group');
});
