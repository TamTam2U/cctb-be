<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'action']);
        Route::get('refresh', [\App\Http\Controllers\Auth\RefreshTokenController::class, 'action'])->middleware('auth:api');
        Route::post('check-token',[App\Http\Controllers\Auth\CheckTokenController::class, 'action']);
    });

    Route::prefix('area')->group(function () {
        Route::get('all', [\App\Http\Controllers\Area\GetAllController::class, 'action']);
        // Route::post('create', [\App\Http\Controllers\Area\CreateController::class, 'action']);
        // Route::put('update/{id}', [\App\Http\Controllers\Area\UpdateController::class, 'action']);
        // Route::delete('delete/{id}', [\App\Http\Controllers\Area\DeleteController::class, 'action']);
    });

    Route::prefix('setting')->group(function (){
        Route::post('add-cctv/{id}', [\App\Http\Controllers\Setting\AddCctvToSettingController::class, 'action']);
        Route::post('edit-cctv/{id}', [\App\Http\Controllers\Setting\EditCctvToSettingController::class, 'action']);
    });
});
