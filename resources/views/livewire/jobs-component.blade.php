<div>
    <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{__('Jobs')}}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">{{__("Dashboard")}}</a></li>
                    <li class="breadcrumb-item active">{{__("Jobs")}}</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_job"><i class="fa fa-plus"></i> {{__("Add Job")}}</a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
            <div class="alert alert-success text-center">{{ session('message') }}</div>
             @endif
        </div>
    </div>

    <!-- Search Filter -->
    <div class="row filter-row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus select-focus" wire:ignore>
                <select  class="form-control" wire:model='search_status'>
                    <option> -- {{__("Select")}} -- </option>
                    <option value="Open"> {{__('Open')}} </option>
                    <option value="Closed"> {{__('Closed')}} </option>
                </select>
                <label class="focus-label">{{__("Status")}}</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
            <div class="form-group form-focus select-focus" wire:ignore>
                <select class="form-control" wire:model='search_category_id'>
                    <option> -- {{__("Select")}} -- </option>
                    @foreach($categoris as $category)
                      <option value="{{$category->id}}">@if(app()->getLocale() == 'ar') {{$category->title_ar}} @else {{$category->title}} @endif</option>
                     @endforeach
                </select>
                <label class="focus-label">{{__("Category")}}</label>
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
                            <th>{{__("Job Id")}}</th>
                            <th> {{__("Title")}}</th>
                            <th>{{__("Category")}}</th>
                            <th>{{__("Job Type")}}</th>
                            <th>{{__("Applicants")}}</th>
                            <th class="text-center">{{__("Status")}}</th>
                            <th class="text-right">{{__("Actions")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $jobs as $job )


                        <tr>
                            <td><a href="{{url('job-view')}}/{{$job->slug}}">#{{$job->id}}</a></td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->category->title}}</td>
                            <td>{{$job->job_type}}</td>
                            <td><a class="btn btn-sm btn-primary" href="{{url('job-applicants')}}?job_id={{$job->id}}">{{$job->applicants->count()}} {{__('Candidates')}}</a></td>
                            <td>
                                <div class="dropdown action-label">
                                    <i class="fa fa-dot-circle-o text-danger"></i> {{__($job->status)}}
                                </div>
                            </td>
                            
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button wire:click="editJob({{$job->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                        <button  wire:click="deleteConfirmation({{ $job->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
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
<div id="add_job" class="modal custom-modal fade" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Add Job")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="storeJobData">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Title")}}</label>
                                <input class="form-control" type="text" wire:model="title">
                                @error('title')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Title Ar")}}</label>
                                <input class="form-control" type="text" wire:model="title_ar">
                                @error('title_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-6" >
                            <div class="form-group" >
                                <label>{{__("Category")}}</label>
                                <select class="form-control" wire:model="category_id">
                                    <option readonly>{{__("Select")}}</option>
                                    @foreach($categoris as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                   @endforeach
                                   
                                </select>
                                @error('category_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <div class="form-group" >
                                <label>{{__("Job Type")}}</label>
                                <select class="form-control" wire:model="job_type">
                                    <option readonly>{{__("Select")}}</option>
                                    <option value="FullTime">FullTime</option>
                                    <option value="PartTime">PartTime</option>
                                </select>
                                @error('job_type')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{__("Content En")}}</label>
                                <textarea class="form-control" wire:model="content"></textarea>
                                @error('content')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>                        
                            
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{__("Content Ar")}}</label>
                                <textarea class="form-control" wire:model="content_ar"></textarea>
                                @error('content_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>                        
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Salary from")}}</label>
                                <input class="form-control" type="text" wire:model="salary_from">
                                @error('salary_from')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Salary to")}}</label>
                                <input class="form-control" type="text" wire:model="salary_to">
                                @error('salary_to')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Address En")}}</label>
                                <input class="form-control" type="text" wire:model="address">
                                @error('address')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Address Ar")}}</label>
                                <input class="form-control" type="text" wire:model="address_ar">
                                @error('address_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Max age")}}</label>
                                <input class="form-control" type="text" wire:model="max_age">
                                @error('max_age')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <div class="form-group" >
                                <label>{{__("Status")}}</label>
                                <select class="form-control" wire:model="status">
                                    <option readonly>{{__("Select")}}</option>
                                    <option value="Open">{{__('Open')}}</option>
                                    <option value="Closed">{{__('Closed')}}</option>
                                </select>
                                @error('status')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <form wire:submit.prevent="storeJobData" enctype="multipart/form-data">
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
<div id="edit_job" class="modal custom-modal fade" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Edit")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="editJobData">
                <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Title")}}</label>
                                <input class="form-control" type="text" wire:model="title">
                                @error('title')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Title Ar")}}</label>
                                <input class="form-control" type="text" wire:model="title_ar">
                                @error('title_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-6" >
                            <div class="form-group" >
                                <label>{{__("Category")}}</label>
                                <select class="form-control" wire:model="category_id">
                                    <option readonly>{{__("Select")}}</option>
                                    @foreach($categoris as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                   @endforeach
                                   
                                </select>
                                @error('category_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <div class="form-group" >
                                <label>{{__("Job Type")}}</label>
                                <select class="form-control" wire:model="job_type">
                                    <option readonly>{{__("Select")}}</option>
                                    <option value="FullTime">FullTime</option>
                                    <option value="PartTime">PartTime</option>
                                </select>
                                @error('job_type')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{__("Content En")}}</label>
                                <textarea class="form-control" wire:model="content"></textarea>
                                @error('content')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>                        
                            
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{__("Content Ar")}}</label>
                                <textarea class="form-control" wire:model="content_ar"></textarea>
                                @error('content_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>                        
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Salary from")}}</label>
                                <input class="form-control" type="text" wire:model="salary_from">
                                @error('salary_from')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Salary to")}}</label>
                                <input class="form-control" type="text" wire:model="salary_to">
                                @error('salary_to')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Address En")}}</label> 
                                <input class="form-control" type="text" wire:model="address">
                                @error('address')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Address Ar")}}</label>
                                <input class="form-control" type="text" wire:model="address_ar">
                                @error('address_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__("Max age")}}</label>
                                <input class="form-control" type="text" wire:model="max_age">
                                @error('max_age')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <div class="form-group" >
                                <label>{{__("Status")}}</label>
                                <select class="form-control" wire:model="status">
                                    <option readonly>{{__("Select")}}</option>
                                    <option value="Open">{{__('Open')}}</option>
                                    <option value="Closed">{{__('Closed')}}</option>
                                </select>
                                @error('status')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <form wire:submit.prevent="editJobData" enctype="multipart/form-data">
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
    <div wire:ignore.self class="modal custom-modal fade" id="deleteJobModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>{{__('Delete')}} {{__('Job')}}</h3>
                        <p>{{__('Are you sure want to delete?')}}</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-sm btn-danger" wire:click="deleteJobData()">{{__('Yes')}}</button>
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
            $('#add_job').modal('hide');
            $('#edit_job').modal('hide');
            $('#deleteJobModal').modal('hide');
        });

        window.addEventListener('show-edit-job-modal', event =>{
            $('#edit_job').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteJobModal').modal('show');
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
