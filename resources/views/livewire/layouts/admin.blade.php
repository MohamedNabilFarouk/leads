<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr">
    <meta name="keywords"
          content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>HR - Faraj Almadina Hotel </title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"> --}}
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
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>--}}

    {{--    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>--}}
    {{--    <script>--}}

    {{--        // Enable pusher logging - don't include this in production--}}
    {{--        Pusher.logToConsole = true;--}}

    {{--        var pusher = new Pusher('12d76953829df2b456dc', {--}}
    {{--            cluster: 'us2'--}}
    {{--        });--}}


    {{--        var channel = pusher.subscribe('smartHR');--}}
    {{--        channel.bind('user-register', function(data) {--}}
    {{--            alert(JSON.stringify(data));--}}
    {{--        });--}}
    {{--    </script>--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('12d76953829df2b456dc', {
            cluster: 'us2'
        });

        var channel = pusher.subscribe('smartHR');
        channel.bind('user-register', function(data) {
            toastr.success(JSON.stringify(data.name),{timeOut: 5000})

        });
    </script>

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>


@php
    // Clear application cache:
        // Artisan::call('cache:clear');

        // Artisan::call('route:cache');

         // Artisan::call('config:cache');

        // Artisan::call('view:clear');


    app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    // dd(Request::path() == app()->getLocale().'/employees');
    // dd(url()->current()== 'http://localhost:8000/ar/admin-dashboard');
    // dd(($_SERVER['REQUEST_URI'] == 'ar/admin-dashboard'));
@endphp
    <!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('assets/img/logo.png')}}" width="40" height="40" alt="">
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
            <h3>{{__('FARAJ ALMADINA HOTEL')}}</h3>
        </div>
        <!-- /Header Title -->

        <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

        <!-- Header Menu -->
        <ul class="nav user-menu">

            <!-- Search -->
            {{-- <li class="nav-item">
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="search.html">
                        <input class="form-control" type="text" placeholder="Search here">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </li> --}}
            <!-- /Search -->

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
                        // <img src="{{asset('assets/img/flags/sa.png')}}" alt="" height="16"> Arabic
                    </a>

                </div>
            </li>
            <!-- /Flag -->

            <!-- Notifications -->
            <li class="nav-item dropdown" >
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i> <span id="clear" class="badge badge-pill">


                                    <?php
                                    $notification_count=  DB::table('activites')
                                        ->join('activity_users','activites.id','activity_users.activity_id')
                                        ->where('activity_users.status',0)
                                        ->where('activity_users.receive_id',auth()->user()->id)
                                        ->count();
                                    echo  $notification_count;
                                    ?>

                    </span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">{{__('Notifications')}}</span>
                        <a id="clearAll"  class="clear-noti"> {{__('Clear All')}} </a>

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
                    <a class="dropdown-item" href="{{url('change_password')}}">{{__('Settings')}}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                <a class="dropdown-item" href="{{url('profile')}}/{{\Crypt::encrypt(auth()->user()->id)}}">My Profile</a>
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
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    {{--                    @php $modules=DB::table('users')--}}
                    {{--             ->join('role_modules', 'users.role_id', '=', 'role_modules.role_id')--}}
                    {{--             ->join('modules','role_modules.module_id','=','modules.id')--}}
                    {{--//            ->join('orders', 'users.id', '=', 'orders.user_id')--}}
                    {{--               ->where('users.id',Auth::id())--}}
                    {{--            ->select('modules.module_name')--}}
                    {{--            ->get(); @endphp--}}
                    <li class="menu-title">
                        <span>{{__('Main')}}</span>
                    </li>
                    {{-- @dd(Request) --}}
                    <li class="submenu">
                        <a href="#"><i class="la la-dashboard"></i> <span> {{__('Dashboard')}}</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">


                            @if(auth()->user()->can('admin-dashboard-read'))
                                <li><a <?php if(Request::path() == app()->getLocale().'/admin-dashboard'){ echo 'class="active"';}  ?> href="{{url('/admin-dashboard')}}">{{__('Admin Dashboard')}} <span id="clear" class="badge badge-pill" style="background: #FC6075;">{{$notification_count}}</span></a></li>

                            @endif
                            @if(auth()->user()->can('employee-dashboard-read'))
                                <li><a @if(Request::path() == app()->getLocale().'/my-dashborad') class="active" @endif href="{{url('/my-dashborad')}}">{{__('My Dashboard')}} <span id="clear" class="badge badge-pill" style="background: #FC6075;">{{$notification_count}}</span></a></li>
                            @endif


                        </ul>
                    </li>

                    <li class="menu-title">
                        <span>{{__('Employees')}}</span>
                    </li>

                    @php
                        $emp_menue = [app()->getLocale().'/employees', app()->getLocale().'/holidays', app()->getLocale().'/super_leaves' , app()->getLocale().'/hr_leaves' , app()->getLocale().'/financial_leaves' , app()->getLocale().'/leaves' , app()->getLocale().'/leavesetting',app()->getLocale().'/attendance', app()->getLocale().'/attendance/*',app()->getLocale().'/departments',app()->getLocale().'/designations', app()->getLocale().'/super-overtime', app()->getLocale().'/overtime'
                ];
                        // dd(in_array(Request::path(),$emp_menue));
                    @endphp

                    <li class="submenu">
                        <a href="#" class=" @if(in_array(Request::path(),$emp_menue))   active @endif "><i class="la la-user"></i> <span> {{__('Employees')}}</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            @if(auth()->user()->can('all-employees-read'))
                                <li @if(Request::path() == app()->getLocale().'/employees') class="active" @endif><a href="{{url('employees')}}">{{__('All Employees')}}</a></li>
                            @endif
                            @if(auth()->user()->can('holidays-read'))
                                <li @if(Request::path() == app()->getLocale(). '/holidays') class="active" @endif ><a href="{{url('holidays')}}">{{__('Holidays')}}</a></li>
                            @endif




                            @if(auth()->user()->can('leaves-(supervisior)-read'))
                                <li @if(Request::path() == app()->getLocale(). '/super_leaves') class="active" @endif><a href="{{url('super_leaves')}}">{{__('Leaves (Supervisior)')}}</a></li>
                            @endif
                            {{--                                @php--}}
                            {{--                                    $user=DB::table('users')->where('reports_to',auth()->user()->id)->count();--}}
                            {{--                                @endphp--}}
                            {{--                                @if($user>0)--}}
                            {{--                                    <li @if(Request::path() == app()->getLocale(). '/super_leaves') class="active" @endif><a href="{{url('super_leaves')}}/{{\Crypt::encrypt(auth()->user()->id)}}">{{__('Leaves (Supervisior)')}}</a></li>--}}
                            {{--                                @endif--}}
                            @if(auth()->user()->can('leaves-(hr)-read'))
                                <li @if(Request::path() == app()->getLocale(). '/hr_leaves') class="active" @endif><a href="{{url('hr_leaves')}}">{{__('Leaves (HR)')}}</a></li>
                            @endif
                            @if(auth()->user()->can('leaves-(financial)-read'))
                                <li @if(Request::path() == app()->getLocale(). '/financial_leaves') class="active" @endif><a href="{{url('financial_leaves')}}">{{__('Leaves (Financial)')}}</a></li>
                            @endif
                            @if(auth()->user()->can('leaves-(employee)-read'))
                                <li @if(Request::path() == app()->getLocale(). '/leaves') class="active" @endif><a href="{{url('leaves')}}">{{__('Leaves (Employee)')}}</a></li>
                            @endif
                            @if(auth()->user()->can('leave-settings-read'))
                                <li @if(Request::path() == app()->getLocale(). '/leavesetting') class="active" @endif><a href="{{url('leavesetting')}}">{{__('Leave Settings')}}</a></li>
                            @endif
                            @if(auth()->user()->can('attendance-(admin)-read'))
                                <li @if(Request::path() == app()->getLocale(). '/attendance') class="active" @endif><a href="{{url('attendance')}}">{{__('Attendance (Admin)')}}</a></li>
                            @endif
                            @if(auth()->user()->can('attendance-(employee)-read'))
                                <li @if(Request::path() == app()->getLocale(). '/attendance/*') class="active" @endif><a href="{{url('attendance')}}/{{auth()->user()->id}}">{{__('Attendance (Employee)')}}</a></li>
                            @endif
                            @if(auth()->user()->can('departments-read'))
                                <li @if(Request::path() == app()->getLocale(). '/departments') class="active" @endif><a href="{{url('departments')}}">{{__('Departments')}}</a></li>
                            @endif
                            @if(auth()->user()->can('designations-read'))
                                <li @if(Request::path() == app()->getLocale(). '/designations') class="active" @endif><a href="{{url('designations')}}">{{__('Designations')}}</a></li>
                            @endif
                            @if(auth()->user()->can('overtime-(supervisor)-read'))
                                <li @if(Request::path() == app()->getLocale(). '/super-overtime') class="active" @endif><a href="{{url('super-overtime')}}">{{__('Overtime (Supervisor)')}}</a></li>
                            @endif
                            @if(auth()->user()->can('overtime-read'))
                                <li @if(Request::path() == app()->getLocale(). '/overtime') class="active" @endif><a href="{{url('overtime')}}">{{__('Overtime')}}</a></li>
                            @endif
                            {{--                            @if(auth()->user()->can('work-sheet-read'))--}}
                            <li @if(Request::path() == app()->getLocale(). '/work-sheet') class="active" @endif><a href="{{url('work-sheet')}}">{{__('WorkSheet')}}</a></li>
                            {{--                            @endif--}}
                            <li @if(Request::path() == app()->getLocale(). '/loan') class="active" @endif><a href="{{url('loan')}}"> {{__('Loan')}} </a></li>

                        </ul>
                    </li>
                    @if(auth()->user()->can('add-performance-create') ||  auth()->user()->can('performance-appraisal-read') ||  auth()->user()->can('performance-(employee)-read') || auth()->user()->can('promotion-read')||auth()->user()->can('resignation-read') || auth()->user()->can('termination-read') || auth()->user()->can('employee-profile-read'))


                        <li class="menu-title">
                            <span>{{__('Performance')}}</span>
                        </li>
                    @endif
                    @php
                        $performance_menue = [app()->getLocale().'/performance', app()->getLocale().'/appraisal'];
                    @endphp
                    @if(auth()->user()->can('add-performance-create') ||  auth()->user()->can('performance-appraisal-read') ||  auth()->user()->can('performance-(employee)-read') )
                        <li class="submenu">
                            <a href="#" class=" @if(in_array( Request::path(),$performance_menue))   active @endif "><i class="la la-graduation-cap"></i> <span> {{__('Performance')}} </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @if(auth()->user()->can('add-performance-create'))
                                    <li @if(Request::path() == app()->getLocale().'/performance') class="active" @endif><a href="{{url('performance')}}"> {{__('Add Performance')}} </a></li>
                                @endif
                                @if( auth()->user()->can('performance-appraisal-read'))
                                    <li @if(Request::path() == app()->getLocale(). '/appraisal') class="active" @endif ><a href="{{url('appraisal')}}"> {{__('Performance Appraisal')}} </a></li>
                                @endif
                                @if(auth()->user()->can('performance-(employee)-read'))
                                        <?php
                                        $performance=DB::table('user_performances')->where('user_id',auth()->user()->id)->count();
                                        ?>
                                    @if($performance!=0)
                                        <li @if(Request::path() == app()->getLocale(). '/show-performance') class="active" @endif><a href="{{url('show-performance')}}/{{\Crypt::encrypt(auth()->user()->id)}}"> {{__('Performance')}} </a></li>
                                    @endif
                                    @if(auth()->user()->can('promotion-read'))
                                        <li @if(Request::path() == app()->getLocale(). '/promotion') class="active" @endif><a href="{{url('promotion')}}">{{__('Promotion')}}</a></li>
                                    @endif
                                    @if(auth()->user()->can('resignation-read'))
                                        <li @if(Request::path() == app()->getLocale(). '/resignation') class="active" @endif><a href="{{url('resignation')}}">{{__('Resignation')}}</a></li>
                                    @endif
                                    @if(auth()->user()->can('termination-read'))
                                        <li @if(Request::path() == app()->getLocale(). '/termination') class="active" @endif><a href="{{url('termination')}}">{{__('Termination')}}</a></li>
                                    @endif
                                @endif
                            </ul>
                        </li>

                    @endif



                    @if(auth()->user()->can('employee-salary-read') ||  auth()->user()->can('payslip-read') ||  auth()->user()->can('payroll-items-read') )
                        <li class="menu-title">
                            <span>{{__('HR')}}</span>
                        </li>
                        @php
                            $payroll_menue = [app()->getLocale().'/payrollItems', app()->getLocale().'/payslip',app()->getLocale().'/payroll'];
                        @endphp
                        <li class="submenu">
                            <a href="#" class=" @if(in_array( Request::path() ,$payroll_menue))   active @endif "><i class="la la-money"></i> <span> {{__('Payroll')}} </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @if(auth()->user()->can('employee-salary-read'))
                                    <li @if(Request::path() == app()->getLocale(). '/payroll') class="active" @endif><a href="{{url('payroll')}}"> {{__('Employee Salary')}} </a></li>
                                @endif
                                @if(auth()->user()->can('payslip-read'))
                                        <?php
                                        $payroll=DB::table('payrolls')->where('user_id',auth()->user()->id)->orderby('id','desc')->first();
                                        ?>
                                    @if($payroll!=NULL)
                                        <li @if(Request::path() == app()->getLocale(). ('/payslip/'.\Crypt::encrypt($payroll->id)."'"))) class="active" @endif><a href="{{url('payslip')}}/{{\Crypt::encrypt($payroll->id)}}"> {{__('Payslip')}} </a></li>
                                    @endif
                                @endif
                                @if(auth()->user()->can('payroll-items-read'))
                                    <li @if(Request::path() == app()->getLocale(). '/payrollItems') class="active" @endif><a href="{{url('payrollItems')}}"> {{__('Payroll Items')}} </a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    {{-- Branches --}}

                    @if(auth()->user()->can('branches-create') )


                        <li class="menu-title">
                            <span>{{__('Branches')}}</span>
                        </li>
                    @endif
                    @php
                        $branch_menue = [app()->getLocale().'/branches'];
                    @endphp
                    @if(auth()->user()->can('branches-create')  )
                        <li class="submenu">
                            <a href="#" class=" @if(in_array( Request::path(),$branch_menue))   active @endif "><i class="la la-graduation-cap"></i> <span> {{__('Branches')}} </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @if(auth()->user()->can('branches-create'))
                                    <li @if(Request::path() == app()->getLocale().'/branches') class="active" @endif><a href="{{url('branches')}}"> {{__('Branches')}} </a></li>
                                @endif



                            </ul>
                        </li>

                    @endif

                    {{-- end Branches --}}

                    {{-- clients --}}

                    @if(auth()->user()->can('clients-create') )


                        <li class="menu-title">
                            <span>{{__('Clients')}}</span>
                        </li>
                    @endif
                    @php
                        $client_menue = [app()->getLocale().'/clients'];
                    @endphp
                    @if(auth()->user()->can('clients-create')  )
                        <li class="submenu">
                            <a href="#" class=" @if(in_array( Request::path(),$client_menue))   active @endif "><i class="la la-graduation-cap"></i> <span> {{__('Clients')}} </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @if(auth()->user()->can('clients-create'))
                                    <li @if(Request::path() == app()->getLocale().'/clients') class="active" @endif><a href="{{url('clients')}}"> {{__('Clients')}} </a></li>
                                @endif



                            </ul>
                        </li>

                    @endif

                    {{-- end clients --}}



                    @if(auth()->user()->can('activities-read') || auth()->user()->can('users-read') || auth()->user()->can('employee-profile-read'))
                        <li class="menu-title">
                            <span>{{__('Pages')}}</span>
                        </li>


                        @if(auth()->user()->can('activities-read'))
                            <li @if(Request::path() == app()->getLocale(). '/activities') class="active" @endif>
                                <a href="{{url('/activities')}}"><i class="la la-bell"></i> <span>{{__('Activities')}}</span></a>
                            </li>
                        @endif

                        {{--                        @if(auth()->user()->can('users-read'))--}}
                        {{--                        <li>--}}
                        {{--                        <a href="users.html"><i class="la la-user-plus"></i> <span>Users</span></a>--}}
                        {{--                       </li>--}}
                        {{--                        @endif--}}
                        {{-- @if(Auth::user()->hasDirectPermission('roles-&-permissions-read')) --}}

                        @if(auth()->user()->can('roles-&-permissions-read'))
                            <li @if(Request::path() == app()->getLocale(). '/permissions') class="active" @endif>
                                <a href="{{url('permissions')}}"><i class="la la-cog"></i> <span>{{__('Settings')}}</span></a>
                            </li>

                        @elseif( auth()->user()->can('change-password-read'))
                            <li @if(Request::path() == app()->getLocale(). '/change_password') class="active" @endif>
                                <a href="{{url('change_password')}}"><i class="la la-cog"></i> <span>{{__('Settings')}}</span></a>
                            </li>
                        @elseif( auth()->user()->can('leave-type-read'))
                            <li @if(Request::path() == app()->getLocale(). '/leavestype') class="active" @endif>
                                <a href="{{url('leavestype')}}"><i class="la la-cog"></i> <span>{{__('Settings')}}</span></a>
                            </li>

                        @endif
                    @endif
                    {{-- @dd('/profile/'.\Crypt::encrypt(auth()->user()->id."'")) --}}
                    {{-- @dd($_SERVER['REQUEST_URI']) --}}
                    @if(auth()->user()->can('employee-profile-read'))
                        <li class="submenu">
                            <a href="#"><i class="la la-user"></i> <span> {{__('Profile')}} </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li @if(Request::path() == app()->getLocale(). ('/profile/'.\Crypt::encrypt(auth()->user()->id."'"))) class="active" @endif><a href="{{url('profile')}}/{{\Crypt::encrypt(auth()->user()->id)}}"> {{__('Employee Profile')}} </a></li>
                            </ul>
                        </li>

                    @endif
                    {{--<li class="submenu">--}}
                    {{--<a href="#"><i class="la la-key"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>--}}
                    {{--<ul style="display: none;">--}}
                    {{--<li><a href="login.html"> Login </a></li>--}}
                    {{--<li><a href="register.html"> Register </a></li>--}}
                    {{--<li><a href="forgot-password.html"> Forgot Password </a></li>--}}
                    {{--<li><a href="otp.html"> OTP </a></li>--}}
                    {{--<li><a href="lock-screen.html"> Lock Screen </a></li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}

                    <li><a href="{{url('pages')}}"> <i class="la la-cog"></i> <span>{{__('Privacy Policy')}}</span>  </a></li>



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
    <script src="{{asset('assets/js/combodate.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Multiselect JS -->
    <script src="{{asset('assets/js/multiselect.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/chart.js')}}"></script> --}}


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





    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>






    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script> --}}

    <script>
        //     var picker = new Pikaday({ field: document.getElementById('Birthday_datepicker'),
        //     yearRange :100,
        // });
        // $('#datepicker').change(function(){
        //     // alert(picker);
        // });
        //                                 var picker = new Pikaday({
        //     field: document.getElementById('datepicker'),
        //     format: 'D MMM YYYY',
        //     onSelect: function() {
        //         console.log(this.getMoment().format('Do MMMM YYYY'));
        //     }
        // });

    </script>

    {{-- date and time --}}

    <script>
        // $("#contract_starting_date").flatpickr(optional_config);
        flatpickr("#contract_starting_date,#birthday,#contract_expiration_date,#work_card_expiry_date_non_saudi,#notice_date,#termination_date,#resignation_date,#searchDateFrom,#searchDatefrom,#searchDateTo,#period_from,#period_to,#work_Resume,#date_from,#date_to,#overtime_date,#promotion_date,#promotion_date,#empBirthdate_0,#starting_date_0,#starting_date,#complete_date_0,#complete_date,#experince_period_form_0,#experince_period_to_0,#editExperince_period_form,#editExperince_period_to,#date_b,#edit_family_bd,#paymentLoanDate",{
            dateFormat: "Y-m-d"
        });
        flatpickr("#shift_from,#shift_to",{enableTime: true,
            noCalendar: true,
            dateFormat: "H:i"
        });
        var today = new Date();
        // $("#contract_starting_date").flatpickr(optional_config);
        flatpickr("#salary_month",{
            dateFormat: "Y-m-d",
            defaultDate: "today",
            minDate: today
        });
    </script>
    {{-- end date and time picker --}}


    {{-- print --}}

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

        var button = document.getElementById("pdfButton");
        button.addEventListener("click", function () {
            var doc = new jsPDF("p", "mm", [300, 300]);
            var makePDF = document.querySelector("#generatePdf");
            // fromHTML Method
            doc.fromHTML(makePDF);
            doc.save("output.pdf");
        });
    </script>
    {{-- end print --}}

    @livewireScripts
</body>
</html>
{{--
enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true --}}

