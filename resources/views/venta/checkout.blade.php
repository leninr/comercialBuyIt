@extends('layouts.maestra')
@section('contenido')

@include('alerts.request')

<div class="container-fluid">

    <div class="col-lg-8">
      <h1 class="page-header">Checkout</h1>
    </div>
    <div class="col-lg-2" style="margin:30px 0 0 0">
      {!!link_to_route('producto.index', $title = 'Seguir Comprando', $parameters = '', $attributes = ['class' => 'btn btn-primary']);!!}
    </div>
    <div class="col-lg-1" style="margin:30px 0 0 0">
      {!!link_to_route('venta.create', $title = 'Proceder a Facturación', $parameters = '', $attributes = ['class' => 'btn btn-success']);!!}
    </div>

    <table width="100%" class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>

        <tbody>

            <?php use comercialBuyIt\Producto;
                  foreach(Cart::content() as $row) :
                    $product = Producto::find($row->id);?>

                <tr>
                    <td><a href="{!! route('producto.show', $parameters = $row->id) !!}"><img src="{{ asset('imgs/' . $product->imagenProducto) }}" height="70" width="70"></a></td>
                    <td><?php echo $row->qty; ?></td>
                    <td>
                        <p><strong><a href="{!! route('producto.show', $parameters = $product->idProducto) !!}"><?php echo $row->name; ?></strong></p>
                        <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                    </td>
                    <td>$<?php echo $row->price; ?></td>
                    <td>$<?php echo $row->subtotal; ?></td>
                </tr>

            <?php endforeach;?>

        </tbody>

        <tfoot>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td>Subtotal</td>
                <td><?php echo Cart::subtotal(); ?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td>IVA</td>
                <td><?php echo Cart::tax(); ?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td>Total</td>
                <td><?php echo Cart::total(); ?></td>
            </tr>
        </tfoot>
    </table>
</div>
@stop
