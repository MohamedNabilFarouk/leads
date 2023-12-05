<div>
    <!-- Page Content -->
    <div class="content container-fluid p-4">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Admin</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{__("Dashboard")}}</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ul>
                </div>
                    <div class="col-auto float-right ml-auto">
                        <button class="btn add-btn" data-toggle="modal" data-target="#addAdminModal"><i class="fa fa-plus"></i> {{__("Add Admin")}}</button>
                    </div>
            </div>
        </div>
        <!-- /Page Header -->

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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th class="text-right">{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            @php($count= $loop->index + 1)

                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->phone_number}}</td>
                                <td>{{$admin->email}}</td>
                                <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                    <button  wire:click="editAdmin({{$admin->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                                    <button  wire:click="deleteConfirmation({{ $admin->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                            </div>
                                        </div>
                                    </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $admins->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
    <!-- Add Admin Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="addAdminModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Admin')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"  wire:click="close()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeAdminData" enctype="multipart/form-data" autocomplete="off">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('First Name')}}: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" wire:model="first_name" required>
                                    @error('first_name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Last Name')}}: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text"  wire:model="last_name" required>
                                    @error('last_name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Email')}}: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" wire:model="email" required>
                                    @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Phone Number')}}: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" wire:model="phone_number" required>
                                    @error('phone_number')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Password')}}: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password"  wire:model="password" required>
                                    @error('password')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Confirm Password')}}: <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" wire:model="password_confirmation" required>
                                    @error('password_confirmation')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="photo">{{__('Photo')}}: </label>

                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control"  wire:model="photo">
                                    </div>

                                </div>
                            </div>




                        </div>


                        <div class="padding-Area"></div>


                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Admin Modal -->

    <!-- Edit Admin Modal -->
    <div wire:ignore.self  class="modal custom-modal fade" id="editAdminModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editAdminData">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img-wrap edit-img">
                                    <img class="inline-block" src="{{asset($admin->photo) }}" alt="user">
                                    <div class="fileupload btn">
                                        <span class="btn-text">{{__('edit')}}</span>
                                        <input class="upload" type="file" wire:model="photo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('First Name')}} : <span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text" wire:model="first_name" required>
                                    @error('first_name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Last Name')}} : <span class="text-danger">*</span> </label>
                                    <input class="form-control" wire:model="last_name" type="text" required>
                                    @error('last_name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Email')}} :  <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="email" type="email" required>
                                    @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Phone Number')}} : <span class="text-danger">*</span> </label>
                                    <input class="form-control" wire:model="phone_number" type="number" required>
                                    @error('phone_number')
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
    <!-- /Edit Admin Modal -->

    <!-- Delete Admin Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="deleteAdminModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>{{__('Delete Admin')}}</h3>
                        <p>{{__('Are you sure want to delete')}}?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <button wire:click="deleteAdminData()" class="btn btn-primary continue-btn">{{__('Delete')}}</button>
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
    <!-- /Delete Admin Modal -->

</div>
<!-- /Page Wrapper -->
</div>
@push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#addAdminModal').modal('hide');
            $('#editAdminModal').modal('hide');
            $('#deleteAdminModal').modal('hide');
        });

        window.addEventListener('show-edit-admin-modal', event =>{
            $('#editAdminModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteAdminModal').modal('show');
        });
    </script>
@endpush
