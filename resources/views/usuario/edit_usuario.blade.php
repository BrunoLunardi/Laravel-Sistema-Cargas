{{-- Este arquivo é referente ao [RFS05] Cadastro de Demandante. Tarefa no Redmine #38 --}}
{{-- Este arquivo é referente ao [RFS06] Atualização de Demandante. Tarefa no Redmine #39 --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuário</h1>
@stop

@section('content')


{{Form::open(['route'=>['usuario.update', $usuario->id],
'enctype'=>'multipart/form-data', 'method'=>'PUT'])}}

<!-- TOken para não dar erro de envio de dados -->
{!! csrf_field() !!}

{{Form::label('cpf', 'CPF', ['class'=>'prettyLabels'])}}
{{Form::text('cpf', $usuario->cpf, ['class' => 'form-control', 
'required', 'placeholder' => 'CPF'])}}

{{Form::label('name', 'Nome')}}
{{Form::text('name', $usuario->name, ['class' => 'form-control', 
'required', 'placeholder' => 'Nome'])}}        

{{Form::label('data_nascimento', 'Data de nascimento')}}
{{Form::text('data_nascimento', $usuario->data_nascimento, ['class' => 'form-control', 
'required', 'placeholder' => 'Data de nascimento'])}}   

{{Form::label('email', 'E-mail')}}
{{Form::text('email', $usuario->email, ['class' => 'form-control', 
'required', 'placeholder' => 'E-mail'])}}   


<br/>
{{Form::submit('Alterar!', ['class' => 'btn btn-default'])}}
{{Form::close()}}



@stop