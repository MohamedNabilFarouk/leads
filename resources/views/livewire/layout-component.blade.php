<div class="container mt-3">
    <div class="mb-3">
    <button wire:click="toggle('section_one')"   class="{{  $show == "section_one" ? "test" : "" }}"     style="background: none;border: none;">Section One  </button>
    <button wire:click="toggle('section_two')"   class="{{  $show == "section_two" ? "test" : "" }}"     style="background: none;border: none;">Section Two  </button>
    <button wire:click="toggle('section_three')" class="{{  $show == "section_three" ? "test" : "" }}"   style="background: none;border: none;">Section Three</button>
    <button wire:click="toggle('section_four')"  class="{{  $show == "section_four" ? "test" : "" }}"    style="background: none;border: none;">Section Four </button>
    <button wire:click="toggle('section_five')"  class="{{  $show == "section_five" ? "test" : "" }}"    style="background: none;border: none;">Section Five </button>
    <button wire:click="toggle('section_six')"   class="{{  $show == "section_six" ? "test" : "" }}"     style="background: none;border: none;">Section Six </button>
    <button wire:click="toggle('contact_us')"   class="{{  $show == "contact_us" ? "test" : "" }}"     style="background: none;border: none;">Contact Us </button>
    {{-- <button wire:click="toggle('messages')"   class="{{  $show == "messages" ? "test" : "" }}"     style="background: none;border: none;">Messages </button> --}}

    </div>
    <style>
        .test{
            text-decoration: underline;
            text-decoration-color: #6571ff;
            text-underline-offset: 9px;
        }
        .test1:hover{
            background: red;
            border: none;
        }
    </style>
    @if($show=='section_one')

        <form method="POST" action="/front_image" enctype="multipart/form-data" id="upload-form">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <img style="width: 150px;" class="inline-block" src="{{asset($image_one)}}" alt="Photo preview" id="photo-preview">
                    <div class="form-group">
                        <label class="col-form-label">Image <span class="text-danger">*</span></label>
                        <input class="form-control upload" type="file" name="photo" accept="image/*" id="photo-input">
                        <input type="hidden" name="section_no" value="{{$show}}">


                    </div>
{{--                    <div class="profile-img-wrap edit-img" id="photo-container">--}}
{{--                        <img class="inline-block" src="" alt="Photo preview" id="photo-preview">--}}
{{--                        <div class="fileupload btn">--}}
{{--                            <span class="btn-text">{{__('edit')}}</span>--}}
{{--                            <input class="upload" type="file" name="photo" accept="image/*" id="photo-input">--}}
{{--                        </div>--}}
                    </div>
                </div>
        </form>

                                    <form wire:submit.prevent="storeSectionOneData" enctype="multipart/form-data" autocomplete="off">
                                        <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Title En <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" wire:model="title_en_one" required>

                                        @error('title_en_one')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Title Ar <span class="text-danger">*</span></label>
                                            <input class="form-control floating" type="text" wire:model="title_ar_one" required>

                                        @error('title_en_one')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Button Name En <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text"  wire:model="button_name_en_one">
                                            @error('password_confirmation')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Button Name Ar <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text"  wire:model="button_name_ar_one">
                                            @error('password_confirmation')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">link <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text"  wire:model="link_one">
                                            @error('password_confirmation')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox"  wire:model="active_one">
                                            <label class="col-form-label">Active</label>
{{--                                            @error('password_confirmation')--}}
{{--                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>--}}
{{--                                            @enderror--}}
                                        </div>
                                    </div>
                                </div>

                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
                                </div>
                            </form>
    @endif
    @if($show=='section_three')
        <form wire:submit.prevent="storeSectionThreeData" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Title En <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="title_en_three">
                        @error('slug')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Title Ar <span class="text-danger">*</span></label>
                        <input class="form-control floating" type="text" wire:model="title_ar_three">
                        @error('email')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Description En <span class="text-danger">*</span> </label>
                        <textarea class="form-control"  wire:model="description_en_three"></textarea>
                        @error('phone')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Description Ar <span class="text-danger">*</span></label>
                        <textarea class="form-control" wire:model="description_ar_three"></textarea>
                        @error('password')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="checkbox"  wire:model="active_three">
                        <label class="col-form-label">Active</label>
                        @error('password_confirmation')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="submit-section">
                <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
            </div>
        </form>

                <div class="page-header">

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
                                        <th>Icon</th>
                                        <th>Title En</th>
                                        <th>Title Ar</th>
                                        <th class="text-right">{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($featureTitles as $featureTitle)
                                        @php($count= $loop->index + 1)

                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{{$featureTitle->icon}}</td>
                                            <td>{{$featureTitle->title_en}}</td>
                                            <td>{{$featureTitle->title_ar}}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button  wire:click="editFeature({{$featureTitle->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                                        <button  wire:click="deleteConfirmation({{ $featureTitle->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{--                    {{ $client->links('pagination::bootstrap-5') }}--}}
                            </div>
                        </div>
                    </div>
    @endif
    @if($show=='section_four')
        <form wire:submit.prevent="storeSectionFourData" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Title En <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="title_en_four">
                        @error('slug')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Title Ar <span class="text-danger">*</span></label>
                        <input class="form-control floating" type="text" wire:model="title_ar_four">
                        @error('email')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Description En <span class="text-danger">*</span> </label>
                        <textarea class="form-control"  wire:model="description_en_four"></textarea>
                        @error('phone')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Description Ar <span class="text-danger">*</span></label>
                        <textarea class="form-control" wire:model="description_ar_four"></textarea>
                        @error('password')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="checkbox"  wire:model="active_four">
                        <label class="col-form-label">Active</label>
                        @error('password_confirmation')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="submit-section">
                <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
            </div>
        </form>
    @endif
    @if($show=='section_five')
        <form wire:submit.prevent="storeSectionFiveData" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Title En <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="title_en_five">
                        @error('slug')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Title Ar <span class="text-danger">*</span></label>
                        <input class="form-control floating" type="text" wire:model="title_ar_five">
                        @error('email')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Description En <span class="text-danger">*</span> </label>
                        <textarea class="form-control"  wire:model="description_en_five"></textarea>
                        @error('phone')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Description Ar <span class="text-danger">*</span></label>
                        <textarea class="form-control" wire:model="description_ar_five"></textarea>
                        @error('password')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="checkbox"  wire:model="active_five">
                        <label class="col-form-label">Active</label>
                        @error('password_confirmation')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="submit-section">
                <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
            </div>
        </form>
    @endif
    @if($show=='section_six')
        <form wire:submit.prevent="storeSectionSixData" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Title En <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="title_en_six">
                        @error('slug')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Title Ar <span class="text-danger">*</span></label>
                        <input class="form-control floating" type="text" wire:model="title_ar_six">
                        @error('email')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Description En <span class="text-danger">*</span> </label>
                        <textarea class="form-control"  wire:model="description_en_six"></textarea>
                        @error('phone')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Description Ar <span class="text-danger">*</span></label>
                        <textarea class="form-control" wire:model="description_ar_six"></textarea>
                        @error('password')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Button Name En <span class="text-danger">*</span></label>
                        <input class="form-control" type="text"  wire:model="button_name_en_six">
                        @error('password_confirmation')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Button Name Ar <span class="text-danger">*</span></label>
                        <input class="form-control" type="text"  wire:model="button_name_ar_six">
                        @error('password_confirmation')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">link <span class="text-danger">*</span></label>
                        <input class="form-control" type="text"  wire:model="link_six">
                        @error('password_confirmation')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="checkbox"  wire:model="active_six">
                        <label class="col-form-label">Active</label>
                        @error('password_confirmation')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="submit-section">
                <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
            </div>
        </form>
    @endif
    @if($show=='section_two')
        <form wire:submit.prevent="storeSectionTwoData" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Title En <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="title_en_two">
                        @error('slug')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-form-label">Title Ar <span class="text-danger">*</span></label>
                        <input class="form-control floating" type="text" wire:model="title_ar_two">
                        @error('email')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="checkbox"  wire:model="active_two">
                    <label class="col-form-label">Active</label>
                    @error('password_confirmation')
                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="submit-section mb-3">
                <button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
            </div>
        </form>
        <div class="page-header">
            <div class="row align-items-center">
        <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_feature"><i class="fa fa-plus"></i> Add Feature</a>
                    </div>
    </div>
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
                            <th>Icon</th>
                            <th>Title En</th>
                            <th>Title Ar</th>
                            <th class="text-right">{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($features as $feature)
                            @php($count= $loop->index + 1)

                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$feature->icon}}</td>
                                <td>{{$feature->title_en}}</td>
                                <td>{{$feature->title_ar}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button  wire:click="editFeature({{$feature->id}})" class="dropdown-item" ><i class="fa fa-pencil m-r-5"></i> {{__('Edit')}}</button>
                                            <button  wire:click="deleteConfirmation({{ $feature->id }})" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> {{__('Delete')}}</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{--                    {{ $client->links('pagination::bootstrap-5') }}--}}
                </div>
            </div>
        </div>

    @endif
    @if($show=='contact_us')

<form wire:submit.prevent="contactStore" enctype="multipart/form-data" autocomplete="off">
    <div class="row">
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">title En: <span class="text-danger">*</span></label>
        <input class="form-control" type="text" wire:model="contact_title_en">
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">title Ar: <span class="text-danger">*</span></label>
        <input class="form-control" type="text" wire:model="contact_title_ar">
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">phone: <span class="text-danger">*</span></label>
        <input class="form-control" type="text" wire:model="contact_phone">
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">email: <span class="text-danger">*</span></label>
        <input class="form-control" type="text" wire:model="contact_email">
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">Country en: <span class="text-danger">*</span></label>
        <input class="form-control" type="text" wire:model="country1_en">
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">Country Ar: <span class="text-danger">*</span></label>
        <input class="form-control" type="text" wire:model="country1_ar">
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">Country 2 en: <span class="text-danger">*</span></label>
        <input class="form-control" type="text" wire:model="country2_en">
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">Country 2 Ar: <span class="text-danger">*</span></label>
        <input class="form-control" type="text" wire:model="country2_ar">
    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">Address en: <span class="text-danger">*</span></label>
        <textarea class="form-control"  wire:model="contact_address_en" required></textarea>

    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">Address Ar: <span class="text-danger">*</span></label>
        <textarea class="form-control"  wire:model="contact_address_ar" required></textarea>

    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">Address en 2: <span class="text-danger">*</span></label>
        <textarea class="form-control"  wire:model="contact_address2_en" required></textarea>

    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">Address Ar 2: <span class="text-danger">*</span></label>
        <textarea class="form-control"  wire:model="contact_address2_ar" required></textarea>

    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label class="col-form-label">Map: <span class="text-danger">*</span></label>
        <textarea class="form-control"  wire:model="contact_map" required></textarea>

    </div>
</div>
<div class="col-sm-6">
    <div class="form-group">
       {!! $contact_map !!}

    </div>
</div>


</div>
<div class="submit-section">
<button class="btn btn-primary submit-btn">{{__('Submit')}}</button>
</div>
</form>

@endif





@if($show=='messages')

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
                        <th>Name</th>
                        <th>email</th>
                        <th>subject </th>
                        <th>Message </th>
                        <th>Sent At </th>
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

@endif



 <!-- Edit Department Modal -->
 <div wire:ignore.self class="modal custom-modal fade" id="editFeatureModal"  tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Feature</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">



                    <form method="POST" action="/feature_image" enctype="multipart/form-data" id="feature_upload-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label">Image <span class="text-danger">*</span></label>
                                    <input class="form-control upload" type="file" name="photo" accept="image/*" id="feature_photo-input">
                                    <input type="hidden" name="freature_id" value="{{$feature_edit_id}}">
                                </div>
                            </div>
                        </div>
                    </form>
                    <form wire:submit.prevent="editFeatureData">
                <div class="form-group">
                            <label> Icon <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="icon" required>
                                    <!-- @error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror -->
                        </div>
                        <div class="form-group">
                            <label> Title En <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" wire:model="feature_title_en" required>
                                    <!-- @error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror -->
                        </div>
                    <div class="form-group">
                        <label>Title Ar<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="feature_title_ar" required>
                        <!-- @error('name_ar')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror -->
                    </div>
                    <div class="form-group">
                        <label>Description En<span class="text-danger">*</span></label>
                        <textarea class="form-control"  wire:model="feature_description_en" required></textarea>
                        <!-- @error('name_ar')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror -->
                    </div>
                    <div class="form-group">
                        <label>Description Ar<span class="text-danger">*</span></label>
                        <textarea class="form-control"  wire:model="feature_description_ar" required></textarea>
                        <!-- @error('name_ar')
                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror -->
                    </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Department Modal -->



        </div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#add_feature').modal('hide');
            $('#editFeatureModal').modal('hide');
            $('#deleteFeatureModal').modal('hide');
        });

        window.addEventListener('show-edit-feature-modal', event =>{
            $('#editFeatureModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteFeatureModal').modal('show');
        });
    </script>
                    <script>
                        $(document).ready(function() {
                            $('#feature_photo-input').on('change', function() {

                                var formData = new FormData($('#feature_upload-form')[0]);
                                $.ajax({
                                    url: '/feature_image',
                                    type: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(data) {
                                        console.log(data);
                                        $('#feature_photo-preview').attr('src', data.path);

                                    },
                                    error: function(data){
                                        var errors = data.responseJSON;
                                        console.log(errors);
                                    }
                                });
                            });
                        });

                        $(document).ready(function() {
                            $('#photo-input').on('change', function() {

                                var formData = new FormData($('#upload-form')[0]);
                                $.ajax({
                                    url: '/front_image',
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

