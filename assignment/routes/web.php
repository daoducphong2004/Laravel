<?php

use App\Http\Controllers\CategoriController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TintucController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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
Route::get('/',[HomeController::class,'index'])->name('trangchu');

// bài viết
Route::get('/tintuc/{id}',[NewsController::class,'show'])
->where('id','[0-9]+')
->name('tintucchitiet');

//danh mục
Route::get('/danhmuc',[CategoriController::class,'index'])->name('danhmuc');
Route::get('/danhmuc/{id}',[CategoriController::class,'show'])->name('danhmucchitiet');

// Về chúng tôi
Route::get('/aboutus',function(){
    return view('client.about');
})->name('aboutus');

//Liên Hệ
Route::get('/contact', [contactController::class, 'create'])->name('lienhe.create');
Route::post('/contact', [contactController::class, 'store'])->name('lienhe.store');

//Bình luận
Route::post('/comments/{tintuc_id}', [CommentController::class, 'store'])->name('comments.store');
//tìm kiếm
Route::get('/search', [SearchController::class,'search'])->name('search');

