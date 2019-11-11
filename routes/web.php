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

Route::get('/', function () {
    return 'home';
});

Route::get('/usuarios','UsersController@index');
Route::get('/usuarios/{id}','UsersController@show')->where('id','[0-9]+');

Route::get('/usuarios/nuevo','UsersController@create');

Route::get('/saludo/{name}/{nickname?}', function ($name, $nickname= null) {
	$name=ucfirst($name);
    if ($nickname) {
    	return "bienvenido {$name}, tu apodo es {$nickname}";
    }else{
    	return "bienvenido {$name}, no tienes apodo";
    }
});



