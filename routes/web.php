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

Route::get('/', 'HomeController@index')->name('home');

route::get('search', 'HomeController@search')->name('search');

route::get('search-categorie', 'HomeController@searchCategorie')->name('search-categorie');

/*route::get('filter', 'HomeController@filter')->name('filter');*/

Route::get('productos/{producto}', 'ProductoController@show')->name('productos.show');

Auth::routes();

Route::middleware(['auth'])->group(function(){

    //Vender
        //Crear la venta y agregarle imagenes
        Route::get('vender', 'VentaController@create')->name('ventas.create');
        Route::get('vender/images/{producto}', 'VentaController@images')->name('ventas.Images');
        //Guardar el form de ventas y de imagenes
        Route::post('vender', 'VentaController@store')->name('ventas.store');
        Route::post('vender/images/', 'VentaController@storeImages')->name('ventas.storeImages');

});