@extends('layouts.admin')
	@section('contenido')

	@include('alerts.request')

  <h1 class="page-header">Ver y Editar Tipos de Productos</h1>
    <table width="100%" class="table table-hover" id="dataTables-example">
        <thead>
          <th>Descripción</th>
          <th>Sub Categorías</th>
        </thead>
        <?php foreach ($types as $type): ?>
          <tbody>
            <!--<td>{{$type->descripcionTipoProducto}}</td>-->
            <?php if ($type->idTipoProductoPadre == NULL): ?>
              <td>{!!link_to_route('tipoProducto.edit', $title = $type->descripcionTipoProducto, $parameters = $type->idTipoProducto);!!}</td>

                <td><ul class="nav nav-second-level">
                  <?php foreach ($types as $type2): ?>
        						<?php if ($type2->idTipoProductoPadre == $type->idTipoProducto): ?>
        	          	<!--<td>{{$type2->descripcionTipoProducto}}</td>-->
                      <li>
                          {!!link_to_route('tipoProducto.edit', $title = $type2->descripcionTipoProducto, $parameters = $type2->idTipoProducto);!!}
                      </li>
        						<?php endif; ?>
        					<?php endforeach; ?>
                </ul>
              </td>
            <?php endif; ?>
          </tbody>
        <?php endforeach; ?>
      </table>

  		<!-- Renderizar Paginacion -->
  		{!!$types->render()!!}

  @stop
