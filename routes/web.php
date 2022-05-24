<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::resource('shop', 'ProductController')->names('shop');
Route::resource('inventory', 'InventoryController')->names('inventory');

Route::get('register/regions', 'RegionController@index')->name('regions');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');



Route::get('leaderboard', 'LeaderboardController@index')->name('leaderboard');

//Route::get('leaderboard', 'LeaderboardController@getTop')->name('getTop');
//Route::get('/shop', 'ShopController@index')->name('shop');
