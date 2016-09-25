@extends('layouts.maestra')
@section('content')

@include('alerts.success')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Ver Productos</h1>
        </div>
    </div>
    <table width="100%" class="table table-hover" id="dataTables-example">
        <thead>
          <th>Descripción</th>
          <th>Calificación</th>
          <th>Tipo de Producto</th>
          <th>Imagen</th>
        </thead>
        <?php foreach ($products as $product): ?>
          <tbody>
            <td>{{$product->descripcionProducto}}</td>
            <td>{{$product->calificacionProducto}}</td>
  					<?php foreach ($types as $type): ?>
  						<?php if ($type->idTipoProductos == $product->idTipoProducto): ?>
  	          	<td>{{$type->descripcionTipoProducto}}</td>
  						<?php endif; ?>
  					<?php endforeach; ?>
            <td>
              <img src="{{ asset('imgs/' . $product->imagenProducto) }}" height="40" width="40";>
            </td>
          </tbody>
        <?php endforeach; ?>
      </table>

  		<!-- Renderizar Paginacion -->
  		{!!$products->render()!!}
  </div>
@stop
