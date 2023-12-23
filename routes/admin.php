<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShipController;


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
        Route::get('/add_shipment', [DashboardController::class, 'add_shipment'])->name('add_shipment');//add shipment route
        Route::get('/update_shipment', [ShipController::class, 'update_shipment'])->name('update_shipment');//update shipmentstatus route
        Route::get('/get-parcel-fields/{index?}', [DashboardController::class, 'get_parcelfields'])->name('get-parcel-fields');
        Route::post('/add_shipment', [ShipController::class, 'store'])->name('add_shipment');
        Route::get('/get_trackstatus_fields/{shipment_id?}', [ShipController::class, 'get_trackstatus_fields'])->name('get_trackstatus_fields');
        Route::post('/track-status', [ShipController::class, 'track_status'])->name('track-status');
        Route::post('/change-track-status', [ShipController::class, 'update_track_status'])->name('change-track-status');
        Route::get('/shipping-label/{shippingid?}', [DashboardController::class, 'shipping_label'])->name('shipping-label');//previous dashboard route
        Route::get('/shipping-invoice/{shippingid?}', [DashboardController::class, 'shipping_invoice'])->name('shipping-invoice');//previous dashboard route
    });
});
