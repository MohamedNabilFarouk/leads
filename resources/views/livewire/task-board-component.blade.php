
       <div>
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">{{$project->title}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{('/')}}">{{__('Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('Task Board')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row board-view-header">
                <div class="col-4">
                    <div class="pro-teams">
                        <div class="pro-team-lead">
                            <h4>{{__('Lead')}}</h4>
                            <div class="avatar-group">

                                <div class="avatar">
                                    <img class="avatar-img rounded-circle border border-white" alt="User Image" title="{{@$project->teamLeaderName->name}}" src="{{asset(@$project->teamLeaderName->photo)}}">
                                </div>

                            </div>
                        </div>
                        <div class="pro-team-members">
                            <h4>{{__('Team')}}</h4>
                            <div style="cursor: pointer;" class="avatar-group">
                                @foreach($project->team as $teams)
                                    <div class="avatar">
                                        <img wire:click="filterTask({{$teams->id}},{{$task_id}})"  class="avatar-img rounded-circle border border-white" alt="User Image" title="{{$teams->name}}" @if($userid!=null && $userid==$teams->id) style="border: 3px solid black !important;" @endif src="{{asset($teams->photo)}}">
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 text-right">
                    <a href="#" class="btn btn-white float-right ml-2" data-toggle="modal" data-target="#add_task_board"><i class="fa fa-plus"></i> {{__('Create List')}}</a>
                    <a href="{{url('project')}}/{{\Crypt::encrypt($task_id)}}" class="btn btn-white float-right" title="View Board"><i class="fa fa-link"></i></a>
                </div>

                <div class="col-12">
                    <div class="pro-progress">
                        <div class="pro-progress-bar">
                            <h4>{{__('Progress')}}</h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: @if($taskCompleteCount+$taskNotCompleteCount==0){{'0%'}}@else{{round(($taskCompleteCount)/($taskCompleteCount+$taskNotCompleteCount)*100,2)}}%@endif"></div>
                            </div>
                            <span>@if($taskCompleteCount+$taskNotCompleteCount==0){{'0%'}}@else{{round(($taskCompleteCount)/($taskCompleteCount+$taskNotCompleteCount)*100,2)}}%@endif</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kanban-board card mb-0">
                <div class="card-body">
                    <div class="kanban-cont">
                        @foreach($lists as $list)
                        <div class="kanban-list kanban-{{$list->color}}">
                            <div class="kanban-header">
                                <span class="status-title">@if(app()->getLocale()=='en'){{$list->name}}@else{{$list->name_ar}}@endif</span>
                                <div class="dropdown kanban-action">
                                    <a href="" data-toggle="dropdown">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a  wire:click="editBoard({{$list->id}})" class="dropdown-item" href="#" data-toggle="modal">{{__('Edit')}}</a>
                                        <a wire:click="deleteConfirmation({{ $list->id }})" class="dropdown-item" href="#">{{__('Delete')}}</a>
                                    </div>
                                </div>
                            </div>
                            @php
    $url = request()->url();
    $segments = explode('/', $url);
    $id = end($segments);
@endphp
                            <ul id="{{$list->id}}"  class="kanban-wrap connected-sortable droppable-area{{$list->id}}">
                                @foreach($tasks as $task)
                                @if($list->id == $task->board_status)
                                <li id="{{$task->id}}" class="card panell draggable-item">
                                    <div  class="kanban-box">
                                        <div class="task-board-header">
                                            <span class="status-title"><a href="@if($id=='task-board'){{url('/task')}}@else{{url('/task')}}/{{$id}}@endif">{{$task->title}}</a></span>
                                            <div class="dropdown kanban-task-action">
                                                <a href="" data-toggle="dropdown">
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <button  wire:click="editTask({{ $task->id }})" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>

                                                    <button  wire:click="deleteTask({{ $task->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="task-board-body">
                                            <!-- <div class="kanban-info">
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span>70%</span>
                                            </div> -->
                                            <div class="kanban-footer">
														<span class="task-info-cont">
															<span class="task-date"><i class="fa fa-clock-o"></i>

                                                                @php
                                                                    $createdAt = Carbon\Carbon::parse($task->created_at);

                                                                    echo $createdAt->format('M d Y');
                                                                @endphp

                                                            </span>
															<span class="task-priority badge bg-inverse-danger">{{__($task->priority)}}</span>
														</span>

                                                    @if($task->user != null)
                                                <span class="task-users">
                                                    
															<img src="{{asset(@$task->user->photo)}}" title="{{@$task->$user->name}}" class="task-avatar" width="24" height="24">
														</span>
                                                        @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                    @endif
                                 @endforeach
                            </ul>
                            <div class="add-new-task">
                                <button wire:click="addTask({{$list->id}})" class="dropdown-item" > {{__('Add New Task')}}</button>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

        <div wire:ignore.self class="modal custom-modal fade" id="add_task_board"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('Add Task Board')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="storeBoardData">
                            <div class="form-group">
                                <label>{{__('Task Board Name En')}}</label>
                                <input type="text" class="form-control" wire:model="name_en" required>
                                @error('name_en')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__('Task Board Name Ar')}}</label>
                                <input type="text" class="form-control" wire:model="name_ar" required>
                                @error('name_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group task-board-color">
                                <label>{{__('Task Board Color')}}</label>
                                <div class="board-color-list">
                                    <label class="board-control board-primary">
                                        <input wire:model="color" name="radio" type="radio" class="board-control-input" value="primary" required>
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control board-success">
                                        <input wire:model="color" name="radio" type="radio" class="board-control-input" value="success" required>
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control board-info">
                                        <input wire:model="color" name="radio" type="radio" class="board-control-input" value="info" required>
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control board-purple">
                                        <input wire:model="color" name="radio" type="radio" class="board-control-input" value="purple" required>
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control board-warning">
                                        <input wire:model="color" name="radio" type="radio" class="board-control-input" value="warning" required>
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control board-danger">
                                        <input wire:model="color" name="radio" type="radio" class="board-control-input" value="danger" required>
                                        <span class="board-indicator"></span>
                                    </label>
                                </div>
                                @error('color')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="m-t-20 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">{{__('Submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

           <div wire:ignore.self class="modal custom-modal fade" id="editBoardModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('Edit Task Board')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="editBoardData">
                            <div class="form-group">
                                <label>{{__('Task Board Name En')}}</label>
                                <input type="text" class="form-control" wire:model="name_en"  required>
                                @error('name_en')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__('Task Board Name Ar')}}</label>
                                <input type="text" class="form-control" wire:model="name_ar"  required>
                                @error('name_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group task-board-color">
                                <label>{{__('Task Board Color')}}</label>
                                <div class="board-color-list">
                                    <label class="board-control board-primary">
                                        <input name="radio" type="radio" class="board-control-input" wire:model="color" value="primary" @if($color=='primary'){{'checked'}}@endif>
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control board-success">
                                        <input name="radio" type="radio" class="board-control-input" wire:model="color" value="success" @if($color=='success'){{'checked'}}@endif>
                                        <span class="board-indicator"></span>
                                    </label>

                                    <label class="board-control board-info">
                                        <input name="radio" type="radio" class="board-control-input" wire:model="color" value="info"  @if($color=='info'){{'checked'}}@endif>
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control board-purple">
                                        <input name="radio" type="radio" class="board-control-input" wire:model="color" value="purple" @if($color=='purple'){{'checked'}}@endif>
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control board-warning">
                                        <input name="radio" type="radio" class="board-control-input" wire:model="color" value="warning" @if($color=='warning'){{'checked'}}@endif>
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control board-danger">
                                        <input name="radio" type="radio" class="board-control-input" wire:model="color" value="danger" @if($color=='danger'){{'checked'}}@endif>
                                        <span class="board-indicator"></span>
                                    </label>
                                </div>
                                @error('color')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary btn-lg">{{__('Submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="new_project" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Project</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Project Name</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Create Project</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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

        <!-- Add Task Modal -->
           <div wire:ignore.self class="modal custom-modal fade" id="addTaskModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Task</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="addTaskData">

                        <div class="form-group">
                                <label>Task Name</label>
                                <input type="text" class="form-control" wire:model="title" required>
                            </div>
                            <div class="form-group">
                                <label>Task Priority</label>
                                <select class="form-control" wire:model="priority">
                                    <option value="">Select</option>
                                    <option value="High">High</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Due Date</label>
                                <input class="form-control"  type="text" wire:model="due_date" id="end_date">
                            </div>
                            <!-- <div class="form-group">
                                <label>Task Followers</label>
                                <input type="text" class="form-control" placeholder="Search to add">
                                <div class="task-follower-list">
										<span data-toggle="tooltip" title="John Doe">
											<img src="assets/img/profiles/avatar-02.jpg" class="avatar" alt="John Doe" width="20" height="20">
											<i class="fa fa-times"></i>
										</span>
                                    <span data-toggle="tooltip" title="Richard Miles">
											<img src="assets/img/profiles/avatar-09.jpg" class="avatar" alt="Richard Miles" width="20" height="20">
											<i class="fa fa-times"></i>
										</span>
                                    <span data-toggle="tooltip" title="John Smith">
											<img src="assets/img/profiles/avatar-10.jpg" class="avatar" alt="John Smith" width="20" height="20">
											<i class="fa fa-times"></i>
										</span>
                                    <span data-toggle="tooltip" title="Mike Litorus">
											<img src="assets/img/profiles/avatar-05.jpg" class="avatar" alt="Mike Litorus" width="20" height="20">
											<i class="fa fa-times"></i>
										</span>
                                </div>
                            </div> -->
                            <div class="submit-section text-center">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Task Modal -->

        <!-- Edit Task Modal -->
           <div wire:ignore.self class="modal custom-modal fade" id="editTaskModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('Edit Task')}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="editTaskData">

                        <div class="form-group">
                                <label>Task Name</label>
                                <input type="text" class="form-control" wire:model="title">
                            </div>
                            <div class="form-group">
                                <label>Task Priority</label>
                                <select class="form-control" wire:model="priority">
                                    <option value="">{{__('Select Task')}}</option>
                                    <option value="High">{{__('High')}}</option>
                                    <option value="Medium">{{__('Medium')}}</option>
                                    <option value="Low">{{__('Low')}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Due Date</label>
                                    <input id="date_from" class="form-control" wire:model="due_date" type="text">
                            </div>
                            <!-- <div class="form-group">
                                <label>Task Followers</label>
                                <input type="text" class="form-control" placeholder="Search to add">
                                <div class="task-follower-list">
										<span data-toggle="tooltip" title="John Doe">
											<img src="assets/img/profiles/avatar-02.jpg" class="avatar" alt="John Doe" width="20" height="20">
											<i class="fa fa-times"></i>
										</span>
                                    <span data-toggle="tooltip" title="Richard Miles">
											<img src="assets/img/profiles/avatar-09.jpg" class="avatar" alt="Richard Miles" width="20" height="20">
											<i class="fa fa-times"></i>
										</span>
                                    <span data-toggle="tooltip" title="John Smith">
											<img src="assets/img/profiles/avatar-10.jpg" class="avatar" alt="John Smith" width="20" height="20">
											<i class="fa fa-times"></i>
										</span>
                                    <span data-toggle="tooltip" title="Mike Litorus">
											<img src="assets/img/profiles/avatar-05.jpg" class="avatar" alt="Mike Litorus" width="20" height="20">
											<i class="fa fa-times"></i>
										</span>
                                </div>
                            </div> -->
                            <div class="submit-section text-center">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Task Modal -->

           <!-- Delete List Modal -->
           <div wire:ignore.self class="modal custom-modal fade" id="deleteBoardModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered">
                   <div class="modal-content">
                       <div class="modal-body">
                           <div class="form-header">
                               <h3>{{__('Delete Task Board')}}</h3>
                               <p>{{__('Are you sure want to delete')}}?</p>
                           </div>
                           <div class="modal-btn delete-action">
                               <div class="row">
                                   <div class="col-6">
                                       <button wire:click="deleteBoardData()" class="btn btn-primary continue-btn">{{__('Delete')}}</button>
                                   </div>

                                   <div class="col-6">
                                       <button wire:click="cancel()" data-dismiss="modal" class="btn btn-primary cancel-btn">{{__('Cancel')}}</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- /Delete List Modal -->


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
                                       <button wire:click="deleteTaskData()" class="btn btn-primary continue-btn">{{__('Delete')}}</button>
                                   </div>

                                   <div class="col-6">
                                       <button wire:click="cancelTask()" data-dismiss="modal" class="btn btn-primary cancel-btn">{{__('Cancel')}}</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- /Delete List Modal -->



           <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

           <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
           <script>
               $( init );

               function init() {
                   $( ".droppable-area1, .droppable-area2,.droppable-area3,.droppable-area4,.droppable-area5,.droppable-area6,.droppable-area7,.droppable-area8,.droppable-area9,.droppable-area10" ).sortable({
                       connectWith: ".connected-sortable",
                       stack: '.connected-sortable ul',
                       receive: function( event, ui ) {
                           var listid = ui.item.parent().attr("id");
                           var taskid = ui.item.attr("id");

                           $.ajax({
                               url: "/taskboard/"+listid+"/"+taskid,
                               type: 'GET',
                               dataType: 'json', // added data type
                               success: function(res) {
                                   console.log(res);
                                   return 1;

                               }
                           });
                       }
                   }).disableSelection();
               }
           </script>


       @push('scripts')
            <script>
                window.addEventListener('close-modal', event =>{
                    $('#add_task_board').modal('hide');
                    $('#editBoardModal').modal('hide');
                    $('#editTaskModal').modal('hide');
                    $('#deleteBoardModal').modal('hide');
                    $('#addTaskModal').modal('hide');
                    $('#deleteTaskModal').modal('hide');
                });

                window.addEventListener('show-edit-board-modal', event =>{
                    $('#editBoardModal').modal('show');
                });

                window.addEventListener('show-edit-task-modal', event =>{
                    $('#editTaskModal').modal('show');
                });

                window.addEventListener('show-add-task-modal', event =>{
                    $('#addTaskModal').modal('show');
                });

                window.addEventListener('show-delete-confirmation-modal', event =>{
                    $('#deleteBoardModal').modal('show');
                });

                window.addEventListener('show-delete-task-modal', event =>{
                    $('#deleteTaskModal').modal('show');
                });

            </script>
        @endpush
       </div>

