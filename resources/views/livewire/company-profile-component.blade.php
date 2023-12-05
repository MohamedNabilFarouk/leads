<div>
    @php
    // dd($company);
        //    dd(array_key_exists($employee->religion, $religions) ? $religions[$employee->religion][app()->getLocale()] : "-");
    // dd($gender[$employee->gender]);
    // foreach($gender as $key=> $g){

    //     // echo $g[app()->getLocale()];
    //                 // <option   echo ($employee->gender== $key) ?'selected':''; value="{{$key}}">{{$g[app()->getLocale()]}}</option>
    //             }
    @endphp
        <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">{{__('Company Profile')}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Company')}}{{__('Profile')}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img alt="profile_photo" src="{{asset($company->photo) }}" style="border-radius: 0;" onerror="this.onerror=null;this.src='{{ asset('photos/default_user.jpg') }}';" wire:ignore></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">{{ $company->client_name ?? '' }}</h3>
                                        <div class="small doj text-muted"> {{ $company->slug ?? '' }}</div>
                                        <div class="small doj text-muted"> {{ $company->country ?? '' }}</div>

                                        <div class="small doj text-muted">{{__('Date of Join')}} : @php echo date('d M Y', strtotime($company->created_at ?? ''));@endphp</div>
                                    </div>
                                    <div class="staff-id">{{__('Business Registration Number')}}: {{  $company->business_registration_number ?? '' }}</div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li style="display: flex;">
                                            <div class="title">{{__('Company Name')}}:</div>
                                            <div class="text">{{  $company->company_name ?? '' }}</div>
                                        </li>

                                        <li style="display: flex;">
                                            <div class="title">{{__('Company Business')}}:</div>
                                            <div class="text">{{  $company->company_business ?? '' }}</div>

                                        </li>


                                        <li style="display: flex;">
                                            <div class="title">{{__('Employees Number')}}:</div>
                                            <div class="text">{{  $company->employees_number ?? '' }}</div>
                                        </li>

                                        <li style="display: flex;">
                                            <div class="title">{{__('Currency')}}:</div>
                                            <div class="text">{{  $company->currency?? '' }}</div>
                                        </li>

                                        <li style="display: flex;">
                                            <div class="title">{{__('Phone')}}:</div>
                                            <div class="number"><a href="tel:{{ $company->phone ?? ''}}">{{ $company->phone ?? ''}}</a></div>
                                        </li>

                                        <li style="display: flex;">
                                            <div class="title">{{__('Email')}}:</div>
                                            <div class="text"><a href="mailto:{{ $company->email ?? '' }}">{{ $company->email ?? '' }}</a></div>
                                        </li>



                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if(auth()->user()->can('company-profile-write'))
                        <div class="pro-edit"><button  wire:click="editClient({{$company->client_id}})" class="edit-icon"><i class="fa fa-pencil"></i></button></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- plan --}}

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title mt-5">{{__('Subscription Plans')}}</h3>

                </div>
            </div>
        </div>
        <!-- /Page Header -->
{{--
        <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="profile-view">
                        <div class="profile-img-wrap">

                        </div>
                        <div class="profile-basic">
                            <div class="row">







                                <div class="col-md-2">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">{{ $company->name ?? '' }}</h3>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <ul class="personal-info">
                                        <li style="display: flex;">
                                            <div class="title">{{__('Starting Date')}}:</div>
                                            <div class="number">{{ \Carbon\Carbon::parse($company->starting_date)->format('Y-m-d')  ?? ''}}</div>

                                        </li>

                                        <li style="display: flex;">
                                            <div class="title">{{__('Complete Date')}}:</div>
                                            <div class="text">{{ \Carbon\Carbon::parse($company->end_date)->format('Y-m-d')  ?? '' }}</div>
                                        </li>

                                        <li style="display: flex;">
                                            <div class="title">{{__('Payment Status')}}:</div>
                                            <div class="text">@if($company->is_paid == '1') {{__('Paid')}} @else {{__("Not Paid")}}@endif</div>
                                        </li>
                                        <li style="display: flex;">
                                            <div class="title">{{__('Total')}}:</div>
                                            <div class="text">{{  $company->total ?? '' }}   {{$company->currency}}</div>

                                        </li>



                                    </ul>
                                </div>
                                    {{-- count --}}
                               {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                    <div class="card dash-widget">

                                        <div class="card-body">
                                            <span class="dash-widget-icon"><i class="fa fa-calendar"></i></span>
                                            <div class="dash-widget-info">
                                                <h3>{{ $diffInMonths }}</h3>
                                               <span>{{__("Month")}} {{__("Remain")}}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                    {{-- end count --}}
                         {{--   </div>
                        </div>
                        <div class="pro-edit"><button  wire:click="" class="edit-icon"><i class="fa fa-pencil"></i></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

{{-- end plan --}}


{{-- new design --}}
{{-- @dd($plans) --}}

	<!-- Plan Tab Content -->
    <div class="tab-content mb-5">

        <!-- Monthly Tab -->
        <div class="tab-pane fade active show" id="monthly">
            <div class="row mb-30 equal-height-cards">

                @foreach($plans as $p)
                
                <div class="col-md-4">
                    <div class="card pricing-box">
                        <div class="card-body d-flex flex-column">
                            <div class="mb-2">
                                <h4>@if(app()->getLocale()=='en'){{$p->name_en}} @else {{$p->name_ar}} @endif</h4>
                                <span class="display-4">@if(app()->getLocale() == 'en'){{$p->price.'   '. $p->currency}} @else {{$p->currency.'   '. $p->price}} @endif</span>
                            </div>
                            <ul>
                                @foreach($p->permissions as $module)
                                {{-- <li><i class="fa fa-check"></i> <b>{{$p->frequency}}</b></li>
                                <li><i class="fa fa-check"></i> {{$p->trail_days}} </li>
                                <li><i class="fa fa-check"></i> {{__('Unlimited Users')}}</li> --}}

                                <li><i class="fa fa-check"></i> {{$module->module_name}}</li>
                                @endforeach
                            </ul>
                            @if($p->id == $company->plan_id)

                            <a href="#" class="btn btn-lg  btn-success mt-auto" style="background-color:#55ce63 !important">{{__("Current Plan")}}</a>
                            @else
                            @if(auth()->user()->can('company-profile-write'))  <a href="{{url('/pricing-plan-subscribe',\Crypt::encrypt($p->id))}}" class="btn btn-lg btn-outline-secondary mt-auto">{{__("Upgrade")}}</a> @endif
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <!-- /Monthly Tab -->



    </div>
    <!-- /Plan Tab Content -->



    	<!-- Plan Details -->
        <div class=" row mb-5">
            <div class="col-md-12" style="margin-bottom: 100px;">
                <div class="card card-table mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">{{__("Plan Transactions")}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>{{__('Plan')}}</th>
                                        <th>{{__('Starting Date')}}</th>
                                        <th>{{__('Complete Date')}}</th>
                                        <th>{{__("Payment Status")}}</th>
                                        <th>{{__('Total')}}</th>
                                        <th>{{__("Remain")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$company->name}}</td>
                                        <td>{{ \Carbon\Carbon::parse($company->starting_date)->format('Y-m-d')  ?? '' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($company->end_date)->format('Y-m-d')  ?? '' }}</td>
                                        <td>@if($company->is_paid == '1') {{__('Paid')}} @else {{__("Not Paid")}}@endif</td>
                                        <td>{{$company->total}}</td>
                                        <td>{{ $diffInMonths }}
                                            <span>{{__("Month")}}</span>
                                        </td>

                                        {{-- <td><a class="btn btn-primary btn-sm" href="javascript:void(0);">Change Plan</a></td> --}}
                                    </tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Plan Details -->

{{-- end new design --}}






    </div>
    <!-- /Page Content -->

    <!-- Profile Modal -->
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

                <form id="upload-form">
                    @csrf
                    <input hidden="hidden" name="id" value="{{$company->client_id}}">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="profile-img-wrap edit-img" id="photo-container">
                                <img class="inline-block" src="{{asset($company->photo) }}" alt="Photo preview" id="photo-preview">
                                <div class="fileupload btn">
                                    <span class="btn-text">{{__('edit')}}</span>
                                    <input class="upload" type="file" name="photo" accept="image/*" id="photo-input">
                                </div>
                            </div>
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
                            <div class="form-group">
                                <label class="col-form-label">{{__('Lat')}} <span class="text-danger">*</span></label>
                                <input class="form-control floating" type="text" wire:model="lat" required>
                                @error('lat')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('Lng')}} <span class="text-danger">*</span></label>
                                <input class="form-control floating" type="text" wire:model="lng" required>
                                @error('lng')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('Radius')}} <span class="text-danger">*</span></label>
                                <input class="form-control floating" type="text" wire:model="radius" required>
                                @error('radius')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">{{__('NFC ID')}} <span class="text-danger">*</span></label>
                                <input class="form-control floating" type="text" wire:model="nfc_id" required>
                                @error('nfc_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">


                            <div class="form-group task-board-color">
                                <label>{{__('Color')}}</label>
                                <div class="board-color-list">

                                    <label class="board-control " style="background:rgb(253, 253, 253); border: 1px solid black;" >
                                        <input name="radio" type="radio" class="board-control-input" wire:model='theme_color' value="Light" >
                                        <span class="board-indicator" ></span>
                                    </label>

                                    <label class="board-control" style="background:black;">
                                        <input name="radio" type="radio" class="board-control-input" wire:model='theme_color' value="Dark">
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control " style="background: #b63b64" >
                                        <input name="radio" type="radio" class="board-control-input" wire:model='theme_color' value="Maroon">
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control " style="background:orange;">
                                        <input name="radio" type="radio" class="board-control-input" wire:model='theme_color' value="Orange">
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control " style="background:blue;">
                                        <input name="radio" type="radio" class="board-control-input" wire:model='theme_color' value="Blue">
                                        <span class="board-indicator"></span>
                                    </label>
                                    <label class="board-control board-purple">
                                        <input name="radio" type="radio" class="board-control-input" wire:model='theme_color' value="Purple">
                                        <span class="board-indicator"></span>
                                    </label>
                                </div>
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
<!-- /Edit Client Modal -->
    <!-- /Profile Modal -->



</div>




</div>








</div>
<!-- /Page Wrapper -->
</div>

@push('scripts')

<script>
    window.addEventListener('close-modal', event =>{

        $('#editClientModal').modal('hide');

    });

    window.addEventListener('show-edit-client-modal', event =>{
        $('#editClientModal').modal('show');
    });
</script>




    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    <script>
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
                                        $('#photo-preview').attr('src', data.path);

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
