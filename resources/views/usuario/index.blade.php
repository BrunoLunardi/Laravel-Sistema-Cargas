@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuário</h1>
@stop

@section('content')


    <!-- Verificação de erros do campo value. Esta verificação e feita no BalanceController -->
    <!-- Que invoca o FormRequest app/Http/Requests/MoneyValidationFormRequest -->
    <!-- aquivo de inclusão está em resources/views/admin/includes -->
    @include('includes.alerts')

<a href="/usuario/store_view">
<button type="button" class="btn btn-success pull-right">
    Adicionar usuário
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
            @foreach ($users as $user)
          <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                  <button class="btn btn-warning">Editar</button>
                  <button class="btn btn-danger">Excluir</button>
              </td>
          </tr>
          @endforeach           
          <tr>

        </tbody>
      </table>

@stop