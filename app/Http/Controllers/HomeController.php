<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carga;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home');
    }




        //insere veiculo no BD
        public function store(Request $request){

            $carga = new Carga();
    
            $teste = json_decode($request->pos);

            $carga->latitude = $teste->lat;
            $carga->longitude = $teste->lon;
            
            $carga->veiculo_id = 2;
            $carga->demandante_id = 1;
            $carga->descricao_carga = "1";

            $carga->data_entrega = "2010-05-05";
    
            //se deu certo a gravação dos dados no BD
            //método save() é herdado da model User
            if($carga->save()){
                //retorna para o index de resources/views/usuario/index.blade.php
                // return redirect('veiculo')->with('success', "Veículo cadastrado com sucesso!");
            }
            else{
                 return redirect ('login');
            }
    
        }
    

}
