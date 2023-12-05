<div>
<!--==========================-->
<!--=         Banner         =-->
<!--==========================-->
<section class="page-banner">
    <div class="page-title-wrapper text-center">
        <h1 class="page-title">{{ __("Pricing built for businesses of all sizes.") }}</h1>

        <ul class="breadcrumbs">
            <li><a href="{{url('index')}}">{{ __("Home") }}</a></li>
            <li>{{ __("Pricing") }}</li>
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


<!--===============================-->
<!--=         Pricing Three       =-->
<!--===============================-->
<section class="pricing-page">
    <div class="container">
        <div class="section-heading style-two color-theme">
            <h3 class="subtitle">{{ __("Pricing Plan") }}</h3>
            <h2 class="section-title">{{ __("Choose Your Plan") }}</h2>
        </div>

        <div class="row">
            @foreach($plans as $plan)
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-table color-theme wow fadeInLeft dashed-border" data-wow-delay="0.3s" style='height:640px;'>
                        <div class="price-header">
                            <h3 class="price-title">{{$plan->name}}</h3>
                        </div>
                        <!-- /.price-header -->

                        <div class="price-period">
                            <h2 class="price">@if(app()->getLocale() == 'en'){{$plan->price.'   '. $plan->currency}} @else {{$plan->currency.'   '. $plan->price}} @endif</h2>

                            <span class="period">/ {{__($plan->frequency)}}</span>
                        </div>
                        <!-- /.price-period -->

                        <ul class="price-feature" style="height: 320px;">
                            <?php
                                $permissions = json_decode($plan->permission_id);
                                $permission_plans=\App\Models\Module::whereIn('id',$permissions)->get();
                            ?>
                            @if($permissions!=null)
                            @foreach($permission_plans as $permission_plan)
                                <li style='line-height:18px'><i class="ei ei-icon_check"></i>{{__($permission_plan->module_name)}}</li>
                            @endforeach
                            @endif
                        </ul>
                        <a wire:click="ChoosePlan($event.target.value, {{$plan->id}})" class="gp-btn btn-outline">{{ __("Try This") }}</a>

                    </div>
                    <!-- /.pricing-table color-theme -->
                </div>
                <!-- /.col-lg-4 col-md-6 -->
            @endforeach
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /.pricings -->
</div>

