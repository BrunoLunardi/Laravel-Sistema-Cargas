<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsuarioControlller extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('usuario.index', compact('users'));
    }

    public function storeView(){
        return view('usuario.store');
    }

    public function storeUsuario(Request $request){

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


}
