@extends('layouts.maestra')
@section('contenido')

@include('alerts.request')
@include('alerts.shoppingCart')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Mis Productos</h1>
        </div>
    </div>
    <table width="100%" class="table table-hover" id="dataTables-example">
        <thead>
          <th></th>
          <th>Nombre</th>
          <th>Rate</th>
          <th>Stock</th>
          <th>Fecha Publicado</th>
          <th>Tipo</th>
          <th>Precio</th>
          <th>Estado</th>
          <th>Forma de Pago</th>
          <th>Forma de Entrega</th>
          <th>Operación</th>
        </thead>
        <?php foreach ($myproducts as $product): ?>
          <tbody>
            <td>
              <a href="{!! route('producto.show', $parameters = $product->idProducto) !!}"><img src="{{ asset('imgs/' . $product->imagenProducto) }}" height="70" width="70"></a>
            </td>
            <td><a href="{!! route('producto.show', $parameters = $product->idProducto) !!}">{{$product->nombreProducto}}</a></td>
            <?php if ($product->rateProducto == 0): ?>
              <td> - </td>
            <?php else: ?>
              <?php for ($i = 0; $i < $product->rateProducto; $i++) {?>
                <td class="fa fa-star"></td>
              <?php } ?>
            <?php endif; ?>
            <td>{{$product->stockProducto}}</td>
            <td>{{$product->fechaProducto}}</td>
  					<?php foreach ($types as $type): ?>
  						<?php if ($type->idTipoProducto == $product->idTipoProducto): ?>
  	          	<td>{{$type->descripcionTipoProducto}}</td>
  						<?php endif; ?>
  					<?php endforeach; ?>
            <td>{{$product->precioProducto}}</td>
            <td>{{$product->estadoProducto}}</td>
            <td>{{$product->descripcionPagoProducto}}</td>
            <td>{{$product->descripcionEntregaProducto}}</td>
            <td>
              {!! link_to_route('producto.edit', $title = 'Editar', $parameters = $product->idProducto, $attributes = ['class' => 'btn btn-primary']);!!}
            </td>

          </tbody>
        <?php endforeach; ?>
      </table>

  		<!-- Renderizar Paginacion -->
  		{!!$myproducts->render()!!}
  </div>
@stop
