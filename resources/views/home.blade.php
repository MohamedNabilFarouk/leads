<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Dashboard - HRMS admin template</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">



	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/stylelight.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('12d76953829df2b456dc', {
            cluster: 'us2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
</head>

<body>
<!-- Main Wrapper -->
<div class="main-wrapper">
	<!-- Loader -->
	<div id="loader-wrapper">
		<div id="loader">
			<div class="loader-ellips">
				<span class="loader-ellips__dot"></span>
				<span class="loader-ellips__dot"></span>
				<span class="loader-ellips__dot"></span>
				<span class="loader-ellips__dot"></span>
			</div>
		</div>
	</div>
	<!-- /Loader -->

	<!-- Header -->
	<div class="header">

		<!-- Logo -->
		<div class="header-left">
			<a href="index.html" class="logo">
				<img src="assets/img/logo.png" width="40" height="40" alt="">
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
			<h3>FARAJ ALMADINA HOTEL</h3>
		</div>
		<!-- /Header Title -->

		<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

		<!-- Header Menu -->
		<ul class="nav user-menu">

			<!-- Search -->
			<li class="nav-item">
				<div class="top-nav-search">
					<a href="javascript:void(0);" class="responsive-search">
						<i class="fa fa-search"></i>
					</a>
					<form action="search.html">
						<input class="form-control" type="text" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</li>
			<!-- /Search -->

			<!-- Flag -->
			<li class="nav-item dropdown has-arrow flag-nav">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
					<img src="assets/img/flags/us.png" alt="" height="20"> <span>English</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a href="javascript:void(0);" class="dropdown-item">
						<img src="assets/img/flags/us.png" alt="" height="16"> English
					</a>
					<a href="javascript:void(0);" class="dropdown-item">
						<img src="assets/img/flags/sa.png" alt="" height="16"> Arabic
					</a>

				</div>
			</li>
			<!-- /Flag -->

			<!-- Notifications -->
			<li class="nav-item dropdown">
				<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
					<i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
				</a>
				<div class="dropdown-menu notifications">
					<div class="topnav-dropdown-header">
						<span class="notification-title">Notifications</span>
						<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
					</div>
					<div class="noti-content">
						<ul class="notification-list">
							<li class="notification-message">
								<a href="activities.html">
									<div class="media">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-02.jpg">
												</span>
										<div class="media-body">
											<p class="noti-details"><span class="noti-title">Mohamed Ahmed</span> added new task <span class="noti-title">Patient appointment booking</span></p>
											<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
										</div>
									</div>
								</a>
							</li>
							<li class="notification-message">
								<a href="activities.html">
									<div class="media">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-03.jpg">
												</span>
										<div class="media-body">
											<p class="noti-details"><span class="noti-title">Mohamed Ahmed</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
											<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
										</div>
									</div>
								</a>
							</li>
							<li class="notification-message">
								<a href="activities.html">
									<div class="media">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-06.jpg">
												</span>
										<div class="media-body">
											<p class="noti-details"><span class="noti-title">Mohamed Ahmed</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
											<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
										</div>
									</div>
								</a>
							</li>
							<li class="notification-message">
								<a href="activities.html">
									<div class="media">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-17.jpg">
												</span>
										<div class="media-body">
											<p class="noti-details"><span class="noti-title">Mohamed Ahmed</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
											<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
										</div>
									</div>
								</a>
							</li>
							<li class="notification-message">
								<a href="activities.html">
									<div class="media">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-13.jpg">
												</span>
										<div class="media-body">
											<p class="noti-details"><span class="noti-title">Mohamed Ahmed</span> added new task <span class="noti-title">Private chat module</span></p>
											<p class="noti-time"><span class="notification-time">2 days ago</span></p>
										</div>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<div class="topnav-dropdown-footer">
						<a href="activities.html">View all Notifications</a>
					</div>
				</div>
			</li>
			<!-- /Notifications -->




			<li class="nav-item dropdown has-arrow main-drop">
				<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="assets/img/profiles/avatar-21.jpg" alt="">
							<span class="status online"></span></span>
					<span> {{ Auth::user()->name }}</span>
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{url('profile')}}/{{\Crypt::encrypt(auth()->user()->id)}}">My Profile</a>
					<a class="dropdown-item" href="settings.html">Settings</a>
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
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="{{url('profile')}}/{{\Crypt::encrypt(auth()->user()->id)}}">My Profile</a>
				<a class="dropdown-item" href="settings.html">Settings</a>
				<a class="dropdown-item" href="login.html">Logout</a>
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
                        <span>Main</span>
                    </li>

                    <li class="submenu">
                        <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">


                            @if(auth()->user()->can('admin-dashboard-read'))
                                <li><a class="active" href="{{url('/')}}">Admin Dashboard</a></li>

                            @endif
                            @if(auth()->user()->can('employee-dashboard-read'))
                                <li><a href="{{url('/')}}">Employee Dashboard</a></li>
                            @endif


                        </ul>
                    </li>

                    <li class="menu-title">
                        <span>Employees</span>
                    </li>
                    <li class="submenu">
                        <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">

                            @if(auth()->user()->can('all-employees-read'))
                                <li><a href="{{url('employees')}}">All Employees</a></li>
                            @endif
                            @if(auth()->user()->can('holidays-read'))
                                <li><a href="{{url('holidays')}}">Holidays</a></li>
                            @endif
                            @if(auth()->user()->can('leaves-(supervisior)-read'))
                                <li><a href="{{url('super_leaves')}}">Leaves (Supervisior)</a></li>
                            @endif
                            @if(auth()->user()->can('leaves-(hr)-read'))
                                <li><a href="{{url('hr_leaves')}}">Leaves (HR)</a></li>
                            @endif
                            @if(auth()->user()->can('leaves-(financial)-read'))
                                <li><a href="{{url('financial_leaves')}}">Leaves (Financial)</a></li>
                            @endif
                            @if(auth()->user()->can('leaves-(employee)-read'))
                                <li><a href="{{url('leaves')}}">Leaves (Employee)</a></li>
                            @endif
                            @if(auth()->user()->can('leave-settings-read'))
                                <li><a href="{{url('leavesetting')}}">Leave Settings</a></li>
                            @endif
                            @if(auth()->user()->can('attendance-(admin)-read'))
                                <li><a href="{{url('attendance')}}">Attendance (Admin)</a></li>
                            @endif
                            @if(auth()->user()->can('attendance-(employee)-read'))
                                <li><a href="{{url('attendance')}}">Attendance (Employee)</a></li>
                            @endif
                            @if(auth()->user()->can('departments-read'))
                                <li><a href="{{url('departments')}}">Departments</a></li>
                            @endif
                            @if(auth()->user()->can('designations-read'))
                                <li><a href="{{url('designations')}}">Designations</a></li>
                            @endif
                            @if(auth()->user()->can('overtime-read'))
                                <li><a href="{{url('overtime')}}">Overtime</a></li>
                            @endif

                        </ul>
                    </li>
                    @if(auth()->user()->can('add-performance-create') ||  auth()->user()->can('performance-appraisal-read') ||  auth()->user()->can('performance-(employee)-read') )
                        <li class="menu-title">
                            <span>Performance</span>
                        </li>
                    @endif
                    @if(auth()->user()->can('add-performance-create') ||  auth()->user()->can('performance-appraisal-read') ||  auth()->user()->can('performance-(employee)-read') )
                        <li class="submenu">
                            <a href="#"><i class="la la-graduation-cap"></i> <span> Performance </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @if(auth()->user()->can('add-performance-create'))
                                    <li><a href="{{url('performance')}}"> Add Performance </a></li>
                                @endif
                                @if( auth()->user()->can('performance-appraisal-read'))
                                    <li><a href="{{url('appraisal')}}"> Performance Appraisal </a></li>
                                @endif
                                @if(auth()->user()->can('performance-(employee)-read'))
                                    <li><a href="{{url('performance')}}"> Performance </a></li>
                                @endif
                            </ul>
                        </li>

                    @endif

                    @if(auth()->user()->can('employee-salary-read') ||  auth()->user()->can('payslip-read') ||  auth()->user()->can('payroll-items-read') )
                        <li class="menu-title">
                            <span>HR</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @if(auth()->user()->can('employee-salary-read'))
                                    <li><a href="{{url('payroll')}}"> Employee Salary </a></li>
                                @endif
                                @if(auth()->user()->can('payslip-read'))
                                    <li><a href="{{'payslip'}}/{{\Crypt::encrypt(auth()->user()->id)}}"> Payslip </a></li>
                                @endif
                                @if(auth()->user()->can('payroll-items-read'))
                                    <li><a href="payrollItems"> Payroll Items </a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if(auth()->user()->can('promotion-read')||auth()->user()->can('resignation-read') || auth()->user()->can('termination-read') || auth()->user()->can('employee-profile-read'))

                        <li class="menu-title">
                            <span>Performance</span>
                        </li>
                    @endif
                    @if(auth()->user()->can('promotion-read'))
                        <li><a href="{{url('promotion')}}"><i class="la la-bullhorn"></i> <span>Promotion</span></a>
                        </li>
                    @endif
                    @if(auth()->user()->can('resignation-read'))
                        <li><a href="{{url('resignation')}}"><i class="la la-external-link-square"></i> <span>Resignation</span></a>
                        </li>
                    @endif
                    @if(auth()->user()->can('termination-read'))
                        <li><a href="{{url('termination')}}"><i class="la la-times-circle"></i> <span>Termination</span></a>
                        </li>
                    @endif

                    @if(auth()->user()->can('activities-read') || auth()->user()->can('users-read') || auth()->user()->can('employee-profile-read'))
                        <li class="menu-title">
                            <span>Pages</span>
                        </li>


                        @if(auth()->user()->can('activities-read'))
                            <li>
                                <a href="activities.html"><i class="la la-bell"></i> <span>Activities</span></a>
                            </li>
                        @endif

                        {{--                        @if(auth()->user()->can('users-read'))--}}
                        {{--                        <li>--}}
                        {{--                        <a href="users.html"><i class="la la-user-plus"></i> <span>Users</span></a>--}}
                        {{--                       </li>--}}
                        {{--                        @endif--}}
                        @if(auth()->user()->can('company-settings-read') || auth()->user()->can('localization-read') || auth()->user()->can('theme-settings-read') ||  auth()->user()->can('roles-&-permissions-read') || auth()->user()->can('salary-settings-read') || auth()->user()->can('notifications-read') || auth()->user()->can('change-password-read') || auth()->user()->can('leave-type-read'))
                            <li>
                                <a href="{{url('company')}}"><i class="la la-cog"></i> <span>Settings</span></a>
                            </li>
                        @endif
                    @endif
                    @if(auth()->user()->can('employee-profile-read'))
                        <li class="submenu">
                            <a href="#"><i class="la la-user"></i> <span> Profile </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{url('profile')}}/{{\Crypt::encrypt(auth()->user()->id)}}"> Employee Profile </a></li>
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


                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->
	<!-- Page Wrapper -->
	<div class="page-wrapper">

		<!-- Page Content -->
		<div class="content container-fluid">

			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="page-title">Welcome Admin!</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item active">Dashboard</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
					<div class="card dash-widget">
						<div class="card-body">
							<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
							<div class="dash-widget-info">
								<h3>112</h3>
								<span>Projects</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
					<div class="card dash-widget">
						<div class="card-body">
							<span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
							<div class="dash-widget-info">
								<h3>44</h3>
								<span>Clients</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
					<div class="card dash-widget">
						<div class="card-body">
							<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
							<div class="dash-widget-info">
								<h3>37</h3>
								<span>Tasks</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
					<div class="card dash-widget">
						<div class="card-body">
							<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
							<div class="dash-widget-info">
								<h3>218</h3>
								<span>Employees</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6 text-center">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Total Revenue</h3>
									<div id="bar-charts"></div>
								</div>
							</div>
						</div>
						<div class="col-md-6 text-center">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Sales Overview</h3>
									<div id="line-charts"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card-group m-b-30">
						<div class="card">
							<div class="card-body">
								<div class="d-flex justify-content-between mb-3">
									<div>
										<span class="d-block">New Employees</span>
									</div>
									<div>
										<span class="text-success">+10%</span>
									</div>
								</div>
								<h3 class="mb-3">10</h3>
								<div class="progress mb-2" style="height: 5px;">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p class="mb-0">Overall Employees 218</p>
							</div>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="d-flex justify-content-between mb-3">
									<div>
										<span class="d-block">Earnings</span>
									</div>
									<div>
										<span class="text-success">+12.5%</span>
									</div>
								</div>
								<h3 class="mb-3">$1,42,300</h3>
								<div class="progress mb-2" style="height: 5px;">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p class="mb-0">Previous Month <span class="text-muted">$1,15,852</span></p>
							</div>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="d-flex justify-content-between mb-3">
									<div>
										<span class="d-block">Expenses</span>
									</div>
									<div>
										<span class="text-danger">-2.8%</span>
									</div>
								</div>
								<h3 class="mb-3">$8,500</h3>
								<div class="progress mb-2" style="height: 5px;">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p class="mb-0">Previous Month <span class="text-muted">$7,500</span></p>
							</div>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="d-flex justify-content-between mb-3">
									<div>
										<span class="d-block">Profit</span>
									</div>
									<div>
										<span class="text-danger">-75%</span>
									</div>
								</div>
								<h3 class="mb-3">$1,12,000</h3>
								<div class="progress mb-2" style="height: 5px;">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p class="mb-0">Previous Month <span class="text-muted">$1,42,000</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Statistics Widget -->
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-4 d-flex">
					<div class="card flex-fill dash-statistics">
						<div class="card-body">
							<h5 class="card-title">Statistics</h5>
							<div class="stats-list">
								<div class="stats-info">
									<p>Today Leave <strong>4 <small>/ 65</small></strong></p>
									<div class="progress">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="stats-info">
									<p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="stats-info">
									<p>Completed Projects <strong>85 <small>/ 112</small></strong></p>
									<div class="progress">
										<div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="stats-info">
									<p>Open Tickets <strong>190 <small>/ 212</small></strong></p>
									<div class="progress">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="stats-info">
									<p>Closed Tickets <strong>22 <small>/ 212</small></strong></p>
									<div class="progress">
										<div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-lg-6 col-xl-4 d-flex">
					<div class="card flex-fill">
						<div class="card-body">
							<h4 class="card-title">Task Statistics</h4>
							<div class="statistics">
								<div class="row">
									<div class="col-md-6 col-6 text-center">
										<div class="stats-box mb-4">
											<p>Total Tasks</p>
											<h3>385</h3>
										</div>
									</div>
									<div class="col-md-6 col-6 text-center">
										<div class="stats-box mb-4">
											<p>Overdue Tasks</p>
											<h3>19</h3>
										</div>
									</div>
								</div>
							</div>
							<div class="progress mb-4">
								<div class="progress-bar bg-purple" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
								<div class="progress-bar bg-warning" role="progressbar" style="width: 22%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">22%</div>
								<div class="progress-bar bg-success" role="progressbar" style="width: 24%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">24%</div>
								<div class="progress-bar bg-danger" role="progressbar" style="width: 26%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">21%</div>
								<div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">10%</div>
							</div>
							<div>
								<p><i class="fa fa-dot-circle-o text-purple mr-2"></i>Completed Tasks <span class="float-right">166</span></p>
								<p><i class="fa fa-dot-circle-o text-warning mr-2"></i>Inprogress Tasks <span class="float-right">115</span></p>
								<p><i class="fa fa-dot-circle-o text-success mr-2"></i>On Hold Tasks <span class="float-right">31</span></p>
								<p><i class="fa fa-dot-circle-o text-danger mr-2"></i>Pending Tasks <span class="float-right">47</span></p>
								<p class="mb-0"><i class="fa fa-dot-circle-o text-info mr-2"></i>Review Tasks <span class="float-right">5</span></p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-lg-6 col-xl-4 d-flex">
					<div class="card flex-fill">
						<div class="card-body">
							<h4 class="card-title">Today Absent <span class="badge bg-inverse-danger ml-2">5</span></h4>
							<div class="leave-info-box">
								<div class="media align-items-center">
									<a href="profile.html" class="avatar"><img alt="" src="assets/img/user.jpg"></a>
									<div class="media-body">
										<div class="text-sm my-0">Martin Lewis</div>
									</div>
								</div>
								<div class="row align-items-center mt-3">
									<div class="col-6">
										<h6 class="mb-0">4 Sep 2019</h6>
										<span class="text-sm text-muted">Leave Date</span>
									</div>
									<div class="col-6 text-right">
										<span class="badge bg-inverse-danger">Pending</span>
									</div>
								</div>
							</div>
							<div class="leave-info-box">
								<div class="media align-items-center">
									<a href="profile.html" class="avatar"><img alt="" src="assets/img/user.jpg"></a>
									<div class="media-body">
										<div class="text-sm my-0">Martin Lewis</div>
									</div>
								</div>
								<div class="row align-items-center mt-3">
									<div class="col-6">
										<h6 class="mb-0">4 Sep 2019</h6>
										<span class="text-sm text-muted">Leave Date</span>
									</div>
									<div class="col-6 text-right">
										<span class="badge bg-inverse-success">Approved</span>
									</div>
								</div>
							</div>
							<div class="load-more text-center">
								<a class="text-dark" href="javascript:void(0);">Load More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Statistics Widget -->

			<div class="row">
				<div class="col-md-6 d-flex">
					<div class="card card-table flex-fill">
						<div class="card-header">
							<h3 class="card-title mb-0">Invoices</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-nowrap custom-table mb-0">
									<thead>
									<tr>
										<th>Invoice ID</th>
										<th>Client</th>
										<th>Due Date</th>
										<th>Total</th>
										<th>Status</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td><a href="invoice-view.html">#INV-0001</a></td>
										<td>
											<h2><a href="#">Global Technologies</a></h2>
										</td>
										<td>11 Mar 2019</td>
										<td>$380</td>
										<td>
											<span class="badge bg-inverse-warning">Partially Paid</span>
										</td>
									</tr>
									<tr>
										<td><a href="invoice-view.html">#INV-0002</a></td>
										<td>
											<h2><a href="#">Delta Infotech</a></h2>
										</td>
										<td>8 Feb 2019</td>
										<td>$500</td>
										<td>
											<span class="badge bg-inverse-success">Paid</span>
										</td>
									</tr>
									<tr>
										<td><a href="invoice-view.html">#INV-0003</a></td>
										<td>
											<h2><a href="#">Cream Inc</a></h2>
										</td>
										<td>23 Jan 2019</td>
										<td>$60</td>
										<td>
											<span class="badge bg-inverse-danger">Unpaid</span>
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card-footer">
							<a href="invoices.html">View all invoices</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 d-flex">
					<div class="card card-table flex-fill">
						<div class="card-header">
							<h3 class="card-title mb-0">Payments</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table custom-table table-nowrap mb-0">
									<thead>
									<tr>
										<th>Invoice ID</th>
										<th>Client</th>
										<th>Payment Type</th>
										<th>Paid Date</th>
										<th>Paid Amount</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td><a href="invoice-view.html">#INV-0001</a></td>
										<td>
											<h2><a href="#">Global Technologies</a></h2>
										</td>
										<td>Paypal</td>
										<td>11 Mar 2019</td>
										<td>$380</td>
									</tr>
									<tr>
										<td><a href="invoice-view.html">#INV-0002</a></td>
										<td>
											<h2><a href="#">Delta Infotech</a></h2>
										</td>
										<td>Paypal</td>
										<td>8 Feb 2019</td>
										<td>$500</td>
									</tr>
									<tr>
										<td><a href="invoice-view.html">#INV-0003</a></td>
										<td>
											<h2><a href="#">Cream Inc</a></h2>
										</td>
										<td>Paypal</td>
										<td>23 Jan 2019</td>
										<td>$60</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card-footer">
							<a href="payments.html">View all payments</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 d-flex">
					<div class="card card-table flex-fill">
						<div class="card-header">
							<h3 class="card-title mb-0">Clients</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table custom-table mb-0">
									<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Status</th>
										<th class="text-right">Action</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
												<a href="client-profile.html">Barry Cuda <span>CEO</span></a>
											</h2>
										</td>
										<td>barrycuda@example.com</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-success"></i> Active
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="#" class="avatar"><img alt="" src="assets/img/profiles/avatar-19.jpg"></a>
												<a href="client-profile.html">Tressa Wexler <span>Manager</span></a>
											</h2>
										</td>
										<td>tressawexler@example.com</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Inactive
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-07.jpg"></a>
												<a href="client-profile.html">Ruby Bartlett <span>CEO</span></a>
											</h2>
										</td>
										<td>rubybartlett@example.com</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Inactive
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-06.jpg"></a>
												<a href="client-profile.html"> Misty Tison <span>CEO</span></a>
											</h2>
										</td>
										<td>mistytison@example.com</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-success"></i> Active
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<h2 class="table-avatar">
												<a href="client-profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-14.jpg"></a>
												<a href="client-profile.html"> Daniel Deacon <span>CEO</span></a>
											</h2>
										</td>
										<td>danieldeacon@example.com</td>
										<td>
											<div class="dropdown action-label">
												<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Inactive
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
													<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												</div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card-footer">
							<a href="clients.html">View all clients</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 d-flex">
					<div class="card card-table flex-fill">
						<div class="card-header">
							<h3 class="card-title mb-0">Recent Projects</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table custom-table mb-0">
									<thead>
									<tr>
										<th>Project Name </th>
										<th>Progress</th>
										<th class="text-right">Action</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td>
											<h2><a href="project-view.html">Office Management</a></h2>
											<small class="block text-ellipsis">
												<span>1</span> <span class="text-muted">open tasks, </span>
												<span>9</span> <span class="text-muted">tasks completed</span>
											</small>
										</td>
										<td>
											<div class="progress progress-xs progress-striped">
												<div class="progress-bar" role="progressbar" data-toggle="tooltip" title="65%" style="width: 65%"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<h2><a href="project-view.html">Project Management</a></h2>
											<small class="block text-ellipsis">
												<span>2</span> <span class="text-muted">open tasks, </span>
												<span>5</span> <span class="text-muted">tasks completed</span>
											</small>
										</td>
										<td>
											<div class="progress progress-xs progress-striped">
												<div class="progress-bar" role="progressbar" data-toggle="tooltip" title="15%" style="width: 15%"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<h2><a href="project-view.html">Video Calling App</a></h2>
											<small class="block text-ellipsis">
												<span>3</span> <span class="text-muted">open tasks, </span>
												<span>3</span> <span class="text-muted">tasks completed</span>
											</small>
										</td>
										<td>
											<div class="progress progress-xs progress-striped">
												<div class="progress-bar" role="progressbar" data-toggle="tooltip" title="49%" style="width: 49%"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<h2><a href="project-view.html">Hospital Administration</a></h2>
											<small class="block text-ellipsis">
												<span>12</span> <span class="text-muted">open tasks, </span>
												<span>4</span> <span class="text-muted">tasks completed</span>
											</small>
										</td>
										<td>
											<div class="progress progress-xs progress-striped">
												<div class="progress-bar" role="progressbar" data-toggle="tooltip" title="88%" style="width: 88%"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<h2><a href="project-view.html">Digital Marketplace</a></h2>
											<small class="block text-ellipsis">
												<span>7</span> <span class="text-muted">open tasks, </span>
												<span>14</span> <span class="text-muted">tasks completed</span>
											</small>
										</td>
										<td>
											<div class="progress progress-xs progress-striped">
												<div class="progress-bar" role="progressbar" data-toggle="tooltip" title="100%" style="width: 100%"></div>
											</div>
										</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card-footer">
							<a href="projects.html">View all projects</a>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /Page Content -->

	</div>
	<!-- /Page Wrapper -->

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="assets/js/jquery.slimscroll.min.js"></script>

<!-- Chart JS -->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/js/chart.js"></script>

<!-- Custom JS -->
<script src="assets/js/app.js"></script>

</body>
</html>
