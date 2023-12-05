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
                                            @foreach($tickets_status as $key=>$m)
                                            @if($ticket->status == $key )
                                            <span class="badge badge-warning">{{$m[app()->getLocale()]}}</span>
                                            @endif
                                            @endforeach

                                            <span class="m-l-15 text-muted">{{__("Client")}}: </span>
                                            <a href="#">{{@$ticket->companyclient->name}}</a>
                                            <span class="m-l-15 text-muted">{{__("Created Date")}}: </span>
                                            <span>{{\Carbon\Carbon::parse($ticket->created_at)->format('j M Y h:i A')}}</span>
                                            <span class="m-l-15 text-muted">{{__("Created by")}}:</span>
                                            <span><a href="profile.html">{{@$ticket->createdBy->name}}</a></span>
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
                                                                <span class="h5 card-title ">{{$ticket->subject}}</span>
                                                                <div class="float-right ticket-priority"><span>{{__("Priority")}}:</span>
                                                                    <div class="btn-group">
                                                                        @foreach($tickets_priority as $key=>$m)
                                                                        @if($ticket->priority == $key )
                                                                        <span class="badge badge-warning"></span>
                                                                        <a href="#" class="badge badge-danger dropdown-toggle" data-toggle="dropdown">{{$m[app()->getLocale()]}} </a>
                                                                        @endif
                                                                        @endforeach
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            {{-- <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Highest priority</a>
                                                                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> High priority</a>
                                                                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-primary"></i> Normal priority</a>
                                                                            <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low priority</a> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>{{$ticket->des}} </p>
                                                    </div>
                                                </div>



                                                @php
                                                                    $file       =  json_decode($ticket->photo);
                                                                    $fileName   =  json_decode($ticket->photo_name);
                                                @endphp
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title m-b-20">{{__("Uploaded image files")}}</h5>
                                                        <div class="row">
                                                            @php
                                                            $photoExtension= ['jpg','jpeg','png','gif','bmp','tif','webp','JPG','JPEG','PNG','GIF','BMP','TIF','WEBP'];
                                                            $txtExtension  = ['txt','TXT','pdf','PDF','xlsx','xls','XLS','XLSX','csv'];
                                                            @endphp
                                                            @if($file)
                                                            @for($i=0;$i<count($file);$i++)

                                                            @if (in_array(pathinfo($file[$i], PATHINFO_EXTENSION), $photoExtension))
                                                            <div class="col-md-3 col-sm-6">
                                                                <div class="uploaded-box">
                                                                    <div class="uploaded-img">
                                                                        <img src="{{asset($file[$i])}}" class="img-fluid" alt="">
                                                                    </div>
                                                                    <div class="uploaded-img-name">
                                                                        {{$fileName[$i]}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @endfor
                                                            @endif

                                                            {{-- <div class="col-md-3 col-sm-6">
                                                                <div class="uploaded-box">
                                                                    <div class="uploaded-img">
                                                                        <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                                                                    </div>
                                                                    <div class="uploaded-img-name">
                                                                         demo.png
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-6">
                                                                <div class="uploaded-box">
                                                                    <div class="uploaded-img">
                                                                        <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                                                                    </div>

                                                                    <div class="uploaded-img-name">
                                                                         demo.png
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-6">
                                                                <div class="uploaded-box">
                                                                    <div class="uploaded-img">
                                                                        <img src="assets/img/placeholder.jpg" class="img-fluid" alt="">
                                                                    </div>
                                                                    <div class="uploaded-img-name">
                                                                         demo.png
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-0">
                                                    <div class="card-body">
                                                        <h5 class="card-title m-b-20">{{__("Uploaded files")}}</h5>
                                                        <ul class="files-list">

                                                        @if($file)
                                                            @for($i=0;$i<count($file);$i++)
                                                            @if (in_array(pathinfo($file[$i], PATHINFO_EXTENSION), $txtExtension))
                                                            {{-- @dd('1') --}}
                                                            <li>
                                                                <div class="files-cont">
                                                                    <div class="file-type">
                                                                        <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                                                    </div>
                                                                    <div class="files-info">
                                                                        <span class="file-name text-ellipsis"><a href="#">{{$fileName[$i]}}</a></span>
                                                                        <span class="file-author"><a href="#">{{$ticket->createdBy->name}}</a></span> <span class="file-date">
                                                                            @php
                                                                                $createdAt = Carbon\Carbon::parse($ticket->created_at);
                                                                                echo $createdAt->format('F jS \a\t g:i A');
                                                                                $file_size =File::size(public_path($file[$i]));
                                                                                $file_size = number_format($file_size / 1048576,2);
                                                                            @endphp
                                                                        </span>
                                                                        <div class="file-size">Size: {{$file_size.' Mb'}}</div>
                                                                    </div>
                                                                    <ul class="files-action">
                                                                        <li class="dropdown dropdown-action">
                                                                            <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <a class="dropdown-item" href="{{url($file[$i])}}">{{__("Download")}}</a>
                                                                                {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_files">Share</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)">Delete</a> --}}
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            @endif
                                                            @endfor
                                                            @endif
                                                            {{-- <li>
                                                                <div class="files-cont">
                                                                    <div class="file-type">
                                                                        <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                                                    </div>
                                                                    <div class="files-info">
                                                                        <span class="file-name text-ellipsis"><a href="#">Issue_report.xls</a></span>
                                                                        <span class="file-author"><a href="#">John Doe</a></span> <span class="file-date">May 5th at 5:41 PM</span>
                                                                        <div class="file-size">Size: 14.8Mb</div>
                                                                    </div>
                                                                    <ul class="files-action">
                                                                        <li class="dropdown dropdown-action">
                                                                            <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <a class="dropdown-item" href="javascript:void(0)">Download</a>
                                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_files">Share</a>
                                                                                <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li> --}}
                                                        </ul>
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
                                                    @foreach($ticket->ticketActivity  as $ticket_activity)
                                                    @php
                                                    $activity_file       =  json_decode($ticket_activity->file);
                                                    $activity_fileName   =  json_decode($ticket_activity->file_name);
                                                    @endphp
                                                    <div class="chat-avatar">
                                                        <a href="profile.html" class="avatar">
                                                            <img src="{{asset(@$ticket_activity->user->photo)}}" alt="">
                                                        </a>
                                                    </div>

                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">{{@$ticket_activity->user->name}}</span> <span class="chat-time">{{\Carbon\Carbon::parse($ticket_activity->created_at)->format('j M Y h:i A')}}</span>
                                                                <p>{{@$ticket_activity->comment}}</p>
                                                            </div>
                                                            @if($ticket_activity->file != null)
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">{{@$ticket_activity->user->name}}</span>
                                                                <span class="file-attached">{{__("attached")}} {{count($activity_file)}} files <i class="fa fa-paperclip"></i></span>
                                                                <span class="chat-time">{{\Carbon\Carbon::parse($ticket_activity->created_at)->format('j M Y h:i A')}}</span>
                                                                <ul class="attach-list">
                                                                    @for($i=0;$i<count($activity_file);$i++)
                                                                    <li><i class="fa fa-file"></i> <a href="{{url($activity_file[$i])}}" target='_blank'>{{$activity_fileName[$i]}}</a></li>
                                                                    @endfor

                                                                </ul>
                                                            </div>
                                                            @endif


                                                        </div>
                                                    </div>
                                                    @endforeach
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
                                {{-- <form wire:submit.prevent="storeActivity()" enctype="multipart/form-data"> --}}
                                    <form  id="upload-form-add-photo" wire:ignore  >
                                        @csrf
                                <div class="message-bar">

                                    <div class="message-inner">


                                          <input type="file" hidden name='photo[]' accept="image/*,.pdf,.doc,.docx,.xls,.xlsx,.csv,.txt"  id="file-input" multiple style="display:none;">

                                        <a class="link attach-icon" href="#"> <label for="file-input">
                                            <img src="{{asset('assets/img/attachment.png')}}" alt="Select file">
                                          </label>

                                        </a>
                                        <div id='file_count' ></div>
                                    </form>

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

            <!-- Edit Ticket Modal -->
            <div id="edit_ticket" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Ticket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ticket Subject</label>
                                            <input class="form-control" type="text" value="Laptop Issue">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ticket Id</label>
                                            <input class="form-control" type="text" readonly value="TKT-0001">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Assign Staff</label>
                                            <select class="select">
                                                <option>-</option>
                                                <option selected>Mike Litorus</option>
                                                <option>John Smith</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Client</label>
                                            <select class="select">
                                                <option>-</option>
                                                <option >Delta Infotech</option>
                                                <option selected>International Software Inc</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select class="select">
                                                <option>High</option>
                                                <option selected>Medium</option>
                                                <option>Low</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CC</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Assign</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ticket Assignee</label>
                                            <div class="project-members">
                                                <a title="John Smith" data-toggle="tooltip" href="#" >
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Add Followers</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ticket Followers</label>
                                            <div class="project-members">
                                                <a title="Richard Miles" data-toggle="tooltip" href="#" class="avatar">
                                                    <img src="assets/img/profiles/avatar-09.jpg" alt="">
                                                </a>
                                                <a title="John Smith" data-toggle="tooltip" href="#" class="avatar">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="">
                                                </a>
                                                <a title="Mike Litorus" data-toggle="tooltip" href="#" class="avatar">
                                                    <img src="assets/img/profiles/avatar-05.jpg" alt="">
                                                </a>
                                                <a title="Wilmer Deluna" data-toggle="tooltip" href="#" class="avatar">
                                                    <img src="assets/img/profiles/avatar-11.jpg" alt="">
                                                </a>
                                                <span class="all-team">+2</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Files</label>
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Ticket Modal -->

            <!-- Delete Ticket Modal -->
            <div class="modal custom-modal fade" id="delete_ticket" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Ticket</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Ticket Modal -->

            <!-- Assignee Modal -->
            <div id="assignee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Assign to this task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group m-b-30">
                                <input placeholder="Search to add" class="form-control search-input" type="text">
                                <span class="input-group-append">
                                    <button class="btn btn-primary">Search</button>
                                </span>
                            </div>
                            <div>
                                <ul class="chat-user-list">
                                    <li>
                                        <a href="#">
                                            <div class="media">
                                                <span class="avatar">
                                                    <img src="assets/img/profiles/avatar-09.jpg" alt="">
                                                </span>
                                                <div class="media-body align-self-center text-nowrap">
                                                    <div class="user-name">Richard Miles</div>
                                                    <span class="designation">Web Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="media">
                                                <span class="avatar">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="">
                                                </span>
                                                <div class="media-body align-self-center text-nowrap">
                                                    <div class="user-name">John Smith</div>
                                                    <span class="designation">Android Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="media">
                                                <span class="avatar">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="">
                                                </span>
                                                <div class="media-body align-self-center text-nowrap">
                                                    <div class="user-name">Jeffery Lalor</div>
                                                    <span class="designation">Team Leader</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Assign</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Assignee Modal -->

            <!-- Task Followers Modal -->
            <div id="task_followers" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add followers to this task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group m-b-30">
                                <input placeholder="Search to add" class="form-control search-input" type="text">
                                <span class="input-group-append">
                                    <button class="btn btn-primary">Search</button>
                                </span>
                            </div>
                            <div>
                                <ul class="chat-user-list">
                                    <li>
                                        <a href="#">
                                            <div class="media">
                                                <span class="avatar">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="">
                                                </span>
                                                <div class="media-body media-middle text-nowrap">
                                                    <div class="user-name">Jeffery Lalor</div>
                                                    <span class="designation">Team Leader</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="media">
                                                <span class="avatar">
                                                    <img src="assets/img/profiles/avatar-08.jpg" alt="">
                                                </span>
                                                <div class="media-body media-middle text-nowrap">
                                                    <div class="user-name">Catherine Manseau</div>
                                                    <span class="designation">Android Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="media">
                                                <span class="avatar">
                                                    <img src="assets/img/profiles/avatar-11.jpg" alt="">
                                                </span>
                                                <div class="media-body media-middle text-nowrap">
                                                    <div class="user-name">Wilmer Deluna</div>
                                                    <span class="designation">Team Leader</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Add to Follow</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Task Followers Modal -->

        {{-- </div> --}}
        <!-- /Page Wrapper -->
</div>


@push('scripts')
<script>
  $('#file-input').on('change', function() {

var formData = new FormData($('#upload-form-add-photo')[0]);
$.ajax({
    url: '/add_multiple_photo_ticket',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function(data) {
        console.log( data);
        // $('#photo-preview-add').attr('src', data.length);
        $('#file_count').append('<span id="file-count" style="font-size:13px">'+data+' Files</span>');

    },
    error: function(data){
        var errors = data.responseJSON;
        console.log(errors);
    }
});
$('#store').click(function(){
    $('#file_count').empty();
});
});

</script>
@endpush
