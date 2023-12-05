<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Smart HR </title>

		 <!-- Favicon -->
         <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon-32x32.png')}}">

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

         <!-- Main CSS -->
         <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">

         {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"> --}}
         @if(app()->getLocale()=='en')
             <link rel="stylesheet" href="{{asset('assets/css/stylelight.css')}}">
         @else
             <link rel="stylesheet" href="{{asset('assets/css/stylertl.css')}}">
         @endif
         <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
         <!--[if lt IE 9]>
                     <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
                     <script src="{{asset('assets/js/respond.min.js')}}"></script>
                 <![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="error-page">
		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<div class="error-box">
				<h1>419</h1>
				<h3><i class="fa fa-warning"></i> Oops! Page Expired</h3>
				<p>Sorry, your session has expired. Please</p>
				<a href="{{ route('login') }}" class="btn btn-custom">Back to Login</a>
			</div>

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap-rtl/js/bootstrap.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>

    </body>
</html>

