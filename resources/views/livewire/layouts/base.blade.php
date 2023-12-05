
    <!DOCTYPE html>
<html lang="en">
<?php
        $url=request()->getHost();
         $urlrxplode=explode(".",$url);
        $getclient=DB::connection('general')->table('clients')->where('slug',$urlrxplode[0])->first();
        // dd(asset($getclient->theme_color.'_assets/css/stylelight.css'));
    // dd($getclient)
        $project_menue_array = ['task-board','task'];
        // if(!$payslip_active_menue){
        //     $payslip_active_menue=0;
        // }
        $openModal = false;
        if($getclient){
          $userplan =  DB::connection('general')->table('user_subscribers')->where([['client_id',$getclient->id],['is_paid',1],['end_date','>=',Carbon\Carbon::now()]])->get();
        //    dd($userplan);
          if($userplan =='[]'){
                $openModal = true;
            }else{
                $openModal = false;
            }
        }
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr">
    <meta name="keywords"
          content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Smart HR </title>


    <!-- Favicon -->
    @if($getclient == null)
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon-32x32.png')}}">
    @else

    @if(!$getclient->photo)
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon-32x32.png')}}">
    @else
    <link rel="shortcut icon" type="image/x-icon" href="{{asset($getclient->photo)}}">

    @endif
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"> --}}
    {{-- @if(app()->getLocale()=='en')
        <link rel="stylesheet" href="{{asset('assets/css/stylelight.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('assets/css/stylertl.css')}}">
    @endif --}}


    @if(($getclient !=  null) )
    {{-- client colorName_assets folder --}}
            @if(app()->getLocale()=='en')
            <link rel="stylesheet" @if($getclient->theme_color != null) href="{{asset('assets/css/'.$getclient->theme_color.'_style.css')}}"  @else href="{{asset('assets/css/stylelight.css')}}" @endif>
            @else
            {{-- true link after create css rtl for every color--}}
                <link rel="stylesheet"  @if($getclient->theme_color != null) href="{{asset('assets/css/'.$getclient->theme_color.'_style_rtl.css')}}" @else  href="{{asset('assets/css/stylertl.css')}}" @endif>
                {{-- <link rel="stylesheet" href="{{asset('assets/css/stylertl.css')}}"> --}}

                @endif
    @else
    {{-- no client ordinary css assets folder --}}
            @if(app()->getLocale()=='en')
            <link rel="stylesheet" href="{{asset('assets/css/Blue_style.css')}}">
            @else
                <link rel="stylesheet" href="{{asset('assets/css/Blue_style_rtl.css')}}">
            @endif

    {{-- <link rel="stylesheet" href="{{asset($getclient->theme_color.'_assets/css/stylelight.css')}}"> --}}


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

    .user-table-name{
        width:150px;!important;
    }
    .user-r-image{
        width: 40px !important;
        height: 40px !important;
    }
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




    @if ($openModal)
      <!-- popup Modal -->
      <div wire:ignore.self class="modal custom-modal fade" id="pop" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">{{__("Select")}}{{__("Plan")}}</h5>

                 {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()">
                     <span aria-hidden="true">&times;</span>
                 </button> --}}
             </div>
             <div class="modal-body">
                {{-- <form method="get" action="{{pricing-modal}}"> --}}
                    {{-- @csrf --}}
                    <!-- Plan Tab Content -->
                      <div class="tab-content mb-5">

                          <!-- Monthly Tab -->
                          <div class="tab-pane fade active show" id="monthly">
                              <div class="row mb-30 equal-height-cards">

                                  @foreach($plans as $p)
                                  <div class="col-md-4  justify-content-center">
                                      <div class="card pricing-box">
                                          <div class="card-body d-flex flex-column">
                                              <div class="mb-4">
                                                  <h3>{{$p->name}}</h3>
                                                  <span class="display-4">{{$p->currency}}  {{$p->price}}</span>
                                              </div>
                                              <ul>
                                                  <li><i class="fa fa-check"></i> <b>{{$p->frequency}}</b></li>
                                                  <li><i class="fa fa-check"></i> {{$p->trail_days}} </li>
                                                  <li><i class="fa fa-check"></i> {{__('Unlimited Users')}}</li>
                                                  <li><i class="fa fa-check"></i> {{__(' 24/7 Customer Support')}}</li>
                                              </ul>

                                              @if(auth()->user()->can('company-profile-write'))  <a href="{{url('/pricing-plan-subscribe',\Crypt::encrypt($p->id))}}" class="btn btn-lg btn-outline-secondary mt-auto">{{__("Upgrade")}}</a> @endif

                                          </div>
                                      </div>
                                  </div>
                                  @endforeach

                              </div>
                          </div>
                          <!-- /Monthly Tab -->



                      </div>
                      <!-- /Plan Tab Content -->
                  {{-- </form> --}}
             </div>
         </div>
        </div>
        </div>
    <!-- /popup Modal -->
@endif





@php
// dd(LaravelLocalization::localizeURL(url()->current(), 'ar'));
// dd(app()->getLocale());
    // Clear application cache:
        // Artisan::call('cache:clear');

        // Artisan::call('route:cache');

         // Artisan::call('config:cache');

        // Artisan::call('view:clear');
        // if(Auth::user()->lang != null){
        //     //  dd(Auth::user()->lang );
        //     app()->setLocale(Auth::user()->lang);
        //     LaravelLocalization::localizeURL(url()->current(), Auth::user()->lang);
        // }
        // dd(app()->getLocale());
    app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    // dd(Request::path() == app()->getLocale().'/employees');
    // dd(url()->current()== 'http://localhost:8000/ar/admin-dashboard');
    // dd(($_SERVER['REQUEST_URI'] == 'ar/admin-dashboard'));
