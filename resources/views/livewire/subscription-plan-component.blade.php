<div>
    <div>
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{__('Subscription Plans')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{__("Dashboard")}}</a></li>
                            <li class="breadcrumb-item active">{{__('Subscription Plans')}}</li>
                        </ul>
                    </div>
                        <div class="col-auto float-right ml-auto">
                            <button class="btn add-btn" data-toggle="modal" data-target="#addSubscriptionPlanModal"><i class="fa fa-plus"></i> {{__("Add Subscription Plans")}}</button>
                        </div>
                </div>
            </div>
            <!-- /Page Header -->

            @if (session()->has('message'))
                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                @endif
                @if (session()->has('error'))
                            <div class="alert alert-danger text-center">{{ session('error') }}</div>
                        @endif

            <div class="row">
            
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__("Name")}}</th>
                                <th>{{__("Price")}}</th>
                                <th>{{__("Frequency")}}</th>
                                <th>{{__("Trial Days")}}</th>
                                    <th class="text-right">{{__("Action")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subscription_plans as $subscription_plan)
                                @php($count= $loop->index + 1)
                                <tr class="holiday-upcoming">
                                    <td>{{ $count }}</td>
                                    <td>{{@$subscription_plan->name}}</td>
                                    <td>{{@$subscription_plan->currency .'   '. @$subscription_plan->price}}</td>
                                    <td>{{@$subscription_plan->frequency}}</td>
                                    <td>{{@$subscription_plan->trail_days}}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                        <button  wire:click="editSubscriptionPlan({{$subscription_plan->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</button>
                                                        <button  wire:click="deleteConfirmation({{ $subscription_plan->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__("Delete")}}</button>

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


        <!-- Add Holiday Modal -->
        <div wire:ignore.self class="modal custom-modal fade" id="addSubscriptionPlanModal" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__("Add Subscription Plan")}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="storeSubscriptionPlanModalData">
                            <div class="form-group">
                                <label>{{__("Name")}} {{__('En')}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" wire:model="name_en">
                                @error('name_en')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__("Name")}} {{__('Ar')}}<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" wire:model="name_ar">
                                @error('name_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__("Currency")}} <span class="text-danger">*</span></label>

                                <input class="form-control" type="text"  wire:model="currency">
                                @error('currency')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__("Price")}}<span class="text-danger">*</span></label>
                                @error('price')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                                <input class="form-control" type="text"  wire:model="price">
                            </div>
                            <div class="form-group">
                                <label>{{__("Frequency")}}<span class="text-danger">*</span></label>
                                <select class="form-control" wire:model="frequency">
                                    <option value="" hidden>{{__("Frequency")}}</option>
                                @foreach($frequencies as $frequencie)
                                 <option>{{$frequencie}}</option>
                                    @endforeach
                                    </select>
                                @error('frequency')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__("Trial Days")}}<span class="text-danger">*</span></label>
                                <input class="form-control" type="text"  wire:model="trail_days">
                                @error('trail_days')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="table-responsive m-t-15">
                                <table class="table table-striped custom-table">
                                    <thead>
                                    <tr>
                                        <th>{{__('Module Permission')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($modules as $module)
                                    <tr>
                                        <td>{{__($module->module_name)}}</td>

                                        <td>
                                        <div class="status-toggle">
                                            <input  type="checkbox" id="{{$module->module_name}}" class="check" checked="" value="{{$module->id}}" wire:model="module_plan">
                                            <label for="{{$module->module_name}}" class="checktoggle">checkbox</label>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">{{__("Submit")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Holiday Modal -->


        <!-- Edit Holiday Modal -->
        <div wire:ignore.self class="modal custom-modal fade" id="editSubscriptionPlanModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__("Edit Subscription Plan")}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="editSubscriptionPlanData">
                            <div class="form-group">
                                <label>{{__("Name")}} {{__('En')}}<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" wire:model="name_en">
                                @error('name_en')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__("Name")}} {{__('Ar')}}<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" wire:model="name_ar">
                                @error('name_ar')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__("Currency")}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="date_from" wire:model="currency">
                                @error('date_from')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__("Price")}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text"  wire:model="price">
                                @error('price')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{__("Frequency")}} <span class="text-danger">*</span></label>
                                <select class="form-control" wire:model="frequency">
                                    @foreach($frequencies as $frequencie)
                                        <option value="{{$frequencie}}">{{$frequencie}}</option>
                                    @endforeach
                                @error('frequency')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{__("Trial Days")}} <span class="text-danger">*</span></label>
                                <input class="form-control" type="text"  wire:model="trail_days">
                                @error('trail_days')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="table-responsive m-t-15">
                                <table class="table table-striped custom-table">
                                    <thead>
                                    <tr>
                                        <th>{{__('Module Permission')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                  
                                    @foreach($modules as $module)
                                    
                                    <tr>
                                        <td>{{__($module->module_name)}}</td>

                                        <td>
                                        <div class="status-toggle">
                                    
                                 
                                            <input  type="checkbox" id="{{$module->module_name}}" @if(in_array($module->id,$module_plan))  checked @endif  class="check" value="{{$module->id}}" wire:model="module_plan">
                                          
                                            <label for="{{$module->module_name}}" class="checktoggle">checkbox</label>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">{{__("Submit")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Holiday Modal -->

        <!-- Delete Holiday Modal -->
        <div wire:ignore.self class="modal custom-modal fade" id="deleteSubscriptionPlanModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>{{__("Delete Subscription Plan")}}</h3>
                            <p>{{__("Are you sure want to delete?")}}</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button wire:click="deleteSubscriptionPlanData()" class="btn btn-primary continue-btn">{{__("Delete")}}</button>
                                </div>
                                <div class="col-6">
                                    <button wire:click="cancel()" data-dismiss="modal" class="btn btn-primary cancel-btn">{{__("Cancel")}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Holiday Modal -->
    </div>

    @push('scripts')
        <script>
            window.addEventListener('close-modal', event =>{
                $('#addSubscriptionPlanModal').modal('hide');
                $('#editSubscriptionPlanModal').modal('hide');
                $('#deleteSubscriptionPlanModal').modal('hide');
            });

            window.addEventListener('show-edit-subscriptionPlan-modal', event =>{
                $('#editSubscriptionPlanModal').modal('show');
            });

            window.addEventListener('show-delete-confirmation-modal', event =>{
                $('#deleteSubscriptionPlanModal').modal('show');
            });
        </script>
    @endpush

</div>
