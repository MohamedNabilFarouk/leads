<div>
    <!--==========================-->
    <!--=         Banner         =-->
    <!--==========================-->
    @if($section_one->active==1)
    <section class="banner banner-main">
        <div class="container">
            <div class="banner-main-content-wrapper">
                <div class="banner-content">
                    <h1 class="banner-title wow fadeInUp">
                        @if(app()->getLocale()=='en')
                            {{$section_one->title_en}}
                        @else
                        {{$section_one->title_ar}}
                        @endif
                    </h1>

                    <!--						<p class="description wow fadeInUp" data-wow-delay="0.3s">For everyone, from beginners to experts</p>-->

                    <div class="banner-button-container">
                        <a href="{{asset($section_one->link)}}" class="gp-btn banner-btn btn-circle color-two wow flipInX" data-wow-delay="0.5s">
                            @if(app()->getLocale()=='en')
                            {{$section_one->button_en}}
                        @else
                        {{$section_one->button_ar}}
                        @endif</a>
                        <a href="{{asset($section_one->second_link)}}" class="gp-btn banner-btn btn-circle color-two btn-light ml-3 wow flipInX" data-wow-delay="0.5s">
                        @if(app()->getLocale()=='en')
                            {{$section_one->second_button_en}}
                        @else
                        {{$section_one->second_button_ar}}
                        @endif
                        </a>
                    </div>
                    <!-- /.banner-button-container -->
                </div>
                <!-- /.banner-content -->

                <div class="banner-promo-mockup">
                    <img src="{{asset($section_one->image)}}" class="wow fadeInUp" data-wow-delay="0.7s" alt="SmartHR">
                </div>
            </div>
            <!-- /.banner-main-content-wrapper -->
        </div>
        <!-- /.container -->

        <div class="banner-main-animate">
            <ul class="animate-items">
                <li><img src="{{asset('front/media/banner/main/leaf1.png')}}" alt="leaf"></li>
                <li><img src="{{asset('front/media/banner/main/rabar.png')}}" data-parallax='{"y": 200, "x": 100}' alt="leaf"></li>
                <li><img src="{{asset('front/media/banner/main/angle.png')}}" data-parallax='{ "x": -200, "rotateZ": 360}' alt="leaf"></li>
                <li><img src="{{asset('front/media/banner/main/leaf3.png')}}" data-parallax='{"y": 100, "x": 100}' alt="leaf"></li>
                <li><img src="{{asset('front/media/banner/main/dot.png')}}" alt="leaf"></li>
                <li><img src="{{asset('front/media/banner/main/box.png')}}" data-parallax='{"y": -200, "x": -100, "rotateZ": 360}' alt="leaf"></li>
                <li class="bubble1"></li>
                <li class="bubble2"></li>
                <li class="bubble3"></li>
                <li class="bubble4"></li>
            </ul>
        </div>
    </section>
    <!-- /.banner banner-main -->
    @endif
    <!--===============================-->
    <!--=         Client Logo         =-->
    <!--===============================-->
    <section class="client-logo-marque">
        <div class="container">
            <div class="section-heading style-four font-light">
                <h2 class="section-title">
                    {{__("Trusted by more than")}}<br>
                    14,000 {{__("users")}}
                </h2>
            </div>

            <div class="logo-marque" style="direction: ltr">
                <div class="marquee-wrap">
                    <ul class="logo-marque-items">


                        <li>
                            <div class="logo-item">
                                <a href="#">
                                    <img src="{{asset('front/media/client/ehotel.png')}}" alt="astriol logo">
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="logo-item">
                                <a href="#">
                                    <img src="{{asset('front/media/client/Richhomes.png')}}" alt="astriol logo">
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="logo-item">
                                <a href="#">
                                    <img src="{{asset('front/media/client/faraj.png')}}" alt="astriol logo">
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="logo-item">
                                <a href="#">
                                    <img src="{{asset('front/media/client/jawhara.png')}}" alt="astriol logo">
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="logo-item">
                                <a href="#">
                                    <img src="{{asset('front/media/client/massage.png')}}" alt="astriol logo">
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="logo-item">
                                <a href="#">
                                    <img src="{{asset('front/media/client/productive.png')}}" alt="astriol logo">
                                </a>
                            </div>
                        </li>


                    </ul>
                </div>
                <!-- /.marquee-wrap -->
            </div>
            <!-- /.logo-marque -->

            {{-- <div class="btn-container text-center">
                <a href="#" class="view-btn">View All Partners <i class="ei ei-arrow_right"></i></a>
            </div> --}}
        </div>
        <!-- /.container -->
    </section>
    <!-- /.client-logo-marque -->

    <!--===============================-->
    <!--=         Feature Box         =-->
    <!--===============================-->
    @if($section_two->active==1)
    <section class="service-one">
        <div class="container">
            <div class="section-heading style-four">
                <h2 class="section-title wow fadeInUp" data-wow-delay="0.3s">
                    @if(app()->getLocale()=='en')

                        {{$section_two->title_en}}
                    @else
                        {{$section_two->title_ar}}
                    @endif
                </h2>
            </div>
            <!-- /.section-heading -->

            <div class="row">
