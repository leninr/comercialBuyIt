@extends('layouts.maestra')
@section('contenido')

	@include('alerts.request')
	<div class="container-fluid">
			<div class="row">
					<div class="col-lg-12">
							<h1 class="page-header">Crear Producto</h1>
							{!!Form::open(['route'=>'producto.store', 'method'=>'POST', 'files' => true ])!!}
								<div class="form-group">
									{!!Form::label('Descripción de Producto: ')!!}
									{!!Form::text('descripcionProducto', null,['class'=>'form-control', 'placeholder'=>'Ingresa la descripión de tu producto'])!!}
								</div>
								<div class="form-group">
									{!!Form::label('Tipo de Producto: ')!!}
										<select class="form-control" name="idTipoProducto">
									    <?php foreach ($types as $type): ?>
												<option value="{{$type->idTipoProductos}}">{{$type->descripcionTipoProducto}}</option>
									    <?php endforeach; ?>
									  </select>
								</div>
								<div class="form-group">
									{!!Form::label('Imagen de Producto: ')!!}
									{!! Form::file('pic') !!}
								</div>
						    <button class="btn btn-success">Guardar y Publicar</button>
								<br>
								<br>
						  {!!Form::close()!!}
						</div>
			</div>
	</div>
@stop
