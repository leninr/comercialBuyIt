@extends('layouts.admin')
	@section('contenido')

<h1 class="page-header">Ver y Editar Usuarios</h1>
  <table width="100%" class="table table-hover" id="dataTables-example">
      <thead>
        <th>Usuarios</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Ciudad</th>
        <th>Dirección</th>
				<th>Teléfono</th>
				<th>Rate</th>
				<th>Página Web</th>
				<th>Administrador?</th>
        <th>Operación</th>
      </thead>
      <?php foreach ($users as $user): ?>
        <tbody>
          <td>{{$user->name}}</td>
          <td>{{$user->nombresUsuario}}</td>
          <td>{{$user->apellidosUsuario}}</td>
          <td>{{$user->email}}</td>
					<?php foreach ($cities as $ciudad): ?>
						<?php if ($ciudad->idCiudad == $user->idCiudadUsuario): ?>
	          	<td>{{$ciudad->nombreCiudad}}</td>
						<?php endif; ?>
					<?php endforeach; ?>
          <td>{{$user->direccionUsuario}}</td>
					<td>{{$user->telefonoUsuario}}</td>
					<td>{{$user->rateUsuario}}</td>
					<td>{{$user->webPageUsuario}}</td>
					<?php if ($user->isAdmin == '1'): ?>
							<td>Si</td>
					<?php else: ?>
							<td>No</td>
					<?php endif; ?>
          <td>
            {!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user->idUsuario, $attributes = ['class' => 'btn btn-primary']);!!}
          </td>
        </tbody>
      <?php endforeach; ?>
    </table>

		<!-- Renderizar Paginacion -->
		{!!$users->render()!!}
  @stop
