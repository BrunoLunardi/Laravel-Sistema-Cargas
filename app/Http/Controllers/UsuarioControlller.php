<?php
// Este arquivo é referente ao [RFS05] Cadastro de Demandante. Tarefa no Redmine #38
// Este arquivo é referente ao [RFS06] Atualização de Demandante. Tarefa no Redmine #39
// Este arquivo é referente ao [RFS07] Exclusão de Demandante. Tarefa no Redmine #40
// Este arquivo é referente ao [RFS011] Cadastro de Administrador. Tarefa no Redmine #44
// Este arquivo é referente ao [RFS012] Atualização de Administrador. Tarefa no Redmine #45
// Este arquivo é referente ao [RFS013] Exclusão de Administrador. Tarefa no Redmine #46
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsuarioControlller extends Controller
{
    //
    public function index(){
        $users = User::all()->where('deleted', 'false');
        return view('usuario.index_usuario', compact('users'));
    }

    public function create(){
        return view('usuario.store_usuario');
    }

    public function store(Request $request){

        $user = new User();

        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        //echo $request->password;


        //se deu certo a gravação dos dados no BD
        //método save() é herdado da model User
        if($user->save()){
            //retorna para o index de resources/views/usuario/index.blade.php
            return redirect('usuario')->with('success', "Usuário cadastrado com sucesso!");
        }
        else{
            return redirect ('login');
        }

    }

    public function edit($id){
            //utiliza a model User (app/User.php)
            $usuario = User::find($id);

            //retorna a view de edição (resources/views/usuario/edit.blade.php)
                //passa o usuario para a view via array
            return view('usuario.edit_usuario', array('usuario' => $usuario));     
    }


    //dados fornecidos via PUT do formulário (resources/views/usuario/edit.blade.php)
    //função será acessada pela rota produtos.update passada pelo formulário
    public function update($id, Request $request){

            //localiza o usuario via id fornecida
            $usuario = User::find($id);
            //dados do usuario
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');

            $usuario->save();

            //redireciona para a pagina index.blade.php de usuario
            return redirect('usuario')->with('success', "Usuário editado com sucesso!");
            
    }

    //dados fornecidos via PUT do formulário (resources/views/usuario/edit.blade.php)
    //função será acessada pela rota produtos.update passada pelo formulário
    public function logicalDeletion($id){

        //localiza o usuario via id fornecida
        $usuario = User::find($id);
        //dados do usuario
        $usuario->deleted = 'true';

        //altera o email para concatenar (evitar o unique no bd quando usar o mesmo email novamente)
        $usuario->email = $usuario->email.date("YmdHis");
        $usuario->password = $usuario->password.date("YmdHis");
        $usuario->name = $usuario->name.date("YmdHis");
        //insere os dados no bd        

        if($usuario->save()){        
            if($usuario->id == auth()->user()->id){
                return redirect('logout');
            }else{
                return redirect('usuario')->with('success', "Usuário excluído com sucesso!");            
            }
        }else{
            //redireciona para a pagina anterior
            return redirect('usuario')->with('error', "Erro ao excluir usuário!");            
        }
    }    



}