@endphp
{{-- @dd(app()->getLocale()) --}}

    <!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            {{-- <a href="{{url('/')}}" class="logo">
                <img src="{{asset('assets/img/smartlogo.png')}}" width="60" alt="">
            </a> --}}
{{--            <a href="{{url('/')}}" class="logo" >--}}
{{--                @if($getclient == null)--}}
{{--                <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon-32x32.png')}}">--}}
{{--                @else--}}
{{--            @if(!$getclient->photo)--}}
{{--            <img src="{{asset('smartlogo.png')}}" alt="{{$getclient->name}}">--}}
{{--            @else--}}
{{--            <img src="{{asset($getclient->photo)}}" alt="{{$getclient->name}}" style="width:90px">--}}

{{--            @endif--}}
{{--            @endif--}}
{{--            </a>--}}

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
                <form action="{{route('setLang')}}" method='post' id='LangForm'>
                    @csrf
                <div class="dropdown-menu dropdown-menu-right">
                    {{-- <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="dropdown-item">
                        <img src="{{asset('assets/img/flags/us.png')}}" alt="" height="16"> English
                    </a> --}}
                    {{-- <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="dropdown-item">
                        <img src="{{asset('assets/img/flags/sa.png')}}" alt="" height="16"> Arabic
                    </a> --}}
                    <input type="hidden" id="lang" name="lang">
                    <a href="javascript: $('#lang').val('en'); $('#LangForm').submit();"  id='en' class="dropdown-item">
                        <img src="{{asset('assets/img/flags/us.png')}}" alt="" height="16"> English
                    </a>
                    <a href="javascript: $('#lang').val('ar'); $('#LangForm').submit();"  id='ar' class="dropdown-item">
                        <img src="{{asset('assets/img/flags/sa.png')}}" alt="" height="16"> Arabic
                    </a>

                </div>
            </form>
            </li>
{{-- <script>
$('#ar').click(function () {


  $.post({data: ar});
  $('LangForm').submit();
  return false;
});
$('#en').click(function () {

  $.post({data: en});
  $('LangForm').submit();
  return false;
});
</script> --}}
            <!-- /Flag -->

            <!-- Notifications -->
            <li class="nav-item dropdown" >
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i> <span id="clear" class="badge badge-pill">


                                    <?php
                                    $notification_count=  DB::table('activites')
                                        ->join('activity_users','activites.id','activity_users.activity_id')
                                        ->where('activity_users.status',null)
                                        ->orWhere('activity_users.status',0)
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
                                ->where('activity_users.status',null)
                                ->orWhere('activity_users.status',0)
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

                    @if(Session::get('key1')=='superAdmin')
                        <a class="dropdown-item" href="{{env("APP_URL")}}/{{app()->getLocale()}}/clients">{{__('Back To Super Admin')}}</a>
                    @endif

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
     {{-- @dd(Request::path()) --}}
     {{-- in_array( Request::path() ,$project_menue_array) --}}
    @if((Str::startsWith(Request::path(),app()->getLocale().'/task'))||(Request::path() == app()->getLocale(). '/task-board' ))
    @include('livewire.layouts.project_sidebar')
    @elseif((Request::path() == app()->getLocale(). '/change_password' )||(Request::path() == app()->getLocale().'/permissions')||(Request::path() == app()->getLocale().'/leavestype')||(Request::path() == app()->getLocale().'/email-config'))
    @include('livewire.layouts.settings_sidebar')
    @else
    @include('livewire.layouts.base_sidebar')
    @endif


    <!-- /Sidebar -->
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        {{ $slot }}


    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>

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





    <script src="https://unpkg.com/flatpickr"></script>






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
    flatpickr("#contract_starting_date,#birthday,#contract_expiration_date,#work_card_expiry_date_non_saudi,#notice_date,#termination_date,#resignation_date,#searchDateFrom,#searchDatefrom,#searchDateTo,#date_from,#date_to,#overtime_date,#promotion_date,#promotion_date,#empBirthdate_0,#starting_date_0,#starting_date,#complete_date_0,#complete_date,#experince_period_form_0,#experince_period_to_0,#editExperince_period_form,#editExperince_period_to,#date_b,#edit_family_bd,#paymentLoanDate,#start_date,#end_date",{
        dateFormat: "Y-m-d"
    });
    $("#leave_period_form").change(function(){
        flatpickr("#period_to",{
            dateFormat  : "Y-m-d",
            defaultDate : new Date($("#leave_period_form").val()),
             minDate    : new Date($("#leave_period_form").val())
        });
    });

    $("#period_to").change(function(){
        flatpickr("#work_Resume",{
            dateFormat  : "Y-m-d",
            defaultDate : new Date($("#period_to").val()).fp_incr(+1),
             minDate    : new Date($("#period_to").val()).fp_incr(+1)
        });
    });



    flatpickr("#leave_period_form",{
        dateFormat: "Y-m-d",
        defaultDate: "today",
        minDate: new Date().fp_incr(-1)
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


    {{-- print --}}

    <script>
        $('#pop').modal('show');

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

        var button = document.getElementById("pdfButton");
        if(button){
            button.addEventListener("click", function () {
                var doc = new jsPDF("p", "mm", [300, 300]);
                var makePDF = document.querySelector("#generatePdf");
                // fromHTML Method
                doc.fromHTML(makePDF);
                doc.save("output.pdf");
            });
        }
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
