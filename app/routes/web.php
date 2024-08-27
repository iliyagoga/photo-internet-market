<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPage;

Route::get('/', [MainPage::class,'index'] )->name('main');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


