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
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');//previous dashboard route
        Route::post('/add_post', [PostController::class, 'storePost'])->name('add_post');
        Route::get('/add_post', [DashboardController::class, 'add_post'])->name('add_post');//add shipment route
    });
});
