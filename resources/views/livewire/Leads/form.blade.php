
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{__("Name")}}</label>
            <input class="form-control" type="text" wire:model="name">
            @error('name')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{__("Email")}}</label>
            <input class="form-control" type="text" wire:model="email">
            @error('email')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{__("Phone")}}</label>
            <input class="form-control" type="text" wire:model="phone">
            @error('phone')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{__("Project")}}</label>
            <select class="form-control"  wire:model="project_id">
                <option>-</option>
                @foreach($this->projects as $p)
                <option value="{{$p->id}}">{{$p->title}}</option>
            @endforeach
            </select>
            @error('project_id')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-6" >
        <div class="form-group">
            <label>{{__("Assign")}}</label>
            <select multiple class="form-control" wire:model="assign_staff">
                <option value="">{{__("Select")}}</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            @error('assign_staff')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{__("Assign Members")}}</label>
            <div class="project-members">
                @foreach($users as $team)
                    @if(in_array($team->id,$assign_staff??[]))
                        <a href="#" data-toggle="tooltip" title="{{$team->name}}" class="avatar">
                            <img src="{{asset($team->photo)}}" alt class='user-r-image'>
                        </a>
                    @endif
                @endforeach

            </div>
        </div>
    </div>


</div>
<div class="row" >
    <div class="col-sm-6" >
        <div class="form-group" >
            <label>{{__("Status")}}</label>
            <select class="form-control" wire:model="status">
                <option readonly>{{__("Select")}}</option>
                @foreach($leads_status as $key=>$m)
                <option value="{{$key}}">{{$m[app()->getLocale()]}}</option>
               @endforeach
                {{-- <option>High</option>
                <option>Medium</option>
                <option>Low</option> --}}
            </select>
            @error('Status')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6" >
        <div class="form-group" >
            <label>{{__("Channel")}}</label>
            <select class="form-control" wire:model="channel">
                <option readonly>{{__("Select")}}</option>
                @foreach($leads_channel as $key=>$m)
                <option value="{{$key}}">{{$m[app()->getLocale()]}}</option>
               @endforeach
                {{-- <option>High</option>
                <option>Medium</option>
                <option>Low</option> --}}
            </select>
            @error('channel')
            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6" >
        <div class="form-group" >
            <label>{{__("Notes")}}</label>
            <textarea class="form-control" wire:model="note"></textarea>
        </div>
        </div>

</div>


<div class="submit-section">
    <button class="btn btn-primary submit-btn">{{__("Submit")}}</button>
</div>
