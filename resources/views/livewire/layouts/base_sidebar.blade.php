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
                @php
                     $url = request()->getSchemeAndHttpHost();

                    // $url = request()->getHost();
                    // dd($url);
                @endphp
                @if($url==env("APP_URL"))
                    <li class="submenu">
                        {{-- <a href="#"><i class="la la-dashboard"></i> <span> {{__('Dashboard')}}</span> <span
                                class="menu-arrow"></span></a> --}}
                        {{-- <ul style="display: block;"> --}}


                            <li><a <?php if(Request::path() == app()->getLocale().'/superadmin-dashboard'){ echo 'class="active"';}  ?> href="{{url('/superadmin-dashboard')}}"> <i class="la la-dashboard" style='width:30px'></i>  {{__('Admin Dashboard')}}</a></li>


                            <li><a @if(Request::path() == app()->getLocale().'/admins') class="active" @endif href="{{url('/admins')}}"> <i class="la la-user" style='width:30px'></i> {{__("Admins")}}</a></li>

                            <li><a @if(Request::path() == app()->getLocale().'/clients') class="active" @endif href="{{url('/clients')}}"> <i class="la la-users" style='width:30px'></i>{{__("Clients")}}</a></li>

                            {{-- <li><a @if(Request::path() == app()->getLocale().'/layouts') class="active" @endif href="{{url('/layouts')}}"><i class="la la-plug" style='width:30px'></i> {{__("CMS")}}</a></li> --}}

                            <li><a @if(Request::path() == app()->getLocale().'/pages') class="active" @endif href="{{url('/pages')}}"> <i class="la la-file" style='width:30px'></i> {{__("Privacy Policy")}}</a></li>

                            <li><a @if(Request::path() == app()->getLocale().'/subscription-plan') class="active" @endif href="{{url('/subscription-plan')}}"><i class="la la-sitemap" style='width:30px'></i>  {{__("Plans")}}</a></li>
                            <li><a @if(Request::path() == app()->getLocale().'/user-subscriber') class="active" @endif href="{{url('/user-subscriber')}}"><i class="la la-sitemap" style='width:30px'></i>  {{__("User Subscribers")}}</a></li>
                            {{-- <li><a @if(Request::path() == app()->getLocale().'/Messages') class="active" @endif href="{{url('/Messages')}}"><i class="la la-comment" style='width:30px'></i>  {{__("Messages")}}</a></li> --}}
                            {{-- <li @if(Request::path() == app()->getLocale(). '/holidays') class="active" @endif ><a href="{{url('holidays')}}"><i class="la la-fighter-jet" style='width:30px'></i> {{__('Holidays')}}</a></li> --}}


                        {{-- </ul> --}}
                    </li>
                @else
                    <li class="submenu">
                        <a href="#"><i class="la la-dashboard"></i> <span> {{__('Dashboard')}}</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">


                            @if(auth()->user()->can('admin-dashboard-read'))
                                <li><a <?php if(Request::path() == app()->getLocale().'/admin-dashboard'){ echo 'class="active"';}  ?> href="{{url('/admin-dashboard')}}">{{__('Admin Dashboard')}} <span id="clear" class="badge badge-pill" style="background: #FC6075;">{{$notification_count}}</span></a></li>

                            @endif
                            @if(auth()->user()->can('employee-dashboard-read'))
                                <li><a @if(Request::path() == app()->getLocale().'/my-dashboard') class="active" @endif href="{{url('/my-dashboard')}}">{{__('My Timeline')}} <span id="clear" class="badge badge-pill" style="background: #FC6075;">{{$notification_count}}</span></a></li>
                            @endif


                        </ul>
                    </li>

                    <li class="menu-title">
                        <span>{{__('Employees')}}</span>
                    </li>

                    @php

                        $emp_menue = [app()->getLocale().'/employees', app()->getLocale().'/holidays', app()->getLocale().'/super_leaves' , app()->getLocale().'/hr_leaves' , app()->getLocale().'/financial_leaves' , app()->getLocale().'/leaves' , app()->getLocale().'/leavesetting',app()->getLocale().'/attendance', app()->getLocale().'/attendance/',app()->getLocale().'/departments',app()->getLocale().'/designations', app()->getLocale().'/super-overtime', app()->getLocale().'/overtime',app()->getLocale().'/work-sheet'
                ];
                        // dd(in_array(Request::path(),$emp_menue));
                    @endphp

                    <li class="submenu">
                        <a href="#" class=" @if(in_array(Request::path(),$emp_menue) || (Str::startsWith(Request::path(),app()->getLocale().'/attendance/')))   active @endif "><i class="la la-user"></i> <span> {{__('Employees')}}</span> <span
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
                                <li @if(Request::path() == app()->getLocale(). '/leaves') class="active" @endif><a href="{{url('leaves')}}">{{__('My Leaves')}}</a></li>
                            @endif
                            @if(auth()->user()->can('leave-settings-read'))
                                <li @if(Request::path() == app()->getLocale(). '/leavesetting') class="active" @endif><a href="{{url('leavesetting')}}">{{__('Leave Settings')}}</a></li>
                            @endif
                            @if(auth()->user()->can('attendance-(admin)-read'))
                                <li @if(Request::path() == app()->getLocale(). '/attendance') class="active" @endif><a href="{{url('attendance')}}">{{__('Attendance (Admin)')}}</a></li>
                            @endif
                            @if(auth()->user()->can('attendance-(employee)-read'))
                                <li  @if(Str::startsWith(Request::path(), app()->getLocale().'/attendance/')) class="active" @endif><a href="{{url('attendance')}}/{{auth()->user()->id}}">{{__('My Attendance')}}</a></li>
                            @endif

                            @if(auth()->user()->can('departments-read'))
                                <li @if(Request::path() == app()->getLocale(). '/departments') class="active" @endif><a href="{{url('departments')}}">{{__('Departments')}}</a></li>
                            @endif
                            @if(auth()->user()->can('designations-read'))
                                <li @if(Request::path() == app()->getLocale(). '/designations') class="active" @endif><a href="{{url('designations')}}">{{__('Designations')}}</a></li>
                            @endif
                            {{--                            @if(auth()->user()->can('work-sheet-read'))--}}
                            <li @if(Request::path() == app()->getLocale(). '/work-sheet') class="active" @endif><a href="{{url('work-sheet')}}">{{__('WorkSheet')}}</a></li>
                            <li @if(Request::path() == app()->getLocale(). '/worksheet_timetable-sheet') class="active" @endif><a href="{{url('worksheet_timetable')}}">{{__('Worksheet Setting')}}</a></li>

                            {{--                            @endif--}}
                            @if(auth()->user()->can('overtime-(supervisor)-read'))
                                <li @if(Request::path() == app()->getLocale(). '/super-overtime') class="active" @endif><a href="{{url('super-overtime')}}">{{__('Overtime (Supervisor)')}}</a></li>
                            @endif
                            @if(auth()->user()->can('overtime-read'))
                                <li @if(Request::path() == app()->getLocale(). '/overtime') class="active" @endif><a href="{{url('overtime')}}">{{__('Overtime')}}</a></li>
                            @endif
                            @if(auth()->user()->can('loan-read'))
                            <li @if(Request::path() == app()->getLocale(). '/loan') class="active" @endif><a href="{{url('loan')}}"> {{__('Loan')}} </a></li>
                            @endif
                        </ul>
                    </li>
                    @if(auth()->user()->can('client-read'))
                    <li @if(Request::path() == app()->getLocale(). '/company-clients') class="active" @endif>
                            <a href="{{url('/company-clients')}}"><i class="la la-users"></i> <span>{{__('Clients')}}</span></a>
                        </li>
                        @endif
                        @if(auth()->user()->can('ticket-read'))
                        <li><a @if(Request::path() == app()->getLocale().'/Tickets') class="active" @endif href="{{url('/Tickets')}}"> <i class="la  la-ticket" style='width:30px'></i> {{__("Tickets")}}</a></li>
                        @endif

                        @if(auth()->user()->can('projects-read'))
                        <li class="submenu">
                            <a href="#" class="subdrop"><i class="la la-rocket"></i> <span> {{__('Projects')}}</span> <span class="menu-arrow"></span></a>
                            <ul style="display: block;">
                                <li @if(Request::path() == app()->getLocale().'/projects')     class="active" @endif>   <a href="{{url('/projects')}}">{{__("Projects")}}</a></li>
                                <li @if(Request::path() == app()->getLocale().'/task')         class="active" @endif>   <a href="{{url('/task')}}">{{__("Tasks")}}</a></li>
                                <li @if(Request::path() == app()->getLocale().'/task-board')  class="active" @endif>   <a href="{{url('/task-board')}}">{{__("Task Board")}}</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(auth()->user()->can('leads-read'))
                        <li><a @if(Request::path() == app()->getLocale().'/Leads') class="active" @endif href="{{url('/Leads')}}"> <i class="la la-user-secret" style='width:30px'></i>{{__("Leads")}}</a></li>
                        @endif

                        @if(auth()->user()->can('employee-salary-read') ||  auth()->user()->can('payslip-read') ||  auth()->user()->can('payroll-items-read') )
                        <li class="menu-title">
                            <span>{{__('HR')}}</span>
                        </li>
                        @php
                            $payroll_menue = [app()->getLocale().'/payrollItems', app()->getLocale().'/payslip',app()->getLocale().'/payroll'];
                        @endphp
                        <li class="submenu">
                            <a href="#" class=" @if((in_array( Request::path(), $payroll_menue)) ||(strpos(Request::url(), 'payslip') !== false))   active @endif "><i class="la la-money"></i> <span> {{__('Payroll')}} </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @if(auth()->user()->can('employee-salary-read'))
                                    <li @if(Request::path() == app()->getLocale(). '/payroll') class="active" @endif><a href="{{url('payroll')}}"> {{__('Employee Salary')}} </a></li>
                                @endif

                                @if(auth()->user()->can('payroll-items-read'))
                                    <li @if(Request::path() == app()->getLocale(). '/payrollItems') class="active" @endif><a href="{{url('payrollItems')}}"> {{__('Payroll Items')}} </a></li>
                                @endif
                                @if(auth()->user()->can('deductions-read'))
                                    <li @if(Request::path() == app()->getLocale(). '/deductions') class="active" @endif><a href="{{url('deductions')}}"> {{__('Deductions')}} </a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

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

                            </ul>
                        </li>

                    @endif



                                    @if(auth()->user()->can('promotion-read'))
                                        <li @if(Request::path() == app()->getLocale(). '/promotion') class="active" @endif><a href="{{url('promotion')}}"><i class="la la-bullhorn"></i>  &nbsp; {{__('Promotion')}}</a></li>
                                    @endif
                                    @if(auth()->user()->can('resignation-read'))
                                        <li @if(Request::path() == app()->getLocale(). '/resignation') class="active" @endif><a href="{{url('resignation')}}"> <i class="la la-external-link-square"></i> &nbsp; {{__('Resignation')}}</a></li>
                                    @endif
                                    @if(auth()->user()->can('termination-read'))

                     <li @if(Request::path() == app()->getLocale(). '/termination') class="active" @endif><a href="{{url('termination')}}"><i class="la la-times-circle"></i> &nbsp; {{__('Termination')}}</a></li>
                 @endif



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


                    @if(auth()->user()->can('assets-read'))

                    <li class="menu-title">
                      <span>{{__('Administration')}}</span>
                   </li>

                   <li @if(Request::path() == app()->getLocale().'/assets') class="active" @endif>
                <a href="{{url(app()->getLocale().'/assets')}}"><i class="la la-object-ungroup"></i> <span>{{__('Assets')}}</span></a>
                    </li>
                    @endif

                    @if(auth()->user()->can('jobs-read')||auth()->user()->can('job-categories-read')||auth()->user()->can('job-applicants-read'))

                    <li class="submenu">
