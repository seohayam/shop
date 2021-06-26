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

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
// 注意 Facades を使う事
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/login/google/user', 'Auth\LoginController@redirectToGoogle')->name('google.login');
Route::get('/login/google/store_owner', 'Auth\LoginController@redirectToGoogle')->name('google.store_owner');
// Route::get('/login/google/store_owner', 'Auth\LoginController@redirectToGoogle')->name('google.store_owner');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/welcome', 'WelcomeController@index')->name('welcome.index');
// アーキテクチャ検討
Route::get('/welcome/items/show/{item}', 'WelcomeController@showItem')->name('welcome.showItem');
Route::get('/welcome/stores/show/{store}', 'WelcomeController@showStore')->name('welcome.showStore');

Route::get('/comments', 'CommentController@index')->name('comments.index');
Route::post('/comments/store', 'CommentController@store')->name('comments.store');
Route::get('/applications/{application}/show/result/ajax', 'CommentController@getData')->name('comments.getData');


Route::get('/applications', 'ApplicationController@index')->name('applications.index');
Route::get('/applications/{application}/show', 'ApplicationController@show')->name('applications.show');
Route::post('/applications/store', 'ApplicationController@store')->name('applications.store');
Route::post('/applications/update', 'ApplicationController@update')->name('applications.update');


// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

Route::prefix('users')->group(function(){
    Route::group(['middleware' => 'guest:user'], function(){
        Route::get('/login', 'Auth\LoginController@showLoginForm');
        Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
        Route::post('/login', 'Auth\LoginController@login')->name('login');
        Route::post('/register', 'Auth\RegisterController@register')->name('register');
    });

    Route::resource('{user}/items', 'ItemController');
    Route::post('/logout','Auth\LoginController@logout')->name('logout');
    Route::get('/home', 'HomeController@index')->name('home.index');
});

Route::prefix('store_owners')->group(function(){
    Route::group(['middleware' => 'guest:store_owner'], function () {
        Route::get('/login', 'Auth\LoginController@showStoreOwnerLoginForm');
        Route::get('/register', 'Auth\RegisterController@showStoreOwnerRegisterForm');
        Route::post('/login', 'Auth\LoginController@storeOwnerLogin')->name('store_owner.login');
        Route::post('/register', 'Auth\RegisterController@createStoreOwner')->name('store_owner.register');
    });

    Route::resource('{store_owner}/stores', 'StoreController');
    Route::post('/logout','Auth\LoginController@logout')->name('store_owner.logout');
    Route::get('/home', 'HomeController@index')->name('home.index');
});

Route::get('like/{version}/{post}/firstCheck', 'LikeController@firstCheck');
Route::get('like/{version}/{post}/check', 'LikeController@check');






