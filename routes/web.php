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

//cria grupo de rotas (para garantir que só usuários autenticados acessarão estas rotas)
//'middleware' => 'auth' filtro para altenticação
//'namespace' => 'Admin' evita usar \Admin em todas os Controllers
//'prefix' => 'admin' evita colocar admin em todas as rotas
Route::group(['middleware' => ['auth']], function(){

    

    Route::get('/home', 'HomeController@index')->name('home');

    //rotas para usuário
    Route::resource('usuario', 'UsuarioControlller');
    Route::get('/usuario', 'UsuarioControlller@index')->name('usuario');
    Route::get('/usuario/store_view', 'UsuarioControlller@storeView')->name('usuario_store_view');
    Route::post('/usuario/store_usuario', 'UsuarioControlller@store')->name('usuario_store');
    Route::get('/usuario/{id}/edit', 'UsuarioControlller@edit');
    Route::get('/usuario/{id}/logicalDeletion', 'UsuarioControlller@logicalDeletion');

    //rotas para veículos
    Route::get('/veiculo', 'VeiculoController@index')->name('veiculo');
    //editar
    Route::get('/veiculo/{id}/edit', 'VeiculoController@edit');
    //Route::resource('veiculo', 'VeiculoController');
    Route::get('/veiculo/store_view_veiculo', 'VeiculoController@storeView')->name('store_view_veiculo');

    Route::post('/veiculo/veiculo_store', 'VeiculoController@store')->name('veiculo_store');
    

    
});

Auth::routes();