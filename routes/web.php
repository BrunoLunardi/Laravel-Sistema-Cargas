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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('usuario', 'UsuarioControlller');
Route::get('/usuario', 'UsuarioControlller@index')->name('usuario');
Route::get('/usuario/store_view', 'UsuarioControlller@storeView')->name('usuario_store_view');
Route::post('/usuario/store_usuario', 'UsuarioControlller@store')->name('usuario_store');
Route::get('/usuario/{id}/edit', 'UsuarioControlller@edit');