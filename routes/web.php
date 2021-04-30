<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversitasController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin/index');
});
// Route::get('/universitas', function () {
//     return view('admin/universitas');
// });
Route::get('/tambah_universitas', function () {
    return view('admin/tambah_universitas');
});

Route::resource('/universitas', 'App\Http\Controllers\UniversitasController');
