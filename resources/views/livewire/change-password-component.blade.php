<div>
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">{{__('Change Password')}}</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <form wire:submit.prevent="storeChangePasswordData">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif
                    <div class="form-group">
                            <label>{{__('Old password')}}</label>
                            <input type="password" class="form-control" wire:model="old_password">
                        </div>
                        @error('old_password')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label>{{__('New password')}}</label>
                            <input type="password" class="form-control" wire:model="new_password">
                        </div>
                        @error('new_password')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                        <div class="form-group">
                            <label>{{__('Confirm password')}}</label>
                            <input type="password" class="form-control" wire:model="new_password_confirmation">
                        </div>
                        <div class="submit-section">
                            <button  class="btn btn-primary submit-btn">{{__('Update Password')}}</button>
                        </div>
                    </for>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

</div>
