@extends('frontend.postad.index')

@section('title', __('step3'))

@section('post-ad-content')
 <!-- Steop 03 -->
 <div class="tab-pane fade show active" id="pills-advance" role="tabpanel" aria-labelledby="pills-advance-tab">
    <div class="dashboard-post__step02 step-information">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('frontend.post.step3.store') }}" method="POST" id="form-example-1" enctype="multipart/form-data">
            @csrf
            <div class="input-field--textarea">
                <x-forms.label name="ad_description" for="description" required="true"/>
                <textarea  onkeyup="countChars(this);" name="description" placeholder="{{ __('Descriptions') }}..." id="description" class="@error('description') border-danger @enderror">{!! old('description') !!}</textarea>
                <p style="display: none;" id="charNum">0 characters</p>
            </div>
            <div class="input-field--textarea">
                <x-forms.label name="features" for="features" />
                <div id="multiple_feature_part">
                    <div class="row">
                        <div class="col-lg-11">
                             <div class="input-field">
                                 <input name="features[]" type="text" placeholder="{{ __('features') }}" id="adname" class="@error('title') border-danger @enderror"/>
                             </div>
                        </div>
                        <div class="col-lg-1 mt-10 add_feature">
                         <a role="button" onclick="add_features_field()"
                         class="btn bg-primary btn-sm text-light"><i class="fas fa-plus"></i></a>
                        </div>
                     </div>
                </div>
            </div>
            <div class="input-field">
                <label class="active">{{ __('upload_photos') }}</label>
                <div id="multiple_image_upload" class="input-images-2" style="padding-top: .5rem;" ></div>
            </div>
            <div class="dashboard-post__ads-bottom">
                <div class="form-check">
                </div>
                <div class="dashboard-post__action-btns">
                    <a onclick="return confirm('Do you really want to go previous page? If you go then your step 3 data wont save!')" href="{{ route('frontend.post.step2.back') }}" class="btn btn--lg btn--outline">
                        {{ __('previous') }}
                    </a>
                    <button type="submit" class="btn btn--lg">
                        {{ __('post_ads') }}
                        <span class="icon--right">
                            <x-svg.right-arrow-icon />
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('frontend_style')
<link href="{{ asset('backend/plugins/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">
@endsection

@section('frontend_script')
    <script src="{{ asset('image_uploader/image-uploader.min.js') }}"></script>
    <script>
        $('.input-images-2').imageUploader({
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10,
            multiple: true,
        });
    </script>
    <script src="{{ asset('backend/plugins/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/plugins/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        // ads post
        $("#file-1").fileinput({
            theme: 'fas',
            showUpload: false,
            allowedFileExtensions: ['jpg', 'png', 'gif','jpeg'],
            previewFileIcon: '<i class="fas fa-file"></i>',
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            maxFileCount: 10,
            minFileCount: 0,
            validateInitialCount: true,
            showPreview: true,
            showRemove: true,
            showCancel: true,
            showCaption: false,
            showBrowse: true,
            browseOnZoneClick: true,
            validateInitialCount: true,
            initialPreviewAsData: true,
        });

        // feature field
        function add_features_field() {
            $("#multiple_feature_part").append(`
                <div class="row">
                    <div class="col-lg-10">
                            <div class="input-field">
                                <input name="features[]" type="text" placeholder="Feature" id="adname" class="@error('title') border-danger @enderror"/>
                            </div>
                    </div>
                    <div class="col-lg-2 mt-10">
                        <button onclick="remove_single_field()" id="remove_item" class="btn btn-sm bg-danger text-light"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            `);
        }

        $(document).on("click", "#remove_item", function() {
            $(this).parent().parent('div').remove();
        });
    </script>
    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/venobox.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>
    <script>
        function adFilterFunction(slug) {
            $('#adFilterInput').val(slug);
            $('#adFilterForm').submit();
        }
        $(document).ready(function() {
            // ===== Select2 ===== \\
            $('#town').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ?
                    $(this).data('width') : $(this).hasClass('w-100') ?
                    '100%' : 'style',
                placeholder: 'By Region',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
        });

        function countChars(obj){
            $("#charNum").show();

            var strLength = obj.value.length;

            if(strLength < 150){
                document.getElementById("charNum").innerHTML = '<span style="color: red;">The description must be at least 150 characters.</span>';
            }else{
                $("#charNum").hide();
            }


        }
    </script>
@endsection
