<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    /*authentication*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::get('register', [AuthController::class, 'register'])->name('register');
        Route::post('login', [AuthController::class, 'submit'])->name('login');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/main/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');//previous dashboard route
        Route::post('/main/add_post', [PostController::class, 'storePost'])->name('add_post');
        Route::get('/main/add_post', [DashboardController::class, 'add_post'])->name('add_post');//add shipment route
        Route::get('/main/post_list', [DashboardController::class, 'post_list'])->name('post_list');//add shipment route
    });
});