@foreach($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="icon-box style-one wow fadeInRight" data-wow-delay="0.3s">
                            <div class="icon-container {{$service->color}}">
                                <i class="{{$service->icon}} icons"></i>
                            </div>

                            <div class="box-content">
                                <h3 class="box-title">
                                    <a href="{{asset('service')}}">
                                        @if(app()->getLocale()=='en')
                                            {{$service->title_en}}
                                        @else
                                            {{$service->title_ar}}
                                        @endif</a>
                                </h3>

                                <p>
                                    @if(app()->getLocale()=='en')
                                        {{$service->description_en}}
                                    @else
                                        {{$service->description_ar}}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <!-- /.icon-box style-one -->
                    </div>
                    <!-- /.col-lg-4 col-md-6 col-sm-6 -->

                @endforeach

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#feature -->
    @endif

    <!--====================================-->
    <!--=         Dashboard Slider         =-->
    <!--====================================-->
    <section class="dashboard-preview" id="slider-tab">
        <div class="container">
            <div class="section-heading style-four">
                <h2 class="section-title wow fadeInUp">
                    @if(app()->getLocale()=='en')
                        {{$section_three->title_en}}
                    @else
                        {{$section_three->title_ar}}
                    @endif

                </h2>

                <p class="description wow fadeInUp" data-wow-delay="0.3s">
                    @if(app()->getLocale()=='en')
                        {{$section_three->description_en}}
                    @else
                        {{$section_three->description_ar}}
                    @endif
                </p>
            </div>
            <div class="preview-slider wow fadeInUp" data-wow-delay="0.5s">
                <div class="row align-items-center">
                    <div class="col-md-4 col-sm-12">
                        <!-- Add Pagination -->
                        <div class="astriol-pagination"></div>
                    </div>
                    <!-- /.col-md-4 col-sm-12 -->

                    <div class="col-md-8 col-sm-12">
                        <div class="swiper-container previewSlider">
                            <div class="swiper-wrapper">
                                @foreach($features as $feature)
                                    @if(app()->getLocale()=='en')
                                        @php
                                            $feature_name=$feature->title_en;
                                        @endphp
                                    @else
                                        @php
                                        $feature_name=$feature->title_ar;
                                        @endphp
                                    @endif
                                <div class="swiper-slide {{$feature->color}}" data-image="{{$feature->icon}}" data-title="{{$feature_name}}">
                                    <div class="slide-image-wrapper">
                                        <img src="{{asset($feature->image)}}" alt="All Employees">
                                    </div>

                                    <!-- /.slide-image-wrapper -->
                                </div>
                                @endforeach
{{--                                <div class="swiper-slide color-two" data-image="ei ei-icon_cloud_alt" data-title="Leaves">--}}
{{--                                    <div class="slide-image-wrapper">--}}
{{--                                        <img src="{{asset('front/media/preview-slider/2.png')}}" alt="Leaves">--}}
{{--                                    </div>--}}
{{--                                    <!-- /.slide-image-wrapper -->--}}
{{--                                </div>--}}
{{--                                <div class="swiper-slide color-three" data-image="ei ei-icon_profile" data-title="Attendance">--}}
{{--                                    <div class="slide-image-wrapper">--}}
{{--                                        <img src="{{asset('front/media/preview-slider/3.png')}}" alt="Attendance">--}}
{{--                                    </div>--}}
{{--                                    <!-- /.slide-image-wrapper -->--}}
{{--                                </div>--}}
{{--                                <div class="swiper-slide color-four" data-image="ei ei-icon_grid-2x2" data-title="Overtime">--}}
{{--                                    <div class="slide-image-wrapper">--}}
{{--                                        <img src="{{asset('front/media/preview-slider/4.png')}}" alt="overtime">--}}
{{--                                    </div>--}}
{{--                                    <!-- /.slide-image-wrapper -->--}}
{{--                                </div>--}}
{{--                                <div class="swiper-slide color-five" data-image="ei ei-icon_group" data-title="Loan">--}}
{{--                                    <div class="slide-image-wrapper">--}}
{{--                                        <img src="{{asset('front/media/preview-slider/5.png')}}" alt="Loan">--}}
{{--                                    </div>--}}
{{--                                    <!-- /.slide-image-wrapper -->--}}
{{--                                </div>--}}
{{--                                <div class="swiper-slide color-six" data-image="ei ei-icon_film" data-title="Performance">--}}
{{--                                    <div class="slide-image-wrapper">--}}
{{--                                        <img src="{{asset('front/media/preview-slider/6.png')}}" alt="Performance">--}}
{{--                                    </div>--}}
{{--                                    <!-- /.slide-image-wrapper -->--}}
{{--                                </div>--}}
{{--                                <div class="swiper-slide color-six" data-image="ei ei-icon_film" data-title="Payroll">--}}
{{--                                    <div class="slide-image-wrapper">--}}
{{--                                        <img src="{{asset('front/media/preview-slider/7.png')}}" alt="Payroll">--}}
{{--                                    </div>--}}
{{--                                    <!-- /.slide-image-wrapper -->--}}
{{--                                </div>--}}
                            </div>

                        </div>
                    </div>
                    <!-- /.col-md-8 col-sm-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.preview-slider -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.dashboard-preview -->

    <!--================================-->
    <!--=         Image Content        =-->
    <!--================================-->
    <section class="image-content">
        <div class="container">
            <div class="row mb-140">
                <div class="col-lg-7">
                    <div class="anime-image-wrapper">
                        <div class="feature-image-wrap">
                            <img src="{{asset('front/media/feature/project.png')}}" class="wow zoom" alt="astriol feature">
                        </div>
                    </div>
                    <!-- /.anime-image-wrapper -->
                </div>
                <!-- /.col-md-6 -->

                <div class="col-lg-5">
                    <div class="image-content-wrapper style-two">
                        <h2 class="title wow fadeInUp">
                            @if(app()->getLocale()=='en')
                                {{$section_four->title_en}}
                            @else
                                {{$section_four->title_ar}}
                            @endif
                        </h2>

                        <p class="wow fadeInUp lead-text" data-wow-delay="0.3s">
                            @if(app()->getLocale()=='en')
                                {{$section_four->description_en}}
                            @else
                                {{$section_four->description_ar}}
                            @endif
                        </p>

                        <!--							<p class="deacription wow fadeInUp" data-wow-delay="0.5s">-->
                        <!--								The full monty so I said have it what a load of rubbish cheeky bevvy car boot chip shop blow off-->
                        <!--								happy days the zonked brilliant daft super gutted mate the wireless boot hanky panky.!-->
                        <!--							</p>-->

                        <!--							<div class="author-info-single wow fadeInUp" data-wow-delay="0.7s">-->
                        <!--								<div class="avatar">-->
                        <!--									<img src="media/about/author.jpg" alt="author">-->
                        <!--								</div>-->

                        <!--								<div class="content">-->
                        <!--									<h3 class="name">Joss Sticks</h3>-->
                        <!--									<span class="designation">Project Manager</span>-->
                        <!--								</div>-->
                        <!--							</div>-->

                    </div>
                    <!-- /.image-content-wrapper -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->


            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.image-content -->

    <!--================================-->
    <!--=         Image Content        =-->
    <!--================================-->
    <section class="image-content">
        <div class="container">
            <div class="row mb-140">
                <div class="col-lg-7">
                    <div class="anime-image-wrapper">
                        <div class="feature-image-wrap">
                            <img src="{{asset('front/media/feature/image5.png')}}" class="wow zoom" alt="astriol feature">
                        </div>
                    </div>
                    <!-- /.anime-image-wrapper -->
                </div>
                <!-- /.col-md-6 -->

                <div class="col-lg-5">
                    <div class="image-content-wrapper style-two">
                        <h2 class="title wow fadeInUp">
                            @if(app()->getLocale()=='en')
                                {{$section_five->title_en}}
                            @else
                                {{$section_five->title_ar}}
                            @endif
                        </h2>

                        <p class="wow fadeInUp lead-text" data-wow-delay="0.3s">
                            @if(app()->getLocale()=='en')
                                {{$section_five->description_en}}
                            @else
                                {{$section_five->description_ar}}
                            @endif
                        </p>

                        <!--							<p class="deacription wow fadeInUp" data-wow-delay="0.5s">-->
                        <!--								The full monty so I said have it what a load of rubbish cheeky bevvy car boot chip shop blow off-->
                        <!--								happy days the zonked brilliant daft super gutted mate the wireless boot hanky panky.!-->
                        <!--							</p>-->

                        <!--							<div class="author-info-single wow fadeInUp" data-wow-delay="0.7s">-->
                        <!--								<div class="avatar">-->
                        <!--									<img src="media/about/author.jpg" alt="author">-->
                        <!--								</div>-->

                        <!--								<div class="content">-->
                        <!--									<h3 class="name">Joss Sticks</h3>-->
                        <!--									<span class="designation">Project Manager</span>-->
                        <!--								</div>-->
                        <!--							</div>-->

                    </div>
                    <!-- /.image-content-wrapper -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->

            <div class="row align-items-center">
                <div class="col-lg-5 order-md">
                    <div class="image-content-wrapper style-two">
                        <h2 class="title wow fadeInUp">
                            @if(app()->getLocale()=='en')
                                {{$section_six->title_en}}
                            @else
                                {{$section_six->title_ar}}
                            @endif
                        </h2>

                        <p class="lead wow fadeInUp lead-text" data-wow-delay="0.3s">

                            @if(app()->getLocale()=='en')
                                {{$section_six->description_en}}
                            @else
                                {{$section_six->description_ar}}
                            @endif

                        </p>

                        <a href="{{$section_six->link}}" target='_blank' class="gp-btn btn-circle color-two wow fadeInUp float" data-wow-delay="0.7s">
                            @if(app()->getLocale()=='en')
                                {{$section_six->button_en}}
                            @else
                                {{$section_six->button_ar}}
                            @endif
                        </a>
                    </div>
                    <!-- /.image-content-wrapper -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-7">
                    <div class="anime-image-wrapper style-four">
                        <div class="feature-image-wrap">
                            <img src="{{asset('front/media/feature/iphone.png')}}" class="wow zoom" data-wow-delay="0.7s" alt="astriol feature">

                            <div class="image-one" data-parallax='{"y": -60}'>
                                <img src="{{asset('front/media/feature/imagesm.png')}}" class="wow fadeInDown" data-wow-delay="0.9s" alt="astriol">
                            </div>
                            <!-- /.image-one -->

                            <div class="image-two" data-parallax='{"y": 60}'>
                                <img src="{{asset('front/media/feature/imagelong.png')}}" class="wow fadeInUp" data-wow-delay="1.1s" alt="astriol">
                            </div>
                            <!-- /.image-two -->
                        </div>

                        <span class="circle wow zoom2"></span>

                        <div class="anime-dot">
                            <img src="{{asset('front/media/feature/dot3.png')}}" class="wow fadeInRight" data-wow-delay="0.3s" alt="astrion dot">
                        </div>
                    </div>
                    <!-- /.anime-image-wrapper -->
                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.image-content -->

    <!--==============================-->
    <!--=         Testimonial        =-->
    <!--==============================-->
    <!--		<section class="testimonials-creative">-->
    <!--			<div class="container">-->
    <!--				<div class="row">-->
    <!--					<div class="col-md-6 col-lg-7">-->
    <!--						<div class="section-heading style-four testimonial-heading text-left">-->
    <!--							<h2 class="section-title">Engage<br> your customers.</h2>-->
    <!--							<h3 class="sub-title">Customer’s Reviews</h3>-->

    <!--							&lt;!&ndash; Slider Nav &ndash;&gt;-->
    <!--							<div class="nav-control nav-static">-->
    <!--								<div class="gp-nav-prev">-->
    <!--									<i class="ei ei-arrow_left"></i>-->
    <!--								</div>-->
    <!--								<div class="gp-nav-next">-->
    <!--									<i class="ei ei-arrow_right"></i>-->
    <!--								</div>-->

    <!--							</div>-->
    <!--							&lt;!&ndash; /.nav-control &ndash;&gt;-->
    <!--						</div>-->
    <!--					</div>-->
    <!--					&lt;!&ndash; /.col-md-6 &ndash;&gt;-->

    <!--					<div class="col-md-6 col-lg-5">-->
    <!--						<div class="testimonial-wrap">-->
    <!--							<div class="quote">-->
    <!--								<img src="media/testimonial/quote2.png" alt="quote">-->
    <!--							</div>-->


    <!--							<div class="swiper-container" id="testimonial-creative" data-speed="1000" data-space="50">-->
    <!--								<div class="swiper-wrapper">-->
    <!--									<div class="swiper-slide">-->
    <!--										<div class="testimonial-cre">-->

    <!--											<div class="testi-content">-->
    <!--												<p>-->
    <!--													Nice one chimney pot are you taking the piss cup of tea gosh bonnet,-->
    <!--													smashing you mug knackered bum bag at public school, geeza arse-->
    <!--													bleeder-->
    <!--													young delinquent wellies off his nut barney knees up only.!-->
    <!--												</p>-->

    <!--											</div>-->
    <!--											&lt;!&ndash; /.testi-content &ndash;&gt;-->

    <!--											<div class="testmonial-info">-->
    <!--												<div class="info-wrapper">-->
    <!--													<div class="user-avatar">-->
    <!--														<img src="media/testimonial/01.jpg" alt="astriol user-avatar">-->
    <!--													</div>-->
    <!--													&lt;!&ndash; /.user-avatar &ndash;&gt;-->

    <!--													<div class="info">-->
    <!--														<h4 class="user-name">Hanson Deck</h4>-->
    <!--														<span class="designation">UI/UX designer</span>-->
    <!--													</div>-->
    <!--												</div>-->
    <!--												&lt;!&ndash; /.info-wrapper &ndash;&gt;-->
    <!--											</div>-->
    <!--											&lt;!&ndash; /.testmonial-info &ndash;&gt;-->
    <!--										</div>-->
    <!--										&lt;!&ndash; /.testimonial &ndash;&gt;-->
    <!--									</div>-->

    <!--									<div class="swiper-slide">-->
    <!--										<div class="testimonial-cre">-->

    <!--											<div class="testi-content">-->
    <!--												<p>-->
    <!--													Nice one chimney pot are you taking the piss cup of tea gosh bonnet,-->
    <!--													smashing you mug knackered bum bag at public school, geeza arse-->
    <!--													bleeder-->
    <!--													young delinquent wellies off his nut barney knees up only.!-->
    <!--												</p>-->

    <!--											</div>-->
    <!--											&lt;!&ndash; /.testi-content &ndash;&gt;-->

    <!--											<div class="testmonial-info">-->
    <!--												<div class="info-wrapper">-->
    <!--													<div class="user-avatar">-->
    <!--														<img src="media/testimonial/2.jpg" alt="astriol user-avatar">-->
    <!--													</div>-->
    <!--													&lt;!&ndash; /.user-avatar &ndash;&gt;-->

    <!--													<div class="info">-->
    <!--														<h4 class="user-name">Hanson Deck</h4>-->
    <!--														<span class="designation">UI/UX designer</span>-->
    <!--													</div>-->
    <!--												</div>-->
    <!--												&lt;!&ndash; /.info-wrapper &ndash;&gt;-->
    <!--											</div>-->
    <!--											&lt;!&ndash; /.testmonial-info &ndash;&gt;-->
    <!--										</div>-->
    <!--										&lt;!&ndash; /.testimonial &ndash;&gt;-->
    <!--									</div>-->

    <!--									<div class="swiper-slide">-->
    <!--										<div class="testimonial-cre">-->

    <!--											<div class="testi-content">-->
    <!--												<p>-->
    <!--													Nice one chimney pot are you taking the piss cup of tea gosh bonnet,-->
    <!--													smashing you mug knackered bum bag at public school, geeza arse-->
    <!--													bleeder-->
    <!--													young delinquent wellies off his nut barney knees up only.!-->
    <!--												</p>-->

    <!--											</div>-->
    <!--											&lt;!&ndash; /.testi-content &ndash;&gt;-->

    <!--											<div class="testmonial-info">-->
    <!--												<div class="info-wrapper">-->
    <!--													<div class="user-avatar">-->
    <!--														<img src="media/testimonial/3.jpg" alt="astriol user-avatar">-->
    <!--													</div>-->
    <!--													&lt;!&ndash; /.user-avatar &ndash;&gt;-->

    <!--													<div class="info">-->
    <!--														<h4 class="user-name">Hanson Deck</h4>-->
    <!--														<span class="designation">UI/UX designer</span>-->
    <!--													</div>-->
    <!--												</div>-->
    <!--												&lt;!&ndash; /.info-wrapper &ndash;&gt;-->
    <!--											</div>-->
    <!--											&lt;!&ndash; /.testmonial-info &ndash;&gt;-->
    <!--										</div>-->
    <!--										&lt;!&ndash; /.testimonial &ndash;&gt;-->
    <!--									</div>-->
    <!--								</div>-->
    <!--							</div>-->
    <!--						</div>-->
    <!--						&lt;!&ndash; /.testimonial-overflow-wrap &ndash;&gt;-->
    <!--					</div>-->
    <!--					&lt;!&ndash; /.col-md-6 &ndash;&gt;-->
    <!--				</div>-->
    <!--				&lt;!&ndash; /.row &ndash;&gt;-->
    <!--			</div>-->
    <!--			&lt;!&ndash; /.container &ndash;&gt;-->
    <!--		</section>-->
    <!-- /.testimonials -->

    <!--=======================-->
    <!--=         Blog        =-->
    <!--=======================-->
    <!--		<section id="blog-grid-one">-->
    <!--			<div class="container">-->
    <!--				<div class="row">-->
    <!--					<div class="col-lg-4 col-md-4 col-sm-6">-->
    <!--						<article class="blog-post-one">-->
    <!--							<div class="feature-image">-->
    <!--								<a href="blog-single.html">-->
    <!--									<img src="media/blog/m1.jpg" alt="blog-thumb">-->
    <!--								</a>-->

    <!--								<div class="entry-content">-->
    <!--									<div class="author vcard">-->
    <!--										<a class="post-author" href="blog-single.html">-->
    <!--											<img alt="" src="media/blog/author.jpg" class="avatar avatar-30 photo" height="30" width="30">-->
    <!--											Mominul Islam-->
    <!--										</a>-->
    <!--									</div>-->
    <!--									<ul class="post-meta">-->
    <!--										<li class="meta-cat"><a href="blog-single.html">WordPress</a></li>-->
    <!--										<li><i class="ei ei-icon_clock_alt"></i>July 20, 2021</li>-->
    <!--									</ul>-->

    <!--									<h3 class="entry-title">-->
    <!--										<a href="blog-single.html">We are launching the moodboard.</a>-->
    <!--									</h3>-->

    <!--									<p>-->
    <!--										The full monty so I said have it what load of rubbish cheeky.-->
    <!--									</p>-->
    <!--								</div>&lt;!&ndash; /.blog-content &ndash;&gt;-->
    <!--								<a href="blog-single.html" class="read-more-btn">Read More <i class="ei ei-arrow_right"></i></a>-->
    <!--							</div>&lt;!&ndash; /.feature-image &ndash;&gt;-->

    <!--						</article>&lt;!&ndash; /.blog-post &ndash;&gt;-->
    <!--					</div>&lt;!&ndash; /.col-lg-4 col-md-4 col-sm-6 &ndash;&gt;-->

    <!--					<div class="col-lg-4 col-md-4 col-sm-6">-->
    <!--						<article class="blog-post-one color-two">-->
    <!--							<div class="feature-image">-->
    <!--								<a href="blog-single.html">-->
    <!--									<img src="media/blog/m2.jpg" alt="blog-thumb">-->
    <!--								</a>-->

    <!--								<div class="entry-content">-->
    <!--									<div class="author vcard">-->
    <!--										<a class="url fn n post-author" href="blog-single.html">-->
    <!--											<img alt="" src="media/blog/author.jpg" class="avatar avatar-30 photo" height="30" width="30">-->
    <!--											Momin-->
    <!--										</a>-->
    <!--									</div>-->
    <!--									<ul class="post-meta">-->
    <!--										<li class="meta-cat"><a href="blog-single.html">Business</a></li>-->
    <!--										<li><i class="ei ei-icon_clock_alt"></i>Jun 20, 2021</li>-->
    <!--									</ul>-->

    <!--									<h3 class="entry-title">-->
    <!--										<a href="blog-single.html">We are launching the moodboard.</a>-->
    <!--									</h3>-->

    <!--									<p>-->
    <!--										The full monty so I said have it what load of rubbish cheeky.-->
    <!--									</p>-->
    <!--								</div>&lt;!&ndash; /.blog-content &ndash;&gt;-->
    <!--								<a href="blog-single.html" class="read-more-btn">Read More <i class="ei ei-arrow_right"></i></a>-->
    <!--							</div>&lt;!&ndash; /.feature-image &ndash;&gt;-->

    <!--						</article>&lt;!&ndash; /.blog-post &ndash;&gt;-->
    <!--					</div>&lt;!&ndash; /.col-lg-4 col-md-4 col-sm-6 &ndash;&gt;-->

    <!--					<div class="col-lg-4 col-md-4 col-sm-6">-->
    <!--						<article class="blog-post-one color-three">-->
    <!--							<div class="feature-image">-->
    <!--								<a href="blog-single.html">-->
    <!--									<img src="media/blog/m3.jpg" alt="blog-thumb">-->
    <!--								</a>-->

    <!--								<div class="entry-content">-->
    <!--									<div class="author vcard">-->
    <!--										<a class="url fn n post-author" href="blog-single.html">-->
    <!--											<img alt="" src="media/blog/author.jpg" class="avatar avatar-30 photo" height="30" width="30">-->
    <!--											Momin-->
    <!--										</a>-->
    <!--									</div>-->
    <!--									<ul class="post-meta">-->
    <!--										<li class="meta-cat"><a href="blog-single.html">Analytics</a></li>-->
    <!--										<li><i class="ei ei-icon_clock_alt"></i>May 20, 2021</li>-->
    <!--									</ul>-->

    <!--									<h3 class="entry-title">-->
    <!--										<a href="blog-single.html">We are launching the moodboard.</a>-->
    <!--									</h3>-->

    <!--									<p>-->
    <!--										The full monty so I said have it what load of rubbish cheeky.-->
    <!--									</p>-->
    <!--								</div>&lt;!&ndash; /.blog-content &ndash;&gt;-->
    <!--								<a href="blog-single.html" class="read-more-btn">Read More <i class="ei ei-arrow_right"></i></a>-->
    <!--							</div>&lt;!&ndash; /.feature-image &ndash;&gt;-->

    <!--						</article>&lt;!&ndash; /.blog-post &ndash;&gt;-->
    <!--					</div>&lt;!&ndash; /.col-lg-4 col-md-4 col-sm-6 &ndash;&gt;-->
    <!--				</div>&lt;!&ndash; /.row &ndash;&gt;-->
    <!--			</div>&lt;!&ndash; /.container &ndash;&gt;-->
    <!--		</section>&lt;!&ndash; /#blog-grid &ndash;&gt;-->

    <!--==================================-->
    <!--=         Call To Action         =-->
    <!--==================================-->
    <section class="call-to-action-creative" id="demo">
        <div class="container pr">

            <div class="call-to-action-wrapper">
                <div class="circle-top">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="300px" height="300px">
                        <defs>
                            <linearGradient id="PSgrad_0" x1="50%" x2="0%" y1="0%" y2="86.603%">
                                <stop offset="0%" stop-color="rgb(124,61,252)" stop-opacity="1" />
                                <stop offset="1%" stop-color="rgb(124,61,252)" stop-opacity="0.99" />
                                <stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="0" />
                            </linearGradient>

                        </defs>
                        <path fill-rule="evenodd" fill-opacity="0" opacity="0.502" fill="rgb(255, 255, 255)" d="M150.000,-0.000 C232.843,-0.000 300.000,67.157 300.000,150.000 C300.000,232.843 232.843,300.000 150.000,300.000 C67.157,300.000 -0.000,232.843 -0.000,150.000 C-0.000,67.157 67.157,-0.000 150.000,-0.000 Z" />
                        <path fill="url(#PSgrad_0)" d="M150.000,-0.000 C232.843,-0.000 300.000,67.157 300.000,150.000 C300.000,232.843 232.843,300.000 150.000,300.000 C67.157,300.000 -0.000,232.843 -0.000,150.000 C-0.000,67.157 67.157,-0.000 150.000,-0.000 Z" />
                    </svg>
                </div>
                <section id="section2">
                <!-- /.circle-top -->
                <div class="action-content-inner pb-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="action-content-wrapper">
                                <h2 class="title">
                                    {{__('Ask For Demo')}}
                                </h2>

                                <div class="contact-form-wrapper">
                                    <div class="card-body">
                                        @if (session()->has('message'))
                                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                                        @endif
                                    </div>
                                    <form wire:submit.prevent="demoRequest">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @error('name')
                                                <span class="text-white" style="font-size: 11.5px;">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="name" placeholder="{{__('Name')}}" class="gp-input" wire:model="name" required>

                                            </div>
                                            <!-- /.col-md-6 -->

                                            <div class="col-md-12">
                                                @error('company_name')
                                                <span class="text-white" style="font-size: 11.5px;">{{ $message }}</span>
                                                @enderror
                                                <input type="company_name" name="email" placeholder="{{__('Company Name')}}" class="gp-input" wire:model="company_name" required>

                                            </div>
                                            <!-- /.col-md-6 -->

                                            <div class="col-md-12">
                                                @error('phone')
                                                <span class="text-white" style="font-size: 11.5px;">{{ $message }}</span>
                                                @enderror
                                                <input type="text" name="phone" placeholder="{{__('Phone')}}" class="gp-input" wire:model="phone" required>

                                                <!--													<textarea name="content" id="message" cols="30" rows="10" class="gp-input gp-textarea" placeholder="Your Comment"></textarea>-->
                                                <!--													<button type="submit" class="gp-btn btn-submit">Send Message</button>-->
                                                <button class="gp-btn color-two btn-light btn-circle float">{{__('Submit')}}</button>

                                                <div class="form-result alert" style="display: none;">
                                                    <div class="content"></div>
                                                </div>
                                                <!-- /.form-result-->
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </form>
                                    <!-- /.contact-form-main -->
                                </div>
                            </div>
                            <!-- /.action-content-wrapper -->
                        </div>
                        <!-- /.col-md-6 -->

                        <div class="col-md-6">
                            <div class="action-image-wrapper">
                                <div class="image-one wow fadeInRight">
                                    <img src="{{asset('front/media/call-to-action/ac_1.png')}}" data-parallax='{"x": -50}' alt="animated-image-one">
                                </div>
                                <!--									<div class="image-two wow fadeInLeft">-->
                                <!--										<img src="media/call-to-action/ac_2.png" data-parallax='{"x": 50}' alt="animated-image-one">-->
                                <!--									</div>-->
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.action-content-inner -->
                </section>
                <span class="circle-bottom"></span> <!-- /.circle-bottom -->
            </div>
            <!-- /.call-to-action-wrapper -->

        </div>
        <!-- /.container -->
    </section>

</div>
