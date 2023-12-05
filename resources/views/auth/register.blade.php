{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    <!doctype html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up Multipurpose Saas Landing Page</title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
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
    <link rel="stylesheet" href="{{asset('front/assets/css/app.css')}}" type="text/css">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:300,400,500,600,700,800%7CPoppins:300,400,500,600,700,800" rel="stylesheet">

</head>

<body id="home-version-1" class="about-page-template" data-style="default">

<a href="#main_content" data-type="section-switch" class="return-to-top">
    <i class="fa fa-chevron-up"></i>
</a>

<div class="page-loader">
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


    <!--=========================-->
    <!--=        Navbar         =-->
    <!--=========================-->
    <header class="site-header header-page header-bg header-transparent header-fixed" data-header-fixed="true" data-mobile-menu-resolution="992">
        <div class="container">
            <div class="header-inner">

                <nav id="site-navigation" class="main-nav">

                    <div class="site-logo">
                        <a href="index.html" class="logo">
                            <img src="{{asset('front/assets/img/logo-community.png')}}" alt="site logo" class="main-logo">
                            <img src="{{asset('front/assets/img/logo-community.png')}}" alt="site logo" class="logo-sticky">
                        </a>
                    </div>
                    <!-- /.site-logo -->

                    <div class="menu-wrapper main-nav-container canvas-menu-wrapper" id="mega-menu-wrap">
                        <div class="canvas-header">
                            <div class="mobile-offcanvas-logo">
                                <a href="index.html">
                                    <img src="{{asset('front/assets/img/logo-community.png')}}" alt="site logo" class="logo-sticky">
                                </a>
                            </div>

                            <div class="close-menu" id="page-close-main-menu">
                                <i class="ti-close"></i>
                            </div>

                        </div>

                        <ul class="astriol-main-menu">
                            <li class="has-submenu menu-item-depth-0">
                                <a href="index.html">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home Main</a></li>
                                    <li><a href="index-saas.html">Home Sass</a></li>
                                    <li><a href="index-saas-two.html">Home Sass Two</a></li>
                                    <li><a href="index-app.html">Home App Landing</a></li>
                                    <li><a href="index-agency.html">Home Agency</a></li>
                                    <li><a href="index-agency-two.html">Home Agency Two</a></li>
                                    <li><a href="index-analytics.html">Home Analytics</a></li>
                                    <li><a href="index-social.html">Home Social</a></li>
                                    <li><a href="index-seo.html">Home SEO</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-depth-0"><a href="about.html">About</a></li>
                            <li class="has-submenu menu-item-depth-0">
                                <a href="blog.html">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-filter.html">Blog With Filter</a></li>
                                    <li><a href="blog.html">Blog Grid</a></li>
                                    <li><a href="blog-classic.html">Blog Classic</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu menu-item-depth-0">
                                <a href="#">Pages</a>

                                <ul class="sub-menu">
                                    <li><a href="about.html">About</a></li>
                                    <li class="has-submenu">
                                        <a href="service.html">Service</a>
                                        <ul class="sub-menu">
                                            <li><a href="service.html">Service One</a></li>
                                            <li><a href="service-two.html">Service Two</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="team.html">Our Team</a></li>
                                    <li><a href="pricing.html">Pricing</a></li>
                                    <li class="has-submenu">
                                        <a href="portfolio.html">Portfolio</a>
                                        <ul class="sub-menu">
                                            <li><a href="portfolio-one.html">Two Column</a></li>
                                            <li><a href="portfolio-two.html">Three Column</a></li>
                                            <li><a href="portfolio-style-two.html">Three Column Style Two</a></li>
                                            <li><a href="portfolio-three.html">With Filter</a></li>
                                            <li><a href="portfolio-single.html">Portfolio Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="faq.html">Faq's</a></li>
                                    <li><a href="error.html">Error 404</a></li>
                                    <li><a href="login.html">Sing In</a></li>
                                    <li><a href="signup.html">Sing Up</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-depth-0"><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!-- /.menu-wrapper -->

                    <div class="nav-right">
                        <a href="login.html" class="gp-btn btn-round">Try It Free</a>

                        <div class="astriol-burger-menu" id="mobile-menu-open">
                            <span class="bar-one"></span>
                            <span class="bar-two"></span>
                            <span class="bar-three"></span>
                        </div>
                    </div>

                </nav>
                <!-- /.site-nav -->
            </div>
            <!-- /.header-inner -->
        </div>
        <!-- /.container-full -->
    </header>
    <!-- /.site-header -->

    <!--==========================-->
    <!--=         Banner         =-->
    <!--==========================-->
    <section class="page-banner-three">
        <div class="container pr">

            <div class="page-title-wrapper text-left">
                <h1 class="page-title">My Account</h1>

                <ul class="breadcrumbs">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Sign In</li>
                </ul>
            </div>
            <!-- /.page-title-wrapper -->
        </div>
        <!-- /.container -->

        <ul class="banner-pertical-three parallax-element">
            <li>
                <img src="{{asset('front/media/banner/main/tryangle_dot.png')}}" class="layer" data-depth="0.01" alt="astriol pertical">
            </li>
            <li>
                <img src="{{asset('front/media/banner/main/box_dot.png')}}" class="layer" data-depth="0.03" alt="astriol pertical">
            </li>

            <li>
                <img src="{{asset('front/media/banner/main/rabar.png')}}" class="layer" data-depth="0.02" alt="astriol pertical">
            </li>

            <li>
                <img src="{{asset('front/media/banner/main/box_dot2.png')}}" class="layer" data-depth="0.02" alt="astriol pertical">
            </li>

            <li>
                <img src="{{asset('front/media/banner/main/flash.png')}}" class="layer" data-depth="0.01" alt="astriol pertical">
            </li>
        </ul>
        <!-- /.banner-pertical -->

        <div class="bottom-shape">
            <img src="{{asset('front/media/background/bottom_shape.png')}}" alt="bottom">
        </div>
    </section>
    <!-- /.page-banner -->

    <!--==========================-->
    <!--=         Fap         =-->
    <!--==========================-->
    <section class="signin-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="accounts-button mb-5">
                        <a href="signin.html" class="gp-btn btn-sm">Sign In</a>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                                                @csrf
                        <div class="gp-input-group">
                            <label for="username">{{__('Name')}}</label>
                            <input type="text" class="gp-input" name="name" placeholder="Name">
                        </div>

                        <div class="gp-input-group">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" class="gp-input" name="email" placeholder="Email">
                        </div>

                        <div class="gp-input-group">
                            <label for="password">{{__('Password')}}</label>
                            <input type="password" class="gp-input" name="password"  placeholder="password">
                        </div>
                        <div class="gp-input-group">
                            <label for="password">{{__('Confirm Password')}}</label>
                            <input type="password" class="gp-input" name=""password_confirmation"  placeholder="password">
                        </div>
{{--                        <label for="condition">--}}
{{--                            <input type="checkbox" name="condition" id="condition">--}}
{{--                            <span>--}}
{{--									I do not wish to receive news and promotions from Astriol Company by email.--}}
{{--								</span>--}}
{{--                        </label>--}}

                        <button type="button" class="gp-btn submit-btn">
                            Sign Up <i class="ei ei-arrow_right"></i>
                        </button>
                    </form>
                    <!-- /.account-form -->
                </div>
                <!-- /.col-md-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.signin-page -->

    <!--=========================-->
    <!--=        Footer         =-->
    <!--=========================-->
    <footer class="site-footer" id="footer-saas-two">
        <div class="container">
            <div class="footer-nner wow pixFadeUp">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget footer-widget widget-about">
                            <div class="footer-logo">
                                <img src="{{asset('front/assets/img/logo-saas-light.png')}}" alt="site-logo">
                            </div>
                            <div class="copyright-text">
                                <p class="copyright-text">Copyright © 2021 Astriol by <a href="http://gptheme.com">GpTheme</a>. All Rights Reserved</p>
                            </div>

                            <ul class="footer-social-link">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <!-- /.widget footer-widget -->
                    </div>
                    <!-- /.col-lg-3 col-md-6 -->

                    <div class="col-lg-3 col-md-6">
                        <div class="widget footer-widget">
                            <h3 class="widget-title">Download</h3>

                            <ul class="footer-menu">
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Android App</a></li>
                                <li><a href="#">Ios App</a></li>
                                <li><a href="#">Desktop</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Partners</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                        <!-- /.widget footer-widget -->
                    </div>
                    <!-- /.col-lg-3 col-md-6 -->

                    <div class="col-lg-3 col-md-6">
                        <div class="widget footer-widget">
                            <h3 class="widget-title">Quick Links</h3>

                            <ul class="footer-menu">
                                <li><a href="#">About Astriol</a></li>
                                <li><a href="#">Web Jobs</a></li>
                                <li><a href="#">Web Design</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">UI/UX</a></li>
                                <li><a href="#">Template</a></li>
                            </ul>
                        </div>
                        <!-- /.widget footer-widget -->
                    </div>
                    <!-- /.col-lg-3 col-md-6 -->

                    <div class="col-lg-2 col-md-6">
                        <div class="widget footer-widget">
                            <h3 class="widget-title">Information</h3>

                            <ul class="footer-menu">
                                <li><a href="#">Reporting</a></li>
                                <li><a href="#">Management </a></li>
                                <li><a href="#">Tracking </a></li>
                                <li><a href="#">Pricing </a></li>
                                <li><a href="#">Coinking </a></li>
                                <li><a href="#">Support </a></li>
                            </ul>
                        </div>
                        <!-- /.widget footer-widget -->
                    </div>
                    <!-- /.col-lg-3 col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.footer-nner -->
        </div>
        <!-- /.container -->

        <div class="footer-bottom-shape">
            <div class="three-left">
                <img src="{{asset('front/media/footer/tree_left.png')}}" alt="tree">
            </div>

            <div class="three-right">
                <img src="{{asset('front/media/footer/tree_right.png')}}" alt="tree">
            </div>

            <div class="container">
                <div class="footer-center-victor">
                    <div class="foo-shape-one">
                        <img src="{{asset('front/media/footer/man-female1.png')}}" alt="man">
                    </div>

                    <div class="foo-shape-two">
                        <img src="{{asset('front/media/footer/man1.png')}}" alt="man">
                    </div>

                    <div class="foo-shape-three">
                        <img src="{{asset('front/media/footer/man-female2.png')}}" alt="man">
                    </div>

                    <div class="foo-shape-four">
                        <img src="{{asset('front/media/footer/man2.png')}}" alt="man">
                    </div>

                    <div class="foo-shape-five">
                        <img src="{{asset('front/media/footer/vase.png')}}" alt="man">
                    </div>
                </div>
                <!-- /.footer-center-victor -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.footer-bottom-shape -->
    </footer>
    <!-- /#footer -->


</div>
<!-- /#site -->

<!-- Dependency Scripts -->
<script src="{{asset('front/dependencies/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front/dependencies/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/dependencies/swiper/js/swiper.min.js')}}'"></script>
<script src="{{asset('front/dependencies/isotope-layout/isotope.pkgd.min.js')}}'"></script>
<script src="{{asset('front/dependencies/imagesloaded/imagesloaded.pkgd.min.js')}}'"></script>
<script src="{{asset('front/dependencies/magnific-popup/js/jquery.magnific-popup.min.js')}}'"></script>
<script src="{{asset('front/dependencies/jquery.appear/jquery.appear.js')}}'"></script>
<script src="{{asset('front/dependencies/wow/js/wow.min.js')}}"></script>
<script src="{{asset('front/assets/js/TweenMax.min.js')}}"></script>
<script src="{{asset('front/dependencies/countUp.js/countUp.min.js')}}'"></script>
<script src="{{asset('front/dependencies/bodymovin/lottie.min.js')}}"></script>
<script src="{{asset('front/dependencies/jquery.parallax-scroll/js/jquery.parallax-scroll.js')}}"></script>
<script src="{{asset('front/dependencies/wavify/wavify.js')}}"></script>
<script src="{{asset('front/dependencies/jquery.marquee/js/jquery.marquee.js')}}"></script>
<script src="{{asset('front/assets/js/jarallax.min.js')}}"></script>
<script src="{{asset('front/dependencies/gmap3/js/gmap3.min.js')}}"></script>
<script src="{{asset('front/dependencies/slick-carousel/js/slick.min.js')}}'"></script>
<script src="{{asset('front/assets/js/jquery.parallax.min.js')}}"></script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M'></script>


<!-- Site Scripts -->
<script src="{{asset('front/assets/js/header.js')}}"></script>
<script src="{{asset('front/assets/js/app.js')}}"></script>

</body>

</html>
