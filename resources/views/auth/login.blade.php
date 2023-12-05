<!DOCTYPE html>
<html lang="en">
    @php

    $url=request()->getHost();
     $urlrxplode=explode(".",$url);
    $getclient=DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();
// dd($getclient)
@endphp
     <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>performance - SmartHR </title>

		<!-- Favicon -->


    @if($getclient == null)
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon-32x32.png')}}">
    @else
        @if(!$getclient->photo)
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon-32x32.png')}}">
        @else
        <link rel="shortcut icon" type="image/x-icon" href="{{asset($getclient->photo)}}">

        @endif
        @endif




		<!-- Main CSS -->
        @if(app()->getLocale()=='en')
        <link rel="stylesheet" href="{{asset('assets/css/stylelight.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('assets/css/stylertl.css')}}">
    @endif

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

    </head>





    <body class="account-page">
    <div class="main-wrapper">
			<div class="account-content">
				<div class="container">

					<!-- Account Logo -->
					<div class="account-logo">
						<a href="#">
                            @if($getclient == null)
                            <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon-32x32.png')}}">
                            @else
                            @if(!$getclient->photo)
                            <img src="{{asset('smartlogo.png')}}" alt="{{$getclient->name}}">
                            @else
                            <img src="{{asset($getclient->photo)}}" alt="{{$getclient->name}}" >

                            @endif
                            @endif
                        </a>
					</div>
					<!-- /Account Logo -->

					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">{{__('Login')}}</h3>
							<p class="account-subtitle">{{__('Welcome')}} , {{$getclient->name ?? ''}} </p>
                            @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
									<label>{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
									<div class="row">
										<div class="col">
											<label>{{ __('Password') }}</label>
										</div>
										<div class="col-auto">
											<a class="text-muted" href="{{url('/password/reset')}}">
												{{__("Forgot password?")}}
											</a>
										</div>
									</div>


                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group text-center">
									<button type="submit" class="btn btn-primary account-btn">   {{ __('Login') }}</button>
								</div>
{{--								<div class="account-footer">--}}
{{--									<p>Don't have an account yet? <a href="register.html">Register</a></p>--}}
{{--								</div>--}}
                    </form>


		<!-- /Main Wrapper -->
                </div>
            </div>
        </div>
    </div>
</div>
	<!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>

    </body>
</html>
