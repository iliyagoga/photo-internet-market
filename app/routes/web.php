<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPage;

Route::get('/', [MainPage::class,'index'] )->name('main');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/news',[App\Http\Controllers\NewsController::class,'index'])->name('news');

Route::get('/product/{id}',[App\Http\Controllers\ProductController::class,'getProduct'])->name('getProduct');

Route::get('/catalog/{category}',[App\Http\Controllers\ProductController::class,'getProductsByCategory'])->name('catalog');

