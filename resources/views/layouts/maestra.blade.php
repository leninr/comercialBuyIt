<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>buyIT!</title>
    <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
        <!-- Bootstrap Core CSS -->
        {!!Html::style('css/bootstrap.min.css')!!}

        <!-- MetisMenu CSS -->
        {!!Html::style('css/metisMenu.min.css')!!}

        <!-- Custom CSS -->
        {!!Html::style('css/sb-admin-2.css')!!}

        <!-- Custom Fonts -->
        {!!Html::style('css/font-awesome.min.css')!!}
  </head>
  <body>

    <!-- Start Top Bar -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><i class="fa fa-dashboard fa-fw"></i> buyIt!</a>
        </div>
        <!-- /.navbar-header -->

        @include('alerts.success')
        <ul class="nav navbar-top-links navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="/usuario/create">Registrarse</a></li>
            @else
                @if (Auth::user()->isAdmin == 1)
                  <li><a href="/admin">
                    <i class="fa fa-desktop fa-fw"></i>
                    Administrar
                  </a></li>
                @endif
                <li><a href="/producto/create">
                  <i class="fa fa-money fa-fw"></i>
                  Vender
                </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i>
                        {{ Auth::user()->name }}
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/editMe"><i class="fa fa-user fa-fw"></i> Perfil</a></li>
                        <li><a href="/misProductos"><i class="fa fa-list-alt fa-fw"></i> Mis Productos</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i>
                                 Salir
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
      </nav>
    <!-- End Top Bar -->

    <div class="Main">
      @yield('contenido')
    </div>



    <div class="callout large secondary">
      <div class="row">
        <div class="large-4 columns">
          <a class="navbar-brand" href="/"><i class="fa fa-dashboard fa-fw"></i> buyIt!</a>
        </div>
        <div class="large-3 large-offset-2 columns">
          <ul class="menu vertical">
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
          </ul>
        </div>
        <div class="large-3 columns">
          <ul class="menu vertical">
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
          </ul>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>

        <!-- jQuery -->
        {!!Html::script('js/jquery.min.js')!!}

        <!-- Bootstrap Core JavaScript -->
        {!!Html::script('js/bootstrap.min.js')!!}

        <!-- Metis Menu Plugin JavaScript -->
        {!!Html::script('js/metisMenu.min.js')!!}

        <!-- Custom Theme JavaScript -->
        {!!Html::script('js/sb-admin-2.js')!!}
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
