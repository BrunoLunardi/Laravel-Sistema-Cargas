<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Motorista;
use App\User;
use DB;
class MotoristaController extends Controller
{
    
    public function index(){
        //$motoristas = Motorista::all()->where('deleted', 'false');

        //relacionamento entre as tabelas motoristas e users (pela id do users)
        $motoristas = DB::table('motoristas')
        ->join('users', 'users.id', '=', 'motoristas.user_id')
        ->get()->where('deleted', 'false');

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

        //retorna view para editar um veiculo selecionado pela id
        public function edit($id){
            //utiliza a model User (app/User.php)
            $motorista = Motorista::find($id);

            //retorna a view de edição (resources/views/motorista/edit.blade.php)
                //passa o motorista para a view via array
            return view('motorista.edit_motorista', array('motorista' => $motorista));     
            
        }    

    //dados fornecidos via PUT do formulário (resources/views/usuario/edit.blade.php)
    //função será acessada pela rota produtos.update passada pelo formulário
    public function update($id, Request $request){

        //localiza o usuario via id fornecida
        $motorista = Motorista::find($id);
        //dados do usuario
        $motorista->cnh = $request->input('cnh');
        $motorista->tipo_cnh = $request->input('tipo_cnh');
        $motorista->obs = $request->input('obs');
        
        //insere os dados no bd
        $motorista->save();

        //redireciona para a pagina index.blade.php de usuario
        return redirect('motorista')->with('success', "Motorista editado com sucesso!");
        
    }        

    //dados fornecidos via PUT do formulário (resources/views/usuario/edit.blade.php)
    //função será acessada pela rota produtos.update passada pelo formulário
    public function logicalDeletion($id){

        //localiza o motorista via id fornecida
        $motorista = Motorista::find($id);
        $usuario = User::find($motorista->user_id);
        

        //dados do usuario
        $motorista->deleted = 'true';
        $usuario->deleted = 'true';
   
        try{
            // Inicia transação com banco de dados
            \DB::beginTransaction();        
            //insere os dados no bd
            if($motorista->save() && $usuario->save()){
            //redireciona para a pagina anterior
            \DB::commit();
            return redirect('motorista')->with('success', "Motorista excluído com sucesso!");
            }
        }catch(exception $e) {
            // Cancela todas as operações em caso de erro
            \DB::rollback();
            return redirect('motorista')->with('error', "Erro ao cadastrar motorista!");
        }


    }        


}
