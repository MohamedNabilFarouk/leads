<div>

    <div style="margin-top:60px;" class="chat-main-row">
        <div class="chat-main-wrapper">
            <div class="col-lg-7 message-view task-view task-left-sidebar">
                <div class="chat-window">
                    <div class="fixed-header">
                        <div class="navbar">
                            <div class="float-left mr-auto">
                                <div class="add-task-btn-wrapper">
												<span class="add-task-btn btn btn-white btn-sm">
													Add Task
												</span>
                                </div>
                            </div>
                            <a class="task-chat profile-rightbar float-right" id="task_chat" href="#task_window"><i class="fa fa fa-comment"></i></a>
                            <ul class="nav float-right custom-menu">
                                <li class="nav-item dropdown dropdown-action">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <a  wire:click="changeEvent1($event.target.innerHTML)" class="dropdown-item" href="javascript:void(0)">Pending Tasks</a>
                                        <a  wire:click="changeEvent1($event.target.innerHTML)" class="dropdown-item" href="javascript:void(0)">Completed Tasks</a>
                                        <a  wire:click="changeEvent1($event.target.innerHTML)" class="dropdown-item" href="javascript:void(0)">All Tasks</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-contents">
                        <div class="chat-content-wrap">
                            <div class="chat-wrap-inner">
                                <div class="chat-box">
                                    <div class="task-wrapper">
                                        <div class="task-list-container">
                                            <div class="task-list-body">
                                                <ul id="task-list">

                                                    @foreach($tasks as $task)
                                                        @if($task->status==0)
                                                            <li class="task">
                                                        @else
                                                            <li class="completed task">
                                                                @endif
                                                                <div class="task-container">
																		<span  class="task-action-btn task-check">

																			<span  @if($task->status==0) wire:click="makeComplete(1,{{$task->id}})" @else wire:click="makeComplete(0,{{$task->id}})" @endif class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
																		</span>
                                                                    <span wire:ignore  wire:keyup="changeEvent($event.target.innerHTML,{{$task->id}})" class="task-label" contenteditable="true">{{$task->title}}</span>
                                                                    <span class="task-action-btn task-btn-right">
																				@if($task->user_id !=null)
                                                                            <span wire:click="assignTask({{$task->id}})"   title="{{$task->user->name}}">

                                                                                    <img style="width: 30px;height: 30px;border-radius: 50%;" alt="" src="{{asset($task->user->photo)}}">

                                                                                    </span>
                                                                        @else
                                                                            <span wire:click="assignTask({{$task->id}})" style="width: 30px;height:30px;"  class="action-circle large" title="Assign">

                                                                                    <i class="material-icons">person_add</i>
                                                                                </span>

                                                                        @endif

																			<span wire:click="DeleteTask({{$task->id}})" style="width: 30px;height:30px;" class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
																		</span>
                                                                </div>
                                                            </li>
                                                            @endforeach

                                                </ul>
                                            </div>
                                            <form wire:submit.prevent="storeTaskData">
                                                <div class="task-list-footer">
                                                    <div wire:ignore class="new-task-wrapper">
                                                        <textarea wire:keydown.enter="storeTaskData"  id="new-task" placeholder="Enter new task here. . ." wire:model="title"></textarea>
                                                        <span class="error-message hidden">You need to enter a task first</span>
                                                        <button type="submit" class="add-new-task-btn btn" id="add-task">Add Task</button>
                                                        <span class="btn" id="close-task-panel">Close</span>
                                                    </div>
                                                </div>
                                            </form>
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
            <div class="col-lg-5 message-view task-chat-view task-right-sidebar" id="task_window">
                <div class="chat-window">
                    <div class="fixed-header">
                        <div class="navbar">
                            <div class="task-assign">
                                <a class="task-complete-btn" id="task_complete" href="javascript:void(0);">
                                    <i class="material-icons">check</i> Mark Complete
                                </a>
                            </div>
                            <ul class="nav float-right custom-menu">
                                <li class="dropdown dropdown-action">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0)">Delete Task</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Settings</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-contents task-chat-contents">
                        <div class="chat-content-wrap">
                            <div class="chat-wrap-inner">
                                <div class="chat-box">
                                    <div class="chats">
                                        <h4>{{$project->title}}</h4>
                                        <div class="task-header row">
                                            @foreach($project->team as $teams)
                                                <div class="assignee-info">
                                                    <a href="#" data-toggle="modal" data-target="#assignee">
                                                        <div class="avatar">
                                                            <img alt="" src="{{asset($teams->photo)}}">
                                                        </div>
                                                        <div class="assigned-info">
                                                            <div class="task-head-title">Assigned To</div>
                                                            <div class="task-assignee">{{$teams->name}}</div>
                                                        </div>
                                                    </a>
                                                    <span wire:click="deleteConfirmation({{$teams->id}})" class="remove-icon">
																<i class="fa fa-close"></i>
															</span>
                                                </div>
                                            @endforeach
                                            <div class="task-due-date">
                                                <a href="#" data-toggle="modal" data-target="#assignee">
                                                    <div class="due-icon">
																	<span>
																		<i class="material-icons">date_range</i>
																	</span>
                                                    </div>
                                                    <div class="due-info">
                                                        <div class="task-head-title">Due Date</div>
                                                        <div class="due-date">
                                                            @php
                                                                $createdAt = Carbon\Carbon::parse($project->end_date);

                                                                echo $createdAt->format('d M Y');
                                                            @endphp
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- <span class="remove-icon"> -->
																<!-- <i class="fa fa-close"></i> -->
															<!-- </span>  -->
                                            </div>
                                        </div>
                                        <hr class="task-line">
                                        <div class="task-desc">
                                            <div class="task-desc-icon">
                                                <i class="material-icons">subject</i>
                                            </div>
                                            <div class="task-textarea">
                                                {!! $project->description !!}
                                            </div>
                                        </div>
                                        <hr class="task-line">
                                        @foreach($activities as $activity)
                                            @if($activity->created_by==null)
                                                <div class="task-information">
                                                    <span class="task-info-line"><span class="task-info-subject">{{$activity->description}}</span></span>
                                                </div>
                                            @elseif($activity->file!=null)

                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="" class="avatar">
                                                            <img alt="" src="{{asset($activity->user->photo)}}">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                                <span class="task-chat-user"><span class="file-attached">{{$activity->description}} <i class="fa fa-paperclip"></i></span> <span class="chat-time">
                                                                                        @php
                                                                                            echo Carbon\Carbon::parse($project->created_at)->format('M d, Y h:i A');

                                                                                        @endphp
                                                                                    </span>
                                                                                <ul class="attach-list">
                                                                                    @php
                                                                                        $file       =  json_decode($activity->file);
                                                                                        $fileName   =  json_decode($activity->filename);
                                                                                    @endphp

                                                                                    @for($i=0;$i<count($file);$i++)
                                                                                        @php
                                                                                            $extension = pathinfo($file[$i], PATHINFO_EXTENSION);
                                                                                            $imgExtArr = ['jpg', 'jpeg', 'png'];
                                                                                        @endphp
                                                                                        @if(in_array($extension, $imgExtArr))
                                                                                            <li class="img-file">
																			<div class="attach-img-download"><a href="{{asset($file[$i])}}" download>{{$fileName[$i]}}</a></div>
																			<div class="task-attach-img"><img style="width: 150px;height: 150px" src="{{asset($file[$i])}}" alt=""></div>
																		</li>
                                                                                        @else
                                                                                            <li><i class="fa fa-file"></i> <a download href="{{asset($file[$i])}}">{{$fileName[$i]}}</a></li>
                                                                                        @endif
                                                                                    @endfor


                                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($activity->created_by!=null && $activity->file==null)
                                                <div class="chat chat-left">
                                                    <div class="chat-avatar">
                                                        <a href="" class="avatar">
                                                            <img alt="" src="{{asset($activity->user->photo)}}">
                                                        </a>
                                                    </div>
                                                    <div class="chat-body">
                                                        <div class="chat-bubble">
                                                            <div class="chat-content">
                                                                <span class="task-chat-user">{{$activity->user->name}}</span> <span class="chat-time">
                                                                                @php
                                                                                    echo Carbon\Carbon::parse($project->created_at)->format('M d, Y h:i A');

                                                                                @endphp
                                                                            </span>
                                                                <p>{{$activity->description}}</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-footer">
                        <div class="message-bar">
                            <div class="message-inner">




                                <div class="message-area">
                                    <div class="input-group">
                                        <form  id="upload-form-add">
                                            @csrf
                                            <label for="photo-input-add">
                                                <img src="{{asset('assets/img/attachment.png')}}">
                                            </label>
                                            <input style="display:none;" class="form-control" type="file" name="photo[]" accept="image/*" id="photo-input-add" multiple>
                                            <input type="hidden" name="project_id" value="{{$project->id}}" >
                                        </form>
                                        <form style="display: -webkit-inline-box;width: 85%;" wire:submit.prevent="storeTaskChat">
                                            <textarea class="form-control" required placeholder="Type message..." wire:model="description"></textarea>
                                            <span class="input-group-append">
														<button class="btn btn-primary" type="submit"><i class="fa fa-send"></i></button>
													</span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="project-members task-followers"> -->
                            <!-- <span class="followers-title">Followers</span>
                            <a class="avatar" href="#" data-toggle="tooltip" title="Jeffery Lalor">
                                <img alt="" src="assets/img/profiles/avatar-16.jpg">
                            </a>
                            <a class="avatar" href="#" data-toggle="tooltip" title="Richard Miles">
                                <img alt="" src="assets/img/profiles/avatar-09.jpg">
                            </a>
                            <a class="avatar" href="#" data-toggle="tooltip" title="John Smith">
                                <img alt="" src="assets/img/profiles/avatar-10.jpg">
                            </a>
                            <a class="avatar" href="#" data-toggle="tooltip" title="Mike Litorus">
                                <img alt="" src="assets/img/profiles/avatar-05.jpg">
                            </a>
                            <a href="#" class="followers-add" data-toggle="modal" data-target="#task_followers"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Delete Task Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="deleteTaskModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>{{__('Delete Task')}}</h3>
                        <p>{{__('Are you sure want to delete')}}?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                            <button wire:click="deleteAssign()" class="btn btn-primary continue-btn">{{__('Delete')}}</button>
                                    </div>

                            <div class="col-6">
                            <button wire:click="" data-dismiss="modal" class="btn btn-primary cancel-btn">{{__('Cancel')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- /Approve Task Modal -->


    <!-- Create Project Modal -->
    <div id="create_project" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select class="select">
                                        <option>Global Technologies</option>
                                        <option>Delta Infotech</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input placeholder="$50" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <select class="select">
                                        <option>Hourly</option>
                                        <option>Fixed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Priority</label>
                                    <select class="select">
                                        <option>High</option>
                                        <option>Medium</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Add Project Leader</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Team Leader</label>
                                    <div class="project-members">
                                        <a class="avatar" href="#" data-toggle="tooltip" title="Jeffery Lalor">
                                            <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Add Team</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Team Members</label>
                                    <div class="project-members">
                                        <a class="avatar" href="#" data-toggle="tooltip" title="John Doe">
                                            <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                        </a>
                                        <a class="avatar" href="#" data-toggle="tooltip" title="Richard Miles">
                                            <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                        </a>
                                        <a class="avatar" href="#" data-toggle="tooltip" title="John Smith">
                                            <img alt="" src="assets/img/profiles/avatar-10.jpg">
                                        </a>
                                        <a class="avatar" href="#" data-toggle="tooltip" title="Mike Litorus">
                                            <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                        </a>
                                        <span class="all-team">+2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea rows="4" class="form-control summernote" placeholder="Enter your message here"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload Files</label>
                            <input class="form-control" type="file">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Create Project Modal -->

    <!-- Assignee Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="assignTaskModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign to this task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <a href="{{asset('project')}}/{{\Crypt::encrypt($this->task_id)}}"><i class="fa fa-plus"></i></a></li></a>
                    {{--								<div class="input-group m-b-30">--}}
                    {{--									<input placeholder="Search to add" class="form-control search-input" type="text">--}}
                    {{--									<span class="input-group-append">--}}
                    {{--										<button class="btn btn-primary">Search</button>--}}
                    {{--									</span>--}}
                    {{--								</div>--}}
                    {{--								<div>--}}

                    <ul class="chat-user-list">
                        @foreach($project_teams as $team)
                            @php
                                $taskuser=App\Models\Task::where('id',$this->task_edit_id)->first();
                            @endphp

                            <li  wire:click="assignTeam({{$team->user->id}})">
                                <a href="#">
                                    <div @if(@$taskuser->user_id==$team->user->id) style="background-color: #eaeaea;" @endif class="media">
                                        <span class="avatar"><img alt="" src="{{asset($team->user->photo)}}"></span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">{{$team->user->name}}</div>
                                            <span class="designation">{{$team->user->job->name}}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                {{--								<div class="submit-section">--}}
                {{--									<button class="btn btn-primary submit-btn">Assign</button>--}}
                {{--								</div>--}}
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
                                    <span class="avatar"><img alt="" src="assets/img/profiles/avatar-16.jpg"></span>
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
                                    <span class="avatar"><img alt="" src="assets/img/profiles/avatar-08.jpg"></span>
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
                                    <span class="avatar"><img alt="" src="assets/img/profiles/avatar-26.jpg"></span>
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

 

<!-- Task JS -->
<script src="{{asset('assets/js/task.js')}}"></script>


@push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#assignTaskModal').modal('hide');
        });

        window.addEventListener('show-assign-task-modal', event =>{
            $('#assignTaskModal').modal('show');
        });

        $(document).ready(function() {
            $('#photo-input-add').on('change', function() {

                var formData = new FormData($('#upload-form-add')[0]);
                $.ajax({
                    url: '/add_multiple_task',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        $('#photo-preview-add').attr('src', data.path);

                    },
                    error: function(data){
                        var errors = data.responseJSON;
                        console.log(errors);
                    }
                });
            });
        });
        
        window.addEventListener('close-modal', event =>{
            $('#deleteTaskModal').modal('hide');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteTaskModal').modal('show');
        });
    
    </script>


@endpush
