@extends('frontend.postad.index')

@section('title')
    {{ __('edit_ad') }} - {{ $ad->title }}
@endsection

@section('post-ad-content')
    @php
        $adsinfo = DB::table('ads')->where('id', $ad->id)->first();
        $state = DB::table('towns')->orderBy('name')->get();
        $user_plan = DB::table('user_plans')->where('customer_id', auth('customer')->user()->id)->first();
    @endphp

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
            <form action="{{ route('frontend.post.update', $ad->slug) }}" method="POST" enctype="multipart/form-data" id="adpostform">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-field">
                            <label for="">Title <span class="text-danger">*</span></label>
                            <input required value="{{ $ad->title }}" name="title" type="text" placeholder="{{ __('ad_name') }}" id="adname" class="@error('title') border-danger @enderror" />
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="input-select">
                            <label>Category <span class="text-danger">*</span></label>
                            <select required name="category_id" id="ad_category" class="form-control select-bg @error('category_id') border-danger @enderror">
                                <option value="" hidden>{{ __('By Category') }}</option>
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $ad->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="input-select">
                            <label >condition <span class="text-danger">*</span></label>
                            <select required name="condition" id="conditionss" class="form-control select-bg @error('condition') border-danger @enderror">
                                <option {{ $ad->condition == 'New' ? 'selected' : '' }} value="New"> {{ __('new') }}</option>
                                <option {{ $ad->condition == 'Like New' ? 'selected' : '' }} value="Like New"> {{ __('like_new') }}</option>
                                <option {{ $ad->condition == 'Excellent' ? 'selected' : '' }} value="Excellent"> {{ __('excellent') }}</option>
                                <option {{ $ad->condition == 'Good' ? 'selected' : '' }} value="Good"> {{ __('good') }}</option>
                                <option {{ $ad->condition == 'Fair' ? 'selected' : '' }} value="Fair"> {{ __('fair') }}</option>
                                <option {{ $ad->condition == 'Salvage' ? 'selected' : '' }} value="Salvage"> {{ __('salvage') }}</option>
                            </select>
                       </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-md-6">
                        <div class="input-select">
                            <label for="">Sub Category</label>
                            <select name="subcategory_id" id="ad_subcategory" class="form-control select-bg @error('subcategory_id') border-danger @enderror">
                                <option value="" selected>{{ __('select_subcategory') }}</option>
                            </select>
                        </div>
                    </div> --}}
                    <!-- <div class="col-md-6">
                        <div class="input-select">
                            <label for="">Brand</label>
                            <select name="brand_id" id="brandd" class="form-control select-bg @error('brand_id') border-danger @enderror">
                                <option value="" hidden>{{ __('select_brand') }}</option>
                                @foreach ($brands as $brand)
                                    <option {{ $brand->id == $ad->brand_id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->
                    {{-- <div class="col-md-6">
                        <div class="input-field">
                            <label>Brand Name <span class="text-danger">*</span></label>
                            <input value="{{ $adsinfo->brand_name }}" name="brand_name" type="text" required placeholder="{{ __('Brand Name') }}" class="@error('brand_name') border-danger @enderror" />
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                    {{-- <div class="col-md-6">
                        <div class="input-field">
                            <label>Model <span class="text-danger">*</span></label>
                            <input value="{{ $ad->model ?? '' }}" name="model" type="text" required placeholder="{{ __('model') }}" id="modell" class="@error('model') border-danger @enderror" />
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                    {{-- <div class="col-md-6">
                        <label class="mb-2">Price <span class="text-danger"> * </span> ($) </label>
                        <div class="input-group">
                            <select name="price_method" class="form-control select-bg">
                                <option value="1" @if($adsinfo->price_method == 1) selected @endif>Total Price</option>
                                <option value="2" @if($adsinfo->price_method == 2) selected @endif>Per Hour</option>
                                <option value="3" @if($adsinfo->price_method == 3) selected @endif>Per Day</option>
                                <option value="4" @if($adsinfo->price_method == 4) selected @endif>Per Week</option>
                                <option value="5" @if($adsinfo->price_method == 5) selected @endif>Per Month</option>
                                <option value="6" @if($adsinfo->price_method == 6) selected @endif>Per Year</option>
                            </select>
                            <span class="input-group-text"> $ </span>
                            <input required value="{{ $ad->price }}" name="price" type="number" min="1" placeholder="{{ __('price') }}" id="price" class="form-control select-bg @error('price') border-danger @enderror"/ step="any">
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-6">
                        <div class="input-select">
                            <x-forms.label name="State" required="true" />
                            <select name="town_id" id="townn" class="form-control select-bg @error('town_id') border-danger @enderror">
                                <option value="">Select One</option>
                                @foreach ($state as $stat)
                                    <option value="{{$stat->id}}" @if($adsinfo->town_id == $stat->id) selected @endif>{{$stat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-select">
                            <label for="">City <span class="text-danger">*</span></label>
                            <!-- <select name="area_id" id="areaid"
                                class="form-control select-bg @error('area_id') border-danger @enderror">
                                <option value="" disabled>{{ __('Select City') }}</option>
                            </select> -->
                            <select name="area_name" id="townn" class="form-control select-bg @error('town_id') border-danger @enderror">
                                <option value="">Select One</option>
                                @foreach ($state as $stat)
                                    <option value="{{$stat->id}}" @if($adsinfo->area_name == $stat->id) selected @endif>{{$stat->name}}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="area_name" value="{{ $adsinfo->area_name }}" class="form-control select-bg  border-danger" placeholder="City name"> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-select">
                            <label for="">Postal Code</label>
                            <input type="number" min="1" name="postal_code" class="form-control select-bg" value="{{$adsinfo->postal_code}}" placeholder="Postal code">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-field--textarea">
                            <x-forms.label name="ad_description" for="description" required="true" />
                            <textarea onkeyup="countChars(this);" name="description" placeholder="{{ __('Description') }}..." id="description" class="@error('description') border-danger @enderror">{!! $ad->description !!}</textarea>
                        </div>
                        {{-- <div class="input-field--textarea">
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
                        </div> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 upload-wrapper">
                        <h3>{{ __('Thumbnail Image') }} <span class="text-danger">*</span></h3>
                        <div class="input-field">
                            <input type="file" name="thumbnail"
                                class="form-control @error('title') border-danger @enderror" onchange="readURL(this);">
                            <input type="hidden" name="old_thumbnail" value="{{ $ad->thumbnail ?? '' }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ asset($ad->thumbnail ?? '') }}" id="thumbnail"
                            style="height: 100px;width: 80px;float: right;margin-right: 46%;">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-field">
                            <label class="active">{{ __('upload_photos') }}</label>
                            <div class="input-images-2" style="padding-top: .5rem;" multiple></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-lg-3">
                        <div class="form-check">
                            <input name="negotiable" type="hidden" value="0">
                            <input value="1" name="negotiable" type="checkbox" class="form-check-input" id="checkme" {{ $ad->negotiable == 1 ? 'checked' : '' }} />
                            <x-forms.label name="negotiable" for="checkme" class="form-check-label" />
                        </div>
                    </div> -->
                    @if($adsinfo->is_featured == 'yes')
                        <div class="col-6 col-md-3">
                            <div class="form-check">
                                <input value="1" name="featured" type="checkbox" class="form-check-input" id="checkfeatured" {{ $ad->featured == 1 ? 'checked' : '' }} />
                                <label for="checkfeatured" class="form-check-label">Featured</label>
                            </div>
                        </div>
                    @else
                        @if($user_plan->featured_limit > 0)
                            <div class="col-6 col-md-3">
                                <div class="form-check">
                                    <input value="1" name="featured" type="checkbox" class="form-check-input" id="checkfeatured"/>
                                    <label for="checkfeatured" class="form-check-label">Featured</label>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="dashboard-post__action-btns">
                    <button type="submit" class="btn btn--lg text-light" id="adpostsubmitbutton">
                        {{ __('Update') }}
                    </button>
                </div>
                <input type="hidden" id="cancel_edit_input" name="cancel_edit" value="0">
            </form>
        </div>
    </div>
@endsection

@section('frontend_style')
    <link href="{{ asset('backend/plugins/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">
    <style>
        .select2-selection__rendered {
            line-height: 38px !important;
        }
        .select2-container .select2-selection--single {
            height: 42px !important;
        }
        .select2-selection__arrow {
            height: 38px !important;
        }
    </style>
@endsection

@push('post-ad-scripts')
    <script src="{{ asset('backend/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/plugins/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('image_uploader/image-uploader.min.js') }}"></script>
    <script>
        var form = document.getElementById("adpostform");
        var button = document.getElementById("adpostsubmitbutton");

        $("#adpostsubmitbutton").click(function() {

            $("#adpostsubmitbutton").html(`
                <span id="">
                    <span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>
                    Ad updating ...
                </span>
            `);

            button.disabled = true;

            form.submit();
        });
    </script>
    <script>
        $('.input-images-2').imageUploader({
            maxSize: 10 * 1024 * 1024,
            maxFiles: 10,
            multiple: true,
        });

        $(document).ready(function() {
            // ===== Select2 ===== \\

            $('#townn').select2({
                // theme: 'bootstrap-5',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });

            $('#ad_category').select2({
                // theme: 'bootstrap-5',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });

            $('#ad_subcategory').select2({
                // theme: 'bootstrap-5',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
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
        };
        // ad update and cancel edit
        $(document).on("click", "#remove_item", function() {
            $(this).parent().parent('div').remove();
        });
    </script>
    <script>

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
        $(document).on('click', '.delete_image', function(e) {
            var id = $(this).data('id');
            var div = '#photo_div_' + id;
            var url = $(this).data('url');
            if (!confirm('Are you sure you want to delete the photo')) {
                return false;
            }
            if ('' != id) {
                $.ajax({
                    type: 'get',
                    url: url,
                    async: true,
                    data: {},
                    success: function(response) {
                        if (response.status == 'success') {
                            $(div).hide();
                            toastr.success(response.message);
                        }
                    },
                });
            }
        })

        function readURL(input) {
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

        // $('#cityy').on('change', function() {
        //     var country_id = $(this).val();
        //     if (country_id) {
        //         $.ajax({
        //             url: "{{ url('adlist-search-ajax') }}/" + country_id,
        //             type: "GET",
        //             dataType: "json",
        //             success: function(data) {
        //                 $('#areaid').html('');
        //                 var d = $('#townn').empty();
        //                 $('#townn').append(
        //                     '<option value="" disabled selected> Select Region </option>');
        //                 $.each(data, function(key, value) {
        //                     $('#townn').append('<option value="' + value.id + '">' + value
        //                         .name + '</option>');
        //                 });
        //             },
        //         });
        //     } else {
        //         alert('danger');
        //     }
        // });

        // $('#townn').on('change', function() {
        //     var townnid = $("#townn").val()
        //     // alert(townnid);
        //     if (townnid) {
        //         $.ajax({
        //             url: "{{ url('adlist-town-city-ajax') }}/" + townnid,
        //             type: "GET",
        //             dataType: "json",
        //             success: function(data) {
        //                 console.log(data);
        //                 $('#areaid').html('');
        //                 if(data.length > 0){
        //                     $.each(data, function(key, value) {
        //                         $('#areaid').append('<option value="' + value.id + '">' + value
        //                             .city_name + '</option>');
        //                     });
        //                 }else {
        //                     toastr.warning("No country for this state", 'Info',{
        //                         closeButton:true,
        //                         progressBar:true,
        //                     });
        //                 }
        //             },
        //         });
        //     } else {
        //         alert('danger');
        //     }
        // });
    </script>
@endpush
