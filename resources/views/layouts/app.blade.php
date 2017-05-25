<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- BOOTSTRAP -->
    <link href="{{ url('/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="{{ url('/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- JQUERY UI -->
    <link rel="stylesheet" href="{{ url('/css/jquery-ui.min.css') }}">
    <!-- CUSTOM STYLE  -->
    <link href="{{ url('/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('/img/logo.png') }}" class="img" />
                </a>
            </div>
        </div>
    </div>

    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a {{{ (Request::is('/') ? 'class=menu-top-active' : '') }}} href="{{ url('/') }}" id="li-orden">INICIO</a></li>
                            <li ><a {{{ (Request::is('contactos*') ? 'class=menu-top-active' : '') }}} href="{{ url('/contactos') }}" id="li-contacto">CONTACTOS</a></li>
                            <li><a {{{ (Request::is('cotizaciones*') ? 'class=menu-top-active' : '') }}} href="{{ url('/cotizaciones') }}" id="li-cotizacion">COTIZACIONES</a></li>
                            <li><a {{{ (Request::is('ordenes*') ? 'class=menu-top-active' : '') }}} href="{{ url('/ordenes') }}" id="li-orden">ORDENES DE TRABAJO</a></li>
                            <li><a {{{ (Request::is('pagos*') ? 'class=menu-top-active' : '') }}} href="{{ url('/pagos') }}" id="li-orden">PAGOS</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="content-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <div class="recaudacion">
        <h3 class="no-margin no-padding">Recaudación del día : </h3>
        <h2 class="no-margin no-padding monto">$ {{ number_format($recaudacion_dia, 0, '', '.') }}</h2>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--&copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>-->
                </div>

            </div>
        </div>
    </footer>
    <!-- JQUERY -->
    <script src="{{ url('/js/jquery-3.2.1.min.js') }}"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="{{ url('/js/bootstrap.js') }}"></script>
    <!-- SCRIPTS-->
    <script src="{{ url('/js/app.js') }}"></script>
</body>
</html>
