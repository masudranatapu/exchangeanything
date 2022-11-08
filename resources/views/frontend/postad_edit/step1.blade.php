@extends('frontend.postad.index')

@section('title')
    {{ __('edit_ad') }} ({{ __('steps01') }}) - {{ $ad->title }}
@endsection

@section('post-ad-content')
    <!-- Step 01 -->
    <div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab">
        <div class="dashboard-post__information step-information">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('frontend.post.update', $ad->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="dashboard-post__information-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="Title" for="Title" required="true" />
                                <input onkeyup="countChars(this);" required value="{{ $ad->title }}" name="title"
                                    type="text" placeholder="{{ __('ad_name') }}" id="adname"
                                    class="@error('title') border-danger @enderror" />
                                <p style="display: none;" id="charNum">0 characters</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-select">
                                <x-forms.label name="category" for="allCategory" required="true" />
                                <select required name="category_id" id="ad_category"
                                    class="form-control select-bg @error('category_id') border-danger @enderror">
                                    <option value="" hidden>{{ __('By Category') }}</option>
                                    @foreach ($categories as $category)
                                        <option {{ $category->id == $ad->category_id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="input-select">
                                <x-forms.label name="subcategory" for="subcategory" required="true" />
                                <select name="subcategory_id" id="ad_subcategory"
                                    class="form-control select-bg @error('subcategory_id') border-danger @enderror">
                                    <option value="" selected>{{ __('select_subcategory') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-select">
                                <x-forms.label name="brand" for="brand" />
                                <select name="brand_id" id="brandd"
                                    class="form-control select-bg @error('brand_id') border-danger @enderror">
                                    <option value="" hidden>{{ __('select_brand') }}</option>
                                    @foreach ($brands as $brand)
                                        <option {{ $brand->id == $ad->brand_id ? 'selected' : '' }}
                                            value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="model" for="modell" />
                                <input value="{{ $ad->model ?? '' }}" name="model" type="text"
                                    placeholder="{{ __('model') }}" id="modell"
                                    class="@error('model') border-danger @enderror" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-select">
                                <x-forms.label name="condition" for="conditionss" required="true" />
                                <select required name="condition" id="conditionss"
                                    class="form-control select-bg @error('condition') border-danger @enderror">
                                    <option {{ $ad->condition == 'new' ? 'selected' : '' }} value="new">
                                        {{ __('new') }}</option>
                                    <option {{ $ad->condition == 'used' ? 'selected' : '' }} value="used">
                                        {{ __('used') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="authenticity" for="authenticityy" />
                                <select name="authenticity" id="authenticityy" class="form-control select-bg @error('authenticity') border-danger @enderror">
                                    @isset($ad->condition)
                                    <option {{ $ad->authenticity == 'original'? 'selected':'' }} value="original">{{ __('original') }}</option>
                                    <option {{ $ad->authenticity == 'refurbished'? 'selected':'' }} value="refurbished">{{ __('refurbished') }}</option>
                                    @else
                                    <option value="original">{{ __('original') }}</option>
                                    <option value="refurbished">{{ __('refurbished') }}</option>
                                    @endisset
                                </select>
                            </div>
                        </div>

                         <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="price" for="price" required="true" />($)
                                <input value="{{ $ad->price }}" name="price" type="number" min="1" placeholder="{{ __('price') }}" id="price"  class="@error('price') border-danger @enderror"/ step="any">
                            </div>
                        </div>
                    </div>

                    

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-select">
                                <x-forms.label name="country" for="cityy" required="true" />
                                <select name="city_id" id="cityy"
                                    class="form-control select-bg @error('city_id') border-danger @enderror">
                                    <option value="" selected>{{ __('select_country') }}</option>
                                    @foreach ($citis as $city)
                                        <option {{ $city->id == $ad->city_id ? 'selected' : '' }}
                                            value="{{ $city->id }}">
                                            {{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-select">
                                <x-forms.label name="region" for="townn" required="true" />
                                <select name="town_id" id="townn"
                                    class="form-control select-bg @error('town_id') border-danger @enderror">
                                    <option value="" hidden>{{ __('select_region') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @php
                            $user_plan = App\Models\UserPlan::where('customer_id', Auth::user()->id)->first();
                            $plan = Modules\Plan\Entities\Plan::find($user_plan->plans_id);

                        @endphp
                        @if ($plan->embed_yt_video_and_links == 1)
                            <div class="col-md-6">
                                <div class="input-field">
                                    <x-forms.label name="website_url" for="website url" />
                                    <input name="web" id="web" type="text"
                                        placeholder="{{ __('website_url') }}" value="{{ $ad->web ?? '' }}"
                                        class="@error('web') border-danger @enderror" />
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="input-field--textarea">
                    <x-forms.label name="ad_description" for="description" required="true" />
                    <textarea onkeyup="countChars(this);" name="description" placeholder="{{ __('Description') }}..." id="description" class="@error('description') border-danger @enderror">{!! $ad->description !!}</textarea>
                  
                </div>
                <div class="input-field--textarea">
                    <x-forms.label name="feature" for="feature" />
                    <div id="multiple_feature_part">
                        <div class="row">
                            <div class="col-9 col-md-10 col-lg-11">
                                <div class="input-field">
                                    <input name="features[]" type="text" placeholder="{{ __('feature') }}"
                                        id="adname" class="@error('title') border-danger @enderror" />
                                </div>
                            </div>
                            <div class="col-3 col-md-2 col-lg-1">
                                <a role="button" onclick="add_features_field()"
                                    class="btn bg-primary btn-sm text-light"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        @foreach ($ad->features as $feature)
                            <div class="row">
                                <div class="col-9 col-md-10 col-lg-11">
                                    <div class="input-field">
                                        <input value="{{ $feature->name }}" name="features[]" type="text"
                                            placeholder="{{ __('feature') }}" id="adname"
                                            class="@error('title') border-danger @enderror" />
                                    </div>
                                </div>
                                <div class="col-3 col-md-2 col-lg-1">
                                    <button onclick="remove_single_field()" id="remove_item"
                                        class="btn btn-sm bg-danger text-light"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-6 upload-wrapper">
                    <h3>{{ __('Thumbnail Image') }} <span class="text-danger">*</span></h3>
                    <div class="input-field">
                        <input type="file" name="thumbnail" class="form-control @error('title') border-danger @enderror" onchange="readURL(this);">
                        <input type="hidden" name="old_thumbnail" value="{{ $ad->thumbnail ?? '' }}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <img src="{{ asset($ad->thumbnail ?? '') }}" id="thumbnail" style="height: 100px;width: 80px;float: right;margin-right: 46%;">
                </div>
            </div>
                <div class="col-12 mb-4 mt-4">
                    <div class="row">
                        @foreach ($ad->galleries as $gallery)
                            <div class="col-md-3" id="photo_div_{{ $gallery->id }}" class="gallery_sec">
                                <div class="form-group">
                                    <div id="image-box" class="img-box"
                                        style="border: 2px solid #ccc; display: inline-block;">
                                        <img src="{{ asset($gallery->image) }}" class="img-fluid"
                                            style="width: 200px; height: 200px;">
                                        <div class="img-box-child">
                                            <a href="javascript:void(0)" class="text-danger delete_image h4"
                                                data-url="{{ route('frontend.ad.gallery.delete', $gallery->id) }}"
                                                data-id="{{ $gallery->id }}"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="input-field">
                    <label class="active">{{ __('upload_photos') }}</label>
                    <div id="file-1" class="input-images-2" style="padding-top: .5rem;" ></div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-check">
                            <input name="negotiable" type="hidden" value="0">
                            <input {{ $ad->negotiable == 1 ? 'checked' : '' }} value="1" name="negotiable"
                                type="checkbox" class="form-check-input" id="checkme" />
                            <x-forms.label name="negotiable" for="checkme" class="form-check-label" />
                        </div>
                    </div>
                   @if (session('user_plan')->featured_limit)
                        @if (session('user_plan')->featured_limit > $ad)
                            <div class="col-6 col-md-3">
                                <div class="form-check">
                                    <input name="featured" type="hidden" value="0">
                                    @isset($ad->featured)
                                        <input {{ $ad->featured == 1 ? 'checked' : '' }} value="1" name="featured"
                                            type="checkbox" class="form-check-input" id="featured" />
                                    @else
                                        <input value="1" name="featured" type="checkbox" class="form-check-input"
                                            id="featured" />
                                    @endisset
                                    <x-forms.label name="featured" class="form-check-label" for="featured" />
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="dashboard-post__action-btns">
                    <button type="submit" class="btn btn--lg text-light">
                        {{ __('Update') }}
                       <!--  <span class="icon--right">
                            <x-svg.right-arrow-icon />
                        </span> -->
                    </button>
                </div>
                <input type="hidden" id="cancel_edit_input" name="cancel_edit" value="0">
            </form>
        </div>
    </div>
@endsection

@section('frontend_style')

<link href="{{ asset('backend/plugins/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">
@endsection

@push('post-ad-scripts')
<script src="{{ asset('backend/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/plugins/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('image_uploader/image-uploader.min.js') }}"></script>
<script>
    $('.input-images-2').imageUploader({
        maxSize: 2 * 1024 * 1024,
        maxFiles: 10,
        multiple: true,
    });

</script>
<script type="text/javascript">
        // feature field
        function add_features_field() {
            $("#multiple_feature_part").append(`
                    <div class="row">
                        <div class="col-9 col-md-10 col-lg-11">
                            <div class="input-field">
                                <input name="features[]" type="text" placeholder="Feature" id="adname" class="@error('title') border-danger @enderror"/>
                            </div>
                        </div>
                        <div class="col-3 col-md-2 col-lg-1 mt-10">
                            <button onclick="remove_single_field()" id="remove_item" class="btn btn-sm bg-danger text-light"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    `);
        }
        $("#remove_item").click(function() {
            $(this).parent().parent('div').remove();
        });
    </script>
    <script>

        // ad update and cancel edit
        $(document).on("click", "#remove_item", function() {
            $(this).parent().parent('div').remove();
        });

        $('.kv-file-remove').on('click', function() {
            window.location.reload();
        });


        function countChars(obj) {
            $("#charNum").show();
            var strLength = obj.value.length;

            if (strLength < 30) {
                document.getElementById("charNum").innerHTML =
                    '<span style="color: red;">The title must be at least 30 characters.</span>';
            } else {
                $("#charNum").hide();
            }
        }
    </script>
    <script>
        $(document).on('click','.delete_image', function(e){
            var id = $(this).data('id');
            var div = '#photo_div_'+id;
            var url = $(this).data('url');
            if (!confirm('Are you sure you want to delete the photo')) {
                return false;
            }
            if ('' != id) {
                $.ajax({
                    type:'get',
                    url:url,
                    async :true,
                    data: {},
                    success: function (response) {
                        if(response.status == 'success'){
                            $(div).hide();
                            toastr.success(response.message);
                        }
                    },
                });
            }
        })
        function readURL(input){
                if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#thumbnail')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(100)
                };
                reader.readAsDataURL(input.files[0]);
                }
            }
    </script>
@endpush
