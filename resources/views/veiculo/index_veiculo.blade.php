{{-- Este arquivo é referente ao [RFS014] Cadastro de Veículos. Tarefa no Redmine #47 --}}
{{-- Este arquivo é referente ao [RFS016] Exclusão de Veículo. Tarefa no Redmine #49 --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Veículo</h1>
@stop

@section('content')

    <!-- aquivo de inclusão está em resources/views/admin/includes -->
    @include('includes.alerts')

<a href="/veiculo/create">
<button type="button" class="btn btn-success pull-right">
    Adicionar veículo
</button>
</a>


{{-- verifica se tem veículos cadastrado no BD --}}
@if(!$veiculos->isEmpty())
<table class="table">
        <thead>
          <tr>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Placa</th>
            <th scope="col">Renavam</th>
            <th scope="col">Ano</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($veiculos as $veiculo)
                <tr>
                    <td>{{$veiculo->marca}}</td>
                    <td>{{$veiculo->modelo}}</td>
                    <td>{{$veiculo->placa}}</td>
                    <td>{{$veiculo->renavam}}</td>
                    <td>{{$veiculo->ano}}</td>
                    <td>
                      <a href="{{url('veiculo/'.$veiculo->id.'/edit')}}">
                        <button class="btn btn-warning" >
                          Editar
                        </button>
                      </a>
                      <a href="{{url('veiculo/'.$veiculo->id.'/logicalDeletion')}}">
                        <button class="btn btn-danger">Excluir</button>
                      </a>
                    </td>
                </tr>
            @endforeach 
@else
  <p>Não tem veículos cadastrado no sistema</p>
@endif

        </tbody>
      </table>

@stop