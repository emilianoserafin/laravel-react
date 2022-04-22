<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    Route::group(['middleware' => 'checkRole:admin'], function () {
        Route::inertia('/AdminDashboard', 'AdminDashboard')->name('AdminDashboard');
    });
    Route::group(['middleware' => 'checkRole:seller'], function () {
        Route::inertia('/SellerDashboard', 'SellerDashboard')->name('SellerDashboard');
    });
    Route::group(['middleware' => 'checkRole:customer'], function () {
        Route::inertia('/CustomerDashboard', 'CustomerDashboard')->name('CustomerDashboard');
    });
});

require __DIR__ . '/auth.php';
