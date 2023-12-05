<div>
    <div>
        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{__('Regions')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{__("Dashboard")}}</a></li>
                            <li class="breadcrumb-item active">{{__('Regions')}}</li>
                        </ul>
                    </div>
                        <div class="col-auto float-right ml-auto">
                            <button class="btn add-btn" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> {{__("Add Region")}}</button>
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
                                <th>{{__("title")}}</th>
                                <th>{{__("title Ar")}}</th>
                                    <th class="text-right">{{__("Action")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($regions as $region)
                                @php($count= $loop->index + 1)
                                <tr class="holiday-upcoming">
                                    <td>{{ $count }}</td>
                                    <td>{{@$region->title_en}}</td>
                                    <td>{{@$region->title_ar}}</td>

                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                        <button  wire:click="editRegion({{$region->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__("Edit")}}</button>
                                                        <button  wire:click="deleteConfirmation({{ $region->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__("Delete")}}</button>

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


        <!-- Add region Modal -->
        <div wire:ignore.self class="modal custom-modal fade" id="addModal" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__("Add Region")}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="storeRegionData">
                            @include('livewire.Region.form')
                        </form>
                    </div>
                </div>
                </div>
        </div>
        <!-- /Add region Modal -->


        <!-- Edit region Modal -->
        <div wire:ignore.self class="modal custom-modal fade" id="editModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__("Edit Region")}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="editRegionData">
                                @include('livewire.Region.form')
                            </form>
                        </div>
                    </div>
                    </div>
        </div>
        <!-- /Edit region Modal -->

        <!-- Delete region Modal -->
        <div wire:ignore.self class="modal custom-modal fade" id="deleteModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>{{__("Delete Region")}}</h3>
                            <p>{{__("Are you sure want to delete?")}}</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button wire:click="deleteRegionData()" class="btn btn-primary continue-btn">{{__("Delete")}}</button>
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
        <!-- /Delete region Modal -->
    </div>

    @push('scripts')
        <script>
            window.addEventListener('close-modal', event =>{
                $('#addModal').modal('hide');
                $('#editModal').modal('hide');
                $('#deleteModal').modal('hide');
            });

            window.addEventListener('show-edit-modal', event =>{
                $('#editModal').modal('show');
            });

            window.addEventListener('show-delete-confirmation-modal', event =>{
                $('#deleteModal').modal('show');
            });
        </script>
    @endpush

</div>
