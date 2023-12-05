<div>
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{__('User Subscribers')}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{__('User Subscribers')}}</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('Client')}} </th>
                            <th>{{__('Plan')}} </th>
                            <th>{{__('Payment')}} </th>
                            <th>{{__('Total')}} </th>
                            <th>{{__('Starting Date')}} </th>
                            <th>{{__('Ending Date')}} </th>
                            {{-- <th>k</th> --}}

                            {{-- @if(auth()->user()->can('termination-write') || auth()->user()->can('termination-delete'))
                                <th class="text-right">{{__('Action')}}</th>
                            @endif --}}
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($plans as $plan)
                            @php($count= $loop->index + 1)
                            <tr class="holiday-upcoming">
                                <td>{{ $count }}</td>
                                <td>{{$plan->client->name??''}}</td>
                                <td>{{$plan->plan->name??''}}</td>
                                <td>{{$plan->is_paid}}</td>
                                <td>{{$plan->total}}</td>
                                <td>{{\Carbon\Carbon::parse($plan->starting_date)->format('D, M j, Y')}}</td>
                                <td>{{\Carbon\Carbon::parse($plan->end_date)->format('D, M j, Y')}}</td>
                                {{-- <td>{{$plan->plan->frequency}}</td> --}}

{{--                                @endif--}}
                            </tr>
                        @endforeach
                        <!--<tr class="holiday-completed">
                     <td>6</td>
                     <td>Bakrid</td>
                     <td>2 Sep 2022</td>
                     <td>Saturday</td>
                     <td>5</td>
                     <td class="text-right">
                         <div class="dropdown dropdown-action">
                             <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                             <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_holiday"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_holiday"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                             </div>
                         </div>
                     </td>
                 </tr>-->


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->


    <!-- Add Holiday Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="addTerminationModal" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Termination Type')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeTerminationData">
                        <div class="form-group">
                            <label>{{__('Termination Type Name')}} <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="termination_name" required>
                            @error('termination_name')
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
    <!-- /Add Termination Modal -->


    <!-- Edit Termination Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="editTerminationModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Termination</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editTerminationData">
                        <div class="form-group">
                            <label>Termination Type Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="termination_name" required>
                            @error('termination_name')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Termination Modal -->

    <!-- Delete Termination Modal -->
    <div wire:ignore.self class="modal custom-modal fade" id="deleteTerminationModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Termination</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <button wire:click="deleteTerminationData()" class="btn btn-primary continue-btn">Delete</button>
                            </div>
                            <div class="col-6">
                                <button wire:click="cancel()" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Termination Modal -->
</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#addTerminationModal').modal('hide');
            $('#editTerminationModal').modal('hide');
            $('#deleteTerminationModal').modal('hide');
        });

        window.addEventListener('show-edit-termination-modal', event =>{
            $('#editTerminationModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteTerminationModal').modal('show');
        });
    </script>
@endpush
