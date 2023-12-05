<div>
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{$project->title}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('Project')}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                    <a  wire:click="editProject({{$project->id}})" class="btn add-btn" data-toggle="modal" data-target="#edit_project"><i class="fa fa-plus"></i> {{__('Edit Project')}}</a>
                    <a href="{{url('task-board/')}}/{{\Crypt::encrypt($project->id)}}" class="btn btn-white float-right m-r-10" data-toggle="tooltip" title="Task Board"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="project-title">
                                <h5 class="card-title">{{$project->title}}</h5>
                                <small class="block text-ellipsis m-b-15"><span class="text-xs">{{$taskNotCompleteCount}}</span> <span class="text-muted">{{__('open tasks')}}, </span><span class="text-xs">{{$taskCompleteCount}}</span> <span class="text-muted">{{__('tasks completed')}}</span></small>
                            </div>
                            {!! $project->description  !!}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-20">{{__('Uploaded image files')}}</h5>
                            <div class="row">
                                @php
                                $photoExtension= ['jpg','jpeg','png','gif','bmp','tif','webp','JPG','JPEG','PNG','GIF','BMP','TIF','WEBP'];
                                $txtExtension  = ['txt','TXT','pdf','PDF','.xlsx','xls','XLS','XLSX','zip']

                                @endphp
                                @foreach($project->ProjectImage as $image)
                                    @if (in_array(pathinfo($image->file, PATHINFO_EXTENSION), $photoExtension))

                                        <div class="col-md-3 col-sm-4 col-lg-4 col-xl-3">
                                    <div class="uploaded-box">
                                        <div class="uploaded-img">
                                            <img style="width:186px;height:140px" src="{{asset($image->file)}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="uploaded-img-name">
                                            {{@$image->name}}
                                        </div>
                                    </div>
                                </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-20">{{__('Uploaded files')}}</h5>
                            <ul class="files-list">
                                @foreach($project->ProjectImage as $image)
                                @if (in_array(pathinfo($image->file, PATHINFO_EXTENSION), $txtExtension))
                                <li>
                                    <div class="files-cont">
                                        <div class="file-type">
                                            <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                        </div>
                                        <div class="files-info">
                                            <span class="file-name text-ellipsis"><a target="_blank" href="{{asset($image->file)}}">{{$image->name}}</a></span>
                                            <span class="file-author"><a href="#">{{$image->user->name}}</a></span> <span class="file-date">
                                                 @php
                                $createdAt = Carbon\Carbon::parse($image->created_at);

                                echo $createdAt->format('F jS \a\t g:i A');
                                @endphp
                                                @php
                                                    $file_size =File::size(public_path($image->file));
                                                    $file_size = number_format($file_size / 1048576,2);


                                                @endphp
                                             </span>
                                            <div class="file-size">Size: {{$file_size.' Mb'}} </div>
                                        </div>
                                        <ul class="files-action">
                                            <li class="dropdown dropdown-action">
                                                <a href="" class="dropdown-toggle btn btn-link" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{url($image->file)}}" download>{{__('Download')}}</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#share_files">{{__('Share')}}</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">{{__('Delete')}}</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="project-task">
                        <ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
                            <li class="nav-item"><a wire:ignore.self class="nav-link active" href="#all_tasks" data-toggle="tab" aria-expanded="true">{{__('All Tasks')}}</a></li>
                            <li class="nav-item"><a wire:ignore.self class="nav-link" href="#pending_tasks" data-toggle="tab" aria-expanded="false">{{__('Pending Tasks')}}</a></li>
                            <li class="nav-item"><a wire:ignore.self class="nav-link" href="#completed_tasks" data-toggle="tab" aria-expanded="false">{{__('Completed Tasks')}}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="all_tasks" wire:ignore.self>
                                <div class="task-wrapper">
                                    <div class="task-list-container">
                                        <div class="task-list-body">
                                            <ul id="task-list">
                                                @foreach($allTasks as $allTask)
                                                <li @if($allTask->status==1) class="completed task" @else class="task" @endif>
                                                    <div class="task-container">
																<span  class="task-action-btn task-check">
																	<span @if($allTask->status==0) wire:click="makeTaskComplete(1,{{$allTask->id}})" @else wire:click="makeTaskComplete(0,{{$allTask->id}})" @endif class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
                                                        <span wire:ignore wire:keyup="ChangTaskTitle($event.target.innerHTML,{{$allTask->id}})" class="task-label" contenteditable="true">{{$allTask->title}}</span>
                                                        <span class="task-action-btn task-btn-right">
																				@if($allTask->user_id !=null)
                                                                <span wire:click="assignTasks({{$allTask->id}})"   title="{{$allTask->user->name}}">

                                                                                    <img style="width: 30px;height: 30px;border-radius: 50%;" alt="" src="{{asset($allTask->user->photo)}}">

                                                                                    </span>
                                                            @else
                                                                <span wire:click="assignTasks({{$allTask->id}})" style="width: 30px;height:30px;"  class="action-circle large" title="Assign">

                                                                                    <i class="material-icons">person_add</i>
                                                                                </span>

                                                            @endif
																	<span wire:click="DeleteTasks({{$allTask->id}})" class="action-circle large delete-btn" title="Delete Task">
																		<i class="material-icons">delete</i>
																	</span>
																</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="task-list-footer">
                                            <div class="new-task-wrapper">
                                                <textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                <span class="error-message hidden">You need to enter a task first</span>
                                                <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                                <span class="btn" id="close-task-panel">Close</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pending_tasks" wire:ignore.self>
                                <div class="task-wrapper">
                                    <div class="task-list-container">
                                        <div class="task-list-body">
                                            <ul id="task-list">
                                                @foreach($allTasks as $allTask)
                                                    @if($allTask->status==0)
                                                    <li  class="task">
                                                        <div class="task-container">
																<span class="task-action-btn task-check">
																	<span @if($allTask->status==0) wire:click="makeTaskComplete(1,{{$allTask->id}})" @else wire:click="makeTaskComplete(0,{{$allTask->id}})" @endif class="action-circle large complete-btn" title="Mark Complete">
																		<i class="material-icons">check</i>
																	</span>
																</span>
                                                            <span wire:ignore wire:keyup="ChangTaskTitle($event.target.innerHTML,{{$allTask->id}})" class="task-label" contenteditable="true">{{$allTask->title}}</span>
																	 <span class="task-action-btn task-btn-right">
																				@if($allTask->user_id !=null)
                                                                             <span wire:click="assignTasks({{$allTask->id}})"   title="{{$allTask->user->name}}">

                                                                                    <img style="width: 30px;height: 30px;border-radius: 50%;" alt="" src="{{asset($allTask->user->photo)}}">

                                                                                    </span>
                                                                         @else
                                                                             <span wire:click="assignTasks({{$allTask->id}})" style="width: 30px;height:30px;"  class="action-circle large" title="Assign">

                                                                                    <i class="material-icons">person_add</i>
                                                                                </span>

                                                                         @endif
																	<span wire:click="DeleteTasks({{$allTask->id}})" class="action-circle large delete-btn" title="Delete Task">
																		<i class="material-icons">delete</i>
																	</span>
																</span>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="task-list-footer">
                                            <div class="new-task-wrapper">
                                                <textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                <span class="error-message hidden">You need to enter a task first</span>
                                                <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                                <span class="btn" id="close-task-panel">Close</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="completed_tasks" wire:ignore.self>
                                <div class="task-wrapper">
                                    <div class="task-list-container">
                                        <div class="task-list-body">
                                            <ul id="task-list">
                                                @foreach($allTasks as $allTask)
                                                    @if($allTask->status==1)
                                                    <li class="completed task">
                                                        <div class="task-container">
																<span class="task-action-btn task-check">
                                                                   <span  @if($allTask->status==0) wire:click="makeTaskComplete(1,{{$allTask->id}})" @else wire:click="makeTaskComplete(0,{{$allTask->id}})" @endif class="action-circle large complete-btn" title="Mark Complete">
																				<i class="material-icons">check</i>
																			</span>
																</span>
                                                            <span wire:ignore wire:keyup="ChangTaskTitle($event.target.innerHTML,{{$allTask->id}})" class="task-label" contenteditable="true">{{$allTask->title}}</span>
                                                            <span class="task-action-btn task-btn-right">
																				@if($allTask->user_id !=null)
                                                                    <span wire:click="assignTasks({{$allTask->id}})"   title="{{$allTask->user->name}}">

                                                                                    <img style="width: 30px;height: 30px;border-radius: 50%;" alt="" src="{{asset($allTask->user->photo)}}">

                                                                                    </span>
                                                                @else
                                                                    <span wire:click="assignTasks({{$allTask->id}})" style="width: 30px;height:30px;"  class="action-circle large" title="Assign">

                                                                                    <i class="material-icons">person_add</i>
                                                                                </span>

                                                                @endif
																	<span wire:click="DeleteTasks({{$allTask->id}})" style="width: 30px;height:30px;" class="action-circle large delete-btn" title="Delete Task">
																				<i class="material-icons">delete</i>
																			</span>
																		</span>
																</span>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="task-list-footer">
                                            <div class="new-task-wrapper">
                                                <textarea  id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                <span class="error-message hidden">You need to enter a task first</span>
                                                <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                                <span class="btn" id="close-task-panel">Close</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title m-b-15">Project details</h6>
                            <table class="table table-striped table-border">
                                <tbody>
                                <!-- <tr>
                                    <td>Cost:</td>
                                    <td class="text-right">$1200</td>
                                </tr> -->
                                <!-- <tr>
                                    <td>Total Hours:</td>
                                    <td class="text-right">100 Hours</td>
                                </tr> -->
                                <tr>
                                    <td>Created:</td>
                                    <td class="text-right">
                                        @php
                                        $createdAtProject = Carbon\Carbon::parse($project->created_at);

                                        echo $createdAtProject->format('d M, Y');
                                        @endphp
                                       </td>
                                </tr>
                                <tr>
                                    <td>{{__('Deadline')}}:</td>
                                    <td class="text-right">
                                        @php
                                            $endProject = Carbon\Carbon::parse($project->end_date);

                                            echo $endProject->format('d M, Y');
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{__('Priority')}}:</td>
                                    <td class="text-right">
                                    <select wire:change="changeEvent($event.target.value, {{$project->id}})">
                                    @if($project->priority == NULL)
                                    <option  value="" hidden>S{{__('elect Priority')}}</option>
                                    @endif
                                    <option value="High" @if($project->priority == 'High') {{'selected'}}@endif> High </option>
                                        <option value="Medium"  @if($project->priority == 'Medium') {{'selected'}}@endif> Medium</option>
                                        <option value="Low" @if($project->priority == 'Low') {{'selected'}}@endif> Low </option>
                                    </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>{{__('Created by')}}:</td>
                                    <td class="text-right"><a href="#">{{@$project->user->name}}</a></td>
                                </tr>
                                <tr>
                                    <td>{{__('Status')}}:</td>
                                    <td class="text-right">{{@$project->status}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="m-b-5">{{__('Progress')}} <span class="text-success float-right">@if($taskCompleteCount+$taskNotCompleteCount==0){{'0%'}}@else{{round(($taskCompleteCount)/($taskCompleteCount+$taskNotCompleteCount)*100,2)}}%@endif</span></p>
                            <div class="progress progress-xs mb-0">
                                <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="@if($taskCompleteCount+$taskNotCompleteCount==0){{'0%'}}@else{{round(($taskCompleteCount)/($taskCompleteCount+$taskNotCompleteCount)*100,2)}}%@endif" style="width: @if($taskCompleteCount+$taskNotCompleteCount==0){{'0%'}}@else{{round(($taskCompleteCount)/($taskCompleteCount+$taskNotCompleteCount)*100,2)}}%@endif"></div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card project-user">
                        <div class="card-body">
                            <h6 class="card-title m-b-20">Assigned Leader <button type="button" class="float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#assign_leader"><i class="fa fa-plus"></i> Add</button></h6>
                            <ul class="list-box">
                                <li>
                                    <a href="profile.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar"><img alt="" src="assets/img/profiles/avatar-11.jpg"></span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Wilmer Deluna</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="profile.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar"><img alt="" src="assets/img/profiles/avatar-01.jpg"></span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Lesley Grauer</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Team Leader</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- <div class="card project-user">
                        <div class="card-body">
                            <h6 class="card-title m-b-20">
                                Assigned users
                                <button type="button" class="float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#assign_user"><i class="fa fa-plus"></i> Add</button>
                            </h6>
                            <ul class="list-box">
                                <li>
                                    <a href="profile.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">John Doe</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Web Designer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="profile.html">
                                        <div class="list-item">
                                            <div class="list-left">
                                                <span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
                                            </div>
                                            <div class="list-body">
                                                <span class="message-author">Richard Miles</span>
                                                <div class="clearfix"></div>
                                                <span class="message-content">Web Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Assign Leader Modal -->
        <div id="assign_leader" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Leader to this project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search to add a leader" class="form-control search-input" type="text">
                            <span class="input-group-append">
										<button class="btn btn-primary">Search</button>
									</span>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                <li>
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
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
                                            <span class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></span>
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
														<img alt="" src="assets/img/profiles/avatar-16.jpg">
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
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Assign Leader Modal -->

        <!-- Assign User Modal -->
        <div id="assign_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign the user to this project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group m-b-30">
                            <input placeholder="Search a user to assign" class="form-control search-input" type="text">
                            <span class="input-group-append">
										<button class="btn btn-primary">Search</button>
									</span>
                        </div>
                        <div>
                            <ul class="chat-user-list">
                                <li>
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
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
                                            <span class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></span>
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
														<img alt="" src="assets/img/profiles/avatar-16.jpg">
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
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Assign User Modal -->
        <div  wire:ignore.self  id="editProjectModal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Project')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editProjectData">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Project Name')}}</label>
                                    <input class="form-control" wire:model="title" type="text">
                                </div>
                            </div>

                            <div wire:ignore class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Client')}}</label>
                                    <select class="form-control" wire:model="client_id">
                                        @foreach($this->clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Start Date')}}</label>

                                        <input class="form-control" type="text" id="start_date" wire:model="start_date">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('End Date')}}</label>
                                        <input class="form-control" type="text" id="end_date" wire:model="end_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div wire:ignore class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Priority')}}</label>
                                    <select class="form-control" wire:model="priority">
                                        <option value="">{{__('Select Priority')}}</option>
                                        <option value="High">{{__('High')}}</option>
                                        <option value="Medium">{{__('Medium')}}</option>
                                        <option value="Low">{{__('Low')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div wire:ignore class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Add Project Leader')}}</label>
                                    <select class="form-control" wire:model="team_leader">
                                        @foreach($users as $teamleader)
                                            <option value="{{$teamleader->id}}">{{$teamleader->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Team Leader')}}</label>
                                    <div class="project-members">
                                        @foreach($users as $teamleader)
                                            @if($team_leader==$teamleader->id)
                                        <a href="#" data-toggle="tooltip" title="{{@$teamleader->name}}" class="avatar">
                                            <img src="{{asset(@$teamleader->photo)}}" alt style="width: 40px;height:40px;">
                                        </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Add Team')}}</label>
                                    <select multiple class="form-control" wire:model="team_id">
                                    @foreach($users as $team)
                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Team Members')}}</label>
                                    <div class="project-members">
                                        @php
                                        $teamsp=App\Models\ProjectTeam::where('project_id', $this->projectId)->get();
                                        @endphp
                                        @foreach($teamsp as $team)
                                            @php
                                            $usersp=App\Models\User::where('id',$team->team_id)->first();
                                            @endphp
                                        <a href="#" data-toggle="tooltip" title="{{$usersp->name}}" class="avatar">
                                            <img src="{{asset($usersp->photo)}}" alt style="width: 40px;height:40px;">
                                        </a>
                                            @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{__('Description')}}</label>
                            <textarea rows="4" class="form-control" wire:model="description"></textarea>
                        </div>

                        <div wire:ignore class="form-group">
                            <label>{{__('Upload Files')}}</label>
                            <input class="form-control" type="file" wire:model="photo">
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
{{--                    <a href="{{asset('project')}}/{{\Crypt::encrypt($project->id)}}"><i class="fa fa-plus"></i></a></li></a>--}}
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
                                $taskuser=App\Models\Task::where('id',$project->id)->first();
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

    @push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#create_project').modal('hide');
            $('#editProjectModal').modal('hide');
            $('#deleteProjectModal').modal('hide');
        });

        window.addEventListener('show-edit-project-modal', event =>{
            $('#editProjectModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteProjectModal').modal('show');
        });
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
                    url: '/add_multiple_photo',
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

    </script>


@endpush

</div>
