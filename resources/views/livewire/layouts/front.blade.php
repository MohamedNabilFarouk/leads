
 <!doctype html>

@if(app()->getLocale()=='en')
    <html lang="en">
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
        <link rel="stylesheet" href="{{asset('front/assets/css/app.css')}}" type="text/css">
            <link rel="stylesheet" href="{{asset('assets/css/front-rtl.css')}}" type="text/css">
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


        <!--=========================-->
        <!--=        Navbar         =-->
        <!--=========================-->
        <header class="site-header header-sass header-transparent header-fixed" data-header-fixed="true" data-mobile-menu-resolution="992">
            <div class="container">
                <div class="header-inner">

                    <nav id="site-navigation" class="main-nav">

                        <div class="site-logo">
                            <a href="{{url('index')}}" class="logo">
                                <img style="width: 113px;height: 88px;" src="{{asset('front/assets/img/smartlogo.png')}}" alt="site logo" class="main-logo">
                                <img style="width: 113px;height: 88px;" src="{{asset('front/assets/img/smartlogo.png')}}" alt="site logo" class="logo-sticky">
                            </a>
                        </div>
                        <!-- /.site-logo -->

                        <div class="menu-wrapper main-nav-container canvas-menu-wrapper" id="mega-menu-wrap">
                            <div class="canvas-header">
                                <div class="mobile-offcanvas-logo">
                                    <a href="{{url('index')}}">
                                        <img style="width: 113px;height: 88px;" src="{{asset('front/assets/img/smartlogo.png')}}" alt="site logo" class="logo-sticky">
                                    </a>
                                </div>

                                <div class="close-menu" id="page-close-main-menu">
                                    <i class="ti-close"></i>
                                </div>

                            </div>

                            <ul class="astriol-main-menu">
                                <li class=" menu-item-depth-0">
                                    <a href="{{url('/index')}}">{{__('Home')}}</a>
                                </li>
                                <li class="menu-item-depth-0"><a href="{{url('about')}}">{{__('About')}}</a></li>
                                <li class="menu-item-depth-0"><a href="{{url('services')}}">{{__('Services')}}</a></li>

                                <!--								<li class="has-submenu menu-item-depth-0">-->
                                <!--									<a href="blog.html">Blog</a>-->
                                <!--									<ul class="sub-menu">-->
                                <!--										<li><a href="blog-filter.html">Blog With Filter</a></li>-->
                                <!--										<li><a href="blog.html">Blog Grid</a></li>-->
                                <!--										<li><a href="blog-classic.html">Blog Classic</a></li>-->
                                <!--										<li><a href="blog-single.html">Blog Single</a></li>-->
                                <!--									</ul>-->
                                <!--								</li>-->
                                <li><a href="{{url('pricing')}}">{{__('Pricing')}}</a></li>
                                <!--								<li class="has-submenu menu-item-depth-0">-->
                                <!--									<a href="#">Pages</a>-->

                                <!--									<ul class="sub-menu">-->
                                <!--										<li><a href="about.html">About</a></li>-->
                                <!--										<li class="has-submenu">-->
                                <!--											<a href="service.html">Service</a>-->
                                <!--											<ul class="sub-menu">-->
                                <!--												<li><a href="service.html">Service One</a></li>-->
                                <!--												<li><a href="service-two.html">Service Two</a></li>-->
                                <!--											</ul>-->
                                <!--										</li>-->
                                <!--										<li><a href="team.html">Our Team</a></li>-->
                                <!--										<li><a href="pricing.html">Pricing</a></li>-->
                                <!--										<li class="has-submenu">-->
                                <!--											<a href="portfolio.html">Portfolio</a>-->
                                <!--											<ul class="sub-menu">-->
                                <!--												<li><a href="portfolio-one.html">Two Column</a></li>-->
                                <!--												<li><a href="portfolio-two.html">Three Column</a></li>-->
                                <!--												<li><a href="portfolio-style-two.html">Three Column Style Two</a></li>-->
                                <!--												<li><a href="portfolio-three.html">With Filter</a></li>-->
                                <!--												<li><a href="portfolio-single.html">Portfolio Single</a></li>-->
                                <!--											</ul>-->
                                <!--										</li>-->
                                <!--										<li><a href="faq.html">Faq's</a></li>-->
                                <!--										<li><a href="error.html">Error 404</a></li>-->
                                <!--										<li><a href="login.html">Sing In</a></li>-->
                                <!--										<li><a href="signup.html">Sing Up</a></li>-->
                                <!--									</ul>-->
                                <!--								</li>-->
                                @if(!Auth::guard('clients')->user())
                                <li class="menu-item-depth-0"><a href="{{url('contact')}}">{{__('Contact')}}</a></li>
                                <li class="menu-item-depth-0"><a href="{{url('sign_in')}}">{{__('Sign Up/Sign In')}}</a></li>
                                @endif
                                @if(Auth::guard('clients')->user())

                                    <li class="has-submenu menu-item-depth-0">
                                        <a href={{'https://'.Auth::guard('clients')->user()->slug.'.hr-saas.alefsoftware.com/'}}>{{Auth::guard('clients')->user()->name}}</a>
                                        <ul class="sub-menu">
                                    <li class="menu-item-depth-0"><a href="{{url('log_out')}}">Logout</a></li>
                            </ul>
                                @endif

                                <li class="has-submenu menu-item-depth-0">
                                    <a href="">
                                        @if(app()->getLocale()=='en')
                                            <img src="https://smarthr.alefsoftware.com/assets/img/flags/us.png" alt="" width="35px;">
                                        @else
                                            <img src="https://smarthr.alefsoftware.com/assets/img/flags/sa.png" alt=""  width="35px;">

                                        @endif
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-depth-0"> <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                                <img src="https://smarthr.alefsoftware.com/assets/img/flags/us.png" alt=""  width="35px;">

                                            </a>
                                        </li>
                                        <li class="menu-item-depth-0">
                                        <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                            <img src="https://smarthr.alefsoftware.com/assets/img/flags/sa.png" alt=""  width="35px;">

                                        </a>
                                        </li>
                                    </ul>

                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- /.menu-wrapper -->

                        <div class="nav-right">

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
        @if (session()->has('message'))
        <div class="alert alert-danger text-center">{{ session('message') }}</div>
    @endif
      {{ $slot }}

        <!--=========================-->
        <!--=        Footer         =-->
        <!--=========================-->
        <footer id="footer-main" class="gp-site-footer">
            <div class="container">
                <div class="footer-widgets wow pixFadeUp">
                    <div class="row align">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="widget footer-widget widget-newsletter">
                                <div class="footer-logo">
                                    <img style="width: 113px;height: 88px;"  src="{{asset('front/assets/img/smartlogo.png')}}" alt="site-logo">
                                </div>

                                <p>
                                    {{__("Feel free to get in touch")}}<br>
                                    {{__("with us vai email")}}
                                </p>
                                @livewire('front.subscribe-form-component')


                            </div>
                            <!-- /.widget footer-widget -->
                        </div>
                        <!-- /.col-lg-3 col-md-6 col-sm-6 -->

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="widget footer-widget">
                                <h3 class="widget-title">{{__("About Us")}}</h3>

                                <ul class="footer-menu">
                                    <li><a href="{{url('about')}}">{{__("About Us")}}</a></li>
                                    {{-- <li><a href="index-saas.html">SmartHR</a></li>
                                    <li><a href="#">WordPress Quote Plugin</a></li> --}}
                                    <li><a href="{{url('contact')}}">{{__("Contact Us")}}</a></li>
                                </ul>

                            </div>
                            <!-- /.widget footer-widget -->
                        </div>
                        <!-- /.col-lg-3 col-md-6 col-sm-6 -->

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="widget footer-widget">
                                <h3 class="widget-title">{{__("Solutions")}}</h3>

                                <ul class="footer-menu">
                                    <li><a href="{{url('services')}}">{{__("Services")}}</a></li>
                                    {{-- <li><a href="faq.html">FAQ’s</a></li>
                                    <li><a href="#">Video Demos</a></li>
                                    <li><a href="contact.html">Join our Facebook Group</a></li>
                                    <li><a href="portfolio-three.html">Case Study</a></li> --}}
                                    <li><a href="{{url('/index')}}#section2">{{__("Ask For Demo")}}</a></li>
                                </ul>
                            </div>
                            <!-- /.widget footer-widget -->
                        </div>
                        <!-- /.col-lg-3 col-md-6 col-sm-6 -->

                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="widget footer-widget">
                                <h3 class="widget-title">{{__("Resources")}}</h3>

                                <ul class="footer-menu">
                                    <li><a href="{{('pricing')}}">{{__("Pricing")}}</a></li>
                                    <li><a href="{{('privacypolicy')}}">{{__("Privacy Policy")}}</a></li>
                                    <li><a href="{{('sign_in')}}">{{__("Login")}}</a></li>
                                    <li><a href="{{('contact')}}">{{__("Support")}}</a></li>
                                    {{-- <li><a href="{{('services')}}">Tour</a></li> --}}
                                </ul>
                            </div>
                            <!-- /.widget footer-widget -->
                        </div>
                        <!-- /.col-lg-3 col-md-6 col-sm-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.footer-nner -->
            </div>
            <!-- /.container -->

            <div class="site-info">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright">
                                <p class="copyright-text">Copyright © 2020 SmartHR by <a target="_blank" href="https://alefsoftware.com/ar/items/details/reasons-why-you-should-choose-alef-as-a-software-v">AlefSoftware</a>. {{__("All Rights Reserved")}}</p>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="footer-social-wrapper">
                                <ul class="footer-social-link">
                                    <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100093369281340"><i class="fab fa-facebook-f"></i></a></li>
                                    <li style="display:none"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li style="display:none"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <!-- /.footer-social-wrapper -->
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.site-info -->
        </footer>
        <!-- /#footer -->

        <div class="high-lighter-overlay"></div>

    </div>
    <!-- /#site -->

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
