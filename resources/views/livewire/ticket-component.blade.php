<div>
    <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{__('Tickets')}}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{__("Dashboard")}}</a></li>
                    <li class="breadcrumb-item active">{{__("Tickets")}}</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_ticket"><i class="fa fa-plus"></i> {{__("Add Ticket")}}</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
            <div class="alert alert-success text-center">{{ session('message') }}</div>
             @endif
            <div class="card-group m-b-30">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">{{__("Returned Tickets")}}</span>
                            </div>
                            <div>
                                {{-- <span class="text-success">+10%</span> --}}
                            </div>
                        </div>
                        <h3 class="mb-3">{{$returnd_tickets}}</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">{{__("Solved Tickets")}}</span>
                            </div>
                            <div>
                                {{-- <span class="text-success">+12.5%</span> --}}
                            </div>
                        </div>
                        <h3 class="mb-3">{{$solved_tickets}}</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">{{__("Open Tickets")}}</span>
                            </div>
                            <div>
                                {{-- <span class="text-danger">-2.8%</span> --}}
                            </div>
                        </div>
                        <h3 class="mb-3">{{$open_tickets}}</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <span class="d-block">{{__("Pending Tickets")}}</span>
                            </div>
                            <div>
                                {{-- <span class="text-danger">-75%</span> --}}
                            </div>
                        </div>
                        <h3 class="mb-3">{{$pending_tickets}}</h3>
                        <div class="progress mb-2" style="height: 5px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Filter -->
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" wire:model='search_subject'>
                <label class="focus-label">{{__("Subject")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus select-focus" wire:ignore>
                <select  class="form-control" wire:model='search_status'>
                    <option> -- {{__("Select")}} -- </option>
                    @foreach($tickets_status as $key=>$m)
                      <option value="{{$key}}">{{$m[app()->getLocale()]}}</option>
                     @endforeach
                    {{-- <option value="Pending"> Pending </option>
                    <option value="Open"> Open </option>
                    <option value="Solved"> Solved </option>
                    <option  value="Returned" > Returned </option> --}}
                </select>
                <label class="focus-label">{{__("Status")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus select-focus" wire:ignore>
                <select class="form-control" wire:model='search_priority'>
                    <option> -- {{__("Select")}} -- </option>
                    @foreach($tickets_priority as $key=>$m)
                      <option value="{{$key}}">{{$m[app()->getLocale()]}}</option>
                     @endforeach
                    {{-- <option> High </option>
                    <option> Low </option>
                    <option> Medium </option> --}}
                </select>
                <label class="focus-label">{{__("Priority")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                    <input style="width:100%;height: 100%;" type="text" class="form_control" id="searchDatefrom"  wire:model="search_from">
                <label class="focus-label">{{__("From")}}</label>
            </div>
        </div>
       <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                    <input style="width: 100%;height: 100%;" class="form_control" type="text" id="searchDateTo" wire:model="search_to">
                <label class="focus-label">{{__("To")}}</label>
            </div>
        </div>
        {{-- <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div> --}}
    </div>
    <!-- /Search Filter -->

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__("Ticket Id")}}</th>
                            <th> {{__("Subject")}}</th>
                            <th>{{__("Assigned Staff")}}</th>
                            <th>{{__("Created Date")}}</th>
                            <th>{{__("Last Reply")}}</th>
                            <th>{{__("Priority")}}</th>
                            <th class="text-center">{{__("Status")}}</th>
                            <th class="text-right">{{__("Actions")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $tickets as $t )


                        <tr>
                            <td>1</td>
                            <td><a href="{{url('ticket-view')}}/{{\Crypt::encrypt($t->id)}}">#{{$t->ticket_id}}</a></td>
                            <td>{{$t->subject}}</td>
                            <td>
                                @php
                                $ids = json_decode($t->assign_staff);
                                $assign = \App\Models\User::whereIn('id', $ids)->get();
                                @endphp

                                   @foreach ( $assign as $a )
                                   <h2 class="table-avatar">
                                   <a class="avatar avatar-xs" href="#"><img alt="" src="{{asset($a->photo)}}" style='width: 25px; height: 25px;'></a>
                                   <a href="#">{{$a->name}}</a>
                                </h2>
                                <br>
                                   @endforeach

                            </td>
                            <td>{{\Carbon\Carbon::parse($t->created_at)->format('j M Y h:i A')}}</td>
                            <td>{{\Carbon\Carbon::parse($t->updated_at)->format('j M Y h:i A')}}</td>

                            <td>
                                <div class="dropdown action-label">
                                    @foreach($tickets_status as $key=>$m)
                                        @if($t->status == $key )
                                        <i class="fa fa-dot-circle-o text-danger"></i> {{$m[app()->getLocale()]}}
                                        @endif
                                       @endforeach
                                    {{-- <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> High</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-warning"></i> Medium</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low</a>
                                    </div> --}}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="dropdown action-label">
                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                        @foreach($tickets_status as $key=>$m)
                                        @if($t->status == $key )
                                        <i class="fa fa-dot-circle-o text-danger"></i> {{$m[app()->getLocale()]}}
                                        @endif
                                       @endforeach

                                    </a>
                                    {{-- <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Open</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Reopened</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> On Hold</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Closed</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> In Progress</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Cancelled</a>
                                    </div> --}}
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button wire:click="editTicket({{$t->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                        <button  wire:click="deleteConfirmation({{ $t->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- Add Ticket Modal -->
<div id="add_ticket" class="modal custom-modal fade" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Add Ticket")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="storeTicketData">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Subject")}}</label>
                                <input class="form-control" type="text" wire:model="subject">
                                @error('subject')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Ticket Id")}}</label>
                                <input class="form-control" type="text" wire:model="ticket_id" readonly>
                                @error('ticket_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-6" >
                            <div class="form-group" >
                                <label>{{__("Priority")}}</label>
                                <select class="form-control" wire:model="priority">
                                    <option readonly>{{__("Select")}}</option>
                                    @foreach($tickets_priority as $key=>$m)
                                    <option value="{{$key}}">{{$m[app()->getLocale()]}}</option>
                                   @endforeach
                                    {{-- <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option> --}}
                                </select>
                                @error('priority')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Client")}}</label>
                                <select class="form-control"  wire:model="client_id">
                                    <option>-</option>
                                    @foreach($this->clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                                </select>
                                @error('client_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label>{{__("Assign")}}</label>
                                <select multiple class="form-control" wire:model="assign_staff">
                                    <option value="">{{__("Select")}}</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('assign_staff')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Assign Members")}}</label>
                                <div class="project-members">
                                    @foreach($users as $team)
                                        @if(in_array($team->id,$assign_staff))
                                            <a href="#" data-toggle="tooltip" title="{{$team->name}}" class="avatar">
                                                <img src="{{asset($team->photo)}}" alt>
                                            </a>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>


                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Assign</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ticket Assignee</label>
                                <div class="project-members">
                                    <a title="John Smith" data-placement="top" data-toggle="tooltip" href="#" class="avatar">
                                        <img src="assets/img/profiles/avatar-02.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label> {{__("Followers")}}</label>
                                <select multiple class="form-control" wire:model="followers">
                                    <option value="" disabled>{{__("Select")}}</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('followers')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Followers Members")}}</label>
                                <div class="project-members">
                                    @foreach($users as $team)
                                        @if(in_array($team->id,$followers))
                                            <a href="#" data-toggle="tooltip" title="{{$team->name}}" class="avatar">
                                                <img src="{{asset($team->photo)}}" alt>
                                            </a>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{__("Description")}}</label>
                                <textarea class="form-control" wire:model="des"></textarea>
                                @error('des')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                        <form  id="upload-form-add-photo">
                            @csrf
                            <div class="form-group">
                                <label>{{__("Upload Photos")}}</label>
                                <input class="form-control" type="file" name="photo[]" accept="image/*,.pdf,.doc,.docx,.xls,.xlsx,.csv,.txt" id="photo-input-add" multiple>
                                @error('photo')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>

                            {{-- <div class="form-group">
                                <label>Upload Files</label>
                                <input class="form-control" type="file">
                            </div> --}}
                        </div>
                    </div>
                    <form wire:submit.prevent="storeTicketData" enctype="multipart/form-data">
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">{{__("Submit")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Ticket Modal -->

<!-- Edit Ticket Modal -->
<div id="edit_ticket" class="modal custom-modal fade" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Edit")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="editTicketData">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{__("Ticket Id")}}</label>
                                <input class="form-control" type="text" wire:model="ticket_id" readonly>
                                @error('ticket_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> {{__("Subject")}}</label>
                                <input class="form-control" type="text" wire:model="subject">
                                @error('subject')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Client")}}</label>
                                <select class="form-control"  wire:model="client_id">
                                    <option>-</option>
                                    @foreach($this->clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                                </select>
                                @error('client_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row" >
                        <div class="col-sm-6" >
                            <div class="form-group" >
                                <label>{{__("Priority")}}</label>
                                <select class="form-control" wire:model="priority">
                                    <option readonly>{{__("Select")}}</option>
                                    @foreach($tickets_priority as $key=>$m)
                                    <option value="{{$key}}">{{$m[app()->getLocale()]}}</option>
                                   @endforeach
                                    {{-- <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option> --}}
                                </select>
                                @error('priority')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-sm-6" >
                            <div class="form-group" >
                                <label>{{__("Status")}}</label>
                                <select class="form-control" wire:model="status">
                                    <option readonly>{{__("Select")}}</option>
                                    @foreach($tickets_status as $key=>$m)
                                    <option value="{{$key}}">{{$m[app()->getLocale()]}}</option>
                                   @endforeach
                                    {{-- <option> Pending </option>
                                    <option> Open </option>
                                    <option> Solved </option>
                                    <option> Returned </option> --}}
                                </select>
                                @error('priority')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label>{{__("Assign")}}</label>
                                <select multiple class="form-control" wire:model="assign_staff">
                                    <option value="">{{__("Select")}}</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('assign_staff')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Assign Members")}}</label>
                                <div class="project-members">
                                    @foreach($users as $team)
                                        @if(in_array($team->id,$assign_staff))
                                            <a href="#" data-toggle="tooltip" title="{{$team->name}}" class="avatar">
                                                <img src="{{asset($team->photo)}}" alt>
                                            </a>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label> {{__("Followers")}}</label>
                                <select multiple class="form-control" wire:model="followers">
                                    <option value="">{{__("Select")}} </option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('followers')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Assign Members")}}</label>
                                <div class="project-members">
                                    @foreach($users as $team)
                                        @if(in_array($team->id,$followers))
                                            <a href="#" data-toggle="tooltip" title="{{$team->name}}" class="avatar">
                                                <img src="{{asset($team->photo)}}" alt>
                                            </a>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{__("Description")}}</label>
                                <textarea class="form-control" wire:model="des"></textarea>
                                @error('des')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                        <form  id="upload-form-edit-photo">
                            @csrf
                            <input hidden="hidden" name="id" value="{{$ticket_edit_id}}">
                            <div class="form-group">
                                <label>{{__("Upload Photos")}}</label>
                                <input class="form-control" type="file" name="photo[]" accept="image/*,.pdf,.doc,.docx,.xls,.xlsx,.csv,.txt" id="photo-input-edit" multiple>
                                @error('photo')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>

                            {{-- <div class="form-group">
                                <label>Upload Files</label>
                                <input class="form-control" type="file">
                            </div> --}}
                        </div>
                    </div>

                    <form wire:submit.prevent="editTicketData" enctype="multipart/form-data">
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__("Submit")}}</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Ticket Modal -->

    <!-- Delete Client Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="deleteTicketModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>{{__('Delete')}} {{__('Ticket')}}</h3>
                        <p>{{__('Are you sure want to delete?')}}</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-sm btn-danger" wire:click="deleteTicketData()">{{__('Yes')}}</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">{{__('Cancel')}}</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Client Modal -->
</div>
</div>

@push('scripts')
    <script>
      window.addEventListener('close-modal', event =>{
            $('#add_ticket').modal('hide');
            $('#edit_ticket').modal('hide');
            $('#deleteTicketModal').modal('hide');
        });

        window.addEventListener('show-edit-ticket-modal', event =>{
            $('#edit_ticket').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteTicketModal').modal('show');
        });



        $(document).ready(function() {
            $('#photo-input-add').on('change', function() {

                var formData = new FormData($('#upload-form-add-photo')[0]);
                $.ajax({
                    url: '/add_multiple_photo_ticket',
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


            $('#photo-input-edit').on('change', function() {

                var formData = new FormData($('#upload-form-edit-photo')[0]);
                $.ajax({
                    url: '/updateTicketphoto',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);

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
