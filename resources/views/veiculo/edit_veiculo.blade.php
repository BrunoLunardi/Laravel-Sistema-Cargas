{{-- Este arquivo é referente ao [RFS015] Atualização de Veículo. Tarefa no Redmine #48 --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Veículo</h1>
@stop

@section('content')


{{Form::open(['route'=>['veiculo.update', $veiculo->id],
'enctype'=>'multipart/form-data', 'method'=>'PUT'])}}

<!-- TOken para não dar erro de envio de dados -->
{!! csrf_field() !!}

{{Form::label('placa', 'Placa', ['class'=>'prettyLabels'])}}
{{Form::text('placa', $veiculo->placa, ['class' => 'form-control', 
'required', 'placeholder' => 'Placa'])}}

{{Form::label('marca', 'Marca')}}
{{Form::text('marca', $veiculo->marca, ['class' => 'form-control', 
'required', 'placeholder' => 'Marca'])}}        

{{Form::label('modelo', 'Modelo')}}
{{Form::text('modelo', $veiculo->modelo, ['class' => 'form-control', 
'required', 'placeholder' => 'Modelo'])}}   

{{Form::label('renavam', 'Renavam')}}
{{Form::text('renavam', $veiculo->renavam, ['class' => 'form-control', 
'required', 'placeholder' => 'Renavam'])}}   


<br/>
{{Form::submit('Alterar!', ['class' => 'btn btn-default'])}}
{{Form::close()}}



@stop