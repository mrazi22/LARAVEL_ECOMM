<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

Route::get('/',[HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class, 'redirect'])->name('redirect');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::get('/view_category',[AdminController::class,'view_category'])->name('view_category');
Route::post('/add_category',[AdminController::class,'add_category'])->name('add_category');
Route::get('/delete_category/{id}',[AdminController::class,'delete_category'])->name('delete_category');

Route::get('/view_product',[AdminController::class,'view_product'])->name('view_product');
Route::get('/show_product',[AdminController::class,'show_product'])->name('show_product');
Route::POST('/add_product',[AdminController::class,'add_product'])->name('add_product');
Route::get('/delete_product/{id}',[AdminController::class,'delete_product'])->name('delete_product');
Route::get('/edit_product/{id}',[AdminController::class,'edit_product'])->name('edit_product');
Route::post('/update_product/{id}',[AdminController::class,'update_product'])->name('update_product');
Route::get('/view_order',[AdminController::class,'view_order'])->name('view_order');


Route::get('/update_status/{id}',[AdminController::class,'update_status'])->name('update_status');


//
Route::get('/ProductDetails/{id}',[HomeController::class,'ProductDetails'])->name('ProductDetails');
Route::POST('/addCart/{id}',[HomeController::class,'addCart'])->name('addCart');
Route::get('/show_cart',[HomeController::class,'show_cart'])->name('show_cart');
Route::get('/destroy_cart/{id}',[CartController::class,'destroy_cart'])->name('destroy_cart');
Route::get('/Cash_pay',[HomeController::class,'Cash_pay'])->name('Cash_pay');
Route::get('/stripe/{totalprice}',[HomeController::class,'stripe'])->name('stripe');
Route::get('/show_maji',[HomeController::class,'show_maji'])->name('show_maji');


Route::post('stripe/{totalprice}',  [HomeController::class, 'stripePost'])->name('stripe.post');



