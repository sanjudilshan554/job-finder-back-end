<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('category')->group(function () {
    Route::post('/store', [CategoryController::class, 'store']);
    Route::get('/all', [CategoryController::class, 'all']);
    Route::get('/get/{category_id}', [CategoryController::class, 'get']);
    Route::post('/update/{category_id}', [CategoryController::class, 'update']);
    Route::delete('/delete/{category_id}', [CategoryController::class, 'delete']);
});