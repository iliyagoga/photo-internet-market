<?php

use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPage;
Route::get('/', [MainPage::class,'index'] )->name('main');

Auth::routes();
Route::get('/registerEtap2',[App\Http\Controllers\Auth\RegisterEtap2Controller::class,'showEtap2'])->name('showEtap2')
;
Route::post('/regEtap2',[App\Http\Controllers\Auth\RegisterEtap2Controller::class,'create'])->name('etap2');

Route::get('/registerEtap3',[App\Http\Controllers\Auth\RegisterEtap3Controller::class,'showEtap3'])->name('showEtap3')
;
Route::post('/regEtap3',[App\Http\Controllers\Auth\RegisterEtap3Controller::class,'create'])->name('etap3');

Route::get('/home', [App\Http\Controllers\MainPage::class, 'index'])->name('home');

Route::get('/news',[App\Http\Controllers\NewsController::class,'index'])->name('news');

Route::get('/product/{id}',[App\Http\Controllers\ProductController::class,'getProduct'])->name('getProduct');

Route::get('/catalog/{category}/{page}/{price?}',[App\Http\Controllers\ProductController::class,'getProductsByCategory'])->name('category');

Route::get('/c/{page}/{price?}',[App\Http\Controllers\ProductController::class,'getProducts'])->name('catalog');

Route::post('/clearSession',[App\Http\Controllers\ProductController::class,'clearSession'])->name('sess');

Route::post('/clearSession2',[App\Http\Controllers\ProductController::class,'clearSession2'])->name('sess');