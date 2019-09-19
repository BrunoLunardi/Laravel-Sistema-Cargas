<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsuarioControlller extends Controller
{
    //
    public function index(){
        $users = User::all()->where('deleted', 'false');
        return view('usuario.index', compact('users'));
    }

    public function storeView(){
        return view('usuario.store');
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
            return view('usuario.edit', array('usuario' => $usuario));     
    }


    //dados fornecidos via PUT do formulário (resources/views/usuario/edit.blade.php)
    //função será acessada pela rota produtos.update passada pelo formulário
    public function update($id, Request $request){

            //localiza o usuario via id fornecida
            $usuario = User::find($id);
            //dados do usuario
            $usuario->name = $request->input('name');
            $usuario->email = $request->input('email');
            
            //insere os dados no bd
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
        
        //insere os dados no bd
        $usuario->save();

        //redireciona para a pagina anterior
        return redirect('usuario')->with('success', "Usuário excluído com sucesso!");
        
    }    



}
