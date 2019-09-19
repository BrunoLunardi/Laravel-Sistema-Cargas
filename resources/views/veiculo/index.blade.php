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

<table class="table">
        <thead>
          <tr>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Placa</th>
            <th scope="col">Renavam</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($veiculos as $veiculo)
                <tr>
                    <td>{{$veiculo->placa}}</td>
                    <td>{{$veiculo->marca}}</td>
                    <td>{{$veiculo->modelo}}</td>
                    <td>{{$veiculo->renavam}}</td>
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
          <tr>

        </tbody>
      </table>

@stop