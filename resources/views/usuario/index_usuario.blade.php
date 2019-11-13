{{-- Este arquivo é referente ao [RFS05] Cadastro de Demandante. Tarefa no Redmine #38 --}}
 {{-- Este arquivo é referente ao [RFS06] Atualização de Demandante. Tarefa no Redmine #39 --}}

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

<a href="/usuario/create">
<button type="button" class="btn btn-success pull-right">
    Adicionar usuário
</button>
</a>

{{-- verifica se tem usuário cadastrado no BD --}}
@if(!$users->isEmpty())
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
                        <a href="{{url('usuario/'.$user->id.'/edit')}}">
                          <button class="btn btn-warning" >
                            Editar
                          </button>
                        </a>
                        <a href="{{url('usuario/'.$user->id.'/logicalDeletion')}}">
                          <button class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                  </tr>
              @endforeach                     
@else
  <p>Não tem usuários cadastrado no sistema</p>
@endif
        </tbody>
      </table>

@stop