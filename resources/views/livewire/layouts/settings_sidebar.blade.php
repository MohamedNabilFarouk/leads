<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{url('/my-dashboard')}}"><i class="la la-home"></i> <span>{{__('Back to Home')}}</span></a>
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
                @if(auth()->user()->can('email-setting-read'))
                    <li @if(Request::path() == app()->getLocale(). '/email-config') class="active" @endif>
                    <a href="{{url('email-config')}}"><i class="la la-at"></i> <span>{{__('Email Settings')}}</span></a>
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
