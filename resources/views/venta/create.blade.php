@extends('layouts.maestra')
@section('contenido')

	@include('alerts.request')
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Facturación</h1>
					</div>
			</div>
			<div class="row">
        <div class="col-lg-12">
					<?php use comercialBuyIt\Producto;
								if (Cart::count() != 0): ?>
					{!!Form::model($user,['route'=>['venta.store'],'method'=>'POST'])!!}
						<table>
							<tr>
								<td>
										<div class="form-group">
											{!!Form::label('Nombres: ')!!}
											{!!Form::label($user->nombresUsuario)!!}
										</div>
										<div class="form-group">
											{!!Form::label('Apellidos: ')!!}
											{!!Form::label($user->apellidosUsuario)!!}
										</div>
										<div class="form-group">
											{!!Form::label('Email: ')!!}
											{!!Form::label($user->email)!!}
										</div>

										<div class="form-group">
											{!!Form::label('Dirección: ')!!}
											{!!Form::label($user->direccionUsuario)!!}
										</div>
										<div class="form-group">
											{!!Form::label('Teléfono: ')!!}
											{!!Form::label($user->telefonoUsuario)!!}
										</div>
										<br>
										<br>
								</td>
								<td>
										<div class="form-group">
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

							            <?php foreach(Cart::content() as $row) :
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
								</td>
							</tr>
							<tr>
								<td colspan="3">
										<button class="btn btn-success btn-lg btn-block">Pagar</button>
								</td>
							</tr>
						</table>
					{!!Form::close()!!}
					<?php else: ?>
							<h2 style="color:red; margin:0 0 50px 500px"> No hay items para comprar!</h2>
							{!!link_to_route('producto.index', $title = 'Seguir Comprando', $parameters = '', $attributes = ['class' => 'btn btn-primary']);!!}
							<br>
							<br>
					<?php endif; ?>
			</div>
		</div>
  </div>



  @stop
