<div>
    <!--==========================-->
    <!--=         Banner         =-->
    <!--==========================-->
    <section class="page-banner">
        <div class="page-title-wrapper text-center">
            <h1 class="page-title">{{__('Services')}}</h1>

            <ul class="breadcrumbs">
                <li><a href="{{url('index')}}">{{__('Home')}}</a></li>
                <li>{{__('Services')}}</li>
            </ul>
        </div>
        <!-- /.page-title-wrapper -->

        <ul class="banner-pertical">
            <li><img src="{{asset('front/media/banner/header/crose.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('front/media/banner/header/box.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('front/media/banner/header/dot.png')}}" alt="astriol pertical"></li>
            <li><img src="{{asset('front/media/banner/header/dot_sm.png')}}" data-parallax='{"y": 100}' alt="astriol pertical"></li>
            <li><img src="{{asset('front/media/banner/header/line.png')}}" data-parallax='{"y": 50, "x": 100}' alt="astriol pertical"></li>
            <li data-parallax='{"y": -100}'></li>
            <li></li>
        </ul>
        <!-- /.banner-pertical -->

    </section>
    <!-- /.page-banner -->

    <!--===========================-->
    <!--=         Feature         =-->
    <!--===========================-->
    <section class="feature-page">
        <div class="container">
            <div class="section-heading">
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

    <!--===========================-->
    <!--=         Platform        =-->
    <!--===========================-->
    {{-- <section id="platform">
        <div class="container">
            <div class="section-heading">
                <h2 class="section-title wow fadeInUp">
                    The Point of Sale Platform<br> Powering the Most Successful Restaurants
                </h2>
            </div>
            <!-- /.section-heading -->

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="icon-list-box wow fadeInUp" data-wow-delay="0.3s">
                        <div class="list-icon">
                            <i class="ei ei-icon_check"></i>
                        </div>

                        <div class="content">
                            <p>
                                Easy-to-use software that can scale with your business
                            </p>
                        </div>
                    </div>
                    <!-- /.icon-list-box -->
                </div>
                <!-- /.col-lg-4  col-md-4 -->

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="icon-list-box wow fadeInUp" data-wow-delay="0.3s">
                        <div class="list-icon">
                            <i class="ei ei-icon_check"></i>
                        </div>

                        <div class="content">
                            <p>
                                Cloud-based reports accessible in real-time
                            </p>
                        </div>
                    </div>
                    <!-- /.icon-list-box -->
                </div>
                <!-- /.col-lg-4  col-md-4 -->

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="icon-list-box wow fadeInUp" data-wow-delay="0.3s">
                        <div class="list-icon">
                            <i class="ei ei-icon_check"></i>
                        </div>

                        <div class="content">
                            <p>
                                Hardwired terminals and offline mode so nothing slows you down
                            </p>
                        </div>
                    </div>
                    <!-- /.icon-list-box -->
                </div>
                <!-- /.col-lg-4  col-md-4 -->

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="icon-list-box wow fadeInUp" data-wow-delay="0.5s">
                        <div class="list-icon">
                            <i class="ei ei-icon_check"></i>
                        </div>

                        <div class="content">
                            <p>
                                Tickety boo what a plonker blower tinkety tonk old fruit
                            </p>
                        </div>
                    </div>
                    <!-- /.icon-list-box -->
                </div>
                <!-- /.col-lg-4  col-md-4 -->

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="icon-list-box wow fadeInUp" data-wow-delay="0.5s">
                        <div class="list-icon">
                            <i class="ei ei-icon_check"></i>
                        </div>

                        <div class="content">
                            <p>
                                Simple, flat rate payment processing for all transactions
                            </p>
                        </div>
                    </div>
                    <!-- /.icon-list-box -->
                </div>
                <!-- /.col-lg-4  col-md-4 -->

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="icon-list-box wow fadeInUp" data-wow-delay="0.5s">
                        <div class="list-icon">
                            <i class="ei ei-icon_check"></i>
                        </div>

                        <div class="content">
                            <p>
                                Tableside ordering and payments, with digital receipts, to grow your customer list
                            </p>
                        </div>
                    </div>
                    <!-- /.icon-list-box -->
                </div>
                <!-- /.col-lg-4  col-md-4 -->
            </div>
            <!-- /.row -->

            <div class="platform-mockup text-center">
                <img src="{{asset('front/media/feature/16.png')}}" class="wow fadeInDown" data-wow-delay="0.7s" alt="mockup">
            </div>
            <!-- /.platform-mockup -->
        </div>
        <!-- /.container -->
    </section> --}}
    <!-- /#platform -->

    <!--=========================-->
    <!--=         Image Content         =-->
    <!--=========================-->
    <section class="service-image-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="image-content-wrapper">
                        <h2 class="title">{{__('How we help our clients')}} </h2>



                        <ul class="listitem color-theme">
                            <li><i class="ei ei-icon_check"></i>{{__('Create unique websites')}}</li>
                            <li><i class="ei ei-icon_check"></i> {{__('Automate your busy work')}}</li>
                            <li><i class="ei ei-icon_check"></i>{{__('Optimize all your efforts')}}</li>
                        </ul>

                        <a href="{{url('/contact')}}" class="gp-btn float">{{__('Contact')}}</a>
                    </div>
                    <!-- /.image-content-wrapper -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="service-featured-image">
                        <img src="{{asset('front/media/feature/image3.png')}}" alt="">
                    </div>
                    <!-- /.service-featured-image -->
                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.service-image-content -->

</div>
