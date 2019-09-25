@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Motorista</h1>
@stop

@section('content')


    <!-- Verificação de erros do campo value. Esta verificação e feita no BalanceController -->
    <!-- Que invoca o FormRequest app/Http/Requests/MoneyValidationFormRequest -->
    <!-- aquivo de inclusão está em resources/views/admin/includes -->
    @include('includes.alerts')

<a href="/motorista/create">
<button type="button" class="btn btn-success pull-right">
    Adicionar Motorista
</button>
</a>

<table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($motoristas as $motorista)
                <tr>
                    <td>{{$motorista->email}}</td>
                    <td>{{$motorista->cnh}}</td>
                    <td>
                      <a href="{{url('usuario/'.$motorista->id.'/edit')}}">
                        <button class="btn btn-warning" >
                          Editar
                        </button>
                      </a>
                      <a href="{{url('usuario/'.$motorista->id.'/logicalDeletion')}}">
                        <button class="btn btn-danger">Excluir</button>
                      </a>
                    </td>
                </tr>
          @endforeach           
          <tr>

        </tbody>
      </table>

@stop