<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController; // Use the correct namespace path
use App\Http\Controllers\Admin\ShipController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Web'], function () {
    Route::get('/', [WebController::class, 'home'])->name('home');
    Route::get('/about-us', [WebController::class, 'about_us'])->name('about-us');
    Route::get('/services', [WebController::class, 'services'])->name('services');
    Route::get('/contact-us', [WebController::class, 'contact_us'])->name('contact-us');
    Route::post('/track-status', [ShipController::class, 'track_status'])->name('track-status');
});
