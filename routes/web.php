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

});

Route::resource('producto', 'ControladorProducto');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/producto/create', 'ControladorProducto@create');
    Route::get('/misProductos', 'ControladorProducto@misProductos');
});
