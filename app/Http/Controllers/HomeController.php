<?php

namespace App\Http\Controllers;

use App\Carga;
use App\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    //insere carga no BD
    public function store(Request $request)
    {

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
        if ($carga->save()) {
            //retorna para o index de resources/views/usuario/index.blade.php
            // return redirect('veiculo')->with('success', "Veículo cadastrado com sucesso!");
        } else {
            return redirect('login');
        }

    }

    // lista dados para o modal
    public function dadosModal()
    {
        // $veiculos = new Veiculo();

        // $veiculos = DB::table('veiculos')
        //    ->select('*');

        $veiculos = DB::table('veiculos')->get();
        // $veiculos = Veiculo::all()->where('deleted', 'false');

        return json_encode($veiculos);

        //  ->join('tabela_de_join'....);
    }

}
