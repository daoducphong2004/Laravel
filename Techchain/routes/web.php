<?php

use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
// Auth::routes();
Route::get('auth/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('auth/login', [LoginController::class, 'login'])->name('login');
Route::post('auth/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('auth/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register'])->name('register');
