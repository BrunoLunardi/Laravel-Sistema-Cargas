<?php
// Este arquivo é referente ao [RFS01] Cadastro de cargas. Tarefa no Redmine #34
// Este arquivo é referente ao [RFS02] Visualização de cargas. Tarefa no Redmine #35
// Este arquivo é referente ao [RFS05] Cadastro de Demandante. Tarefa no Redmine #38
// Este arquivo é referente ao [RFS06] Atualização de Demandante. Tarefa no Redmine #39
// Este arquivo é referente ao [RFS07] Exclusão de Demandante. Tarefa no Redmine #40
// Este arquivo é referente ao [RFS08] Cadastro de Motorista. Tarefa no Redmine #41
// Este arquivo é referente ao [RFS09] Atualização de Motorista. Tarefa no Redmine #42
// Este arquivo é referente ao [RFS010] Exclusão de Motorista. Tarefa no Redmine #43
// Este arquivo é referente ao [RFS011] Cadastro de Administrador. Tarefa no Redmine #44
// Este arquivo é referente ao [RFS012] Atualização de Administrador. Tarefa no Redmine #45
// Este arquivo é referente ao [RFS013] Exclusão de Administrador. Tarefa no Redmine #46
// Este arquivo é referente ao [RFS014] Cadastro de Veículos. Tarefa no Redmine #47
// Este arquivo é referente ao [RFS015] Atualização de Veículo. Tarefa no Redmine #48
// Este arquivo é referente ao [RFS016] Exclusão de Veículo. Tarefa no Redmine #49
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
    Route::post('/home', 'HomeController@store')->name('home');

    //rotas para usuário
    Route::get('/usuario/{id}/logicalDeletion', 'UsuarioControlller@logicalDeletion');
    Route::resource('usuario', 'UsuarioControlller');

    //Veiculos
    Route::get('/veiculo/{id}/logicalDeletion', 'VeiculoController@logicalDeletion');
    Route::resource('veiculo', 'VeiculoController');

    //Motoristas
    Route::resource('motorista', 'MotoristaController');
    Route::get('/motorista/{id}/logicalDeletion', 'MotoristaController@logicalDeletion');

    //Modal
    Route::get('/modalVeiculo', 'HomeController@dadosModalVeiculo')->name('modalVeiculo');
    Route::get('/modalMotorista', 'HomeController@dadosModalMotorista')->name('modalMotorista');

    //Carga
    Route::post('/salvaCarga', 'HomeController@store')->name('salvaCarga');
    Route::post('/atualizaCarga', 'HomeController@updateCarga')->name('atualizaCarga');
    Route::get('/dadosMapsCarga', 'HomeController@dadosMapsCarga')->name('dadosMapsCarga');

    Route::get('/getDadosUser', 'UsuarioControlller@getDados')->name('getDadosUser');


});

Auth::routes();

Route::get('/logout' , 'Auth\LoginController@logout')->name('teste');