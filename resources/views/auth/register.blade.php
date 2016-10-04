@extends('layouts.admin')

@section('contenido')
	@include('alerts.request')
	<h1 class="page-header">Crear Usuario</h1>

  <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="name" class="col-md-4 control-label">Username</label>

          <div class="col-md-6">
              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="col-md-4 control-label">Password</label>

          <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" required>

              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

          <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

              @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }}">
          <label for="nombres" class="col-md-4 control-label">Nombres</label>

          <div class="col-md-6">
              <input id="nombres" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}" required>

              @if ($errors->has('nombres'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nombres') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }}">
          <label for="apellidos" class="col-md-4 control-label">Apellidos</label>

          <div class="col-md-6">
              <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" required>

              @if ($errors->has('apellidos'))
                  <span class="help-block">
                      <strong>{{ $errors->first('apellidos') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="col-md-4 control-label">E-Mail</label>

          <div class="col-md-6">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
          <label for="ciudad" class="col-md-4 control-label">Ciudad</label>

          <div class="col-md-6">
            <select class="form-control" name="ciudad">
              <?php foreach ($cities as $ciudad): ?>
                <option value="{{$ciudad->idCiudad}}">{{$ciudad->nombreCiudad}}</option>
              <?php endforeach; ?>
            </select>
          </div>
      </div>

      <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
          <label for="direccion" class="col-md-4 control-label">Dirección</label>

          <div class="col-md-6">
              <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required>

              @if ($errors->has('direccion'))
                  <span class="help-block">
                      <strong>{{ $errors->first('direccion') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
          <label for="telefono" class="col-md-4 control-label">Teléfono</label>

          <div class="col-md-6">
              <input id="telefono" type="number" class="form-control" name="telefono" value="{{ old('telefono') }}" required>

              @if ($errors->has('telefono'))
                  <span class="help-block">
                      <strong>{{ $errors->first('telefono') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('rate') ? ' has-error' : '' }}">
          <label for="rate" class="col-md-4 control-label">Rate</label>

          <div class="col-md-6">
              <input id="rate" type="number" min="1" max="5" class="form-control" name="rate" value="{{ old('rate') }}" required>

              @if ($errors->has('rate'))
                  <span class="help-block">
                      <strong>{{ $errors->first('rate') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('webPage') ? ' has-error' : '' }}">
          <label for="webPage" class="col-md-4 control-label">Página Web</label>

          <div class="col-md-6">
              <input id="webPage" type="text" class="form-control" name="webPage" value="{{ old('webPage') }}" required>

              @if ($errors->has('webPage'))
                  <span class="help-block">
                      <strong>{{ $errors->first('webPage') }}</strong>
                  </span>
              @endif
          </div>
      </div>

			<div class="form-group{{ $errors->has('isAdmin') ? ' has-error' : '' }}">
          <label for="isAdmin" class="col-md-4 control-label">Es Administrador?</label><br>

          <div class="col-md-6">
							<input id="isAdmin" type="radio" value="1" name="isAdmin"> Si <br>
              <input id="isAdmin" type="radio" value="0" checked name="isAdmin"> No <br>

              @if ($errors->has('isAdmin'))
                  <span class="help-block">
                      <strong>{{ $errors->first('isAdmin') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-success">
                  Register
              </button>
          </div>
      </div>
  </form>

@endsection
