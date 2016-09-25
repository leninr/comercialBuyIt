@extends('layouts.admin')
	@section('contenido')

	@include('alerts.request')
	<h1 class="page-header">Crear Usuario</h1>

	{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
		<div class="form-group">
			{!!Form::label('Username: ')!!}
			{!!Form::text('userName', null,['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de usuario'])!!}
		</div>
		<div class="form-group">
			<label for="">Password: </label>
			<input name="password" type="password" class="form-control">
		</div>
		<div class="form-group">
			{!!Form::label('Nombres: ')!!}
			{!!Form::text('nombresUsuario', null,['class'=>'form-control', 'placeholder'=>'Ingresa tus nombres'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Apellidos: ')!!}
			{!!Form::text('apellidosUsuario', null,['class'=>'form-control', 'placeholder'=>'Ingresa tus apellidos'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Email: ')!!}
			{!!Form::email('emailUsuario', null,['class'=>'form-control', 'placeholder'=>'Ingresa tu email'])!!}
		</div>
		<div class="form-group">
			<label for="">Ciudad: </label><br>
			<select class="form-control" name="idCiudadUsuario">
				<?php foreach ($cities as $ciudad): ?>
					<option value="{{$ciudad->idCiudad}}">{{$ciudad->nombreCiudad}}</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			{!!Form::label('Dirección: ')!!}
			{!!Form::text('direccionUsuario', null,['class'=>'form-control', 'placeholder'=>'Ingresa tu dirección'])!!}
		</div>
		<button class="btn btn-success">Registrar</button>

	{!!Form::close()!!}
	<br>

	@stop
