<?php
// Este arquivo é referente ao [RFS01] Cadastro de cargas. Tarefa no Redmine #34
// Este arquivo é referente ao [RFS02] Visualização de cargas. Tarefa no Redmine #35
// Este arquivo é referente ao [RFS05] Cadastro de Demandante. Tarefa no Redmine #38

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

});

Auth::routes();

Route::get('/logout' , 'Auth\LoginController@logout')->name('teste');