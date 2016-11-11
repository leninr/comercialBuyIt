@extends('layouts.admin')
@section('contenido')

	@include('alerts.request')
  <h1 class="page-header">Crear Tipo de Producto</h1>

  {!!Form::open(['route'=>'tipoProducto.store', 'method'=>'POST'])!!}
    <div class="form-group">
      {!!Form::label('Descripción de Tipo de Producto: ')!!}
      {!!Form::text('descripcionTipoProducto', null,['class'=>'form-control', 'placeholder'=>'Ingresa el tipo de producto'])!!}
    </div>
    <div class="form-group">
      {!!Form::label('Tipo de Producto Padre (si tiene): ')!!}
        <select class="form-control" name="idTipoProductoPadre">
          <option value="0">No tiene</option>
          <?php foreach ($types as $type): ?>
            <?php if ($type->idTipoProductoPadre == NULL): ?>
              <option value="{{$type->idTipoProducto}}">{{$type->descripcionTipoProducto}}</option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
    </div>
    <button class="btn btn-success">Guardar</button>
    <br>
    <br>
  {!!Form::close()!!}

  @endsection
