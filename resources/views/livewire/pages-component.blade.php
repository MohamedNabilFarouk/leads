<div>
    <link rel="stylesheet" href="assets/plugins/summernote/dist/summernote-bs4.css">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{__('pages')}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{__('pages')}}</li>
                    </ul>
                </div>
            </div>

            <form wire:submit.prevent="editPageData">


            <div wire:ignore class="col-sm-12">
                <label>Description En</label>
                <div>
                    <textarea wire:model="description_en"
                              class="min-h-fit h-48 "
                              name="description_en"
                              id="editor">{!! $description_en !!}</textarea>
                </div>
                <label>Description Ar</label>

                <div>
                    <textarea  wire:model="description_ar"
                              class="min-h-fit h-48 "
                              name="description_ar"
                              id="editor1">{!! $description_ar !!}</textarea>
                </div>
{{--                        <div class="form-group">--}}
{{--                            <label>Description En</label>--}}
{{--                            <textarea class="form-control" wire:model.debounce.9999999ms="description_en" id="editor"></textarea>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Description Ar</label>--}}
{{--                            <textarea  class="form-control"  wire:model.debounce.9999999ms="description_ar" wire:ignore name="description_ar" wire:key="editor1">{!! $description_ar !!}</textarea>--}}
{{--                        </div>--}}


                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                            </div>
                    </form>

</div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>


{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create( document.querySelector( '#editor' ) )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create( document.querySelector( '#editor1' ) )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}

    @push('scripts')


        <script>

            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                    @this.set('description_en', editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#editor1'))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                    @this.set('description_ar', editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        </script>



    @endpush
</div>