<a href="#" class="subdrop"><i class="la la-briefcase"></i> <span> {{__('Jobs')}} </span> <span class="menu-arrow"></span></a>
<ul style="display: block;">
<li @if(Request::path() == app()->getLocale().'/jobs') class="active" @endif><a href="{{url(app()->getLocale().'/jobs')}}"> {{__('Jobs')}}</a></li>
<li @if(Request::path() == app()->getLocale().'/job-categories') class="active" @endif><a href="{{url(app()->getLocale().'/job-categories')}}"> {{__('Job Categories')}}</a></li>
</ul>
</li>
@endif

                    @if(auth()->user()->can('branches-read'))
                   <li @if(Request::path() == app()->getLocale().'/branches') class="active" @endif>
                <a href="{{url(app()->getLocale().'/branches')}}"><i class="la la-sitemap"></i> <span>{{__('Branches')}}</span></a>
                    </li>

                @endif



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
                                @if($getclient)
                                {{-- @if(auth()->user()->email == $getclient->email ) --}}
                                @if(auth()->user()->can('company-profile-read'))
                                <li @if(Request::path() == app()->getLocale(). ('/companyProfile')) class="active" @endif><a href="{{url('companyProfile')}}"> {{__('Company Profile')}} </a></li>
                                @endif

                                @endif
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

                    {{-- <li><a href="{{url('pages')}}"> <i class="la la-cog"></i> <span>{{__('Privacy Policy')}}</span>  </a></li> --}}

                @endif

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
