@extends('layouts.maestra')
@section('contenido')

@include('alerts.request')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Producto</h1>
            {!!Form::model($product,['route'=>['producto.update',$product->idProducto],'method'=>'PUT'])!!}
              <div class="form-group">
                {!!Form::label('Nombre de Producto: ')!!}
                {!!Form::text('nombreProducto', null,['class'=>'form-control', 'placeholder'=>'Ingresa el nombre de tu producto'])!!}
              </div>
              <div class="form-group">
                {!!Form::label('Imagen de Producto: ')!!}
                {!! Form::file('pic') !!}
              </div>
              <div class="form-group">
                {!!Form::label('Tipo de Producto: ')!!}
                  <select class="form-control" name="idTipoProducto">
                    <?php foreach ($types as $type): ?>
                      <option value="{{$type->idTipoProducto}}">{{$type->descripcionTipoProducto}}</option>
                    <?php endforeach; ?>
                  </select>
              </div>
              <div class="form-group">
                {!!Form::label('Stock de Producto: ')!!}
                {!!Form::number('stockProducto', null,['class'=>'form-control', 'placeholder'=>'Ingresa tu stock de tu producto'])!!}
              </div>
              <div class="form-group">
                {!!Form::label('Precio Unitario de Producto: $ ')!!}
                {!!Form::number('precioProducto', null,['class'=>'form-control', 'placeholder'=>'Ingresa el precio de tu producto'])!!}
              </div><div class="form-group">
                {!!Form::label('Estado de Producto: ')!!}
                {!!Form::text('estadoProducto', null,['class'=>'form-control', 'placeholder'=>'Ingresa el estado de tu producto'])!!}
              </div>
              <div class="form-group">
                {!!Form::label('Método de Pago: ')!!}
                {!!Form::text('descripcionPagoProducto', null,['class'=>'form-control', 'placeholder'=>'Ingresa el método de pago de tu producto'])!!}
              </div>
              <div class="form-group">
                {!!Form::label('Método de Entrega: ')!!}
                {!!Form::text('descripcionEntregaProducto', null,['class'=>'form-control', 'placeholder'=>'Ingresa el método de entrega de tu producto'])!!}
              </div>
              <button class="btn btn-success">Actualizar</button>
              <br>
              <br>
            {!!Form::close()!!}
          	<br>
          	{!!Form::open(['route'=>['producto.destroy',$product->idProducto],'method'=>'DELETE'])!!}
          		<button class="btn btn-danger">Eliminar</button>
          	{!!Form::close()!!}
            <br>
          </div>
    </div>
</div>

@stop
