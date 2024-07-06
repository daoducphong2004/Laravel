<?php

use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {


    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('catalogues', CatalogueController::class);

    // Route::prefix('catalogues')
    //     ->as('catalogues.')
    //     ->group(function () {
    //         Route::get('/',                 [CatalogueController::class, 'index'])->name('index');
    //         Route::get('create',            [CatalogueController::class, 'create'])->name('create');
    //         Route::post('store',            [CatalogueController::class, 'store'])->name('store');
    //         Route::get('show/{id}',         [CatalogueController::class, 'show'])->name('show');
    //         Route::get('{id}/edit',         [CatalogueController::class, 'edit'])->name('edit');
    //         Route::put('{id}/update',       [CatalogueController::class, 'update'])->name('update');
    //         Route::get('{id}/destroy',      [CatalogueController::class, 'destroy'])->name('destroy');

    //     });
    Route::resource('products', ProductController::class);
    //        Route::prefix('products')
    //            ->as('products.')
    //            ->group(function () {
    //                Route::get('/',                 [ProductController::class, 'index'])->name('index');
    //                Route::get('create',            [ProductController::class, 'create'])->name('create');
    //                Route::post('store',            [ProductController::class, 'store'])->name('store');
    //                Route::get('show/{id}',         [ProductController::class, 'show'])->name('show');
    //                Route::get('{id}/edit',         [ProductController::class, 'edit'])->name('edit');
    //                Route::put('{id}/update',       [ProductController::class, 'update'])->name('update');
    //                Route::get('{id}/destroy',      [ProductController::class, 'destroy'])->name('destroy');
    //
    //            });
});
