<div>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{__('Projects')}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Projects')}}</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                @if(auth()->user()->can('projects-create'))
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> {{__('Create Project')}}</a>
                    @endif
                    <div class="view-icons">
                        <a href="#" class="grid-view btn btn-link"  wire:click.prevent='setGridView' wire:class="{'active': view === 'grid'}"><i class="fa fa-th"></i></a>
                        <a href="#" class="list-view btn btn-link" wire:click.prevent="setListView" wire:class="{'active': view === 'list'}"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row filter-row">
            <div class="col-sm-6 col-md-4">
                <div class="form-group form-focus">
                    <input type="text" wire:model="searchName" class="form-control floating">
                    <label class="focus-label">{{__('Project Name')}}</label>
                </div>
            </div>
            <div  class="col-sm-6 col-md-4">
                <div class="form-group form-focus">
                    <input  type="text" wire:model="searchEmployee" class="form-control floating">
                    <label class="focus-label">{{__('Employee Name')}}</label>
                </div>
            </div>
            <div wire:ignore class="col-sm-6 col-md-4">
                <div class="form-group form-focus select-focus">
                    <select class="form-control" wire:model="searchJob">
                        <option value="">{{__('Select Role')}}</option>
                        @foreach($jobs as $job)
                        <option value="{{$job->id}}">{{$job->name}}</option>
                        @endforeach
                    </select>
                    <label class="focus-label">{{__('Designation')}}</label>
                </div>
            </div>

        </div>
        @if($view == 'grid')

        <div class="row">
            @foreach($projects as $project)
            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                <div  class="card projectcard">
                    <div style="min-height:420px; max-height:420px;" class="card-body">
                    @if(auth()->user()->can('projects-write') || auth()->user()->can('projects-delete'))
                        <div class="dropdown dropdown-action profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                            @if(auth()->user()->can('projects-write'))
                                <button wire:click="editProject({{$project->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                               @endif
                               @if(auth()->user()->can('projects-delete'))
                                <button wire:click="deleteConfirmation({{$project->id}})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                            @endif
                            </div>
                        </div>
                        @endif
                        <h4 class="project-title"><a href="{{url('project/')}}/{{\Crypt::encrypt($project->id)}}">{{$project->title}}</a></h4>
                        <small class="block text-ellipsis m-b-15">
                            @php
                                $taskCompleteCount     = App\Models\Task::where('status',1)->where('project_id',$project->id)->count();
                                $taskNotCompleteCount  = App\Models\Task::where('status',0)->where('project_id',$project->id)->count();
                                 $allTasks             = App\Models\Task::where('project_id',$project->id)->get();

                            @endphp
                            <span class="text-xs">{{$taskCompleteCount}}</span> <span class="text-muted">{{__('open tasks')}}, </span>
                            <span class="text-xs">{{$taskNotCompleteCount}}</span> <span class="text-muted">{{__('tasks completed')}}</span>
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
                                {{__('Deadline')}}:
                            </div>
                            <div class="text-muted">

                                @php
                                $createdAt = Carbon\Carbon::parse($project->end_date);

                                echo $createdAt->format('d M Y');
                                @endphp
                            </div>
                        </div>
                        <div class="project-members m-b-15">
                            <div>{{__('Project Leader')}} :</div>
                            <ul class="team-members">
                                <li>
                                    <a href="#" data-toggle="tooltip" title="{{@$project->teamLeaderName->name}}"><img alt src="{{asset(@$project->teamLeaderName->photo)}}"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="project-members m-b-15">
                            <div>{{__('Team')}} :</div>
                            <ul class="team-members">
                                @foreach($project->team as $team)
                                <li>
                                    <a href="#" data-toggle="tooltip" title="{{$team->name}}"><img alt src="{{asset($team->photo)}}"></a>
                                </li>
                                    @endforeach
                            </ul>
                        </div>
                        <p class="m-b-5">{{__('Progress')}} <span class="text-success float-right">@if($taskCompleteCount+$taskNotCompleteCount==0){{'0%'}}@else{{round(($taskCompleteCount)/($taskCompleteCount+$taskNotCompleteCount)*100,2)}}%@endif</span></p>
                        <div class="progress progress-xs mb-0">
                            <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="@if($taskCompleteCount+$taskNotCompleteCount==0){{'0%'}}@else{{round(($taskCompleteCount)/($taskCompleteCount+$taskNotCompleteCount)*100,2)}}%@endif" style="width: @if($taskCompleteCount+$taskNotCompleteCount==0){{'0%'}}@else{{round(($taskCompleteCount)/($taskCompleteCount+$taskNotCompleteCount)*100,2)}}%@endif"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($view=='list')
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                    </div></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped custom-table datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Project: activate to sort column descending" style="width: 175.15px;">{{__('Project')}}</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Project Id: activate to sort column ascending" style="width: 94.1625px;">Project Id</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Leader: activate to sort column ascending" style="width: 70.3px;">Leader</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Team: activate to sort column ascending" style="width: 175.663px;">Team</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Deadline: activate to sort column ascending" style="width: 87.3px;">{{__('Deadline')}}</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Priority: activate to sort column ascending" style="width: 106.463px;">Priority</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 106.463px;">Status</th>
                                    @if(auth()->user()->can('projects-write') || auth()->user()->can('projects-delete'))
                                    <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 102.7px;">{{__('Action')}}</th>
                                   @endif
                                </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projects as $project)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <a href="{{url('project/')}}/{{\Crypt::encrypt($project->id)}}">{{$project->title}}</a>
                                        </td>
                                        <td>{{$project->id}}</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="{{@$project->teamLeaderName->name}}"><img alt="" src="{{asset(@$project->teamLeaderName->photo)}}"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                @foreach($project->team as $team)
                                                <li>
                                                    <a href="#" title="" data-toggle="tooltip" data-original-title="{{$team->name}}"><img alt="" src="{{asset($team->photo)}}"></a>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </td>
                                        <td>
                                            @php
                                                $createdAt = Carbon\Carbon::parse($project->end_date);

                                                echo $createdAt->format('d M Y');
                                            @endphp
                                        </td>
                                        <td  wire:ignore>
                                            <!-- <div class="dropdown action-label"> -->
                                                <!-- <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i>
                                                    {{$project->priority}} </a> -->
                                                <select wire:change="changeEvent($event.target.value, {{$project->id}})">

                                             @if($project->priority == NULL)
                                               <option  value="" hidden>{{__('Select Priority')}}</option>
                                               @endif
                                               <option value="High" @if($project->priority == 'High') {{'selected'}}@endif> {{__('High')}} </option>
                                                    <option value="Medium"  @if($project->priority == 'Medium') {{'selected'}}@endif> {{__('Medium')}}</option>
                                                   <option value="Low" @if($project->priority == 'Low') {{'selected'}}@endif> {{__('Low')}} </option>
                                                </select>
                                            <!-- </div> -->
                                        </td>
                                        @if(auth()->user()->can('projects-approve'))
                                        <td wire:ignore>
                                            <select wire:change="changeStatus($event.target.value, {{$project->id}})">

                                                <option  value="Active" @if($project->status == 'Active') {{'selected'}}@endif> {{__('Active')}}</option>
                                                <option  value="Inactive" @if($project->status == 'Inactive') {{'selected'}}@endif> {{__('Inactive')}}</a>

                                    </select>
                                        </td>
                                       @else
                                        <td>

                                                @if($project->status == 'Active')
                                                {{__('Active')}}
                                                @endif

                                                @if($project->status == 'Inactive')
                                                 {{__('Inactive')}}
                                                 @endif

                                        </td>
                                    @endif
                                        @if(auth()->user()->can('projects-write') || auth()->user()->can('projects-delete'))
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                @if(auth()->user()->can('projects-write'))
                                                <button wire:click="editProject({{ $project->id }})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                                @endif
                                                @if(auth()->user()->can('projects-delete'))
                                                <button wire:click="deleteConfirmation({{$project->id}})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                                @endif
                                            </div>
                                            </div>
                                        </td>
                                        @endif
                                        @endforeach
                                    </tr>
                                   </tbody>
                                </table></div></div>
                </div>
            </div>
        </div>
    @endif


    <div wire:ignore.self class="modal custom-modal fade" id="deleteProjectModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                    <h3>{{__('Delete Project')}}</h3>
                        <p>{{__('Are you sure want to delete')}}?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                            <button wire:click="deleteProjectData()" class="btn btn-primary continue-btn">{{__('Delete')}}</button>
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

    <div wire:ignore.self  id="create_project" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Create Project')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form  wire:loading.attr="disabled" wire:submit.prevent="storeProjectData">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Project Name')}}</label>
                                    <input class="form-control" type="text" wire:model="title" required>
                                    @error('title')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div  class="form-group">
                                    <label>{{__('Region')}}</label>
                                    <select class="form-control"  wire:model="region">
                                        <option value="">{{__('Select Region')}}</option>
                                        @foreach($this->regions as $region)
                                            <option value="{{$region->id}}">{{$region->title_en}}</option>
                                        @endforeach

                                    </select>
                                    @error('region')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div  class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Add Project Leader')}}</label>
                                    <select class="form-control" wire:model="team_leader_id">
                                        <option value="">{{__('Select Team Leader')}}</option>
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
                                            @if($team_leader_id == $teamleader->id)
                                                <a href="#" data-toggle="tooltip" title="{{$teamleader->name}}" class="avatar">
                                                        <img src="{{asset($teamleader->photo)}}" alt>
                                                </a>
                                            @endif
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-sm-6">
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
                                        @foreach($users as $team)
                                            @if(in_array($team->id,$team_id))
                                                <a style="margin-bottom: 15px;" href="#" data-toggle="tooltip" title="{{$team->name}}" class="avatar">
                                                    <img src="{{asset($team->photo)}}" alt>
                                                </a>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                            <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
                        <div wire:ignore>

                            <textarea id="editor"></textarea>
                        </div>

                        <script>
                            ClassicEditor.create(document.querySelector('#editor'))
                                .then(editor => {
                                    editor.model.document.on('change:data', () => {
                                        window.livewire.emit('editorValueChanged', editor.getData());
                                    });
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('Map')}}</label>
                                    <input class="form-control"  type="text" wire:model="map">
                                    @error('map')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('Video')}}</label>
                                    <input class="form-control" type="text" wire:model="video" required>
                                @error('video')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                         </div>

                        <div wire:ignore class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('Status')}}</label>
                                <select class="form-control" wire:model="status">
                                    <option value="">{{__('Select Status')}}</option>
                                    <option value="Active">{{__('Active')}}</option>
                                    <option value="Inactive">{{__('Inactive')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>




                    </form>
                    <form  id="upload-form-add">
                        @csrf
                        <div class="form-group">
                            <label>{{__('Upload Photos')}}</label>
                            <input class="form-control" type="file" name="photo[]" accept="image/*" id="photo-input-add" multiple>
                </div>
                    </form>




                    <form  id="upload-form-add-file">
                        @csrf
                        <div class="form-group">
                            <label>{{__('Upload Files')}}</label>
                            <input class="form-control" type="file" name="file[]" accept="image/*" id="file-input-add" multiple>
                        </div>


                    </form>
                    <img id='loader1' style="display:none;" src='{{asset('1487.gif')}}' width='32px' height='32px'>

                    <form  wire:loading.attr="disabled" wire:submit.prevent="storeProjectData">


                    <div class="submit-section">
                            <button id="button1" class="btn btn-primary submit-btn">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
                                    <label>{{__('Regions')}}</label>
                                    <select class="form-control" wire:model="region">
                                        @foreach($this->regions as $region)
                                            <option value="{{$region->id}}">{{$region->title_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div wire:ignore class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Add Project Leader')}}</label>
                                    <select class="form-control" wire:model="team_leader_id">
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
                                            @if($team_leader_id==$teamleader->id)
                                        <a href="#" data-toggle="tooltip" title="{{@$teamleader->name}}" class="avatar">
                                            <img src="{{asset(@$teamleader->photo)}}" alt style="width:40px;height:40px;">
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
                                        $teamsp=App\Models\ProjectTeam::where('project_id', $this->project_edit_id)->get();
                                        @endphp
                                        @foreach($teamsp as $team)
                                            @php
                                            $usersp=App\Models\User::where('id',$team->team_id)->first();
                                            @endphp
                                        <a href="#" data-toggle="tooltip" title="{{$usersp->name}}" class="avatar">
                                            <img src="{{asset($usersp->photo)}}" alt style="width:40px;height:40px;">
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


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Map')}}</label>
                                        <input class="form-control"  type="text" wire:model="map">
                                        @error('map')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{__('Video')}}</label>
                                        <input class="form-control" type="text" wire:model="video">
                                    @error('video')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                             </div>
                        <div wire:ignore class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('Status')}}</label>
                                <select class="form-control" wire:model="status">
                                    <option value="">{{__('Select Status')}}</option>
                                    <option value="Active">{{__('Active')}}</option>
                                    <option value="Inactive">{{__('Inactive')}}</option>
                                </select>
                            </div>
                        </div>
                        </div>

                    {{-- </form> --}}
                    {{-- <form  id="upload-form-add">
                        @csrf
                        <div class="form-group">
                            <label>{{__('Upload Photos')}}</label>
                            <input class="form-control" type="file" name="photo[]" accept="image/*" id="photo-input-add" multiple>
                </div>
                    </form> --}}
                    {{-- <form  wire:loading.attr="disabled" wire:submit.prevent="storeProjectData"> --}}
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

        $(document).ready(function() {
            $('#photo-input-add').on('change', function() {

                var formData = new FormData($('#upload-form-add')[0]);

                $.ajax({
                    url: '/add_multiple_photo',
                    type: 'POST',
                    data: formData,
                    beforeSend: function(){
                        // Show image container
                        $("#loader1").show();
                        $("#button1").attr("disabled","true");
                    },
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        $('#photo-preview-add').attr('src', data.path);
                        $("#loader1").hide();
                        $("#button1").removeAttr("disabled","false");

                    },

                    error: function(data){
                        var errors = data.responseJSON;
                        console.log(errors);
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#file-input-add').on('change', function() {
                var formData = new FormData($('#upload-form-add-file')[0]);
                $.ajax({
                    url: '/add_multiple_file',
                    type: 'POST',
                    data: formData,
                    beforeSend: function(){
                        // Show image container
                        $("#loader1").show();
                        $("#button1").attr("disabled","true");
                    },
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        $("#loader1").hide();
                        $("#button1").removeAttr("disabled","false");

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
