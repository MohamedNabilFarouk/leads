<div>
    	<!-- Page Content -->
        <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">{{__("Branches")}}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">{{__("Dashboard")}}</a></li>
                                <li class="breadcrumb-item active">{{__("Branches")}}</li>
                            </ul>
                        </div>
                        @if(auth()->user()->can('branches-create')) 
                        <div class="col-auto float-right ml-auto">
                            <button class="btn add-btn" data-toggle="modal" data-target="#addBranchModal"><i class="fa fa-plus"></i> {{__("Add Branch")}}</button>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-md-12">      



                        <div class="table-responsive">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__("Title En")}} </th>
                                        <th>{{__("Title Ar")}} </th>
                                        @if((auth()->user()->can('branches-write')) || (auth()->user()->can('branches-delete')))
                                        <th class="text-right">{{__("Action")}}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    use Carbon\Carbon;
                                    @endphp

                                    @foreach($branches as $branch)
                                    @php 
                                    $count= $loop->index + 1;
                                    @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{$branch->title}}</td>
                                        <td>{{$branch->title_ar}}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                @if(auth()->user()->can('branches-write'))
                                     <button wire:click="editBranch({{$branch->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</button>
                                     <a target="_blank" class="dropdown-item"  href="{{url('/'.app()->getLocale().'/employees')}}?branchID={{$branch->id}}">{{__("Branch employees")}}</a>
                                     @endif
                                     @if($branch->id != 1)
                                     @if(auth()->user()->can('branches-delete'))
                                     <button  wire:click="deleteConfirmation({{ $branch->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__("Delete")}}</button>
                                     @endif
                                     @endif
        
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


<!-- Add branch Modal -->
<div wire:ignore.self class="modal custom-modal fade" id="addBranchModal" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
 <div class="modal-content">
     <div class="modal-header">
         <h5 class="modal-title">{{__("Add Branch")}}</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="modal-body">
     <form wire:submit.prevent="storeBranchData">
             <div class="form-group">
                 <label>{{__("Branch Name")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="title">
                 @error('title')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Branch Name Ar")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="title_ar">
                 @error('title_ar')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("NFC ID")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="nfc_id">
                 @error('nfc_id')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Latitude")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="lat">
                 @error('lat')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Longitude")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="lng">
                 @error('lng')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("radius")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="radius">
                 @error('radius')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>

             <h6>Fingerprint Device info</h6>
             <div class="form-group">
                 <label>{{__("Device IP")}}</label>
                 <input class="form-control" type="text" wire:model="device_ip">
                 @error('device_ip')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Device Port")}}</label>
                 <input class="form-control" type="text" wire:model="device_port">
                 @error('device_port')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Model Name")}}</label>
                 <input class="form-control" type="text" wire:model="model_name">
                 @error('model_name')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="submit-section">
                 <button class="btn btn-primary submit-btn">{{__("Submit")}}</button>
             </div>
         </form>
     </div>
 </div>
</div>
</div>
<!-- /Add Branch Modal -->


<!-- Edit Branch Modal -->
<div wire:ignore.self class="modal custom-modal fade" id="editBranchModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
 <div class="modal-content">
     <div class="modal-header">
         <h5 class="modal-title">{{__("Edit Branch")}}</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="modal-body">
         <form wire:submit.prevent="editBranchData">
             <div class="form-group">
                 <label>{{__("Branch Name")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="title">
                 @error('title')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
             @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Branch Name Ar")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="title_ar">
                 @error('title')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
             @enderror
             </div>
             <div class="form-group">
                 <label>{{__("NFC ID")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="nfc_id">
                 @error('nfc_id')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Latitude")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="lat">
                 @error('lat')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Longitude")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="lng">
                 @error('lng')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("radius")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="radius">
                 @error('radius')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>

             <h6>Fingerprint Device info</h6>
             <div class="form-group">
                 <label>{{__("Device IP")}}</label>
                 <input class="form-control" type="text" wire:model="device_ip">
                 @error('device_ip')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Device Port")}}</label>
                 <input class="form-control" type="text" wire:model="device_port">
                 @error('device_port')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Model Name")}}</label>
                 <input class="form-control" type="text" wire:model="model_name">
                 @error('model_name')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                @enderror
             </div>
             <div class="submit-section">
                 <button class="btn btn-primary submit-btn">{{__("Submit")}}</button>
             </div>
         </form>
     </div>
 </div>
</div>
</div>
<!-- /Edit Branch Modal -->

<!-- Delete Branch Modal -->
<div wire:ignore.self class="modal custom-modal fade" id="deleteBranchModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
 <div class="modal-content">
     <div class="modal-body">
         <div class="form-header">
             <h3>{{__("Delete Branch")}}</h3>
             <p>{{__("Are you sure want to delete?")}}</p>
         </div>
         <div class="modal-btn delete-action">
             <div class="row">
                 <div class="col-6">
                 <button wire:click="deleteBranchData()" class="btn btn-primary continue-btn">{{__("Delete")}}</button>
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
<!-- /Delete Branch Modal -->
</div>

@push('scripts')
<script>
window.addEventListener('close-modal', event =>{
$('#addBranchModal').modal('hide');
$('#editBranchModal').modal('hide');
$('#deleteBranchModal').modal('hide');
});

window.addEventListener('show-edit-branch-modal', event =>{
$('#editBranchModal').modal('show');
});

window.addEventListener('show-delete-confirmation-modal', event =>{
$('#deleteBranchModal').modal('show');
});
</script>
@endpush
