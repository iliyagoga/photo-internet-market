<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPage;

Route::get('/', [MainPage::class,'index'] )->name('main');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/news',[App\Http\Controllers\NewsController::class,'index'])->name('news');

Route::get('/product/{id}',[App\Http\Controllers\ProductController::class,'getProduct'])->name('getProduct');

Route::get('/catalog/{category}/{page}/{price?}',[App\Http\Controllers\ProductController::class,'getProductsByCategory'])->name('category');

Route::get('/c/{page}/{price?}',[App\Http\Controllers\ProductController::class,'getProducts'])->name('catalog');

Route::post('/clearSession',[App\Http\Controllers\ProductController::class,'clearSession'])->name('sess');

Route::post('/clearSession2',[App\Http\Controllers\ProductController::class,'clearSession2'])->name('sess');