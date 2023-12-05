<div>
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{__('Clients')}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Clients')}}</li>
                    </ul>
                </div>
{{--                @if(auth()->user()->can('clients-create'))--}}
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i>
                        {{__('Add Client')}}</a>
{{--                        <div class="view-icons">--}}
{{--                            <a href="clients.html" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>--}}
{{--                            <a href="clients-list.html" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>--}}
{{--                        </div>--}}
                </div>
{{--                @endif--}}
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->

        <div class="row filter-row">
            <div class="col-sm-6 col-md-4">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating" wire:model="searchCompany">
                    <label class="focus-label">{{__('Company')}}</label>
                </div>
            </div>

{{--                <div class="col-sm-6 col-md-3">--}}
{{--                    <a href="#" class="btn btn-success btn-block"> {{__('Search')}} </a>--}}
{{--                </div>--}}
        </div>
        <!-- Search Filter -->


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
                            <th>Email</th>
                            <th>Slug</th>
                            <th>Created_at</th>
                            <th>Status</th>
                            <th>email verified</th>
                            <th class="text-right">{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            @php($count= $loop->index + 1)

                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>
                                    @if(($client->active) && ($client->email_verified_at != NULl))
                                        <!-- <a wire:click="clickEvent({{$client->id}})">{{$client->slug}}</a> -->

                                        <a wire:click="clickEvent({{$client->id}})" href="https://{{$client->slug}}.{{Request::getHost()}}">{{$client->slug}}</a>

                                        @else
                                    {{$client->slug}}
                                    @endif
                                </td>
                                <td>{{$client->created_at}}</td>
                                <td><div class="status-toggle">
                                <input  id="{{$client->id}}" {{$client->active==1?'checked':''}}   wire:change="changeEvent($event.target.value, {{$client->id}})"
                                       type="checkbox"
                                       class="check">
                                 <label for="{{$client->id}}" class="checktoggle">checkbox</label>
                                </div> </td>
                                <td><div class="status-toggle">
                                        <input  id="verify{{$client->id}}" {{$client->email_verified_at!=NULL?'checked':''}}   wire:change="verifyEvent($event.target.value, {{$client->id}})"
                                                type="checkbox"
                                                class="check">
                                        <label for="verify{{$client->id}}" class="checktoggle">checkbox</label>
                                    </div> </td>
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
    </div>
    <!-- /Page Content -->

    <!-- Add Client Modal -->
    <div wire:ignore.self id="add_client" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">{{__('Add Client')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">






                    <form wire:submit.prevent="storeClientData" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Client Name')}}<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" wire:model="name">
                                    @error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Client Slug')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" wire:model="slug">
                                    @error('slug')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Email')}} <span class="text-danger">*</span></label>
                                    <input class="form-control floating" type="email" wire:model="email">
                                    @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Phone Number')}} <span class="text-danger">*</span> </label>
                                    <input class="form-control" type="text" wire:model="phone">
                                    @error('phone')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Password')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" wire:model="password">
                                    @error('password')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Confirm Password')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password"  wire:model="password_confirmation">
                                    @error('password_confirmation')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Logo')}} <span class="text-danger">*</span></label>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control"  wire:model="photo">
                                    </div>
                                    @error('photo')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                        </form>
                        <div class="col-md-6">
                            <div class="form-group">

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

                            </div>
                            </div>

                        </div>
                        <form wire:submit.prevent="storeClientData" enctype="multipart/form-data" autocomplete="off">


{{--                            <div class="table-responsive m-t-15">--}}
{{--                                <table class="table table-striped custom-table">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>إذن الوحدة النمطية</th>--}}
{{--                                        <th class="text-center">قراءة</th>--}}
{{--                                        <th class="text-center">كتابة</th>--}}
{{--                                        <th class="text-center">انشاء</th>--}}
{{--                                        <th class="text-center">الغاء</th>--}}
{{--                                        <th class="text-center">يستورد</th>--}}
{{--                                        <th class="text-center">يصدّر</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>المشاريع</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>المهام</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>دردشة</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>التقديرات</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>الفواتير</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>التوقيت</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Client Modal -->

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


    <!-- Edit Client Modal -->
    <div wire:ignore.self  id="editClientModal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Client')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form  id="upload-form">
                        @csrf
                        <input hidden="hidden" name="id" value="{{$client_edit_id}}">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="profile-img-wrap edit-img" id="photo-container">
                                    <img class="inline-block" src="{{asset(session()->get('photo'))}}" alt="Photo preview" id="photo-preview-edit" onerror="this.onerror=null;this.src='{{ asset('photos/default_user.jpg') }}';" >
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
                                    <label class="col-form-label">{{__('Client Name')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" wire:model="name">
                                </div>
                                @error('name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Client Slug')}}</label>
                                    <input class="form-control"  type="text" wire:model="slug">
                                </div>
                                @error('slug')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Email')}} <span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text" wire:model="email"   required>
                                </div>
                                @error('email')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Phone')}} <span class="text-danger">*</span></label>
                                    <input class="form-control floating"  type="phone" wire:model="phone">
                                </div>
                                @error('phone')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Password')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" wire:model="password">
                                    @error('password')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">{{__('Confirm Password')}} <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password"  wire:model="password_confirmation">
                                    @error('password_confirmation')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">

                                {{-- <div class="form-group">
                                    <label class="col-form-label">{{__('Logo')}} <span class="text-danger">*</span></label>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control"  wire:model="photo">
                                    </div>
                                    @error('photo')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                            </div>


                        </div>
{{--                            <div class="table-responsive m-t-15">--}}
{{--                                <table class="table table-striped custom-table">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>إذن الوحدة النمطية</th>--}}
{{--                                        <th class="text-center">قراءة</th>--}}
{{--                                        <th class="text-center">كتابة</th>--}}
{{--                                        <th class="text-center">انشاء</th>--}}
{{--                                        <th class="text-center">الغاء</th>--}}
{{--                                        <th class="text-center">يستورد</th>--}}
{{--                                        <th class="text-center">يصدّر</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>المشاريع</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>المهام</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>دردشة</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>التقديرات</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>الفواتير</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>التوقيا</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <input checked="" type="checkbox">--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Client Modal -->


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

    window.addEventListener('show-view-client-modal', event =>{
        $('#viewClientModal').modal('show');
    });
</script>




<script>
    // $(document).ready(function() {
    //     $('#photo-input').on('change', function() {

    //         var formData = new FormData($('#upload-form')[0]);
    //         $.ajax({
    //             url: '/client_edit_photo',
    //             type: 'POST',
    //             data: formData,
    //             processData: false,
    //             contentType: false,
    //             success: function(data) {
    //                 console.log(data);
    //                 $('#photo-preview').attr('src', data.path);

    //             }
    //         });
    //     });
    // });


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



        $(document).ready(function() {

                            $('#photo-input').on('change', function() {

                                var formData = new FormData($('#upload-form')[0]);
                                $.ajax({
                                    url: '/client_edit_photo',
                                    type: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(data) {
                                        console.log(data);
                                        $('#photo-preview-edit').attr('src', data.path);

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
