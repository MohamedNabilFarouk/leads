<div>



<!-- Page Wrapper -->
<div class="">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">{{__('Client Profile')}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Client')}}{{__('Profile')}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('message'))
                        <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="">
                                        <img src="{{asset($client->photo) }}" alt=""  onerror="this.onerror=null;this.src='{{ asset('photos/default_user.jpg') }}';" wire:ignore>
                                    </a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0">{{ $client->company_name ?? '' }}</h3>
                                            <h5 class="company-role m-t-0 mb-0">{{ $client->name ?? '' }}</h5>
                                            <small class="text-muted">{{$client->job_title}}</small>
                                            <div class="staff-id">رقم الموظف :{{$client->client_id}}</div>
                                            {{-- <div class="staff-msg"><a href="chat.html" class="btn btn-custom">أرسل رسالة</a></div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">{{__("Phone")}}:</span>
                                                <span class="text"><a href="">{{$client->phone_number}}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">{{__('Email')}}:</span>
                                                <span class="text"><a href="mailto:{{ $client->email ?? '' }}">{{ $client->email ?? '' }}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">{{__('Date of Join')}}:</span>
                                                <span class="text">@php echo date('d M Y', strtotime($client->created_at ?? ''));@endphp</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card tab-box">
            <div class="row user-tabs">
                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item col-sm-3"><a class="nav-link active" data-toggle="tab" href="#myprojects">{{__("Projects")}}</a></li>
                        {{-- <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" href="#tasks">المهام</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content profile-tab-content">

                    <!-- Projects Tab -->
                    <div id="myprojects" class="tab-pane fade show active">
                        <div class="row">
                            @foreach($client->project as $project)
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        <h4 class="project-title"><a href="{{url('project/')}}/{{\Crypt::encrypt($project->id)}}">{{$project->title}}</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">
                                            @php
                                                $max_length = 80;
                                                 if (strlen($project->description) > $max_length) {
                                                     $short_string = substr($project->description, 0, $max_length) . "...";
                                                    } else {
                                                         $short_string = $project->description;
                                                        }

                                                     echo strip_tags($short_string)
                                            @endphp
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">

                                                @php
                                                $createdAt = Carbon\Carbon::parse($project->end_date);

                                                echo $createdAt->format('d M Y');
                                                @endphp
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="{{@$project->teamLeaderName->name}}"><img alt src="{{asset('assets/img/profiles/avatar-16.jpg')}}"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                @foreach($project->team as $team)
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="{{$team->name}}"><img alt src="{{asset('assets/img/profiles/avatar-02.jpg')}}"></a>
                                                </li>
                                                    @endforeach
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /Projects Tab -->



                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

</div>



</div>
