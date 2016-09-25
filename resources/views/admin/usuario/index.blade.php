@extends('layouts.admin')
	@section('contenido')

@include('alerts.success')

<h1 class="page-header">Ver y Editar Usuarios</h1>
  <table width="100%" class="table table-hover" id="dataTables-example">
      <thead>
        <th>Usuarios</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Dirección</th>
        <th>Ciudad</th>
        <th>Operación</th>
      </thead>
      <?php foreach ($users as $user): ?>
        <tbody>
          <td>{{$user->userName}}</td>
          <td>{{$user->nombresUsuario}}</td>
          <td>{{$user->apellidosUsuario}}</td>
          <td>{{$user->emailUsuario}}</td>
          <td>{{$user->direccionUsuario}}</td>
					<?php foreach ($cities as $ciudad): ?>
						<?php if ($ciudad->idCiudad == $user->idCiudadUsuario): ?>
	          	<td>{{$ciudad->nombreCiudad}}</td>
						<?php endif; ?>
					<?php endforeach; ?>
          <td>
            {!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->idUsuario, $attributes = ['class' => 'btn btn-primary']);!!}
          </td>
        </tbody>
      <?php endforeach; ?>
    </table>

		<!-- Renderizar Paginacion -->
		{!!$users->render()!!}
  @stop
