<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    {!!Html::style('css/bootstrap.min.css')!!}

    <!-- MetisMenu CSS -->
    {!!Html::style('css/metisMenu.min.css')!!}

    <!-- Custom CSS -->
    {!!Html::style('css/sb-admin-2.css')!!}

    <!-- Custom Fonts -->
    {!!Html::style('css/font-awesome.min.css')!!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                          <!--<fieldset>
                              {!!Form::open(['action'=>'LogController@store', 'method'=>'POST'])!!}
                                <div class="form-group">
                                  <input id="userName" type="user" class="form-control" name="userName" placeholder="Username" required="" autofocus="">
                                </div>
                                <div class="form-group">
                                  <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="">
                                </div>
                                <button class="btn btn-success" type="submit">Ingresar</button>
                              {!!Form::close()!!}
                          </fieldset>-->
                            <fieldset>
                                {!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
                                    <div class="form-group">
                                      {!!Form::text('userName',null,['class'=>'form-control','placeholder'=>'Username'])!!}
                                    </div>
                                    <div class="form-group">
                                      {!!Form::password('password',['class'=>'form-control','placeholder'=>'Password'])!!}
                                    </div>
                                    {!!Form::submit('Ingresar',['class'=>'btn btn-success'])!!}
                                {!!Form::close()!!}
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    {!!Html::script('js/jquery.min.js')!!}

    <!-- Bootstrap Core JavaScript -->
    {!!Html::script('js/bootstrap.min.js')!!}

    <!-- Metis Menu Plugin JavaScript -->
    {!!Html::script('js/metisMenu.min.js')!!}

    <!-- Custom Theme JavaScript -->
    {!!Html::script('js/sb-admin-2.js')!!}

</body>

</html>
