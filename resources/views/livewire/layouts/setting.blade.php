<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
          content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
   <title>Smart HR </title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon-32x32.png')}}">

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
    @livewireStyles

</head>

<body>

@php
app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
@endphp
<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('assets/img/smartlogo.png')}}" width="60" alt="">
            </a>
        </div>
        <!-- /Logo -->



        <a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
        </a>


        <!-- Header Title -->
        <div class="page-title-box">
            <h3 style="display:inline;">smart</h3><h3 style="color:#EA6A78;display:inline;font-weight: bolder;">HR</h3>
        </div>
        <!-- /Header Title -->

        <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

        <!-- Header Menu -->
        <ul class="nav user-menu">

{{--            <!-- Search -->--}}
{{--            <li class="nav-item">--}}
{{--                <div class="top-nav-search">--}}
{{--                    <a href="javascript:void(0);" class="responsive-search">--}}
{{--                        <i class="fa fa-search"></i>--}}
{{--                    </a>--}}
{{--                    <form action="search.html">--}}
{{--                        <input class="form-control" type="text" placeholder="Search here">--}}
{{--                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <!-- /Search -->--}}

            <!-- Flag -->
            <li class="nav-item dropdown has-arrow flag-nav">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button">
                    @if(app()->getLocale()=='en')
                        <img src="{{asset('assets/img/flags/us.png')}}" alt="" height="20"> <span>  English  </span>
                    @else
                        <img src="{{asset('assets/img/flags/sa.png')}}" alt="" height="20"> <span>  Arabic  </span>

                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="dropdown-item">
                        <img src="{{asset('assets/img/flags/us.png')}}" alt="" height="16"> English
                    </a>
                    <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="dropdown-item">
                        <img src="{{asset('assets/img/flags/sa.png')}}" alt="" height="16"> Arabic
                    </a>

                </div>
            </li>
            <!-- /Flag -->

           <!-- Notifications -->
           <li class="nav-item dropdown" >
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i> <span id="clear" class="badge badge-pill">


                                <?php
                                echo   DB::table('activites')
                                    ->join('activity_users','activites.id','activity_users.activity_id')
                                    ->where('activity_users.status',0)
                                    ->where('activity_users.receive_id',auth()->user()->id)
                                    ->count();
                                ?>

                </span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">{{__('Notifications')}}</span>
                    <a id="clearAll"  class="clear-noti">{{__('Clear All')}} </a>

                </div>
                <div class="noti-content">
                    <ul class="notification-list">

                                <?php
                                $notifications=  DB::table('activites')
                                                    ->join('activity_users','activites.id','activity_users.activity_id')
                                                    ->where('activity_users.status',0)
                                                    ->where('activity_users.receive_id',auth()->user()->id)
                                                    ->get();
                                ?>
                            @foreach($notifications as $index => $notification)
                            <li class="notification-message">
                                {{-- <a id='clearOne{{$index}}' data-noti='{{$notification->id}}'  href="{{url(''.$notification->link.'')}}"> --}}
                                <a id='clearOne{{$index}}' data-noti='{{$notification->id}}'  href="{{url('/activities/clearOne' , $notification->id)}}">
                                    <div class="media">
                                        {{--												<span class="avatar">--}}
                                        {{--													<img alt="" src="assets/img/profiles/avatar-02.jpg">--}}
                                        {{--												</span>--}}

                                        <div class="media-body">
                                            @if(app()->getLocale()=='en')
                                                <p class="noti-details">{{$notification->description}}</p>
                                            @elseif(app()->getLocale()=='ar')
                                                <p class="noti-details">{{$notification->description_ar}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </li>

            {{-- <script>
                $('#clearOne'+{{$index}}).click(function(){
            // alert($(this).data('noti'));
                    $noti_id = $(this).data('noti');
                    alert('./activities/clearOne/'+noti_id );
                    var AJAXURL ='./activities/clearOne/'+noti_id ;

                    $.ajax({
                        url: AJAXURL,
                        type: 'get',
                        dataType: 'json',
                        success: function () {
                        // alert(response);
                        refreshPage();
                        }
                        });

                    });
            </script> --}}


                            @endforeach

                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="{{url('/activities')}}">{{__('View all Notifications')}}</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->


            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="{{asset(Auth::user()->photo)}}" alt="">
							<span class="status online"></span></span>
                    <span> {{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('profile')}}/{{\Crypt::encrypt(auth()->user()->id)}}">{{__('My Profile')}}</a>
                    <a class="dropdown-item" href="{{url('change_password')}}l">{{__('Settings')}}</a>

                    @if(Session::get('key1')=='superAdmin')
                        <a class="dropdown-item" href="{{env("APP_URL")}}/{{app()->getLocale()}}/clients">{{__('Back To Super Admin')}}</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <!-- /Header Menu -->

        <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{url('profile')}}">{{__('My Profile')}}</a>
                <a class="dropdown-item" href="{{url('change_password')}}">{{__('Settings')}}</a>
                <a class="dropdown-item" href="{{ route('logout') }}">{{__('Logout')}}</a>
            </div>
        </div>
        <!-- /Mobile Menu -->

    </div>
    <!-- /Header -->


    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{url('/')}}"><i class="la la-home"></i> <span>{{__('Back to Home')}}</span></a>
                    </li>
                    <li class="menu-title">{{__('Settings')}}</li>
                    <!-- <li>
                        <a href="{{url('company')}}"><i class="la la-building"></i> <span>Company Settings</span></a>
                    </li> -->
                    <!-- <li>
                        <a href="{{url('localization')}}"><i class="la la-clock-o"></i> <span>Localization</span></a>
                    </li> -->
                    <!-- <li>
                        <a href="{{url('theme-setting')}}"><i class="la la-photo"></i> <span>Theme Settings</span></a>
                    </li> -->
                    @if(auth()->user()->can('roles-&-permissions-read'))

                    <li @if(Request::path() == app()->getLocale(). '/permissions') class="active" @endif>
                        <a href="{{url('permissions')}}"><i class="la la-key"></i> <span>{{__('Roles & Permissions')}}</span></a>
                    </li>
                    @endif

