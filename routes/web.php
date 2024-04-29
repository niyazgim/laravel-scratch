<?php

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
    return view('pages.welcome');
})->name('home');

Route::controller(\App\Http\Controllers\RegLogController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'create');
        Route::post('/register', 'register');

        Route::get('/login', 'edit')->name('login');
        Route::post('/login', 'login');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout');
    });
});


Route::get('/catalog', function () {
    return view('pages.catalog', ['products' => \App\Models\Product::all()]);
})->name('catalog');

Route::get('/catalog/{id}', function ($id) {
    return view('pages.product.product', ['product' => \App\Models\Product::findOrFail($id)]);
})->name('product');

Route::middleware('admin')->group(function () {
    Route::get('/category', function () {
        return view('pages.category.home', ['categories' => \App\Models\ProductCategory::all()]);
    })->name('categories');
    Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
        Route::get('/product/create', 'create')->name('product.create');
        Route::post('/product/store', 'store')->name('product.store');
        Route::get('/product/{id}/edit', 'edit')->name('product.edit');
        Route::patch('/product/{id}', 'update')->name('product.update');
        Route::delete('/product/{id}', 'destroy')->name('product.destroy');
    });
    Route::controller(\App\Http\Controllers\ProductCategoryController::class)->group(function () {
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/{id}/edit', 'edit')->name('category.edit');
        Route::patch('/category/{id}', 'update')->name('category.update');
        Route::delete('/category/{id}', 'destroy')->name('category.destroy');
    });
});
