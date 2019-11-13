{{-- Este arquivo é referente ao [RFS08] Cadastro de Motorista. Tarefa no Redmine #41 --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Novo Usuário</h1>
@stop

@section('content')

<form method="POST" action="{{ route('motorista.store') }}">

            <!-- TOken para não dar erro de envio de dados -->
            {!! csrf_field() !!}

        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" required>
        </div>

        <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
        </div>

        <div class="form-group">
                <label for="data_nascimento">Data Nascimento:</label>
                <input type="text" class="form-control" id="nome" name="data_nascimento" placeholder="Data Nascimento" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label for="cnh">CNH:</label>
            <input type="text" class="form-control" id="cnh" name="cnh" placeholder="CNH" required>
        </div>

        <div class="form-group">
            <label for="tipo_cnh">Tipo CNH:</label>
            <input type="text" class="form-control" id="tipo_cnh" name="tipo_cnh" placeholder="Tipo CNH" required>
        </div>        

        <div class="form-group">
            <label for="obs">Observação:</label>
            <input type="text" class="form-control" id="obs" name="obs" placeholder="Observação">
        </div>           

        <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>

@stop