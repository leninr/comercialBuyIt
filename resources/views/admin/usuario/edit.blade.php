@extends('layouts.admin')
	@section('contenido')

	@include('alerts.request')
  <h1 class="page-header">Editar Usuario</h1>

  {!!Form::model($user,['route'=>['usuario.update',$user->idUsuario],'method'=>'PUT'])!!}
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
					<?php if ($ciudad->idCiudad == $user->idCiudadUsuario): ?>
						<option value="{{$ciudad->idCiudad}}" selected="selected">{{$ciudad->nombreCiudad}}</option>
					<?php else: ?>
							<option value="{{$ciudad->idCiudad}}">{{$ciudad->nombreCiudad}}</option>
					<?php endif; ?>
				<?php endforeach; ?>
			</select>
    </div>
    <div class="form-group">
      {!!Form::label('Dirección: ')!!}
      {!!Form::text('direccionUsuario', null,['class'=>'form-control', 'placeholder'=>'Ingresa tu dirección'])!!}
    </div>
    <button class="btn btn-success">Actualizar</button>

  {!!Form::close()!!}
	<br>
	{!!Form::open(['route'=>['usuario.destroy',$user->idUsuario],'method'=>'DELETE'])!!}
		<button class="btn btn-danger">Eliminar</button>
	{!!Form::close()!!}
	<br>
  @stop
