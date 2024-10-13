<?php


use App\Http\Controllers\Blog\BlogCategoryController as AdminBlogCategoryController;
use App\Http\Controllers\Blog\BlogTagController as AdminBlogTagController;
use App\Http\Controllers\CategoryController as AdminCategoryController;
use App\Http\Controllers\JobController as AdminJobController;
use App\Http\Controllers\Blog\BlogController as AdminBlogController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('category')->group(callback: function () {
    Route::post('/store', [AdminCategoryController::class, 'store']);
    Route::get('/all', [AdminCategoryController::class, 'all']);
    Route::get('/all-enabled', [AdminCategoryController::class, 'allEnabled']);
    Route::get('/get/{category_id}', [AdminCategoryController::class, 'get']);
    Route::post('/update/{category_id}', [AdminCategoryController::class, 'update']);
    Route::delete('/delete/{category_id}', [AdminCategoryController::class, 'delete']);
});

Route::prefix('job')->group(function () {
    Route::post('/store', [AdminJobController::class, 'store']);
    Route::get('/all', [AdminJobController::class, 'all']);
    Route::get('/get/{job_id}', [AdminJobController::class, 'get']);
    Route::get('/edit/{job_id}', [AdminJobController::class, 'edit']);
    Route::post('/update/{job_id}', [AdminJobController::class, 'update']);
    Route::delete('/delete/{job_id}', [AdminJobController::class, 'delete']);
});

Route::prefix('/blog')->group(function () {
    Route::post('/store', [AdminBlogController::class, 'store']);
    Route::get('/all', [AdminBlogController::class, 'all']);
    Route::get('/get/{blog_id}', [AdminBlogController::class, 'get']);
    Route::get('/edit/{blog_id}', [AdminBlogController::class, 'edit']);
    Route::post('/update/{blog_id}', [AdminBlogController::class, 'update']);
    Route::delete('/delete/{blog_id}', [AdminBlogController::class, 'delete']);

    Route::prefix('/category')->group(function () {
        Route::post('/store', [AdminBlogCategoryController::class, 'store']);
        Route::get('/all', [AdminBlogCategoryController::class, 'all']);
        Route::get('/all-enabled', [AdminBlogCategoryController::class, 'allEnabled']);
        Route::get('/get/{category_id}', [AdminBlogCategoryController::class, 'get']);
        Route::post('/update/{category_id}', [AdminBlogCategoryController::class, 'update']);
        Route::delete('/delete/{category_id}', [AdminBlogCategoryController::class, 'delete']);
    });

    Route::prefix('/tag')->group(function () {
        Route::post('/store', [AdminBlogTagController::class, 'store']);
        Route::get('/all', [AdminBlogTagController::class, 'all']);
        Route::get('/get/{job_id}', [AdminBlogTagController::class, 'get']);
        Route::get('/edit/{job_id}', [AdminBlogTagController::class, 'edit']);
        Route::post('/update/{job_id}', [AdminBlogTagController::class, 'update']);
        Route::delete('/delete/{job_id}', [AdminBlogTagController::class, 'delete']);
    });
});