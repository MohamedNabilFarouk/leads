<div>

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{__('Welcome')}} {{$selected_user->name}}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">{{__("Dashboard")}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                @if (session()->has('message'))
                <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                          <a style="color:black;" href="{{url('/employees')}}">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$user_count}}</h3>
                               <span>{{__("Employees")}}</span>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>

                @if(auth()->user()->can('projects-read'))

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <a style="color:black;" href="{{url('/task')}}">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$task_count}}{{'/'}}{{$all_task_count}}</h3>
                                    <span>{{__("Tasks")}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @else
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                                            <div class="card dash-widget">
                                            <a style="color:black;" href="{{url('/super_leaves')}}">
                                                <div class="card-body">
                                                    <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                                                    <div class="dash-widget-info">
                                                        <h3>{{$leavesCount}}</h3>
                                                        <span>{{__("Leaves")}}</span>
                                                    </div>
                                                </div>
                                               </a>
                                            </div>
                                        </div>
                @endif
                @if(auth()->user()->can('client-read'))
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                    <a style="color:black;" href="{{url('/company-clients')}}">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$clients}}</h3>
                                <span>{{__("Clients")}}</span>
                            </div>
                        </div>
                      </a>
                    </div>
                </div>
                @else
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <a style="color:black;" href="{{url('/promotion')}}">
                                <div class="card-body">
                                    <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                                    <div class="dash-widget-info">
                                        <h3>{{$promotionCount}}</h3>
                                        <span>{{__("Promotion")}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
@if(auth()->user()->can('projects-read'))
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                    <a style="color:black;" href="{{url('/projects')}}">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-archive"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$projects}}</h3>
                                <span>{{__("Projects")}}</span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                @else
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <a style="color:black;" href="{{url('/Resignation')}}">
                                <div class="card-body">
                                    <span class="dash-widget-icon"><i class="fa fa-archive"></i></span>
                                    <div class="dash-widget-info">
                                        <h3>{{$resignationCount}}</h3>
                                        <span>{{__("Resignation")}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">{{__("Attendance Percentage")}}</h3>
                                    <div id="bar-charts"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">{{__("Total Performance")}}</h3>
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
                        <a style="color:black;" href="{{url('/employees')}}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <span class="d-block">{{__("New Employees")}}</span>
                                    </div>

                                </div>
                                <h3 class="mb-3">{{$newUserCount}}</h3>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{__("Overall Employees")}} {{$user_count}}</p>
                               </a>
                            </div>
                        </div>

                        <div class="card">
                        <a style="color:black;" href="{{url('/super_leaves')}}">

                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <span class="d-block">{{__("Leaves")}}</span>
                                    </div>

                                </div>
                                <h3 class="mb-3">{{$leavesCount}}</h3>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{__("Previous Month")}} <span class="text-muted">{{$leavesPrevCount}}</span></p>
                               </a>
                            </div>
                        </div>

                        <div class="card">
                        <a style="color:black;" href="{{url('/holidays')}}">

                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <span class="d-block">{{__("Holidays")}}</span>
                                    </div>

                                </div>
                                <h3 class="mb-3">{{$holidayCount}}</h3>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{__("Previous Month")}} <span class="text-muted">{{$holidayCount}}</span></p>
                            </div>
                        </div>

                        <div class="card">
                        <a style="color:black;" href="{{url('/super-overtime')}}">

                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <span class="d-block">{{__("Overtime")}}</span>
                                    </div>

                                </div>
                                <h3 class="mb-3">{{$overtimeCount}}</h3>
                                <div class="progress mb-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="mb-0">{{__("Previous Month")}} <span class="text-muted">{{$overtimePrevCount}}</span></p>
                             </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Widget -->
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-4 d-flex">
                    <div class="card flex-fill dash-statistics">
                        <div class="card-body">
                            <h5 class="card-title">{{__("Statistics")}}</h5>
                            <div class="stats-list">
                                <div class="stats-info">
                                    <p>{{__("Today Leave")}} <strong>{{$leavesTodayCount}} <small>/ {{$user_count}}</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>{{__("Today Attendace")}} <strong>{{$attendanceTodayCount}} <small>/ {{$user_count}}</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>{{__("Today Overtime")}} <strong>{{$overtimeTodayCount}} <small>/ {{$user_count}}</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                {{-- tasks --}}
                <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h4 class="card-title">{{__("Task Statistics")}}</h4>
                            <div class="statistics">
                                <div class="row">
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box mb-4">
                                            <p>{{__("Total Tasks")}}</p>
                                            <h3>{{$all_task_count}}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box mb-4">
                                            <p>{{__("Late Tasks")}}</p>
                                            <h3>{{$late_task_count}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress mb-4">
                                @foreach($boardCounts as $key=>$b)
                                <div class="progress-bar bg-{{$b->color}}" role="progressbar" style="width: {{round($b->tasks_count/$all_task_count*100)}}%" aria-valuenow="{{round($b->tasks_count/$all_task_count*100)}}" aria-valuemin="0" aria-valuemax="100">{{round($b->tasks_count/$all_task_count*100)}}%</div>
                               @endforeach

                            </div>

                            <div>
                                @foreach($boardCounts as $key=>$b)
                                <p><i class="fa fa-dot-circle-o text-{{$b->color}} mr-2"></i>{{$b->name_field}} <span class="float-right">{{$b->tasks_count}}</span></p>
                               @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                {{-- end tasks --}}
                <div class="col-md-12 col-lg-4 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h4 class="card-title">{{__("Yesterday Absent")}} <span class="badge bg-inverse-danger ml-2">{{count($absent)}}</span></h4>
                            @if(count($absent)==0)
                            <center>
                            <img style="width:20%;" src="{{asset('empty.png')}}">
                        </center>

                            @else
                            @foreach($itemsToShow as $absentDay)
                                <?php
                                    $user   = DB::table('users')->where('id',$absentDay['user_id'])->first();

                                    $leaves = DB::table('leaves')->where('user_id',$user->id)
                                             ->where('period_from','<=',$absentDay['date'])
                                             ->where('period_to','>=',$absentDay['date'])
                                             ->first();
                                ?>


                            <div class="leave-info-box">
                                <div class="media align-items-center">
                                    <a href="{{url('profile')}}/{{\Crypt::encrypt($user->id)}}" class="avatar"><img alt="" style="width:40px;height:40px"  src="{{asset($user->photo) }}" onerror="this.onerror=null;this.src='{{ asset('photos/1678286541avatar.jpg') }}';"></a>
                                    <div class="media-body">
                                        <div class="text-sm my-0">{{$user->name}}</div>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-3">
                                    <div class="col-6">
                                        <h6 class="mb-0">
                                                <?php echo date('d M Y', strtotime($absentDay['date'])); ?>
                                        </h6>
                                        @if($leaves!=null)
                                        <span class="text-sm text-muted">{{__("Leave Request")}}</span>
                                        @else
                                            <span class="text-sm text-muted">{{__("No Leave Request")}}</span>
                                        @endif
                                    </div>
                                    @if($leaves!=null)
                                    <div class="col-6 text-right">
                                        <span class="badge bg-inverse-danger">{{__($leaves->approve_leave_status)}}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                            @if (count($items) > $count)
                            <div class="col-md-12 text-center">
                            <button class='btn btn-success ' wire:click="loadMore">{{__('Show More')}}</button>
                            </div>
                        @endif
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Statistics Widget -->
<!-- Statistics Widget -->
<div class="row">
    <div class="col-md-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">{{__('Holidays')}}</h3>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    @if(count($holidays)==0)
                        <center>
                            <img style="width:20%;" src="{{asset('empty.png')}}">
                        </center>

                    @else
                    <table class="table custom-table mb-0">
                        <thead>
                        <tr>
                            <th class="text-center">{{__('Title')}}</th>
                            <th class="text-center">{{__('Holiday Date From')}}</th>
                            <th class="text-center">{{__('Holiday Date To')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($holidays as $holiday)
                            <tr class="holiday-upcoming">
                                <td class="text-center">{{$holiday->title}}</td>
                                <td class="text-center">{{$holiday->date_from}}</td>
                                <td class="text-center">{{$holiday->date_to}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    @endif
                </div>
            </div>

            <div class="card-footer">
                <a href="{{url('holidays')}}">{{__('View Holiday')}}</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 d-flex">
        <div class="card card-table flex-fill">
            <div class="card-header">
                <h3 class="card-title mb-0">{{__('Deductions')}}</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table custom-table mb-0">
                        <thead>
                        <tr>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Type')}}</th>
                            <th>{{__('Times')}}</th>
                            <th>{{__('Deduction')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deduction_limits as $deduction_limit)
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a class="avatar"><img style="width:40px;height:40px;" alt="" src="{{url($deduction_limit->user->photo)}}"></a>
                                    <a>{{$deduction_limit->user->name}} <span>{{$deduction_limit->user->job->name}}</span></a>
                                </h2>
                            </td>
                            @foreach($leave_deduction_type as $key=>$value)
                                @if($deduction_limit->type==$key)
                                <td>{{$value[app()->getLocale()]}}</td>
                                @endif
                            @endforeach

                            <td>{{$deduction_limit->deduction_count}}</td>
                            <td>{{$deduction_limit->amount}}</td>
                            <td>
                                <div class="dropdown action-label">
                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-dot-circle-o text-success"></i>

                                        @if($deduction_limit->status==1){{__('New')}}@elseif($deduction_limit->status==2){{'Approved'}}@else{{'Declined'}}@endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a style="cursor:pointer;" class="dropdown-item"  wire:click="changeEvent(1,{{$deduction_limit->id}})"><i class="fa fa-dot-circle-o text-success"></i>
                                            {{__('Approve')}}</a>
                                        <a style="cursor:pointer;" class="dropdown-item"  wire:click="changeEvent(2,{{$deduction_limit->id}})"><i class="fa fa-dot-circle-o text-danger"></i>{{__('Declined')}}</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{url('deductions')}}">{{__('View Deduction')}}</a>
            </div>
        </div>
    </div>
</div>
    <div class="col-md-12 col-lg-12 col-xl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <h4 class="card-title">{{__("Holiday")}}<a class="text-dark ml-3" href="{{url('holidays')}}">View Holiday</a></h4>
                @if(count($holidays)==0)
                    <center>
                        <img style="width:20%;" src="{{asset('empty.png')}}">
                    </center>

                @else
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                            <tr>
                                <th>{{__("Title")}} </th>
                                <th>{{__("Holiday Date From")}}</th>
                                <th>{{__("Holiday Date To")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($holidays as $holiday)
                                <tr class="holiday-upcoming">
                                    <td>{{$holiday->title}}</td>
                                    <td>{{$holiday->date_from}}</td>
                                    <td>{{$holiday->date_to}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
                @endif
            </div>
        </div>

<!-- /Statistics Widget -->
            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h3 class="card-title mb-0">{{__("Activities")}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <ul class="activity-list">
                                    @foreach($activites as $activity)
                                    <li>

                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                @if($activity->photo!='')
                                           <img style="width: 38px;height:38px;" alt="user-photo" src="{{asset(''.$activity->photo.'')}}">
                                           @else
                                           <img style="width:38p×;height:38px;" alt="user-photo" src="{{asset('assets/img/profiles/avatar-19.jpg')}}">

                                           @endif
                                                <a href="{{url(''.$activity->link.'')}}">{{$activity->description}}</a>
                                            </div>
                                            <!-- assets/img/profiles/avatar-19.jpg -->
                                            @php
                                                $start = Carbon\Carbon::now();
                                                       $end = Carbon\Carbon::parse($activity->created_at);

                                                       $total = $end->diffForHumans($start);

                                            @endphp
                                            <span class="time">{{$total}}</span>
                                        </div>
                                    </li>

                                        @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{url('activities')}}">{{__("View all Activities")}}</a>
                        </div>
                    </div>
                </div>

            </div>



        </div>
        <!-- /Page Content -->


</div>
<?php
//  print_r($absenceChart);
//  die()
 ?>
{{--@dd($absenceChart);--}}
{{--@dd(\Carbon\Carbon::parse(\Carbon\Carbon::now())->format('M'))--}}
<script>
$(document).ready(function() {

// Bar Chart

Morris.Bar({
    element: 'bar-charts',
    data: [
        @if($absenceChart == [])
        { y: '{{\Carbon\Carbon::parse(\Carbon\Carbon::now())->format('M')}}', a: {{$user_count}}, b: 0 }
        @endif
        @foreach($absenceChart as $key=>$row)
        { y: '{{$key}}', a: {{round($attendanceChart[$key]/($attendanceChart[$key]+$row)*100) }}, b: {{round($row/($attendanceChart[$key]+$row)*100)}} },
        @endforeach
        // { y: '2007', a: 75,  b: 65 },
        // { y: '2008', a: 50,  b: 40 },
        // { y: '2009', a: 75,  b: 65 },
        // { y: '2010', a: 50,  b: 40 },
        // { y: '2011', a: 75,  b: 65 },
        // { y: '2012', a: 100, b: 90 }
    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['{{__("Attendance Percentage")}}', '{{__("Absence Percentage")}} '],
    lineColors: ['#ff9b44','#fc6075'],
    lineWidth: '3px',
    barColors: ['#ff9b44','#fc6075'],
    resize: true,
    redraw: true
});

// Line Chart


Morris.Line({
    element: 'line-charts',
    data: [
        @foreach($performance_chart as $key=>$row)

        { y: '{{$key}}', a: {{$row}}  },
        @endforeach
        // { y: '2007', a: 75,  b: 65 },
        // { y: '2008', a: 50,  b: 40 },
        // { y: '2009', a: 75,  b: 65 },
        // { y: '2010', a: 50,  b: 40 },
        // { y: '2011', a: 75,  b: 65 },
        // { y: '2012', a: 100, b: 50 }
    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['{{__("Total Performance")}}', ''],
    lineColors: ['#ff9b44','#fc6075'],
    lineWidth: '3px',
    resize: true,
    redraw: true
});

});
</script>
