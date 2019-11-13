{{-- Este arquivo é referente ao [RFS05] Cadastro de Demandante. Tarefa no Redmine #38 --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Novo Usuário</h1>
@stop

@section('content')

<form method="POST" action="{{ route('usuario.store') }}">

            <!-- TOken para não dar erro de envio de dados -->
            {!! csrf_field() !!}

        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF">
        </div>

        <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>

        <div class="form-group">
                <label for="data_nascimento">Data Nascimento:</label>
                <input type="text" class="form-control" id="nome" name="data_nascimento" placeholder="Data Nascimento">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>


@stop