@extends('frontend.postad.index')
@section('title', __('Ad Post'))
@section('post-ad-content')
    <!-- Step 01 -->
    <div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab">
        <div class="dashboard-post__information step-information">
            <form action="{{ route('frontend.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="dashboard-post__information-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="title" for="Title" required="true" />
                                <input onkeyup="countChars(this);" value="{{ old('title') }}" name="title" type="text"
                                    placeholder="{{ __('title') }}" id="adname"
                                    class="@error('title') border-danger @enderror" / required>
                                <p style="display: none;" id="charNum">0 characters</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="category" for="allCategory" required="true" />
                                <select required name="category_id" id="ad_category"
                                    class="form-control select-bg @error('category_id') border-danger @enderror">
                                    <option value="" hidden>{{ __('select_category') }}</option>
                                    @foreach ($categories as $category)
                                        <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="subcategory" for="subcategory" required="true" />
                                <select required name="subcategory_id" id="ad_subcategory"
                                    class="form-control select-bg @error('subcategory_id') border-danger @enderror">
                                    <option value="" selected>{{ __('select_subcategory') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="brand" for="brand" />
                                <select name="brand_id" id="brand"
                                    class="form-control select-bg @error('brand_id') border-danger @enderror">
                                    <option value="">{{ __('select_brand') }}</option>
                                    @foreach ($brands as $brand)
                                        <option {{ old('brand_id') == $brand->id ? 'selected' : '' }}
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
                                <input value="{{ old('model') }}" name="model" type="text"
                                    placeholder="{{ __('model') }}" id="modell"
                                    class="@error('model') border-danger @enderror" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="condition" for="conditionss" required="true" />
                                <select required name="condition" id="conditionss"
                                    class="form-control select-bg @error('condition') border-danger @enderror">
                                    @isset($ad->condition)
                                        <option {{ $ad->condition == 'new' ? 'selected' : '' }} value="new">
                                            {{ __('new') }}</option>
                                        <option {{ $ad->condition == 'used' ? 'selected' : '' }} value="used">
                                            {{ __('used') }}</option>
                                    @else
                                        <option value="new">{{ __('new') }}</option>
                                        <option value="used">{{ __('used') }}</option>
                                    @endisset
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="authenticity" for="authenticityy" />
                                <select name="authenticity" id="authenticityy"
                                    class="form-control select-bg @error('authenticity') border-danger @enderror">
                                    @isset($ad->condition)
                                        <option {{ $ad->authenticity == 'original' ? 'selected' : '' }} value="original">
                                            {{ __('original') }}</option>
                                        <option {{ $ad->authenticity == 'refurbished' ? 'selected' : '' }} value="refurbished">
                                            {{ __('refurbished') }}</option>
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
                                <input required value="{{ old('price') }}" name="price" type="number" min="1"
                                    placeholder="{{ __('price') }}" id="price"
                                    class="@error('price') border-danger @enderror"/ step="any">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 phone_input" style="display: none">
                        <div class="input-field">
                            <input type="hidden" id="code" value="" name="countrycode">
                            <input type="phone_number" name="phone" value="{{ $ad->phone ?? $authUser->phone }}"
                                class="input form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-select">
                            <x-forms.label name="Country" required="true" for="cityy" />
                            <select required name="country" id="country" class="form-control select-bg @error('country') border-danger @enderror">
                                <option class="d-none" value="" selected>{{ __('Select Country') }}</option>
                                @foreach ($citis as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-select">
                            <x-forms.label name="State" for="townn" />
                            <select required name="town_id" id="townn" class="form-control select-bg @error('town_id') border-danger @enderror">
                                <option value="" hidden>{{ __('Select State') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-select">
                            <label for="">City</label>
                            <select name="area_id" id="areaid" class="form-control select-bg @error('area_id') border-danger @enderror">
                                <option value="" hidden>{{ __('Select City') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" value="{{ $authUser->country_id ?? '' }}" name="city_id">
                    <input type="hidden" value="{{ $authUser->region_id ?? '' }}" name="town_id">
                    @php
                        $user_plan = App\Models\UserPlan::where('customer_id', Auth::user()->id)->first();
                        $plan = Modules\Plan\Entities\Plan::find($user_plan->plans_id);

                    @endphp
                    @if ($plan->embed_yt_video_and_links == 1)
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="web" for="website url" />
                                <input name="web" id="web" type="text" placeholder="{{ __('web') }}"
                                    value="{{ old('web') }}" class="@error('web') border-danger @enderror" />
                            </div>
                        </div>
                    @endif
                </div>
                <div class="input-field--textarea">
                    <x-forms.label name="ad_description" for="description" required="true" />
                    <textarea required onkeyup="countChars(this);" name="description" placeholder="{{ __('Descriptions') }}..."
                        id="description" class="@error('description') border-danger @enderror">{!! old('description') !!}</textarea>
                    <p style="display: none;" id="charNum">0 characters</p>
                </div>
                <div class="input-field--textarea">
                    <x-forms.label name="features" for="features" />
                    <div id="multiple_feature_part">
                        <div class="row">
                            <div class="col-9 col-sm-10 col-md-10 col-lg-11">
                                <div class="input-field">
                                    <input name="features[]" type="text" placeholder="{{ __('features') }}"
                                        id="adname" class="@error('title') border-danger @enderror" />
                                </div>
                            </div>
                            <div class="col-3 col-sm-2 col-md-2 col-lg-1 mt-10 add_feature">
                                <a role="button" onclick="add_features_field()"
                                    class="btn bg-primary btn-sm text-light"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-field">
                    <label class="active">{{ __('upload_photos') }}</label>
                    <div id="multiple_image_upload" class="input-images-2" style="padding-top: .5rem;" multiple></div>
                </div>
                <div class="row mt-1">
                    <div class="col-6 col-md-3">
                        <div class="form-check">
                            <input name="negotiable" type="hidden" value="0">
                            @isset($ad->negotiable)
                                <input {{ $ad->negotiable == 1 ? 'checked' : '' }} value="1" name="negotiable"
                                    type="checkbox" class="form-check-input" id="checkme" />
                            @else
                                <input value="1" name="negotiable" type="checkbox" class="form-check-input"
                                    id="checkme" />
                            @endisset
                            <x-forms.label name="Price Negotiable" class="form-check-label" for="checkme" />
                        </div>
                    </div>
                    @php
                        $ad = Modules\Ad\Entities\Ad::where('customer_id', Auth::user()->id)
                            ->where(['featured' => 1, 'status' => 'active'])
                            ->count();

                    @endphp
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
                    <a href="{{ route('frontend.post.rules') }}" class="btn btn--lg btn--outline">
                        {{ __('view_posting_rules') }}
                    </a>
                    <button type="submit" class="btn btn--lg">
                        {{ __('Publish') }}
                        <!--  <span class="icon--right">
                                        <x-svg.right-arrow-icon />
                                    </span> -->
                    </button>
                </div>
            </form>
        </div>
    </div>
    @if (old('subcategory_id'))
        <input type="hidden" id="subct_id" value="{{ old('subcategory_id') }}">
    @else
        <input type="hidden" id="subct_id" value="">
    @endif
@endsection
@push('component_script')
    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/venobox.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>
    <script src="{{ asset('frontend') }}/js/axios.min.js"></script>
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
                        <div class="col-9 col-sm-10 col-md-10 col-lg-11">
                            <div class="input-field">
                                <input name="features[]" type="text" placeholder="Feature" id="adname" class="@error('title') border-danger @enderror"/>
                            </div>
                        </div>
                        <div class="col-3 col-sm-2 col-md-2 col-lg-1 mt-10">
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

        function countChars(obj) {
            $("#charNum").show();
            var strLength = obj.value.length;

            if (strLength < 30) {
                document.getElementById("charNum").innerHTML =
                    '<span style="color: red;">The title must be at least 30 characters.</span>';
            } else {
                $("#charNum").hide();
            }
        };

        // Category wise subcategories dropdown
        $('#ad_category').on('change', function() {
            var categoryID = $(this).val();
            // alert(categoryID);
            if (categoryID) {
                cat_wise_subcat(categoryID);
            }
        });
        var subct_id = document.getElementById('subct_id').value;
        $(document).ready(function() {
            var category_id = document.getElementById('ad_category').value;
            cat_wise_subcat(category_id);
        });
        // category wise subcategory function
        function cat_wise_subcat(categoryID) {
            axios.get('/dashboard/post/get_subcategory/' + categoryID).then((res => {
                console.log(res);
                if (res.data) {
                    $('#ad_subcategory').empty();
                    $.each(res.data, function(key, subcat) {
                        var matched = parseInt(subct_id) === subcat.id ? true : false
                        $('#ad_subcategory').append(
                            `<option ${matched ? 'selected':''} value="${subcat.id}">${subcat.name}</option>`
                        );
                    });
                } else {
                    $('#ad_subcategory').empty();
                }
            }))
        }


        $('#country').on('change', function() {
            var country_id = $(this).val();
            // alert(country_id);
            if (country_id) {
                $.ajax({
                    url: "{{ url('adlist-search-ajax') }}/" + country_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('#areaid').html('');
                        var d = $('#townn').empty();
                        // $('#townn').append(
                        //     '<option value="" disabled selected> Select Region </option>');
                        // $.each(data, function(key, value) {
                        //     $('#townn').append('<option value="' + value.id + '">' + value
                        //         .name + '</option>');
                        // });

                        $('#townn').html('<option value="" disabled selected> Select One </option>');
                        $.each(data, function(key, value){
                            $('#townn').append('<option value="'+ value.id +'">' + value.name + '</option>');
                        });

                    },
                });
            } else {
                alert('danger');
            }
        });

        $('#townn').on('change', function() {
            var townnid = $("#townn").val()
            // alert(townnid);
            if (townnid) {
                $.ajax({
                    url: "{{ url('adlist-town-city-ajax') }}/" + townnid,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('#areaid').html('<option value="" disabled selected> Select One </option>');
                        $.each(data, function(key, value){
                            $('#areaid').append('<option value="'+ value.id +'">' + value.city_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    </script>
@endpush
