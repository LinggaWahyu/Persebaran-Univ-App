<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversitasController;
use App\Http\Controllers\DashboardController;

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

Auth::routes([
    'register' => false,
    'verify' => false
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/univ/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('home.detail');

Route::prefix('admin')
    ->middleware('admin')
    ->group(function() {
        Route::resource('universitas', UniversitasController::class);

        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    });