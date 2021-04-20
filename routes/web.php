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

use App\Http\Controllers\applicationController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
// 注意 Facades を使う事
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;

Route::get('/', 'WelcomeController@index')->name('welcome.index');
Route::get('/show/items/{item}', 'WelcomeController@showItem')->name('welcome.showItem');
Route::get('/show/stores/{store}', 'WelcomeController@showStore')->name('welcome.showStore');

Route::get('/comments', 'CommentController@index')->name('comments.index');
Route::post('/comments/store', 'CommentController@store')->name('comments.store');
Route::get('/applications/{application}/show/result/ajax', 'CommentController@getData')->name('comments.getData');


Route::get('/applications', 'applicationController@index')->name('applications.index');
Route::get('/applications/{application}/show', 'applicationController@show')->name('applications.show');
Route::post('/applications', 'applicationController@store')->name('applications.store');
Route::post('/applications/update', 'applicationController@update')->name('applications.update');


// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

Route::prefix('users')->group(function(){
    Route::group(['middleware' => 'guest:user'], function(){
        Route::get('/login', 'Auth\LoginController@showLoginForm');
        Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
        Route::post('/login', 'Auth\LoginController@login')->name('login');
        Route::post('/register', 'Auth\RegisterController@register')->name('register');
    });

    Route::post('/logout','Auth\LoginController@logout')->name('logout');
    Route::resource('{user}/items', 'ItemController');        
    Route::get('/home', 'HomeController@userIndex')->name('user.home');    
});

Route::prefix('store_owners')->group(function(){
    Route::group(['middleware' => 'guest:store_owner'], function () {
        Route::get('/login', 'Auth\LoginController@showStoreOwnerLoginForm');
        Route::get('/register', 'Auth\RegisterController@showStoreOwnerRegisterForm');
        Route::post('/login', 'Auth\LoginController@storeOwnerLogin')->name('store_owner.login');
        Route::post('/register', 'Auth\RegisterController@createStoreOwner')->name('store_owner.register');        
    });    

    Route::post('/logout','Auth\LoginController@logout')->name('logout');
    Route::resource('{store_owner}/stores', 'StoreController');    
    Route::get('/home', 'HomeController@storeOwnerIndex')->name('store_owners.home');
});

// Route::get('/home', 'HomeController@index')->name('home');

// Route::view('/store_owners', 'store_owner')->middleware('auth:store_owner')->name('store_owner-home');






