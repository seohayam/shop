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


use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
// 注意 Facades を使う事
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/items', 'ItemController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
