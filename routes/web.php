<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepanController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Models\Artikel;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {

//     $data = Artikel::all();
//     return view('index',compact('data'));
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/', DepanController::class);
Route::get('/detail/{id}', [App\Http\Controllers\DepanController::class, 'show'])->name('detail');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/user', UserController::class);
    Route::get('/delus/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delus');
    Route::resource('/dashboard', DashboardController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/kategori', KategoriController::class);
    Route::get('/delkat/{id}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('delkat');
    Route::resource('/artikel', ArtikelController::class);
    Route::get('/delar/{artikel}', [App\Http\Controllers\ArtikelController::class, 'destroy'])->name('delar');
});

