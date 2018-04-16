<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TLS CMS | Admin</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Morris -->
    <link href="{{ asset('css/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet">

    <!--Toastr Notifications-->
    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <!--<img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />-->
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">TOULOUSE</strong>
                             </span> <span class="text-muted text-xs block">Admin <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                            </form>
                        </ul>
                    </div>
                    <div class="logo-element">
                        TLS
                    </div>
                </li>

                <li class="active">
                    <a href="{{ route('home_cms') }}"><i class="active fa fa-home"></i> <span class="nav-label">Inicio</span></a>
                </li>
                <li>
                    <a href="{{ route('lista_articulos') }}"><i class="fa fa-send"></i> <span class="nav-label">Blog</span></a>
                </li>
                <li>
                    <a href="{{ route('lista_menu') }}"><i class="fa fa-list"></i> <span class="nav-label">Menú</span></a>
                </li>
                <li>
                    <a href="{{ route('lista_secciones') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Secciones</span></a>
                </li>
                <li>
                    <a href="{{ route('lista_contenido') }}"><i class="fa fa-window-restore"></i> <span class="nav-label">Contenido</span></a>
                </li>
                <li>
                    <a href="{{ route('lista_mundos') }}"><i class="fa fa-globe"></i> <span class="nav-label">Mundos</span></a>
                </li>
                <li>
                    <a href="{{ route('lista_carreras') }}"><i class="fa fa-compass"></i> <span class="nav-label">Carreras Profesionales</span></a>
                </li>
                <li>
                    <a href="{{ route('lista_egresados') }}"><i class="fa fa-user-o"></i> <span class="nav-label">Egresados</span></a>
                </li>
                <!--
                <li>
                    <a href="{{ route('lista_usuario') }}"><i class="fa fa-user"></i> <span class="nav-label">Usuarios</span></a>
                </li>
                -->
                <li>
                    <a href="{{ route('lista_paginas') }}"><i class="fa fa-window-maximize"></i> <span class="nav-label">Páginas</span></a>
                </li>
                <li>
                    <a href="{{ route('lista_sedes') }}"><i class="fa fa-map-marker"></i> <span class="nav-label">Sedes</span></a>
                </li>
                <li>
                    <a href="{{ route('lista_eventos') }}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Eventos</span></a>
                </li>
                <li>
                    <a href="{{ route('configuracion_general') }}"><i class="fa fa-gear"></i> <span class="nav-label">Configuración General</span></a>
                </li>
            </ul>
        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Cerrar Sesión
                    </a>
                </li>
            </ul>
        </nav>
        </div>
            @yield('breadcrumb')
        <div class="wrapper wrapper-content">
            <!--Contenido Principal-->
            @yield('contenido')
            <!--Contenido Principal-->
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Flot -->
    <script src="{{ asset('js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/curvedLines.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Jvectormap -->
    <script src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset('js/demo/sparkline-demo.js') }}"></script>

    <!-- ChartJS-->
    <script src="{{ asset('js/plugins/chartJs/Chart.min.js') }}"></script>

    <!--Últimos scripts de la página-->
    @yield('ultimos-scripts')
    <!--Últimos scripts de la página-->
</body>
</html>
