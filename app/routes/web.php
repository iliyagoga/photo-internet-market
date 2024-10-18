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

Route::get('/news/{id}',[App\Http\Controllers\NewsController::class,'showNewsPage'])->name('newsPage');

Route::post('/comment',[App\Http\Controllers\NewsController::class,'comment'])->name('comment')->middleware('auth');

Route::get('/product/{id}',[App\Http\Controllers\ProductController::class,'getProduct'])->name('getProduct');

Route::get('/catalog/{category}/{page}/{price?}',[App\Http\Controllers\ProductController::class,'getProductsByCategory'])->name('category');

Route::get('/categories',[App\Http\Controllers\CategoryController::class,'showCategoryList'])->name('categories');

Route::get('/c/{page}/{price?}',[App\Http\Controllers\ProductController::class,'getProducts'])->name('catalog');

Route::post('/search/{page}/{price?}',[App\Http\Controllers\SearchController::class,'getSearchProducts'])->name('search');

Route::post('/clearSession',[App\Http\Controllers\ProductController::class,'clearSession'])->name('sess');

Route::post('/clearSession2',[App\Http\Controllers\ProductController::class,'clearSession2'])->name('sess');

Route::get( '/profile',[App\Http\Controllers\ProfileController::class,'showProfile'])->name('profile')->middleware('auth');

Route::post( '/updateProfile',[App\Http\Controllers\ProfileController::class,'updateProfile'])->name('updateProfile')->middleware('auth');

Route::post( '/logout',[App\Http\Controllers\ProfileController::class,'logout'])->name('logout')->middleware('auth');

Route::post('/addToCart',[App\Http\Controllers\BasketController::class,'addToCart'])->name('addToCart')->middleware('auth');

Route::get('/cart',[App\Http\Controllers\BasketController::class,'showCart'])->name('showCart')->middleware('auth');

Route::get('/redactDates',[App\Http\Controllers\BasketController::class,'redactDates'])->name('redactDates')->middleware('auth');

Route::get('/deleteFromCart/{product_id}',[App\Http\Controllers\BasketController::class,'deleteFromCart'])->name('deleteFromCart')->middleware('auth');

Route::post('/showPreOrder',[App\Http\Controllers\BasketController::class,'showPreOrder'])->name('showPreOrder')->middleware('auth');

Route::post('/createOrder',[App\Http\Controllers\OrderController::class,'createOrder'])->name('createOrder')->middleware('auth');

Route::post('/addElect',[App\Http\Controllers\ElectController::class,'addElect'])->name('addElect')->middleware('auth');

Route::get('/deleteFromElect/{product_id}',[App\Http\Controllers\ElectController::class,'deleteElect'])->name('deleteElect')->middleware('auth');

Route::get('/favourite',[App\Http\Controllers\ElectController::class,'showElect'])->name('favourite')->middleware('auth');


Route::controller(App\Http\Controllers\AdminController::class)->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/panel/{id?}','showPanel')->name('panel');
        Route::get('/panel/product/{id?}','showProduct')->name('product_panel');
        Route::get('/panel/category/{id?}','showCategory')->name('category_panel');
        Route::post('api/del/category','delCategory')->name('delCategory');
        Route::post('api/red/category','redCategory')->name('redCategory');
        Route::post('api/add/category','addCategory')->name('addCategory');
        Route::post('api/red/attr','redAttr')->name('redAttr');
        Route::post('api/add/attr','addAttr')->name('addAttr');
        Route::post('api/red/product','redProduct')->name('redProduct');
    });
});