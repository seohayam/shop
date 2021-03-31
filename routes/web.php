<?php

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

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
// 注意 Facades を使う事
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', 'WelcomeController@index');

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/items', 'ItemController');


Route::prefix('store_owner')->group(function(){
    Route::group(['middleware' => 'guest:store_owner'], function () {
        Route::get('/login', 'Auth\LoginController@showStoreOwnerLoginForm');
        Route::get('/register', 'Auth\RegisterController@showStoreOwnerRegisterForm');
        Route::post('/login', 'Auth\LoginController@storeOwnerLogin')->name('store_owner.login');
        Route::post('/register', 'Auth\RegisterController@createStoreOwner')->name('store_owner-register');        
    });    

    Route::resource('/stores', 'StoreController');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::view('/store_owner', 'store_owner')->middleware('auth:store_owner')->name('store_owner-home');


Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
