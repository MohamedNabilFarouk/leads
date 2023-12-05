<div>
    <style>
        iframe{
            width: 100%;
        }
    </style>
    <!--==========================-->
    <!--=         Banner         =-->
    <!--==========================-->
    <section class="page-banner-two">

        <div class="container pr">
            <ul class="banner-pertical-three">
                <li>
                    <img src="{{asset('front/media/banner/main/rabar.png')}}" data-parallax='{"y": -50, "x": -50}' alt="astriol pertical">
                </li>
                <li>
                    <img src="{{asset('front/media/banner/main/flash.png')}}" data-parallax='{"y": -50, "x": 50}' alt="astriol pertical">
                </li>
            </ul>
            <!-- /.banner-pertical -->

            <div class="page-title-wrapper text-left">
                <h1 class="page-title">{{__('Contact')}}</h1>

                <ul class="breadcrumbs">
                    <li>
                        <a href="{{url('index')}}">{{__('Home')}}</a>
                    </li>
                    <li>{{__('Contact')}}</li>
                </ul>
            </div>
            <!-- /.page-title-wrapper -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.page-banner -->

    <!--================================-->
    <!--=         Contact Form         =-->
    <!--================================-->
    <section class="contact-form-page">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-information">
                        <h3 class="contact-title">{{__('Contact Us')}}</h3>

                        <p class="description">
                            {{$contact_us->title}}

                        </p>

                        <div class="info-list">
                            <h3 class="info-title">{{__("Phone")}}:</h3>
                            <p>
                                {{$contact_us->contact_phone}}
                            </p>
                        </div>
                        <!-- /.info-list -->

                        <div class="info-list">
                            <h3 class="info-title">{{__("Email")}}:</h3>
                            <p>
                                {{$contact_us->contact_email}}
                            </p>
                        </div>
                        <!-- /.info-list -->

                        <div class="info-list mb-0">
                            <h3 class="info-title">{{__("Address")}}:</h3>
                            <p>
                                {{$contact_us->address}}
                            </p>
                        </div>
                        <!-- /.info-list -->

                    </div>
                    <!-- /.contact-information -->
                </div>
                <!-- /.col-md-4 -->

                <div class="col-md-8">
                    <div class="contact-form-wrapper">
                        <div class="card-body">
                            @if (session()->has('message'))
                                <div class="alert alert-success text-center">{{ session('message') }}</div>
                            @endif
                        </div>
                        <form wire:submit.prevent="contact">
                            <div class="row">

                                <div class="col-md-6">@error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror

                                    <input required type="text" wire:model="name" placeholder="{{__('Name')}}" class="gp-input">
                                </div>
                                <!-- /.col-md-6 -->

                                <div class="col-md-6">
                                    @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                    <input required type="email" wire:model="email" placeholder="{{__('Email')}}" class="gp-input">
                                </div>

                                <!-- /.col-md-6 -->

                                <div class="col-md-12">
                                    @error('subject')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                    <input required type="text" wire:model="subject" placeholder="{{__('Subject')}}" class="gp-input">
                                    @error('message')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                            <textarea required wire:model="message" id="message" cols="30" rows="10" class="gp-input gp-textarea" placeholder="{{__('Your Comment')}}"></textarea>

                                    <button type="submit" class="gp-btn btn-submit">{{__('Send Message')}}</button>

                                    <div class="form-result alert">
                                        <div class="content"></div>
                                    </div>
                                    <!-- /.form-result-->
                                </div>
                            </div>
                            <!-- /.row -->
                        </form>
                        <!-- /.contact-form-main -->
                    </div>
                    <!-- /.contact-form-wrapper -->
                </div>
                <!-- /.col-md-8 -->
            </div>
            <!-- /.row -->

            <div class="row mt-140">
                <div class="col-sm-6">
                    <div class="address-box style-border">
                        <h4 class="address-title">
                           {{$contact_us->country}}
                        </h4>

                        <p class="address">
                            {{$contact_us->address}}
                        </p>
                    </div>
                    <!-- /.address-box -->
                </div>
                <!-- /.col-sm-4 -->

                <div class="col-sm-6">
                    <div class="address-box">
                        <h4 class="address-title">
                            {{$contact_us->country2}}
                        </h4>

                        <p class="address">
                            {{$contact_us->address2}}
                        </p>
                    </div>
                    <!-- /.address-box -->
                </div>
                <!-- /.col-sm-4 -->

                {{-- <div class="col-sm-4">
                    <div class="address-box">
                        <h4 class="address-title">
                            London
                        </h4>

                        <p class="address">
                            425 Montgomery Street,<br>
                            TN 37803, London
                        </p>
                    </div>
                    <!-- /.address-box -->
                </div> --}}
                <!-- /.col-sm-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.contact-form-page -->

    <!--==============================-->
    <!--=         Google Map         =-->
    <!--==============================-->
    <section class="google-map" style='width:100%'>
        {{-- <div class="gmap3-area" data-lat="40.712776" data-lng="-74.005974" data-address="Address" data-zoom="16" data-mrkr="media/feature/marker.svg" data-scrollwheel="false"></div> --}}
        {!!$contact_us->contact_map!!}
    </section>
    <!-- /.google-map -->
</div>
