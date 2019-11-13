<?php
// Este arquivo é referente ao [RFS014] Cadastro de Veículos. Tarefa no Redmine #47
// Este arquivo é referente ao [RFS015] Atualização de Veículo. Tarefa no Redmine #48
// Este arquivo é referente ao [RFS016] Exclusão de Veículo. Tarefa no Redmine #49
namespace App\Http\Controllers;

use App\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    //pagina inicial
    //ref
    public function index()
    {
        $veiculos = Veiculo::all()->where('deleted', 'false');
        return view('veiculo.index_veiculo', compact('veiculos'));
    }

    //retorna view para inserir
    public function create()
    {
        return view('veiculo.store_veiculo');
    }

    //insere veiculo no BD
    public function store(Request $request)
    {

        $veiculo = new Veiculo();

        $veiculo->placa = $request->placa;
        $veiculo->marca = $request->marca;
        $veiculo->modelo = $request->modelo;
        $veiculo->renavam = $request->renavam;
        $veiculo->ano = $request->ano;

        $veiculo->administrador_id = auth()->user()->id;

        //se deu certo a gravação dos dados no BD
        //método save() é herdado da model User
        if ($veiculo->save()) {
            //retorna para o index de resources/views/usuario/index.blade.php
            return redirect('veiculo')->with('success', "Veículo cadastrado com sucesso!");
        } else {
            return redirect('login');
        }

    }

    //retorna view para editar um veiculo selecionado pela id
    public function edit($id)
    {
        //utiliza a model User (app/User.php)
        $veiculo = Veiculo::find($id);

        //retorna a view de edição (resources/views/usuario/edit.blade.php)
        //passa o usuario para a view via array
        return view('veiculo.edit_veiculo', array('veiculo' => $veiculo));

    }

    public function update($id, Request $request)
    {

        //localiza o usuario via id fornecida
        $veiculo = Veiculo::find($id);
        //dados do usuario
        $veiculo->placa = $request->input('placa');
        $veiculo->marca = $request->input('marca');
        $veiculo->modelo = $request->input('modelo');
        $veiculo->renavam = $request->input('renavam');

        //insere os dados no bd
        $veiculo->save();

        //redireciona para a pagina index.blade.php de usuario
        return redirect('veiculo')->with('success', "Veículo editado com sucesso!");

    }

    public function logicalDeletion($id)
    {

        //localiza o usuario via id fornecida
        $veiculo = Veiculo::find($id);
        //dados do usuario
        $veiculo->deleted = 'true';

        //insere os dados no bd
        $veiculo->save();

        //redireciona para a pagina anterior
        return redirect('veiculo')->with('success', "Veículo excluído com sucesso!");

    }

}
