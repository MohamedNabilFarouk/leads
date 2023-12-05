
                <div class="form-group">
                    <label>{{__("Name")}} {{__('En')}} <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" wire:model="title_en">
                    @error('title_en')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{__("Name")}} {{__('Ar')}}<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" wire:model="title_ar">
                    @error('title_ar')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">{{__("Submit")}}</button>
                </div>

