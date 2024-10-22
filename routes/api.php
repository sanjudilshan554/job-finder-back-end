<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\BlogCategoryController as AdminBlogCategoryController;
use App\Http\Controllers\Blog\BlogTagController as AdminBlogTagController;
use App\Http\Controllers\CategoryController as AdminCategoryController;
use App\Http\Controllers\JobCompanyController as AdminJobCompanyController;
use App\Http\Controllers\JobController as AdminJobController;
use App\Http\Controllers\Blog\BlogController as AdminBlogController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); 

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/user', [AuthController::class, 'getUser'])->middleware('auth:sanctum');

// Jobs
Route::prefix('/job')->group(function () {
    Route::post('/store', [AdminJobController::class, 'store']);
    Route::get('/all', [AdminJobController::class, 'all']);
    Route::get('/get/{job_id}', [AdminJobController::class, 'get']);
    Route::get('/edit/{job_id}', [AdminJobController::class, 'edit']);
    Route::post('/update/{job_id}', [AdminJobController::class, 'update']);
    Route::delete('/delete/{job_id}', [AdminJobController::class, 'delete']);
    Route::get('/deleted/all', [AdminJobController::class, 'deletedAll']);
    Route::get('/deleted/get/{job_id}', [AdminJobController::class, 'deletedGet']);
    Route::get('/recovery/{job_id}', [AdminJobController::class, 'recovery']);

    Route::prefix('/category')->group(callback: function () {
        Route::post('/store', [AdminCategoryController::class, 'store']);
        Route::get('/all', [AdminCategoryController::class, 'all']);
        Route::get('/all-enabled', [AdminCategoryController::class, 'allEnabled']);
        Route::get('/get/{category_id}', [AdminCategoryController::class, 'get']);
        Route::post('/update/{category_id}', [AdminCategoryController::class, 'update']);
        Route::delete('/delete/{category_id}', [AdminCategoryController::class, 'delete']);
    });

    Route::prefix('/company')->group(callback: function () {
        Route::post('/store', [AdminJobCompanyController::class, 'store']);
        Route::get('/all', [AdminJobCompanyController::class, 'all']);
        Route::get('/all-enabled', [AdminJobCompanyController::class, 'allEnabled']);
        Route::get('/get/{category_id}', [AdminJobCompanyController::class, 'get']);
        Route::post('/update/{category_id}', [AdminJobCompanyController::class, 'update']);
        Route::delete('/delete/{category_id}', [AdminJobCompanyController::class, 'delete']);
    });
});

// Blogs
Route::prefix('/blog')->group(function () {
    Route::post('/store', [AdminBlogController::class, 'store']);
    Route::get('/all', [AdminBlogController::class, 'all']);
    Route::get('/get/{blog_id}', [AdminBlogController::class, 'get']);
    Route::get('/edit/{blog_id}', [AdminBlogController::class, 'edit']);
    Route::post('/update/{blog_id}', [AdminBlogController::class, 'update']);
    Route::delete('/delete/{blog_id}', [AdminBlogController::class, 'delete']);
    Route::get('/deleted/all', [AdminBlogController::class, 'deletedAll']);
    Route::get('/deleted/get/{job_id}', [AdminBlogController::class, 'deletedGet']);
    Route::get('/recovery/{job_id}', [AdminBlogController::class, 'recovery']);

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


//User
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, "index"]);
    Route::get('/all', [UserController::class, "all"]);
    Route::get('/all-users', [UserController::class, "allUsers"]);
    Route::get('/all-admins', [UserController::class, "allAdmins"]);
    Route::post('/store', [UserController::class, "store"]);
    Route::get('get/{user_id}/', [UserController::class, "get"]);
    Route::get('/{user_id}/load', [UserController::class, "loadUser"]);
    Route::post('update/{user_id}/', [UserController::class, "update"]);
    Route::delete('delete/{user_id}/', [UserController::class, "delete"]);
    Route::get('/{user_id}/restore', [UserController::class, "restore"]);


    Route::prefix('permission')->group(function () {
        Route::get('/group/all', [PermissionController::class, "groups"]);
        Route::get('/list/all', [PermissionController::class, "allList"]);
        Route::get('/all/{user_id}/', [PermissionController::class, "userPermissionsList"]);
        Route::post('update/user/permissions/{user_id}/', [PermissionController::class, "updatePermissions"]);
    });
});
