@extends('layouts.admin')
	@section('contenido')

	@include('alerts.request')

  <div class="container-fluid">
  <h1 class="page-header">Editar Tipo de Producto</h1>

  {!!Form::model($type,['route'=>['tipoProducto.update',$type->idTipoProducto],'method'=>'PUT'])!!}
  <div class="form-group">
    {!!Form::label('Descripción de Tipo de Producto: ')!!}
    {!!Form::text('descripcionTipoProducto', null,['class'=>'form-control', 'placeholder'=>'Ingresa el tipo de producto'])!!}
  </div>
  <div class="form-group">
    <?php if ($type->idTipoProductoPadre != NULL): ?>
      {!!Form::label('Tipo de Producto Padre: ')!!}
        <select class="form-control" name="idTipoProductoPadre">
          <option value="0">No tiene</option>
          <?php foreach ($types as $type2): ?>
            <?php if ($type2->idTipoProductoPadre == NULL): ?>
              <?php if ($type->idTipoProductoPadre == $type2->idTipoProducto): ?>
                <option value="{{$type2->idTipoProducto}}" selected="selected">{{$type2->descripcionTipoProducto}}</option>
              <?php else: ?>
    							<option value="{{$type2->idTipoProducto}}">{{$type2->descripcionTipoProducto}}</option>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      <?php endif; ?>
  </div>
    <br>
    <button class="btn btn-success">Actualizar</button>

  {!!Form::close()!!}
  <br>
	{!!Form::open(['route'=>['tipoProducto.destroy',$type->idTipoProducto],'method'=>'DELETE'])!!}
		<button class="btn btn-danger">Eliminar</button>
	{!!Form::close()!!}
	<br>
</div>
  @stop
