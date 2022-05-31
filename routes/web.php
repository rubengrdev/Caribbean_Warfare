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
Route::resource('shop', 'ProductController')->names('shop')->middleware('auth');
//ruta para eliminar todo el shoppingcart
Route::get('shoppingCart/removeAll', 'ShoppingCartController@removeAll')->name('shoppingCart.removeAll')->middleware('auth');
//ruta para los recursos del carrito
Route::resource('shoppingCart', 'ShoppingCartController')->names('shoppingCart')->middleware('auth');
//ruta para metodos extra de la tienda (ver historial de compras)
Route::get('shop/history', 'ProductController@history')->name('history')->middleware('auth');
//ruta para metodos extra de la tienda ( ver todos los productos de la tienda)
Route::get('all', 'ProductController@all')->name('all')->middleware('auth');
//ruta para buscar items de la tienda
Route::post('shop/search','ProductController@search')->name('product.search')->middleware('auth');


//ruta para los recurso del inventario
Route::resource('inventory', 'InventoryController')->names('inventory')->middleware('auth');
//Ruta de inventory Store, por alguna razón en el recurso previo no se crea esta ruta
Route::post('inventory/buy', 'InventoryController@store')->name('inventory.add')->middleware('auth');
//ruta para añadir el carrito al inventario
Route::post('inventory', 'InventoryController@saveFromCart')->name('inventory.saveFromCart')->middleware('auth');

//ruta para el historial de compras
Route::get('history', 'ShoppingHistoryController@index')->name('history')->middleware('auth');

//ruta para los recursos del usuario
Route::resource('user', 'UserController')->names('user')->middleware('auth');
//ruta para los metodos del administrador
Route::get('admin', 'UserController@admin')->name('admin')->middleware('auth');
Route::put('admin', 'UserController@updateAdmin')->name('admin.update')->middleware('auth');
Route::delete('admin', 'UserController@deleteAdmin')->name('admin.delete')->middleware('auth');
//ruta para obtener el rango del usuario
Route::get('home/rank', 'RankController@fetchRank')->name('rank')->middleware('auth');
//ruta para obtener la puntuación del usuario
Route::get('home/score', 'RankController@fetchScore')->name('rank')->middleware('auth');
//ruta para obtener el JSON de regiones
Route::get('register/regions', 'RegionController@index')->name('regions')->middleware('auth');
//rutas de autenticación
Auth::routes();

//ruta para acceder a la página principal de control del usuario (home)
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('leaderboard', 'LeaderboardController@index')->name('leaderboard')->middleware('auth');
Route::get('leaderboard/getTop', 'LeaderboardController@getTop')->name('leaderboard.getTop')->middleware('auth');
Route::get('lobby', 'LobbyController@findGame')->name('lobby')->middleware('auth');
Route::get('winGame', 'GameController@winGame')->name('winGame')->middleware('auth');

//Route::get('leaderboard', 'LeaderboardController@getTop')->name('getTop');
//Route::get('/shop', 'ShopController@index')->name('shop');