{{--                    <li>--}}
{{--                        <a href="salary-settings.html"><i class="la la-money"></i> <span>Salary Settings</span></a>--}}
{{--                    </li>--}}
                    <!-- <li>
                        <a href="notifications-settings.html"><i class="la la-globe"></i> <span>Notifications</span></a>
                    </li> -->
                    @if(auth()->user()->can('change-password-read'))
                    <li @if(Request::path() == app()->getLocale(). '/change_password') class="active" @endif>
                        <a href="{{url('change_password')}}"><i class="la la-lock"></i> <span>{{__('Change Password')}}</span></a>
                    </li>
                    @endif
                    @if(auth()->user()->can('leave-type-read'))
                    <li  @if(Request::path() == app()->getLocale(). '/leavestype') class="active" @endif>
                        <a href="{{url('leavestype')}}"><i class="la la-cogs"></i> <span>{{__('Leave Type')}}</span></a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        {{ $slot }}

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <!-- Select2 JS -->
    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <!-- Datetimepicker JS -->
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Multiselect JS -->
    <script src="{{asset('assets/js/multiselect.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>


    <!-- Custom JS -->
    <script src="{{asset('assets/js/app.js')}}"></script>


    @stack('scripts')


    <script>
        $(document).ready(function () {

         $('#clearAll,#clearAll2,#clearAll3').click(function(){
            var AJAXURL ='./activities/clear' ;

            $.ajax({
        url: AJAXURL,
        type: 'get',
    dataType: 'json',
        success: function () {
            // alert(response);
        refreshPage();
        }
    });
});

function refreshPage() {
    location.reload(true);
}


         });





</script>

    @livewireScripts
</body>
</html>
