<div class="p-3">

    <!-- Page Content -->
    <div class="content">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">{{__('Activities')}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Activities')}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        @if($activities != null)
        <a id="clearAll3"  class="clear-noti" > {{__('Clear All')}} </a>
        <div class="row">
            <div class="col-md-12">
                <div class="activity">
                    <div class="activity-box">
                        <ul class="activity-list">

                            @foreach($activities as $activity)
                            <li>
                            <div class="activity-user">
												<a href="profile.html" title="" data-toggle="tooltip" class="avatar" data-original-title="Lesley Grauer">
                                                @if($activity->photo!='')
                                           <img style="width:32p×;height:32px;" alt="user-photo" src="{{asset(''.$activity->photo.'')}}">
                                           @else
                                           <img style="width:38p×;height:38px;" alt="user-photo" src="{{asset('assets/img/profiles/avatar-19.jpg')}}">

                                           @endif
                                        </a>
											</div>
                                <div class="activity-content">
                                    <div class="timeline-content">
@if($activity->link!='')
                             <a href="{{url(''.$activity->link.'')}}">@if(app()->getLocale()=='en'){{$activity->description}}@else{{$activity->description_ar}}@endif</a>

@else
                                        @if(app()->getLocale()=='en')

                                        <a href="{{url('/activities/clearOne' , $activity->id)}}">{{$activity->description}}</a>
                                        @elseif(app()->getLocale()=='ar')
                                            <a href="{{url('/activities/clearOne' , $activity->id)}}">{{$activity->description_ar}}</a>
                                        @endif
                                        @endif

                                            {{-- <a id='clearOne{{$index}}' data-noti='{{$notification->id}}'  href="{{url('/activities/clearOne' , $notification->id)}}"> --}}
                                        @php
                                            $start = Carbon\Carbon::now();
                                                   $end = Carbon\Carbon::parse($activity->created_at);

                                                   $total = $end->diffForHumans($start);

                                        @endphp
                                        <span class="time">{{$total}}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @else
                                    <center>
                                        <img style="width:20%;" src="{{asset('empty.png')}}">
                                    </center>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>
