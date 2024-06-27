<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TinController;
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

Route::get('/',[PagesController::class,'index'])->name('trangchu');
/*
//vadidate tham số truyền vào
Route::get("/{id}",[TinController::class,"test"])->where("id","[a-zA-Z0-9]+");
// đầu vào là số thì cho điều kiện: [0-9]+
// đầu vào là string thì cho điều kiện [a-zA-Z]+
// đầu vào là số và string thì cho điều kiện [a-zA-Z0-9]+
// cách vadidate 2 hoặc nhiều tham số là dùng mảng để trong hàm where như ví dụ sau
Route::get("/{id}/{id2}",[TinController::class,"test1"])->where(['id'=>"[0-9]+",
'id2'=>'[a-zA-z]+']);
Route::get('/tintuc',[TinController::class,'index']);


// Route::get("/",[TinController::class,'index']);
// Route::get("redirect/{id}",[TinController::class,'redirectTest']);
// Route::resource('products', ProductController::class);  

*/