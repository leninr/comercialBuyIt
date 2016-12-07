<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'ControladorFrontal@main')->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('usuario','ControladorUsuario');

Route::group(['middleware' => 'comercialBuyIt\Http\Middleware\Admin'], function()
{
    Route::get('/admin', function()
    {
        return view('admin.menuAdmin');
    });

    Route::resource('tipoProducto', 'ControladorTipoProducto');
});

Route::resource('producto', 'ControladorProducto');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/producto/create', 'ControladorProducto@create');
    Route::get('/misProductos', 'ControladorProducto@misProductos');
    Route::get('/editMe', 'ControladorUsuario@editMe');
    Route::get('/addToCart/{idProducto}',[
      'as' => 'producto.addToCart',
      'uses' => 'ControladorProducto@addToCart'
    ]);
    Route::get('/vaciarCarro',[
      'as' => 'producto.vaciarCarro',
      'uses' => 'ControladorProducto@vaciarCarro'
    ]);
    Route::get('/checkout',[
      'as' => 'producto.checkout',
      'uses' => 'ControladorProducto@checkout'
    ]);
});
