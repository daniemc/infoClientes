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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/departamentos/{id_pais}', function($idPais){
    return App\paises::find($idPais)->departamentos;
});
Route::get('/ciudades/{id_departamento}', function($idDepartamento){
    return App\departamentos::find($idDepartamento)->ciudades;
});

Route::resource("cliente", "clienteController");
Route::resource("usuario", "UsuarioController");