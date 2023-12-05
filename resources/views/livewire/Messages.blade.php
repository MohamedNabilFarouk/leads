<div>
    <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{__('Messages')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('Messages')}}</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->

    <div wire:ignore.self class="page-header">

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
                            <th>{{__('Email')}}</th>
                            <th>{{__("Subject")}} </th>
                            <th>{{__("Message")}} </th>
                            <th>{{__("Sent At")}} </th>
                            {{-- <th class="text-right">{{__('Action')}}</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages  as $m)
                            @php($count= $loop->index + 1)

                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$m->name}}</td>
                                <td>{{$m->email}}</td>
                                <td>{{$m->subject}}</td>
                                <td>{{$m->message}}</td>
                                <td>{{$m->created_at}}</td>
                                {{-- <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button  wire:click="editFeature({{$featureTitle->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                            <button  wire:click="deleteConfirmation({{ $featureTitle->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                        </div>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        </div>


</div>
