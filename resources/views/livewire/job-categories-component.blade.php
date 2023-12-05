<div>
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{__("Job categories")}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{__("Dashboard")}}</a></li>
                        <li class="breadcrumb-item active">{{__("Job categories")}}</li>
                    </ul>
                </div>
                {{-- @if(auth()->user()->can('job-categories-create')) --}}
                <div class="col-auto float-right ml-auto">
                    <button class="btn add-btn" data-toggle="modal" data-target="#addJobCategoryModal"><i class="fa fa-plus"></i> {{__("Add Job category")}}</button>
                </div>
                {{--@endif --}}
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
                            <th>title</th>
                            <th>أسم </th>
                            @if(auth()->user()->can('job-categories-write') || auth()->user()->can('job-categories-delete'))
                            <th class="text-right">{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            @php($count= $loop->index + 1)

                            <tr>
                            <td>{{$count}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->title_ar}}</td>
                            {{-- @if(auth()->user()->can('job-categories-write') || auth()->user()->can('job-categories-delete')) --}}
                                <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    {{-- @if(auth()->user()->can('job-categories-write')) --}}
                                        <button wire:click="editJobCategory({{$job->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                        {{-- @endif
                                            @if(auth()->user()->can('job-categories-delete')) --}}
                                            <button  wire:click="deleteConfirmation({{ $job->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                            {{-- @endif --}}
                                    </div>
                                </div>
                            </td>
                            {{-- @endif --}}
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $jobs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->


    <!-- Add Department Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="addJobCategoryModal" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Job Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeDepartmentData">

                    <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="title" required>
                            @error('title')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>أسم  <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="title_ar" required>
                            @error('title_ar')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Department Modal -->

    <!-- Edit Department Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="editJobCategoryModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Job Category')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form wire:submit.prevent="editJobCategoryData">
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="title" required>
                                    @error('title')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    <div class="form-group">
                        <label>أسم  <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="title_ar" required>
                        @error('title_ar')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Department Modal -->

    <!-- Delete Department Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="deleteJobCategoryModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>{{__('Delete Job category')}}</h3>
                        <p>{{__('Are you sure want to delete')}}?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                            <button wire:click="deleteJobCategoryData()" class="btn btn-primary continue-btn">{{__('Delete')}}</button>
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
    <!-- /Delete Department Modal -->

</div>
<!-- /Page Wrapper -->
</div>
@push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#addJobCategoryModal').modal('hide');
            $('#editJobCategoryModal').modal('hide');
            $('#deleteJobCategoryModal').modal('hide');
        });

        window.addEventListener('show-edit-job-category-modal', event =>{
            $('#editJobCategoryModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteJobCategoryModal').modal('show');
        });
    </script>
@endpush
