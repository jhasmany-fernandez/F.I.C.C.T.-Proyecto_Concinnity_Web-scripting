<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--  Social tags      -->
    <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, Black dashboard Laravel bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, free dashboard, free admin dashboard, free bootstrap 4 admin dashboard">
    <meta name="description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
        <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Black Dashboard Laravel by Creative Tim">
    <meta itemprop="description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/164/original/opt_blk_laravel_thumbnail.jpg?1561102244">
        <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Black Dashboard Laravel by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://black-dashboard-laravel.creative-tim.com/" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/164/original/opt_blk_laravel_thumbnail.jpg?1561102244" />
    <meta property="og:description" content="Black Dashboard Laravel is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />
    <title>{{ config('app.name', 'Black Dashboard Laravel - Free Laravel Preset') }}</title>
        <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
    <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
        <!-- CSS -->
    <link href="{{asset('css/black-dashboard.css?v=1.0.0')}}" rel="stylesheet" />
    <link href="{{asset('css/theme.css')}}" rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <div class="sidebar">
                    <nav class="sidebar-wrapper">
                        <ul class="nav">
                            <li class="logo">
                                <a href="#" class="simple-text logo-mini">BD</a>
                                <a href="#" class="simple-text logo-normal">Concinnity</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="tim-icons icon-chart-pie-36"></i>
                                    <p>Escritorio</p>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="collapse" data-target="#bajar" aria-expanded="false" aria-controls="bajar">
                                    <i class="tim-icons icon-double-right"></i>
                                    <span class="nav-link-text" >Acceso</span>
                                    <b class="caret mt-1"></b>
                                </a>
                                <div class="collapse" id="bajar">
                                    <ul class="nav pl-4">
                                        <li >
                                            <a href="{{url('users')}}">
                                                <i class="tim-icons icon-badge"></i>
                                                <p>Usuario</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('roles')}}">
                                                <i class="tim-icons icon-bullet-list-67"></i>
                                                <p>Rol</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a data-toggle="collapse" data-target="#desplegar" aria-expanded="false" aria-controls="desplegar">
                                    <i class="tim-icons icon-vector"></i>
                                    <span class="nav-link-text" >Características</span>
                                    <b class="caret mt-1"></b>
                                </a>
                                <div class="collapse" id="desplegar">
                                    <ul class="nav pl-4">
                                        <li >
                                            <a href="#">
                                                <i class="tim-icons icon-notes"></i>
                                                <p>Categoría</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="tim-icons icon-bold"></i>
                                                <p>Marca</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="tim-icons icon-puzzle-10"></i>
                                                <p>Material</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="tim-icons icon-caps-small"></i>
                                                <p>Talla</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a data-toggle="collapse" data-target="#desplegar2" aria-expanded="false" aria-controls="desplegar2">
                                    <i class="tim-icons icon-cart"></i>
                                    <span class="nav-link-text">Venta</span>
                                    <b class="caret mt-1"></b>
                                </a>
                                <div class="collapse" id="desplegar2">
                                    <ul class="nav pl-4">
                                        <li >
                                            <a href="{{url('clientes')}}">
                                                <i class="tim-icons icon-single-02"></i>
                                                <p>Cliente</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="tim-icons icon-paper"></i>
                                                <p>Nota de Venta</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a data-toggle="collapse" data-target="#desplegar3" aria-expanded="false" aria-controls="desplegar3">
                                    <i class="tim-icons icon-bag-16"></i>
                                    <span class="nav-link-text">Compra</span>
                                    <b class="caret mt-1"></b>
                                </a>
                                <div class="collapse" id="desplegar3">
                                    <ul class="nav pl-4">
                                        <li >
                                            <a href="#">
                                                <i class="tim-icons icon-single-02"></i>
                                                <p>Proveedor</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="tim-icons icon-book-bookmark"></i>
                                                <p>Nota de Compra</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li >
                                <a href="#">
                                    <i class="tim-icons icon-world"></i>
                                    <p>{{ _('RTL Support') }}</p>
                                </a>
                            </li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                            <li>&nbsp;</li>
                        </ul>
                    </nav>
            </div>
                                
            <div class="main-panel">
                <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                        <div class="container-fluid">
                            <div class="navbar-wrapper">
                                <div class="navbar-toggle d-inline">
                                    <button type="button" class="navbar-toggler">
                                        <span class="navbar-toggler-bar bar1"></span>
                                        <span class="navbar-toggler-bar bar2"></span>
                                        <span class="navbar-toggler-bar bar3"></span>
                                    </button>
                                </div>
                                <a class="navbar-brand" href="#">{{ $page ?? __('Dashboard') }}</a>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                                <span class="navbar-toggler-bar navbar-kebab"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navigation">
                                <ul class="navbar-nav ml-auto">
                                    <li class="dropdown nav-item">
                                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                            <span class="badge badge-pill badge-danger">5</span>
                                            <i class="tim-icons icon-bell-55"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                                            <div class="dropdown-header text-center">
                                                <strong>Notificaciones</strong>
                                            </div>
                                            <a class="dropdown-item" href="#">
                                                <i class="tim-icons icon-bus-front-12"></i> Ingresos
                                                <span class="badge badge-success">3</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="tim-icons icon-bullet-list-67"></i> Ventas
                                                <span class="badge badge-danger">2</span>
                                            </a>
                                        </ul>
                                    </li>
                                    <li class="dropdown nav-item">
                                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                            <div class="photo">
                                                <img src="{{asset('img/anime3.png')}}" alt="{{ __('Profile Photo') }}">
                                            </div>
                                            <b class="caret d-none d-lg-block d-xl-block"></b>
                                            <p class="d-lg-none">{{ __('Log out') }}</p>
                                        </a>
                                        <ul class="dropdown-menu dropdown-navbar">
                                            <li class="nav-link">
                                                <a href="#" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                                            </li>
                                            <li class="nav-link">
                                                <a href="#" class="nav-item dropdown-item">{{ __('Settings') }}</a>
                                            </li>
                                            <li class="dropdown-divider"></li>
                                            <li class="nav-link">
                                                <a href="#" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </nav>
            
                <!--Contenido principal-->     
                @yield('contenido')
                <!--Fin contenido principal-->
                <footer class="footer" style="padding-top: 0px">
                    <div class="container-fluid">
                        <div class="copyright">
                            © 2021 Desarrollado con <i class="tim-icons icon-heart-2"></i> por el Grupo 10 para un mejor trabajo
                        </div>
                    </div>
                </footer>
            </div>
            <!--Configuracion para los 3 colores parte derecha-->
            <form id="logout-form" action="#" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="ub2DzAIrgUnghVvu3l3KAbbq0UztNO8yfkrDNm6n">            </form>
                    <div class="fixed-plugin">
                    <div class="dropdown show-dropdown">
                        <a href="#" data-toggle="dropdown">
                        <i class="fa fa-cog fa-2x"> </i>
                        </a>
                        <ul class="dropdown-menu">
                        <li class="header-title"> Sidebar Background</li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger background-color">
                            <div class="badge-colors text-center">
                                <span class="badge filter badge-primary active" data-color="primary"></span>
                                <span class="badge filter badge-info" data-color="blue"></span>
                                <span class="badge filter badge-success" data-color="green"></span>
                            </div>
                            <div class="clearfix"></div>
                            </a>
                        </li>
                        </ul>
                    </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif
      
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif
      
        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif
      
        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
    <!-- Chart JS -->
    {{-- <script src="js/plugins/chartjs.min.js"></script> --}}
    <!--  Notifications Plugin    -->
    <script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>

    <script src="{{asset('js/black-dashboard.min.js?v=1.0.0')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>

    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');
                $navbar = $('.navbar');
                $main_panel = $('.main-panel');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                $('.fixed-plugin a').click(function(event) {
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .background-color span').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data', new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr('data', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data', new_color);
                    }
                });

                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                    } else {
                        $('body').addClass('sidebar-mini');
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage('Sidebar mini activated...');
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (white_color == true) {
                            $('body').addClass('change-background');
                            setTimeout(function() {
                                $('body').removeClass('change-background');
                                $('body').removeClass('white-content');
                            }, 900);
                            white_color = false;
                        } else {
                            $('body').addClass('change-background');
                            setTimeout(function() {
                                $('body').removeClass('change-background');
                                $('body').addClass('white-content');
                            }, 900);

                            white_color = true;
                        }
                });

                $('.light-badge').click(function() {
                    $('body').addClass('white-content');
                });

                $('.dark-badge').click(function() {
                    $('body').removeClass('white-content');
                });
            });
        });
    </script>
    @stack('scripts')
</body>
</html>