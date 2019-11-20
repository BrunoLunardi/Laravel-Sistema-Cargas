<?php

// Este arquivo é referente ao [RFS01] Cadastro de cargas. Tarefa no Redmine #34
// Este arquivo é referente ao [RFS02] Visualização de cargas. Tarefa no Redmine #35
// Este arquivo é referente ao [RFS03] Atualização de cargas. Tarefa no Redmine #36
// Este arquivocode class=""> Exclusão de cargas. Tarefa no Redmine #37
// Este arquivo é referente ao [RFS011] Cadastro de Administrador. Tarefa no Redmine #44
// Este arquivo é referente ao [RFS012] Atualização de Administrador. Tarefa no Redmine #45
namespace App\Http\Controllers;

use App\Carga;
use App\DadosCargas;
use App\Veiculo;
use App\Motorista;
use App\User;
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

        try{
            // Inicia transação com banco de dados
            \DB::beginTransaction();

        $carga = new Carga();

        //$teste = json_decode($request->pos);

        $carga->descricao_carga = $request->obs;
        $carga->status = "pendente";
        $carga->latitude = $request->lat;
        $carga->longitude = $request->lon;
        $carga->data_entrega = null;
        $carga->demandante_id = auth()->user()->id;

        //se deu certo a gravação dos dados no BD
        //método save() é herdado da model User
        if ($carga->save()) {
            $dadosCargas = new DadosCargas();
        
            $dadosCargas->carga_id = $carga->id;
            $dadosCargas->veiculo_id = $request->comboVeiculos;
            $dadosCargas->motoristas_id = $request->comboMotoristas;
            if($dadosCargas->save()){                
                \DB::commit();
                return redirect('home')->with('success', "Carga cadastrada com sucesso!");
            }
        } else {
            return redirect('login');
        }

    }catch(exception $e) {
        // Cancela todas as operações em caso de erro
        \DB::rollback();
        return redirect('home')->with('error', "Erro ao cadastrar a carga!");
    }        

    }

    // lista dados de veiculos para o modal
    public function dadosModalVeiculo()
    {
        $veiculos = DB::table('veiculos')->where('deleted', 'false')->get();
        return json_encode($veiculos);
    }

    public function dadosModalMotorista(){
        //relacionamento entre as tabelas motoristas e users (pela id do users)
        // $motoristas = DB::table('motoristas')
        // ->join('users', 'users.id', '=', 'motoristas.user_id')
        // ->get()->where('deleted', 'false');
        $motoristas = DB::table('users')
        ->join('motoristas', 'motoristas.user_id', '=', 'users.id')
        ->get()->where('deleted', 'false');        

        return json_encode($motoristas);
    }

}
