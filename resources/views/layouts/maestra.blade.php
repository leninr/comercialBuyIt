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
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">buyIt!</li>
          <li><a href="#">One</a></li>
          <li><a href="#">Two</a></li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <li><a href="#">Three</a></li>
          <li><a href="#">Four</a></li>
          <li><a href="#">Five</a></li>
          <li><a href="#">Six</a></li>
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->

    <div class="Main">
      @yield('content')
    </div>



    <div class="callout large secondary">
      <div class="row">
        <div class="large-4 columns">
          <h5>Vivamus Hendrerit Arcu Sed Erat Molestie</h5>
          <p>Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit.</p>
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
