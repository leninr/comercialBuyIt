@extends('layouts.maestra')
@section('contenido')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Productos</h1>
        </div>
    </div>
    <table width="100%" class="table table-hover" id="dataTables-example">
        <thead>
          <th>Ver</th>
          <th>Nombre</th>
          <th>Rate</th>
          <th>Imagen</th>
          <th>Stock</th>
          <th>Fecha Publicado</th>
          <th>Tipo</th>
          <th>Precio</th>
          <th>Estado</th>
          <th>Vendedor</th>
          <th>Forma de Pago</th>
          <th>Forma de Entrega</th>
        </thead>
        <?php foreach ($products as $product): ?>
          <tbody>
            <td>
              {!!link_to_route('producto.show', $title = 'Ver', $parameters = $product->idProducto, $attributes = ['class' => 'btn btn-primary']);!!}
            </td>
            <td>{{$product->nombreProducto}}</td>
            <?php if ($product->rateProducto == 0): ?>
              <td> - </td>
            <?php else: ?>
              <?php for ($i = 0; $i < $product->rateProducto; $i++) {?>
                <td class="fa fa-star"></td>
              <?php } ?>
            <?php endif; ?>
            <td>
              <img src="{{ asset('imgs/' . $product->imagenProducto) }}" height="40" width="40";>
            </td>
            <td>{{$product->stockProducto}}</td>
            <td>{{$product->fechaProducto}}</td>
  					<?php foreach ($types as $type): ?>
  						<?php if ($type->idTipoProducto == $product->idTipoProducto): ?>
  	          	<td>{{$type->descripcionTipoProducto}}</td>
  						<?php endif; ?>
  					<?php endforeach; ?>
            <td>{{$product->precioProducto}}</td>
            <td>{{$product->estadoProducto}}</td>
            <?php foreach ($users as $user): ?>
  						<?php if ($user->idUsuario == $product->idUsuarioProducto): ?>
  	          	<td>{{$user->name}}</td>
  						<?php endif; ?>
  					<?php endforeach; ?>
            <td>{{$product->descripcionPagoProducto}}</td>
            <td>{{$product->descripcionEntregaProducto}}</td>

          </tbody>
        <?php endforeach; ?>
      </table>

  		<!-- Renderizar Paginacion -->
  		{!!$products->render()!!}
  </div>
@stop
