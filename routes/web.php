<?php

use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Subscriber\AuthController as SubscriberAuth;
use App\Http\Controllers\Subscriber\HomeController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin/'], function () {

    Route::controller(AdminAuth::class)->group(function () {
        Route::get('login', 'loginForm');
        Route::post('login', 'login')->name('admin-login');
    });

    Route::middleware(['auth:admin'])->group(function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('', 'index');
            Route::get('dashboard', 'index')->name('dashboard');
        });

        Route::controller(BlogController::class)->group(function () {
            Route::get('blogs', 'index');
            Route::get('blogs/{blog}', 'show');
            Route::post('blogs', 'store');
            Route::post('blogs/{blog}', 'update');
            Route::post('delete-blog', 'destroy');
        });

        Route::resource('subscribers', SubscriberController::class);
        Route::post('delete-subscriber', [SubscriberController::class, 'destroy']);
    });
});


/**
 * Subscriber routes
 */

Route::post('logout', [Controller::class, 'logout'])->name('logout');

Route::controller(SubscriberAuth::class)->group(function () {
    Route::get('login', 'loginForm')->name('login');
    Route::post('login', 'login');
});

Route::middleware(['auth:subscriber'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/home', 'index')->name('home');
        Route::get('/blog/{blog}', 'showBlog')->name('blog');
    });
});
