{{-- Este arquivo é referente ao [RFS014] Cadastro de Veículos. Tarefa no Redmine #47 --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Novo Veículo</h1>
@stop

@section('content')

<form method="POST" action="{{ route('veiculo.store') }}">

            <!-- TOken para não dar erro de envio de dados -->
            {!! csrf_field() !!}

        <div class="form-group">
            <label for="placa">Placa:</label>
            <input type="text" class="form-control" name="placa" id="placa"  maxlength=7 placeholder="Digite a Placa no formato AAA1234">
        </div>

        <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca">
        </div>

        <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo">
        </div>

        <div class="form-group">
                <label for="ano">Ano:</label>
                <input type="number" step="1" class="form-control" id="ano" name="ano"  placeholder="Ano">
        </div>

        <div class="form-group">
          <label for="renavam">Renavam:</label>
          <input type="number" class="form-control" id="renavam" name="renavam"  placeholder="Renavam">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>

</form>


@stop