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
    return view('welcome');
});

Route::get('/usuarios','UsersController@index')
->name('users');
// aqui uso user para recibirlo en la funcion y minimisar codigo
//pero por lo general se pasa el id
Route::get('/usuarios/{user}','UsersController@show')
->where('user','[0-9]+')
->name('users.show');

Route::get('/usuarios/nuevo','UsersController@create')->name('users.create');

Route::post('/usuarios','UsersController@store'); 

Route::get('/usuarios/{user}/editar','UsersController@edit')->name('users.edit');

Route::put('/usuarios/{user}','UsersController@update');

Route::get('/saludo/{name}/{nickname?}','WelcomeUsersControler@index');
Route::delete('/usuarios/{user}','UsersController@destroy')->name('users.destroy');



 