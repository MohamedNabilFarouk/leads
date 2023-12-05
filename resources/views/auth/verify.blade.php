
<!doctype html>

@if(app()->getLocale()=='en')
    <html lang="en" dir="ltr" >
    @else
        <html dir="rtl" lang="ar">
        @endif
    <head>
        <!-- Meta Data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Saas - Multipurpose Saas Landing Page</title>

        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front/assets/img/favicon/smartlogo.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front/assets/img/favicon/smartlogo.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/assets/img/favicon/smartlogo.png')}}">
        <link rel="mask-icon" href="{{asset('front/assets/img/favicon/smartlogo.png')}}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <!-- Dependency Styles -->
        <link rel="stylesheet" href="{{asset('front/dependencies/bootstrap/css/bootstrap.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('front/dependencies/fontawesome/css/all.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('front/dependencies/swiper/css/swiper.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('front/dependencies/wow/css/animate.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('front/dependencies/simple-line-icons/css/simple-line-icons.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('front/dependencies/themify-icons/css/themify-icons.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('front/dependencies/components-elegant-icons/css/elegant-icons.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('front/dependencies/magnific-popup/css/magnific-popup.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('front/dependencies/slick-carousel/css/slick.css')}}" type="text/css">


        <!-- Site Stylesheet -->
        @if(app()->getLocale()=='en')
        <link rel="stylesheet" href="{{asset('front/assets/css/app.css')}}" type="text/css">
        @else
            <link rel="stylesheet" href="{{asset('front/assets/css/appar.css')}}" type="text/css">
        @endif
            <!-- Google Web Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:300,400,500,600,700,800%7CPoppins:300,400,500,600,700,800" rel="stylesheet">

    </head>

{{--    @if(Request::segment(2)=='index')--}}
    <body id="home-version-1" class="home-saas-main" data-style="default">


        <a href="#main_content" data-type="section-switch" class="return-to-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    <div style="direction:ltr;" class="page-loader">
        <div class="page-loading-wrapper">
            <div class="loading loading07">
                <span data-text="S">S</span>
                <span data-text="M">M</span>
                <span data-text="A">A</span>
                <span data-text="R">R</span>
                <span data-text="T">T</span>
                <span data-text="H">H</span>
                <span data-text="R">R</span>
            </div>
        </div>
    </div>


    <div id="main_content" class="main-content">




        {{-- content --}}




<div class="container" style='margin-top:200px; text-align:center'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





    <!-- Dependency Scripts -->
    <script src="{{asset('front/dependencies/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('front/dependencies/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/dependencies/swiper/js/swiper.min.js')}}"></script>
    <script src="{{asset('front/dependencies/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('front/dependencies/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('front/dependencies/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('front/dependencies/jquery.appear/jquery.appear.js')}}"></script>
    <script src="{{asset('front/dependencies/wow/js/wow.min.js')}}"></script>
    <script src="{{asset('front/assets/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('front/dependencies/countUp.js/countUp.min.js')}}"></script>
    <script src="{{asset('front/dependencies/bodymovin/lottie.min.js')}}"></script>
    <script src="{{asset('front/dependencies/jquery.parallax-scroll/js/jquery.parallax-scroll.js')}}"></script>
    <script src="{{asset('front/dependencies/wavify/wavify.js')}}"></script>
    <script src="{{asset('front/dependencies/jquery.marquee/js/jquery.marquee.js')}}"></script>
    <script src="{{asset('front/assets/js/jarallax.min.js')}}"></script>
    <script src="{{asset('front/dependencies/gmap3/js/gmap3.min.js')}}"></script>
    <script src="{{asset('front/dependencies/slick-carousel/js/slick.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.parallax.min.js')}}"></script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M'></script>


    <!-- Site Scripts -->
    <script src="{{asset('front/assets/js/header.js')}}"></script>
    <script src="{{asset('front/assets/js/app.js')}}"></script>
    @livewireScripts


    <script>
        // JavaScript in target.html
        window.onload = function() {
            const sectionID = window.location.hash.substring(1);
            if (sectionID) {
                const section = document.getElementById(sectionID);
                section.scrollIntoView({ behavior: 'smooth' });
            }
        };
    </script>
    </body>

</html>

