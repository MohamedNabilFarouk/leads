<div>
    @if (session()->has('message'))
        <div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif
    <form wire:submit.prevent="subscribeRequest">
        <div class="newsletter-inner">
            <input type="email" wire:model="email" class="form-control"  placeholder="{{__("Email")}}" required="">
            @error('email')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
            <button type="submit" class="newsletter-submit color-two gp-btn btn-circle">
                <span class="btn-text">{{__("Subscribe")}}</span>
                <i class="fa fa-circle-o-notch fa-spin"></i>
            </button>
        </div>

        <div class="form-result alert">
            <div class="content"></div>
        </div><!-- /.form-result-->
    </form>
</div>
