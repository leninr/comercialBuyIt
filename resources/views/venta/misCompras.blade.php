@extends('layouts.maestra')
@section('contenido')

@include('alerts.request')
@include('alerts.shoppingCart')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Mis Compras</h1>
        </div>
    </div>
    <table width="100%" class="table table-hover" id="dataTables-example">
        <thead>
          <th></th>
          <th>Vendedor</th>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Fecha</th>
        </thead>
        <?php use comercialBuyIt\Producto;
              use comercialBuyIt\User;
            foreach ($myBuyings as $buy):
              $product = Producto::Find($buy->idProductoVenta);
              $user = User::find($buy->idUsuarioVendedorVenta);?>
          <tbody>
            <td>
              <a href="{!! route('producto.show', $parameters = $product->idProducto) !!}"><img src="{{ asset('imgs/' . $product->imagenProducto) }}" height="70" width="70"></a>
            </td>
            <td>{{$user->nombresUsuario}} {{$user->apellidosUsuario}}</td>
            <td><a href="{!! route('producto.show', $parameters = $product->idProducto) !!}">{{$product->nombreProducto}}</a></td>
            <td>{{$buy->cantidadVenta}}</td>
  					<td>$ {{$product->precioProducto}}</td>
            <td>{{$buy->fechaVenta}}</td>

          </tbody>
        <?php endforeach; ?>
      </table>

  		<!-- Renderizar Paginacion -->
  		{!!$myBuyings->render()!!}
  </div>
@stop
