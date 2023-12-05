<div>
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{__("Job Applicants")}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{__("Dashboard")}}</a></li>
                        <li class="breadcrumb-item active">@if(app()->getLocale() == 'ar') {{$job->title_ar}} @else {{$job->title}} @endif {{__("Applicants")}}</li>
                    </ul>
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
                            <th> {{__("Name")}}</th>
                            <th> {{__("Email")}}</th>
                            <th> {{__("Message")}}</th>
                            <th> {{__("Interview Date")}}</th>
                            <th> {{__("Interview Result")}}</th>
                            <th> {{__("Status")}}</th>
                            <th> {{__("CV")}}</th>

                            @if(auth()->user()->can('job-applicants-write') || auth()->user()->can('job-applicants-delete'))
                            <th class="text-right">{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applicants as $applicant)
                            @php($count= $loop->index + 1)

                            <tr>
                            <td>{{$count}}</td>
                            <td>{{$applicant->name}}</td>
                            <td>{{$applicant->email}}</td>
                            <td>{{$applicant->message}}</td>
                            <td>{{$applicant->interview_date}}</td>
                            <td>{{$applicant->interview_result}}</td>
                            <td>{{$applicant->status}}</td>
                            <td><a class="btn btn-sm btn-primary" href="{{url('photos')}}/{{$applicant->cv}}">{{__('Download')}}</a></td>
                            {{-- @if(auth()->user()->can('job-applicants-write') || auth()->user()->can('job-applicants-delete')) --}}
                                <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    {{-- @if(auth()->user()->can('job-applicants-write')) --}}
                                        <button wire:click="editJobApplicant({{$applicant->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                        {{-- @endif
                                            @if(auth()->user()->can('job-applicants-delete')) --}}
                                            <button  wire:click="deleteConfirmation({{ $applicant->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                            {{-- @endif --}}
                                    </div>
                                </div>
                            </td>
                            {{-- @endif --}}
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $applicants->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->


    <!-- Edit Department Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="editJobApplicantModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Applicant')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form wire:submit.prevent="editJobApplicantData">
                            <div class="form-group" >
                                <label>{{__("Status")}}</label>
                                <select class="form-control" wire:model="status">
                                    <option readonly>{{__("Select")}}</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Waiting List">Waiting List</option>
                                </select>
                                @error('status')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__("Interview Date")}}</label>
                                <input class="form-control" type="text"  id="searchDatefrom" wire:model="interview_date">
                                @error('interview_date')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__("Interview Result")}}</label>
                                <input class="form-control" type="text" wire:model="interview_result">
                                @error('interview_result')
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
    <div wire:ignore.self class="modal custom-modal fade" id="deleteJobApplicantModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>{{__('Delete Job Applicant')}}</h3>
                        <p>{{__('Are you sure want to delete')}}?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                            <button wire:click="deleteJobApplicantData()" class="btn btn-primary continue-btn">{{__('Delete')}}</button>
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
            $('#editJobApplicantModal').modal('hide');
            $('#deleteJobApplicantModal').modal('hide');
        });

        window.addEventListener('show-edit-job-applicants-modal', event =>{
            $('#editJobApplicantModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteJobApplicantModal').modal('show');
        });
    </script>
@endpush
