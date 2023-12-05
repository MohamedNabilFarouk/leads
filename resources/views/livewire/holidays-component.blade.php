<div>
    	<!-- Page Content -->
        <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">{{__("Holidays")}} {{Carbon\Carbon::now()->year}}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">{{__("Dashboard")}}</a></li>
                                <li class="breadcrumb-item active">{{__("Holidays")}}</li>
                            </ul>
                        </div>
                        @if(auth()->user()->can('holidays-create'))
                        <div class="col-auto float-right ml-auto">
                            <button class="btn add-btn" data-toggle="modal" data-target="#addHolidayModal"><i class="fa fa-plus"></i> {{__("Add Holiday")}}</button>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-md-12">
                        @if(request()->getHost()=='hr-saas.alefsoftware.com')
                        <form  method="post" action="{{url('allholiday')}}">
       @csrf
      
    
    <select @if(app()->getLocale()=='en')style="padding:5px;margin-right:5px;"@else style="padding:5px;margin-left:5px;right:-90px;" @endif class="col-md-9" name="country" required>
    <option value="">{{__('Select Country')}}</option>
    <option value="eg">Egypt</option>
    <option value="saudiarabian">Saudi Arabia</option>

</select>
        <button type="submit" style="padding: 5px;margin-bottom: 10px;" class="add-btn col-md-2">{{__('Import Holidays')}}</button>


    </form>



@else
<a style="padding: 10px;margin-bottom: 10px;" class="add-btn" href="{{url('/userholiday')}}">{{__('Import Holidays')}}</a>
@endif
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
                                        <th>{{__("Holiday Date From")}}</th>
                                        <th>{{__("Holiday Date To")}}</th>
                                        <!-- <th>{{__("country")}}</th> -->
                                        @if(auth()->user()->can('holidays-write') || auth()->user()->can('holidays-delete'))
                                        <th class="text-right">{{__("Action")}}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    use Carbon\Carbon;
                                    @endphp

                                    @foreach($holidays as $holiday)
                                    @php 
                                    $count= $loop->index + 1;
                                    @endphp
                                    <tr
                                   @if(Carbon::now() > $holiday->date_to)
                                    
                                    class="holiday-completed"
                                    @else
                                    class="holiday-upcoming"
                                    @endif
>
                                        <td>{{ $count }}</td>
                                        <td>{{$holiday->title_en}}</td>
                                        <td>{{$holiday->title_ar}}</td>
                                        <td>{{$holiday->date_from}}</td>
                                        <td>{{$holiday->date_to}}</td>
                                        <!-- <td>{{$holiday->country}}</td> -->
                                        @if(auth()->user()->can('holidays-write') || auth()->user()->can('holidays-delete'))
                                        @if(Carbon::now() < $holiday->date_to)
                                    

                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                   @if(auth()->user()->can('holidays-write'))
                                     <button wire:click="editHoliday({{$holiday->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</button>
                                 @endif
                                       @if(auth()->user()->can('holidays-delete'))
                                 <button  wire:click="deleteConfirmation({{ $holiday->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__("Delete")}}</button>
                                       @endif
                             </div>
                         </div>
                     </td>
                     @endif
                     @endif
                    
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
<div wire:ignore.self class="modal custom-modal fade" id="addHolidayModal" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
 <div class="modal-content">
     <div class="modal-header">
         <h5 class="modal-title">{{__("Add Holiday")}}</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="modal-body">
     <form wire:submit.prevent="storeHolidayData">
             <div class="form-group">
                 <label>{{__("Holiday Name")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="title">
                 @error('title')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
             @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Holiday Date From")}} <span class="text-danger">*</span></label>

                 <input class="form-control" type="text" id="date_from"  wire:model="date_from">
                 @error('date_from')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                 @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Holiday Date To")}} <span class="text-danger">*</span></label>
                 @error('date_to')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
             @enderror
                 <input class="form-control" type="text"  wire:model="date_to" id="date_to">
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
<div wire:ignore.self class="modal custom-modal fade" id="editHolidayModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
 <div class="modal-content">
     <div class="modal-header">
         <h5 class="modal-title">{{__("Edit Holiday")}}</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>
     <div class="modal-body">
         <form wire:submit.prevent="editHolidayData">
             <div class="form-group">
                 <label>{{__("Holiday Name")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" wire:model="title">
                 @error('title')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
             @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Holiday Date From")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text" id="date_from" wire:model="date_from">
                 @error('date_from')
                 <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
             @enderror
             </div>
             <div class="form-group">
                 <label>{{__("Holiday Date To")}} <span class="text-danger">*</span></label>
                 <input class="form-control" type="text"  wire:model="date_to" id="date_to">
                 @error('date_to')
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
<!-- /Edit Holiday Modal -->

<!-- Delete Holiday Modal -->
<div wire:ignore.self class="modal custom-modal fade" id="deleteHolidayModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
 <div class="modal-content">
     <div class="modal-body">
         <div class="form-header">
             <h3>{{__("Delete Holiday")}}</h3>
             <p>{{__("Are you sure want to delete?")}}</p>
         </div>
         <div class="modal-btn delete-action">
             <div class="row">
                 <div class="col-6">
                 <button wire:click="deleteHolidayData()" class="btn btn-primary continue-btn">{{__("Delete")}}</button>
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
$('#addHolidayModal').modal('hide');
$('#editHolidayModal').modal('hide');
$('#deleteHolidayModal').modal('hide');
});

window.addEventListener('show-edit-holiday-modal', event =>{
$('#editHolidayModal').modal('show');
});

window.addEventListener('show-delete-confirmation-modal', event =>{
$('#deleteHolidayModal').modal('show');
});
</script>
@endpush
