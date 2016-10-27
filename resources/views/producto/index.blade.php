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
          <th></th>
          <th>Nombre</th>
          <th>Rate</th>
          <th>Precio</th>
          <th>Vendedor</th>
        </thead>
        <?php foreach ($products as $product): ?>
          <tbody>
            <td>
              <a href="{!! route('producto.show', $parameters = $product->idProducto) !!}"><img src="{{ asset('imgs/' . $product->imagenProducto) }}" height="70" width="70"></a>
            </td>
            <td>
              <a href="{!! route('producto.show', $parameters = $product->idProducto) !!}">{{$product->nombreProducto}}</a>
            </td>
            <?php if ($product->rateProducto == 0): ?>
              <td> - </td>
            <?php else: ?>
              <?php for ($i = 0; $i < $product->rateProducto; $i++) {?>
                <td class="fa fa-star"></td>
              <?php } ?>
            <?php endif; ?>
            <td>$ {{$product->precioProducto}}</td>
            <?php foreach ($users as $user): ?>
  						<?php if ($user->idUsuario == $product->idUsuarioProducto): ?>
  	          	<td>{{$user->name}}</td>
  						<?php endif; ?>
  					<?php endforeach; ?>
          </tbody>
        <?php endforeach; ?>
      </table>

  		<!-- Renderizar Paginacion -->
  		{!!$products->render()!!}
  </div>
@stop
