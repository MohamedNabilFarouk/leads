<div>

    <!-- Page Wrapper -->
    {{-- <div class="page-wrapper"> --}}
        <div class="chat-main-row mt-5">
            <div class="chat-main-wrapper">
                <div class="col-lg-8 message-view task-view">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div class="navbar">
                                <div class="float-left ticket-view-details">
                                    <div class="ticket-header">

                                        <span>{{__("Status")}}: </span>
                                        @foreach($leads_status as $key=>$m)
                                        @if($lead->status == $key)
                                        <span class="badge badge-warning">{{$m[app()->getLocale()]}}</span>
                                        @endif
                                        @endforeach

                                        <span class="m-l-15 text-muted">{{__("Client")}}: </span>
                                        <a href="#">{{@$lead->name}}</a>
                                        <span class="m-l-15 text-muted">{{__("Created Date")}}: </span>
                                        <span>{{\Carbon\Carbon::parse($lead->created_at)->format('j M Y h:i A')}}</span>
                                        <span class="m-l-15 text-muted">{{__("Created by")}}:</span>
                                        <span><a href="profile.html">{{@$lead->createdBy->name}}</a></span>
                                    </div>
                                </div>
                                <a class="task-chat profile-rightbar float-right" id="task_chat" href="#task_window"><i class="fa fa fa-comment"></i></a>
                            </div>
                        </div>
                        <div class="chat-contents">
                            <div class="chat-content-wrap">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        <div class="task-wrapper">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="project-title">
                                                        <div class="m-b-20">
                                                            <span class="h5 card-title ">{{__('Notes')}}</span>
                                                            <div class="float-right ticket-priority">
                                                                {{-- <span>{{__("Status")}}:</span> --}}
                                                                <div class="btn-group">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>{{$lead->note ?? __('No Data')}} </p>
                                                </div>
                                            </div>



                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title m-b-20">{{__("History")}}</h5>
                                                    <div class="row">



                                                        <div class="col-md-12 col-sm-12">
                                                            @if (!$lead->leadActivity)
                                                            {{__('No Data')}}
                                                            @else

                                                            @foreach ( $lead->leadActivity as $key=>$val )
                                                            @if($val->activity != null)
                                                            <div class="alert alert-warning  fade show mt-5" role="alert">
                                                                <strong class='text-center'>{{__($val->activity)}}</strong> &nbsp;{{__('By')}}    {{$val->user->name}}     <span>{{$val->Created_at}}</span> &nbsp;
                                                                @foreach($leads_status as $key=>$m)
                                                                @if($val->status == $key)
                                                                <span class="badge badge-primary">{{$m[app()->getLocale()]}}</span><br>
                                                                @endif
                                                                @endforeach

                                                                <span>{{$val->comment}} </span>
                                                            </div>

                                                            @endif

                                                            @endforeach
                                                            @endif
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="notification-popup hide">
                                            <p>
                                                <span class="task"></span>
                                                <span class="notification-text"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Activity --}}
                <div class="col-lg-4 message-view task-chat-view ticket-chat-view" id="task_window">
                    <div class="chat-window">
                        <div class="fixed-header">
                            <div class="navbar">
                                <div class="task-assign">
                                    {{-- <span class="assign-title">Assigned to </span>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="John Doe" class="avatar">
                                        <img src="assets/img/profiles/avatar-02.jpg" alt="">
                                    </a>
                                    <a href="#" class="followers-add" title="Add Assignee" data-toggle="modal" data-target="#assignee"><i class="material-icons">add</i></a> --}}
                                </div>
                                {{-- <ul class="nav float-right custom-menu">
                                    <li class="nav-item dropdown dropdown-action">
                                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_ticket">Edit Ticket</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_ticket">Delete Ticket</a>
                                        </div>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                        <div class="chat-contents task-chat-contents">
                            <div class="chat-content-wrap">
                                <div class="chat-wrap-inner">
                                    <div class="chat-box">
                                        <div class="chats">
                                            <div class="chat chat-left">

                                                @if($lead->leadActivity )

                                                @foreach($lead->leadActivity  as $lead_activity)

                                                <div class="chat-avatar">
                                                    <a href="#" class="avatar">
                                                        <img src="{{asset(@$lead_activity->user->photo)}}" alt="" class='user-r-image'>
                                                    </a>
                                                </div>

                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">{{@$lead_activity->user->name}}</span> <span class="chat-time">{{\Carbon\Carbon::parse($lead_activity->created_at)->format('j M Y h:i A')}}</span>
                                                            <p>{{@$lead_activity->comment}}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>

                                            {{-- @foreach($ticket->ticketActivity  as $ticket_activity)
                                            @if($ticket_activity->file != null)


                                            <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="profile.html" class="avatar">
                                                        <img src="{{asset(@$ticket_activity->user->photo)}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">{{@$ticket_activity->user->name}}</span>
                                                            <span class="file-attached">attached {{count($activity_file)}} files <i class="fa fa-paperclip"></i></span>
                                                            <span class="chat-time">{{\Carbon\Carbon::parse($ticket_activity->created_at)->format('j M Y h:i A')}}</span>
                                                            <ul class="attach-list">
                                                                @for($i=0;$i<count($activity_file);$i++)
                                                                <li><i class="fa fa-file"></i> <a href="{{url($activity_file[$i])}}">{{$activity_fileName[$i]}}</a></li>
                                                                @endfor

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach --}}
                                            {{-- <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="profile.html" class="avatar">
                                                        <img src="assets/img/profiles/avatar-09.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">Jeffery Lalor</span>
                                                            <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span>
                                                            <span class="chat-time">Yesterday at 9:16pm</span>
                                                            <ul class="attach-list">
                                                                <li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">Document_2016.pdf</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="chat chat-left">
                                                <div class="chat-avatar">
                                                    <a href="profile.html" class="avatar">
                                                        <img src="assets/img/profiles/avatar-09.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="chat-body">
                                                    <div class="chat-bubble">
                                                        <div class="chat-content">
                                                            <span class="task-chat-user">Jeffery Lalor</span>
                                                            <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span>
                                                            <span class="chat-time">Today at 12:42pm</span>
                                                            <ul class="attach-list">
                                                                <li class="img-file">
                                                                    <div class="attach-img-download"><a href="#">avatar-1.jpg</a></div>
                                                                    <div class="task-attach-img"><img src="assets/img/user.jpg" alt=""></div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-information">
                                                <span class="task-info-line">
                                                    <a class="task-user" href="#">John Doe</a>
                                                    <span class="task-info-subject">marked ticket as reopened</span>
                                                </span>
                                                <div class="task-time">1:16pm</div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-footer">



                                <form wire:submit.prevent="storeActivity()"  enctype="multipart/form-data" >
                                    <div class="message-area">
                                        <div class="input-group">
                                            <textarea class="form-control" placeholder="Type message..." wire:model='comment'></textarea>
                                            <span class="input-group-append">
                                                <button class="btn btn-primary" id='store' type="submit"><i class="fa fa-send"></i></button>
                                            </span>
                                        </div>

                                    </div>
                                </form>
                                </div>
                            </div>

                            {{-- <div class="project-members task-followers">
                                <span class="followers-title">Followers</span>
                                <a href="#" data-toggle="tooltip" title="Richard Miles" class="avatar">
                                    <img src="assets/img/profiles/avatar-09.jpg" alt="">
                                </a>
                                <a href="#" data-toggle="tooltip" title="John Smith" class="avatar">
                                    <img src="assets/img/profiles/avatar-10.jpg" alt="">
                                </a>
                                <a href="#" data-toggle="tooltip" title="Mike Litorus" class="avatar">
                                    <img src="assets/img/profiles/avatar-05.jpg" alt="">
                                </a>
                                <a href="#" data-toggle="tooltip" title="Wilmer Deluna" class="avatar">
                                    <img src="assets/img/profiles/avatar-11.jpg" alt="">
                                </a>
                                <a href="#" class="followers-add" data-toggle="modal" data-target="#task_followers"><i class="material-icons">add</i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                {{-- end Activity --}}
            </div>
        </div>




    {{-- </div> --}}
    <!-- /Page Wrapper -->
</div>


@push('scripts')

@endpush
