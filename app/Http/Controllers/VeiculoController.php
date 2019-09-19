<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Veiculo;

class VeiculoController extends Controller
{
    //pagina inicial

        public function index(){
            $veiculos = Veiculo::all();
            return view('veiculo.index', compact('veiculos'));
        }


        public function storeView(){
            return view('veiculo.store_veiculo');
        }        


        public function store(Request $request){

            $veiculo = new Veiculo();
    
            $veiculo->placa = $request->placa;
            $veiculo->marca = $request->marca;
            $veiculo->modelo = $request->modelo;
            $veiculo->renavam = $request->renavam;

            $veiculo->administrador_id = auth()->user()->id;
    
            //se deu certo a gravação dos dados no BD
            //método save() é herdado da model User
            if($veiculo->save()){
                //retorna para o index de resources/views/usuario/index.blade.php
                return redirect('veiculo')->with('success', "Veículo cadastrado com sucesso!");
            }
            else{
                return redirect ('login');
            }
    
        }
    
        public function edit($id){
            //utiliza a model User (app/User.php)
            $veiculo = Veiculo::find($id);

            //retorna a view de edição (resources/views/usuario/edit.blade.php)
                //passa o usuario para a view via array
            return view('veiculo.edit', array('veiculo' => $veiculo));     
            
    }

    public function update($id, Request $request){

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



}
