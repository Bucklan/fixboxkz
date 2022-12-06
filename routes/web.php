<?php

use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GiftController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Auth2\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('layouts.adminhead');
    return redirect()->route('gift.index');
});Route::get('/test', function () {
//    return view('layouts.adminhead');


});
Route::middleware('auth')->group(function (){
    Route::post('/cart/{gift}/putToCart',[CartController::class,'putToCart'])->name('cart.puttocart');
    Route::post('/cart/{gift}/deleteFromCart',[CartController::class,'deleteFromCart'])->name('cart.deletefromcart');
//    Route::post('/cart/deleteallcart',[CartController::class,'deleteallcart'])->name('cart.deleteallcart');
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart',[CartController::class,'buy'])->name('cart.buy');
    Route::post('/gift/{gift}/like',[GiftController::class,'like'])->name('gifts.like');
    Route::post('/gift/{gift}/rate',[GiftController::class,'rate'])->name('gifts.rate');
    Route::post('/gift/{gift}/unrate',[GiftController::class,'unrate'])->name('gifts.unrate');
    Route::resource('/gift',GiftController::class)->except('index','show','giftByCategory');
    Route::post('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/gift/profile',[LoginController::class,'profile'])->name('profile.form');
    Route::post('/gift/profile',[LoginController::class,'profile'])->name('profile');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:ADMIN,PARTNER,MODERATOR')->group(function () {
        Route::resource('categories',CategoryController::class);
        Route::get('gifts',[UserController::class,'gifts'])->name('users.gifts');
        Route::get('gifts/search', [UserController::class, 'gifts'])->name('gifts.search');
        Route::middleware('hasrole:ADMIN')->group(function () {
            Route::get('/users',[UserController::class,'index'])->name('users.index');
            Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
            Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
            Route::get('/cart',[UserController::class,'cart'])->name('cart.index');
            Route::put('/cart/{cart}/confirm',[UserController::class,'confirm'])->name('cart.confirm');
        });
    });

});
Route::resource('/gift',GiftController::class)->only('index','show','giftByCategory');

Route::get('/gift/category/{category}', [GiftController::class, 'giftByCategory'])->name('gift.category');
Route::resource('comments',CommentController::class);

Auth::routes();

Route::get('/register',[RegisterController::class,'create'])->name('register.form');
Route::post('/register',[RegisterController::class,'register'])->name('register');


Route::get('/login',[LoginController::class,'create'])->name('login.form');
Route::post('/login',[LoginController::class,'login'])->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
