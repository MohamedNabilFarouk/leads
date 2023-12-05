<div>

        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{__('Clients')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{__('Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('Clients')}}</li>
                        </ul>
                    </div>
                    @if(auth()->user()->can('client-create'))
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i>
                            {{__('Add Client')}}</a>
                        <div class="view-icons">
                            <a href="#" class="grid-view btn btn-link"  wire:click.prevent='setGridView' wire:class="{'active': view === 'grid'}"><i class="fa fa-th"></i></a>
                            <a href="#" class="list-view btn btn-link" wire:click.prevent="setListView" wire:class="{'active': view === 'list'}"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>


            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" wire:model="searchId">
                        <label class="focus-label">{{__('Client Id')}}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" wire:model="searchName">
                        <label class="focus-label">{{__('Client Name')}}</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus focused">
                        <select class="form-control" wire:model="searchCompany">
                            <option value="">{{__('Select Company')}}</option>
                            @foreach($companies as $company)
                                <option value="{{$company->company_name}}">{{$company->company_name}}</option>
                            @endforeach
                        </select>
                        <label class="focus-label">{{__('Company')}}</label>
                    </div>
                </div>

            </div>
            @if($view == 'grid')
    {{-- cards --}}
            <div class="row staff-grid-row">
                @foreach($clients as $client)
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="#" class="avatar"><img  style="width:80px;height:80px; border-radius:50%"  src="{{asset($client->photo) }}" alt=""  onerror="this.onerror=null;this.src='{{ asset('photos/default_user.jpg') }}';"></a>
                        </div>

                        <div class="dropdown profile-action">
                            @if((auth()->user()->can('client-write'))||(auth()->user()->can('client-delete')))
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            @endif
                            <div class="dropdown-menu dropdown-menu-right">
                                @if(auth()->user()->can('client-write'))
                                <a class="dropdown-item" href="#" data-toggle="modal" wire:click="editClient({{$client->id}})" ><i class="fa fa-pencil m-r-5"></i> تعديل</a>
                                @endif
                                @if(auth()->user()->can('client-delete'))
                                <a class="dropdown-item" href="#" data-toggle="modal" wire:click="deleteConfirmation({{ $client->id }})"><i class="fa fa-trash-o m-r-5"></i> الغاء</a>
                            @endif
                            </div>
                        </div>

                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{url('/companyClientProfile',$client->id)}}">{{$client->company_name}}</a></h4>
                        <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{url('/companyClientProfile',$client->id)}}">{{$client->name}}</a></h5>
                        <div class="small text-muted">{{$client->job_title}}</div>
                        <!-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">{{__('Message')}}</a> -->
                        <!-- <a href="client-profile.html" class="btn btn-white btn-sm m-t-10">{{__('Profile')}}</a> -->
                    </div>
                </div>
                @endforeach

            </div>

            {{-- end cards --}}

            @else

{{-- table --}}

<div class="row">
    <div class="col-md-12">
        @if (session()->has('message'))
            <div class="alert alert-success text-center">{{ session('message') }}</div>
        @endif
        <div>
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__("Company Name")}}</th>
                    <th>{{__("Job Title")}}</th>
                    <th>{{__("Created_at")}}</th>
                    <th>{{__("client Id")}}</th>
                    <th class="text-right">{{__('Action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    @php($count= $loop->index + 1)

                    <tr>
                        <td>{{$count}}</td>
                        <td>
                            <a href="#" class="avatar" style="background-color:#ffff"><img alt="" src="{{asset($client->photo) }}"  onerror="this.onerror=null;this.src='{{ asset('photos/default_user.jpg') }}';" style='witdh:40px; height:40px; border-radius: 50%'></a>

                            <h2 class="table-avatar" style="width:150px;"> {{$client->name}}
                        </h2>
                        </td>
                        <td>{{$client->company_name}}</td>
                        <td>

                            {{$client->job_title}}

                        </td>
                        <td>{{$client->created_at}}</td>
                        <td>{{$client->client_id}}</td>


                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                     <button  wire:click="editClient({{$client->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                    <button  wire:click="deleteConfirmation({{ $client->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
{{--                    {{ $client->links('pagination::bootstrap-5') }}--}}
        </div>
    </div>
</div>

{{-- end table --}}
@endif

        </div>


        <div wire:ignore.self id="add_client" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title"> {{__('Add Client')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form  id="upload-form-add">
                            @csrf
                                    <div class="profile-img-wrap edit-img" id="photo-container">
                                        <img class="inline-block" src="{{asset(session()->get('photo'))}}" alt="Photo preview" id="photo-preview-add" onerror="this.onerror=null;this.src='{{ asset('photos/default_user.jpg') }}';" >
                                        <div class="fileupload btn">
                                            <span class="btn-text">{{__('edit')}}</span>
                                            <input  class="upload" type="file" name="photo" accept="image/*" id="photo-input-add">
                                        </div>
                                    </div>


                        </form>


                        <form wire:submit.prevent="storeClientData">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('First Name')}} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" wire:model="first_name" required>
                                        @error('first_name')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Last Name')}} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" wire:model="last_name" required>
                                        @error('last_name')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Full Name')}} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="{{$first_name}} {{$last_name}}" readonly>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Email')}} <span class="text-danger">*</span></label>
                                        <input class="form-control floating" type="email" wire:model="email" required>
                                        @error('email')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Password')}} <span class="text-danger">*</span> </label>
                                        <input class="form-control" type="password" wire:model="password" required>
                                        @error('password')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Confirm Password')}} <span class="text-danger">*</span> </label>
                                        <input class="form-control" type="password" wire:model="password_confirmation" required>
                                        @error('password_confirmation')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Client Id')}} <span class="text-danger">*</span></label>
                                        <input class="form-control floating" type="text" wire:model="client_id" required>
                                        @error('client_id')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Phone Number')}} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" wire:model="phone_number" required>
                                        @error('phone_number')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Company Name')}} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" wire:model="company_name" required>
                                        @error('company_name')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Job Title')}} </label>
                                        <input class="form-control" type="text" wire:model="job_title" >
                                        @error('job_title')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        {{-- edit --}}

        <div wire:ignore.self id="editClientModal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> {{__('Edit Client')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form  id="upload-form">
                            @csrf
                            <input hidden="hidden" name="id" value="{{$client_edit_id}}">


                                    <div class="profile-img-wrap edit-img" id="photo-container">
                                        <img class="inline-block" src="{{asset($client->photo) }}" alt="Photo preview" id="photo-preview">
                                        <div class="fileupload btn">
                                            <span class="btn-text">{{__('edit')}}</span>
                                            <input class="upload" type="file" name="photo" accept="image/*" id="photo-input">
                                        </div>
                                    </div>


                        </form>


                        <form wire:submit.prevent="editClientData">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('First Name')}} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" wire:model="first_name" required>
                                        @error('first_name')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Last Name')}} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" wire:model="last_name" required>
                                        @error('last_name')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Full Name')}} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="{{$first_name}} {{$last_name}}" readonly>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Email')}} <span class="text-danger">*</span></label>
                                        <input class="form-control floating" type="email" wire:model="email" required>
                                        @error('email')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Password')}} <span class="text-danger">*</span> </label>
                                        <input class="form-control" type="password" wire:model="password" required>
                                        @error('password')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Confirm Password')}} <span class="text-danger">*</span> </label>
                                        <input class="form-control" type="password" wire:model="password_confirmation" required>
                                        @error('password_confirmation')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Client Id')}} <span class="text-danger">*</span></label>
                                        <input class="form-control floating" type="text" wire:model="client_id" required>
                                        @error('client_id')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Phone Number')}} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" wire:model="phone_number" required>
                                        @error('phone_number')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Company Name')}} <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" wire:model="company_name" required>
                                        @error('company_name')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Job Title')}} </label>
                                        <input class="form-control" type="text" wire:model="job_title" >
                                        @error('job_title')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{-- end edit --}}



    <!-- Delete Client Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="delete_client" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>{{__('Delete')}} {{__('Client')}}</h3>
                        <p>{{__('Are you sure want to delete?')}}</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-sm btn-danger" wire:click="deleteClientData()">{{__('Yes')}}</button>
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


    <div  class="modal custom-modal fade" id="add1_client" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Department')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>


        <div class="modal custom-modal fade" id="delete_client" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>حذف العميل</h3>
                            <p>هل أنت متأكد من أنك تريد الحذف؟</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">حذف</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">الغاء</a>
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
                $('#add_client').modal('hide');
                $('#editClientModal').modal('hide');
                $('#delete_client').modal('hide');
            });

            window.addEventListener('show-edit-client-modal', event =>{
                $('#editClientModal').modal('show');
            });

            window.addEventListener('show-delete-confirmation-modal', event =>{
        $('#delete_client').modal('show');
    });



    $(document).ready(function() {
                            $('#photo-input').on('change', function() {

                                var formData = new FormData($('#upload-form')[0]);
                                $.ajax({
                                    url: '/company_client_edit_photo',
                                    type: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(data) {
                                        console.log(data);
                                        $('#photo-preview').attr('src', data.path);

                                    },
                                    error: function(data){
                                        var errors = data.responseJSON;
                                        console.log(errors);
                                    }
                                });
                            });
                        });


    $(document).ready(function() {
                            $('#photo-input-add').on('change', function() {

                                var formData = new FormData($('#upload-form-add')[0]);
                                $.ajax({
                                    url: '/add_photo',
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
