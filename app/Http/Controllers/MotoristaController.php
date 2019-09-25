<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Motorista;
use App\User;

class MotoristaController extends Controller
{
    
    public function index(){
        $motoristas = Motorista::all();//->where('deleted', 'false');

        return view('motorista.index_motorista', compact('motoristas'));
        //return view('motorista.index_motorista');
    }

    //retorna view para inserir
    public function create(){
        return view('motorista.store_motorista');
    }   

    //insere motorista no BD
    public function store(Request $request){

        try{
            // Inicia transação com banco de dados
            \DB::beginTransaction();

            //dados do usuário motorista
            $user = new User();
            $user->name = $request->nome;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            ///dados específicos do motorista
            $motorista = new Motorista();
            $motorista->cnh = $request->cnh;
            $motorista->tipo_cnh = $request->tipo_cnh;
            $motorista->obs = $request->obs;
            $motorista->administrador_id = auth()->user()->id;

            print_r($motorista->cnh);


            //se deu certo a gravação dos dados no BD
            //método save() é herdado da model User
            if($user->save()){
                $motorista->user_id = $user->id;
                if($motorista->save()){
                                // Efetiva todas as operações
                    \DB::commit();
                    //retorna para o index de resources/views/usuario/index.blade.php
                    return redirect('motorista')->with('success', "Motorista cadastrado com sucesso!");
                }
            }
            else{
                return redirect ('login');
            }

        }catch(exception $e) {
            // Cancela todas as operações em caso de erro
            \DB::rollback();
            return redirect('motorista')->with('error', "Não cadastrou motorista!");
        }

    }


}
