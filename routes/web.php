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

Route::get('/', 'ControladorFrontal@main');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin', 'ControladorFrontal@admin');

Route::resource('usuario','ControladorUsuario');
Route::resource('producto','ControladorProducto');

Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return 'ControladorFrontal@admin';
}]);
