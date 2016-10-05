@extends('layouts.maestra')
	@section('contenido')

	@include('alerts.request')

	<div class="container-fluid">
			<div class="row">
					<div class="col-lg-12">
	<h1 class="page-header">Crear Usuario</h1>

	{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}

		<div class="form-group">
			{!!Form::label('Username: ')!!}
			{!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de usuario'])!!}
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
			{!!Form::email('email', null,['class'=>'form-control', 'placeholder'=>'Ingresa tu email'])!!}
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
		<div class="form-group">
      {!!Form::label('Teléfono: ')!!}
      {!!Form::text('telefonoUsuario', null,['class'=>'form-control', 'placeholder'=>'Ingresa tu teléfono'])!!}
    </div>
		<div class="form-group">
      {!!Form::label('Página Web: ')!!}
      {!!Form::text('webPageUsuario', null,['class'=>'form-control', 'placeholder'=>'Ingresa tu página web'])!!}
    </div>
		<button class="btn btn-success">Registrar</button>
	</div>
	</div>
	</div>
	{!!Form::close()!!}
	<br>

	@stop
