   <div>

   <!--==========================-->
    <!--=         Banner         =-->
    <!--==========================-->
    <section class="page-banner-three">
        <div class="container pr">

            <div class="page-title-wrapper text-left">
                <h1 class="page-title">{{__('My Account')}}</h1>

                <ul class="breadcrumbs">
                    <li>
                        <a href="{{url('index')}}">{{__('Home')}}</a>
                    </li>
                        <li>{{__('Sign Up')}}</li>
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
                        <a href="{{url('sign_in')}}" class="gp-btn btn-sm float">{{__('Sign In')}}</a>
                    </div>
                    @if (session()->has('message'))
                        <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif
                    <form wire:submit.prevent="register" enctype="multipart/form-data" autocomplete="off">

                        <div class="gp-input-group">
                            <label for="first_name">{{__('First Name')}}</label>
                            <input type="text" class="gp-input" wire:model="first_name" placeholder="{{__('First Name')}}" required>
                        </div>
                        @error('first_name')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                        <div class="gp-input-group">
                            <label for="last_name">{{__('Last Name')}}</label>
                            <input type="text" class="gp-input" wire:model="last_name" placeholder="{{__('Last Name')}}" required>
                        </div>
                        @error('last_name')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                        <div class="gp-input-group">
                            <label for="slug">{{__('Slug')}}</label>
                            <input type="text" class="gp-input" wire:model="slug"  placeholder="{{__('Slug')}}">
                        </div>
                        @error('slug')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                        <div class="gp-input-group">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" class="gp-input" wire:model="email" placeholder="{{__('Email')}}">
                        </div>
                        @error('email')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror

                        <div class="gp-input-group">
                            <label for="phone">{{__('Phone')}}</label>
                            <input type="text" class="gp-input" wire:model="phone"  placeholder="{{__('Phone')}}">
                        </div>
                        @error('phone')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                        <div class="gp-input-group">
                            <label for="password">{{__('Password')}}</label>
                            <input type="password" class="gp-input" wire:model="password"  placeholder="{{__('Password')}}">
                        </div>
                        @error('password')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror

                        <div class="gp-input-group">
                            <label for="password">{{__('Confirm Password')}}</label>
                            <input type="password" class="gp-input" wire:model="password_confirmation"  placeholder="{{__('Confirm Password')}}">
                        </div>
                        @error('password_confirmation')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                        <div class="gp-input-group mb-5">
                            <label for="phone">{{__("Color")}}</label>

                            <select id="form-control" class="form-control" wire:model='theme_color' >
                                <option class="Light">Light</option>
                                <option class="Dark">Dark</option>
                                <option class="Maroon">Maroon</option>
                                <option class="Orange">Orange</option>
                                <option class="Blue">Blue</option>
                                <option class="Purple">Purple</option>
                            </select>
                        </div>
                        @error('phone')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror


                        {{--                        <label for="condition">--}}
                        {{--                            <input type="checkbox" name="condition" id="condition">--}}
                        {{--                            <span>--}}
                        {{--									I do not wish to receive news and promotions from Astriol Company by email.--}}
                        {{--								</span>--}}
                        {{--                        </label>--}}

                        <button type="submit" class="gp-btn submit-btn">
                            {{__('Sign Up')}} <i class="ei ei-arrow_right"></i>
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
   </div>


