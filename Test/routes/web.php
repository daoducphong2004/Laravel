<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
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
Route::get('/yc1',[UserController::class,'getAll']);
Route::get('/yc2',[UserController::class,'getUserbyAge']);
Route::get('/yc3',[UserController::class,'yc3']);
Route::get('/yc4',[UserController::class,'yc4']);
Route::get('/yc5',[UserController::class,'yc5']);
Route::get('/yc6',[OrderController::class,'yc6']);
Route::get('/yc7',[UserController::class,'yc7']);
Route::get("yc8",[SaleController::class,'yc8']);
Route::get('/yc9',[UserController::class,'yc9']);
Route::get('/yc10',[OrderController::class,'yc10']);
Route::get('/yc11',[OrderController::class,'yc11']);
Route::get('/yc12',[OrderController::class,'yc12']);
Route::get('/yc13',[OrderController::class,'yc13']);
Route::get('/yc14',[ProductController::class,'yc14']);
Route::get('/yc15',[UserController::class,'yc15']);
