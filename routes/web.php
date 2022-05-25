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
//ruta de la página principal
Route::get('/', function () {
    return view('welcome');
});
//ruta para los recursos de la tienda
Route::resource('shop', 'ProductController')->names('shop');
//ruta para metodos extra de la tienda (ver historial de compras)
Route::get('shop/history', 'ProductController@history')->name('history');
//ruta para metodos extra de la tienda ( ver todos los productos de la tienda)
Route::get('shop/all', 'ProductController@all')->name('all');
//ruta para buscar items de la tienda
Route::post('shop/search','ProductController@search')->name('product.search');

//ruta para los recurso del inventario
Route::resource('inventory', 'InventoryController')->names('inventory');

//ruta para los recursos del usuario
Route::resource('user', 'UserController')->names('user');
//ruta para obtener el rango del usuario mediante la ID
Route::post('rank/{id}', 'RankController@fetchRank')->name('rank');
//ruta para obtener el JSON de regiones
Route::get('register/regions', 'RegionController@index')->name('regions');
//rutas de autenticación
Auth::routes();

//ruta para acceder a la página principal de control del usuario (home)
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('leaderboard', 'LeaderboardController@index')->name('leaderboard');
Route::get('lobby', 'LobbyController@findGame')->name('lobby');

//Route::get('leaderboard', 'LeaderboardController@getTop')->name('getTop');
//Route::get('/shop', 'ShopController@index')->name('shop');
