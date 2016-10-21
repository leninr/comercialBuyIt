@extends('layouts.admin')
	@section('contenido')

	@include('alerts.request')

  <div class="container-fluid">
  <h1 class="page-header">Editar Usuario</h1>

  {!!Form::model($user,['route'=>['usuario.update',$user->idUsuario],'method'=>'PUT'])!!}
    <div class="form-group">
      {!!Form::label('Username: ')!!}
      {!!Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de usuario'])!!}
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
		<div class="form-group">
      {!!Form::label('Teléfono: ')!!}
      {!!Form::number('telefonoUsuario', null,['class'=>'form-control', 'placeholder'=>'Ingresa tu teléfono'])!!}
    </div>
		<div class="form-group">
      {!!Form::label('Rate: ')!!}
      {!!Form::number('rateUsuario', null,['class'=>'form-control', 'placeholder'=>'Ingresa tu rate'])!!}
    </div>
		<div class="form-group">
      {!!Form::label('Página Web: ')!!}
      {!!Form::text('webPageUsuario', null,['class'=>'form-control', 'placeholder'=>'Ingresa tu página web'])!!}
    </div>

    <div class="form-group{{ $errors->has('isAdmin') ? ' has-error' : '' }}">
        <label for="isAdmin" class="col-md-4 control-label">Es Administrador?</label><br>

        <div class="col-md-6">
  					<?php if ($user->isAdmin == 1): ?>
              <input id="isAdmin" type="radio" value="1" checked name="isAdmin"> Si <br>
              <input id="isAdmin" type="radio" value="0" name="isAdmin"> No <br>
  					<?php else: ?>
              <input id="isAdmin" type="radio" value="1" name="isAdmin"> Si <br>
              <input id="isAdmin" type="radio" value="0" checked name="isAdmin"> No <br>
  					<?php endif; ?>
        </div>
    </div>
    <br>
    <br>
    <button class="btn btn-success">Actualizar</button>

  {!!Form::close()!!}
	<br>
	{!!Form::open(['route'=>['usuario.destroy',$user->idUsuario],'method'=>'DELETE'])!!}
		<button class="btn btn-danger">Eliminar</button>
	{!!Form::close()!!}
	<br>
</div>
  @stop
