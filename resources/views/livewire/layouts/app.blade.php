
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr">
    <meta name="keywords"
          content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>HR - Faraj Almadina Hotel </title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-rtl/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">

    @if(app()->getLocale()=='en')
        <link rel="stylesheet" href="{{asset('assets/css/stylelight.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('assets/css/stylertl.css')}}">
    @endif
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>

<div class="main-wrapper">

    <div class="page-wrapper">

        <div class="content container-fluid">


            <div class="row">
                <div  class="col-sm-12">
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>

</div>


<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-rtl/js/bootstrap.min.js')}}'"></script>

<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>

