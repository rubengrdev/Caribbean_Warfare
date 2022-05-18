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

//get de la tienda (nos devuelve la vista de la tienda y todos los productos mediante el function Index)
Route::get('/shop', 'ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
