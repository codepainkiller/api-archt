<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

        <title>Trujillo Virtual</title>

        <!--Core CSS -->
        <link href="{{ asset('assets/bs3/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap-reset.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/libs/sweetalert.css') }}" rel="stylesheet" />

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]>
        <script src="{{ asset('assets/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        @yield('css-content')
    </head>

    <body>
        <section id="container" >
            <!--header start-->
            @include('partials.header')
            <!--header end-->
            @include('partials.sidebar')
            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">

                    @if (Session::has('flash_message'))
                        <div class="alert alert-success text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    <!-- page start-->
                    @yield('content')
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
            <!--right sidebar start-->
            @include('partials.sidebar-rigth')
            <!--right sidebar end-->

        </section>

        @yield('modals')

        <!-- Placed js at the end of the document so the pages load faster -->

        <!--Core js-->
        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/bs3/js/bootstrap.min.js') }}"></script>
        <script class="include" type="text/javascript" src="{{ asset('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
        <!--Easy Pie Chart-->
        <script src="{{ asset('assets/js/easypiechart/jquery.easypiechart.min.js') }}"></script>
        <!--Sparkline Chart-->
        <script src="{{ asset('assets/js/sparkline/jquery.sparkline.js') }}"></script>
        <!--jQuery Flot Chart-->
        <script src="{{ asset('assets/js/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('assets/js/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('assets/js/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('assets/js/flot-chart/jquery.flot.pie.resize.js') }}"></script>


        <!--common script init for all pages-->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>

        <script src="{{ asset('js/libs/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            $('div.alert').not('alert-important').delay(3000).slideUp(300);
        </script>

        @yield('js-content')

    </body>
</html>
