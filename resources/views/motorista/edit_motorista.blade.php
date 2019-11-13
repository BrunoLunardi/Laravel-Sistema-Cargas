{{-- Este arquivo é referente ao [RFS09] Atualização de Motorista. Tarefa no Redmine #42 --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuário</h1>
@stop

@section('content')


{{Form::open(['route'=>['motorista.update', $motorista->id],
'enctype'=>'multipart/form-data', 'method'=>'PUT'])}}

<!-- TOken para não dar erro de envio de dados -->
{!! csrf_field() !!}

{{Form::label('cnh', 'CNH', ['class'=>'prettyLabels'])}}
{{Form::text('cnh', $motorista->cnh, ['class' => 'form-control', 
'required', 'placeholder' => 'Cnh'])}}

{{Form::label('tipo_cnh', 'Tipo CNH')}}
{{Form::text('tipo_cnh', $motorista->tipo_cnh, ['class' => 'form-control', 
'required', 'placeholder' => 'Tipo CNH'])}}        

{{Form::label('obs', 'Observação')}}
{{Form::text('obs', $motorista->obs, ['class' => 'form-control', 
'required', 'placeholder' => 'Observação'])}}   

<br/>
{{Form::submit('Alterar!', ['class' => 'btn btn-default'])}}
{{Form::close()}}



@stop