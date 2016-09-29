
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>404</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bs3/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>




<body class="body-404">

<div class="error-head"> </div>

<div class="container ">

    <section class="error-wrapper text-center">
        <h1><img src="{{ asset('assets/images/404.png') }}" alt=""></h1>
        <div class="error-desk">
            <h2>page not found</h2>
            <p class="nrml-txt">No hemos podido encontrar esta página.</p>
        </div>
        <a href="{{ url('/') }}" class="back-btn"><i class="fa fa-home"></i> Regresar al inicio</a>
    </section>

</div>


</body>
</html>
