<div>
    <!-- Page Content -->
    <div class="content container-fluid mt-5">
        <div class="row">
        @if (session()->has('message'))
                    <div class="alert alert-success text-center col-md-12">{{ session('message') }}</div>
                @endif
            <div class="col-md-8 offset-md-2">
                <form wire:submit.prevent="editMail" autocomplete="off">

                {{--                    <div class="form-group">--}}
{{--                        <div class="form-check form-check-inline">--}}
{{--                            <input class="form-check-input" type="radio" name="mailoption" id="phpmail" value="option1">--}}
{{--                            <label class="form-check-label" for="phpmail">PHP Mail</label>--}}
{{--                        </div>--}}
{{--                        <div class="form-check form-check-inline">--}}
{{--                            <input class="form-check-input" type="radio" name="mailoption" id="smtpmail" value="option2">--}}
{{--                            <label class="form-check-label" for="smtpmail">SMTP</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <h4 class="page-title">{{__('Email Settings')}}</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('Email From Address')}}</label>
                                <input class="form-control" type="email" wire:model="email_from_address" required>
                                @error('email_from_address')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('Email From Name')}}</label>
                                <input class="form-control" type="text" wire:model="email_from_name" required>
                                @error('email_from_name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h4 class="page-title m-t-30">{{__('SMTP Email Settings')}}</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('SMTP HOST')}}</label>
                                <input class="form-control" type="text" wire:model="smtp_host" required>
                                @error('smtp_host')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('SMTP USER')}}</label>
                                <input class="form-control" type="text" wire:model="smtp_user" required>
                                @error('smtp_user')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('SMTP PASSWORD')}}</label>
                                <input class="form-control" type="password" wire:model="smtp_password" required>
                                @error('smtp_password')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('SMTP PORT')}}</label>
                                <input class="form-control" type="text" wire:model="smtp_port" required>
                                @error('smtp_port')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div wire:ignore class="form-group">
                                <label>{{__('SMTP Security')}}</label>
                                <select class="form-control" wire:model="smtp_security" required>
                                    <option value="">{{__('Select')}} {{__('SMTP Security')}} </option>
                                    <option value="SSL">SSL</option>
                                    <option value="TLS">TLS</option>
                                </select>
                                @error('smtp_port')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{__('SMTP Authentication Domain')}}</label>
                                <input class="form-control" type="text" wire:model="smtp_authentication_domain">
                            </div>
                        </div>
                    </div>
                    @if(auth()->user()->can('email-setting-write'))
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">{{__('Save')}}</button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>
