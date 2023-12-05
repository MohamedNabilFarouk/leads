<div>
    <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{__('Leads')}}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{__("Dashboard")}}</a></li>
                    <li class="breadcrumb-item active">{{__("Leads")}}</li>
                </ul>
            </div>
            {{-- @if(auth()->user()->can('leads-create')) --}}
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_lead"><i class="fa fa-plus"></i> {{__("Add")}}</a>
            </div>
            {{-- @endif --}}
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#upload_leads"><i class="fa fa-plus"></i> {{__("Upload CSV")}}</a>
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






            </div>
        </div>
    </div>

    <!-- Search Filter -->
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating" wire:model='search_subject'>
                <label class="focus-label">{{__("Name / Phone")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus select-focus" wire:ignore>
                <select  class="form-control" wire:model='search_status'>
                    <option> -- {{__("Select")}} -- </option>
                    @foreach($leads_status as $key=>$m)
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


    </div>
    <!-- /Search Filter -->

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> {{__("Name")}}</th>
                            <th>{{__("Assigned Staff")}}</th>
                            <th>{{__("Project")}}</th>
                            <th>{{__("Created Date")}}</th>
                            <th>{{__("Created by")}}</th>
                            <th>{{__("Email")}}</th>
                            <th>{{__("Phone")}}</th>
                            <th class="text-center">{{__("Status")}}</th>
                            <th class="text-right">{{__("Actions")}}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $leads as $t )
                            @if((auth()->user()->role_id == 4))

                            @if( (in_array(auth()->user()->id, json_decode($t->assign_staff)))||((auth()->user()->id == $t->created_by)))
                        <tr>
                          <a href="{{url('lead-view')}}/{{\Crypt::encrypt($t->id)}}"> <td>{{$t->id}}</td></a>

                          <td>{{$t->name}}</td>

                            <td>
                                @php
                                $ids = json_decode($t->assign_staff);
                                $assign = \App\Models\User::whereIn('id', $ids)->get();
                                @endphp

                                   @foreach ( $assign as $a )
                                   <h2 class="table-avatar">
                                   <a class="avatar avatar-xs" href="#"><img alt="" src="{{asset($a->photo)}}" style='width: 25px; height: 25px;'></a>
                                   <a href="#" class='user-table-name'>{{$a->name}}</a>
                                </h2>
                                <br>
                                   @endforeach

                            </td>
                            <td>{{$t->project->title??''}}</td>
                            <td>{{\Carbon\Carbon::parse($t->created_at)->format('j M Y h:i A')}}</td>
                            <td>{{$t->createdBy->name}}</td>
                            <td>{{$t->email}}</td>
                            <td>{{$t->phone}}</td>


                            <td class="text-center">
                                <div class="dropdown action-label">
                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle"  @if ((in_array(auth()->user()->id, json_decode($t->assign_staff))) ||(auth()->user()->id == $t->created_by) ) wire:click="showChangeStatus({{$t->id}}) @endif>
                                        @foreach($leads_status as $key=>$m)
                                        @if($t->status == $key )
                                        <i class="fa fa-dot-circle-o text-danger"></i> {{$m[app()->getLocale()]}}
                                        @endif
                                       @endforeach

                                    </a>
                                </div>
                            </td>

                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {{-- @if(auth()->user()->can('leads-write')) --}}
                                        <button wire:click="editLead({{$t->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                       {{-- @endif --}}
                                        @if(auth()->user()->can('leads-delete'))
                                        <button  wire:click="deleteConfirmation({{ $t->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                        @endif
                                        @if(auth()->user()->can('leads-read'))
                                        <a  href="{{url('lead-view')}}/{{\Crypt::encrypt($t->id)}}" class="dropdown-item"><i class="fa fa-eye-o m-r-5"></i> {{__('Show')}}</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @else
                        <tr>
                            <a href="{{url('lead-view')}}/{{\Crypt::encrypt($t->id)}}"> <td>{{$t->id}}</td></a>

                            <td>{{$t->name}}</td>

                              <td>
                                  @php
                                  $ids = json_decode($t->assign_staff);
                                  if($ids){
                                $assign = \App\Models\User::whereIn('id', $ids)->get();
                                }else{
                                    $assign =[];
                                }
                                  @endphp

                                     @foreach ( $assign as $a )
                                     <h2 class="table-avatar">
                                     <a class="avatar avatar-xs" href="#"><img alt="" src="{{asset($a->photo)}}" style='width: 25px; height: 25px;'></a>
                                     <a href="#" class='user-table-name'>{{$a->name}}</a>
                                  </h2>
                                  <br>
                                     @endforeach

                              </td>
                              <td>{{$t->project->title??''}}</td>
                              <td>{{\Carbon\Carbon::parse($t->created_at)->format('j M Y h:i A')}}</td>
                              <td>{{$t->createdBy->name}}</td>
                              <td>{{$t->email}}</td>
                              <td>{{$t->phone}}</td>


                              <td class="text-center">
                                  <div class="dropdown action-label">
                                      <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" @if(auth()->user()->can('leads-write'))  wire:click="showChangeStatus({{$t->id}})@endif >
                                          @foreach($leads_status as $key=>$m)
                                          @if($t->status == $key )
                                          <i class="fa fa-dot-circle-o text-danger"></i> {{$m[app()->getLocale()]}}
                                          @endif
                                         @endforeach

                                      </a>
                                  </div>
                              </td>

                              <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {{-- @if(auth()->user()->can('leads-write')) --}}
                                        <button wire:click="editLead({{$t->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                       {{-- @endif --}}
                                        {{-- @if(auth()->user()->can('leads-delete')) --}}
                                        <button  wire:click="deleteConfirmation({{ $t->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                        {{-- @endif --}}
                                        @if(auth()->user()->can('leads-read'))
                                        <a  href="{{url('lead-view')}}/{{\Crypt::encrypt($t->id)}}" class="dropdown-item"><i class="fa fa-eye-o m-r-5"></i> {{__('Show')}}</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                          </tr>
@endif
                   @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->

<!-- Add Lead Modal -->
<div id="add_lead" class="modal custom-modal fade" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Add")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="storeLeadData">
                    @include('livewire.Leads.form')
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add lead Modal -->

<!-- Edit lead Modal -->
<div id="edit_lead" class="modal custom-modal fade" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Edit")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="editLeadData">
                    @include('livewire.Leads.form')
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit lead Modal -->

    <!-- Delete Client Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="deleteLeadModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>{{__('Delete')}} {{__('Lead')}}</h3>
                        <p>{{__('Are you sure want to delete?')}}</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-sm btn-danger" wire:click="deleteLeadData()">{{__('Yes')}}</button>
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

                              <!-- Edit status Modal -->
                              <div id="edit_lead_status" class="modal custom-modal fade" role="dialog" wire:ignore.self>
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{__("Edit")}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form wire:submit.prevent="changeStatus()">



                                                <div class="row" >

                                                    <div class="col-sm-6" >
                                                        <div class="form-group" >
                                                            <label>{{__("Status")}}</label>
                                                            <select class="form-control" wire:model="status">
                                                                <option readonly>{{__("Select")}}</option>
                                                                @foreach($leads_status as $key=>$m)
                                                                <option value="{{$key}}">{{$m[app()->getLocale()]}}</option>
                                                               @endforeach
                                                                {{-- <option> Pending </option>
                                                                <option> Open </option>
                                                                <option> Solved </option>
                                                                <option> Returned </option> --}}
                                                            </select>
                                                            @error('status')
                                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6" >
                                                        <div class="form-group" >
                                                            <label>{{__("Comment")}}</label>
                                                            <textarea class="form-control" wire:model="comment"></textarea>
                                                        </div>
                                                    </div>



                                                </div>

                                                    <div class="submit-section">
                                                        <button type='submit' class="btn btn-primary submit-btn">{{__("Submit")}}</button>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Edit Status Modal -->


                               <!-- upload excel Modal -->
   <div wire:ignore.self class="modal custom-modal fade" id="upload_leads" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Upload Leads')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"  wire:click="close()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (session()->has('message'))
                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                @endif
                <!-- @if (session()->has('messages'))
                    {{-- @dd(session('messages')->errors()) --}}
                    {{-- @foreach(session('messages') as $m) --}}
                    {{-- @dd($m) --}}
                    <div class="alert alert-danger text-center"> in Row : {{ session('messages')->row() }} - @foreach(session('messages')->errors() as $e) {{$e}} @endforeach  </div>
                {{-- @endforeach --}}
                @endif -->
                <!-- <form wire:submit.prevent="upload_Excel" enctype="multipart/form-data" autocomplete="off"> -->
                <form action="{{route('Leadexcelupload')}}" method='post' enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('Upload CSV')}}: <span class="text-danger">*</span></label>

                                <input class="form-control " type="file" name="leads_excel" accept=".csv"   required>
                                @error('leads_excel')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mt-5">
                            <a href="{{asset('files/leadsExFiles.csv')}}" style="margin-top:100px" download>{{__('Download CSV Ex.')}}</a>
                            </div>
                            </div>


                    </div>




                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">{{__('Upload')}}</button>
                    </div>





            </div>






            </form>
        </div>
    </div>
</div>
</div>
<!-- /upload excel Modal -->

</div>
</div>

@push('scripts')
    <script>
      window.addEventListener('close-modal', event =>{
            $('#add_lead').modal('hide');
            $('#edit_lead').modal('hide');
            $('#upload_leads').modal('hide');
            $('#deleteLeadModal').modal('hide');
        });

        window.addEventListener('show-edit-lead-modal', event =>{
            $('#edit_lead').modal('show');
        });
        window.addEventListener('show-edit-lead-status-modal', event =>{
            $('#edit_lead_status').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteLeadModal').modal('show');
        });





    </script>
@endpush
