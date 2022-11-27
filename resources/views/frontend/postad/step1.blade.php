@extends('frontend.postad.index')

@section('title', __('Ad Post'))

@section('post-ad-content')
    @php 
        $state = DB::table('towns')->where('city_id', 194)->get();
    @endphp
    <div class="tab-pane fade show active" id="pills-basic" role="tabpanel" aria-labelledby="pills-basic-tab">
        <div class="dashboard-post__information step-information">
            <form action="{{ route('frontend.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-field">
                            <label for="">Title <span class="text-danger">*</span></label>
                            <input value="{{ old('title') }}" name="title" type="text" placeholder="{{ __('title') }}" id="adname" class="@error('title') border-danger @enderror" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <label>Category <span class="text-danger">*</span></label>
                            <select required name="category_id" id="ad_category" class="form-control select-bg @error('category_id') border-danger @enderror">
                                <option disabled selected>{{ __('select_category') }}</option>
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
                            <label for="">Sub Category <span class="text-danger">*</span></label>
                            <select required name="subcategory_id" id="ad_subcategory" class="form-control select-bg @error('subcategory_id') border-danger @enderror">
                                <option value="" selected>{{ __('select_subcategory') }}</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="input-field">
                            <label for="">Brand <span class="text-danger">*</span></label>
                            <select name="brand_id" id="brand" class="form-control select-bg @error('brand_id') border-danger @enderror">
                                <option value="">{{ __('select_brand') }}</option>
                                @foreach ($brands as $brand)
                                    <option {{ old('brand_id') == $brand->id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="input-field">
                            <label>Brand Name <span class="text-danger">*</span></label>
                            <input value="{{ old('brand_name') }}" name="brand_name" type="text" required placeholder="{{ __('Brand Name') }}" class="@error('brand_name') border-danger @enderror" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-field">
                            <label>Model <span class="text-danger">*</span></label>
                            <input value="{{ old('model') }}" name="model" type="text" required placeholder="{{ __('model') }}" id="modell" class="@error('model') border-danger @enderror" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <label >condition <span class="text-danger">*</span></label>
                            <select required name="condition" id="conditionss" class="form-control select-bg @error('condition') border-danger @enderror">
                                <option value="new">{{ __('new') }}</option>
                                <option value="used"> {{ __('used') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="mb-2">Price <span class="text-danger"> * </span> ($) </label>
                        <div class="input-group">
                            <select name="price_method" class="form-control select-bg">
                                <option value="1" selected>Total Price</option>
                                <option value="2">Per Hour</option>
                                <option value="3">Per Day</option>
                                <option value="4">Per Week</option>
                                <option value="5">Per Month</option>
                                <option value="6">Per Year</option>
                            </select>
                            <input required value="{{ old('price') }}" name="price" type="number" min="1" placeholder="{{ __('price') }}" id="price" class="form-control select-bg @error('price') border-danger @enderror"/ step="any">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-select">
                            <x-forms.label name="State" required="true" />
                            <select required name="town_id" id="townn" class="form-control select-bg @error('town_id') border-danger @enderror">
                                <option value="">Select One</option>
                                @foreach ($state as $stat)
                                    <option value="{{$stat->id}}">{{$stat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-select">
                            <label for="">City /  Neighborhood <span class="text-danger">*</span></label>
                            <select name="area_id" id="areaid" class="form-control select-bg @error('area_id') border-danger @enderror">
                                <option disabled selected>{{ __('Select City / Neighborhood ') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-select">
                            <label for="">Postal Code</label>
                            <input type="number" min="1" name="postal_code" value="{{ old('postal_code')}}" class="form-control select-bg" placeholder="Postal code">
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
                                <x-forms.label name="web" for="website url" />
                                <input name="web" id="web" type="text" placeholder="{{ __('web') }}"
                                    value="{{ old('web') }}" class="@error('web') border-danger @enderror" />
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-field--textarea">
                            <label for="">Ad description <span class="text-danger">*</span></label>
                            <textarea required onkeyup="countChars(this);" name="description" placeholder="{{ __('Descriptions') }}..." id="description" class="@error('description') border-danger @enderror">{!! old('description') !!}</textarea>
                            <p style="display: none;" id="charNum">0 characters</p>
                        </div>
                        <div class="input-field--textarea">
                            <label for="">Features</label>
                            <div id="multiple_feature_part">
                                <div class="row">
                                    <div class="col-9 col-sm-10 col-md-10 col-lg-11">
                                        <div class="input-field">
                                            <input name="features[]" type="text" placeholder="{{ __('features') }}" id="adname" class="@error('title') border-danger @enderror" />
                                        </div>
                                    </div>
                                    <div class="col-3 col-sm-2 col-md-2 col-lg-1 mt-10 add_feature">
                                        <a role="button" type="button" onclick="add_features_field()" class="btn bg-primary btn-sm text-light"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-field">
                            <label class="active">{{ __('upload_photos') }} <span class="text-danger">*</span></label>
                            <div class="input-images-2" style="padding-top: .5rem;" multiple></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-6 col-md-3">
                        <div class="form-check">
                            <input name="negotiable" type="hidden" value="0">
                                <input value="1" name="negotiable" type="checkbox" class="form-check-input" id="Price_Negotiable" {{ old('negotiable')== "1" ? 'checked' : '' }}/>
                            <label for="Price_Negotiable" class="form-check-label">Price Negotiable</label>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-check">
                            <input value="1" name="featured" type="checkbox" class="form-check-input" id="checkfeatured" {{ old('featured')== "1" ? 'checked' : '' }} />
                            <label for="checkfeatured" class="form-check-label">Featured</label>
                        </div>
                    </div>
                </div>
                <div class="dashboard-post__action-btns">
                    <button type="submit" class="btn text-white btn--lg">
                        {{ __('Publish') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
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

        function add_features_field() {
            $("#multiple_feature_part").append(`
                <div class="row removeddiv">
                    <div class="col-9 col-sm-10 col-md-10 col-lg-11">
                        <div class="input-field">
                            <input name="features[]" type="text" placeholder="Feature" id="adname" class="@error('title') border-danger @enderror"/>
                        </div>
                    </div>
                    <div class="col-3 col-sm-2 col-md-2 col-lg-1 mt-10">
                        <button type="button" id="remove_item" class="btn btn-sm bg-danger text-light"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            `);
        }

        $(document).on("click", "#remove_item", function() {
            $(this).parent().parent('div').remove();
        });

    </script>
    <script>
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

            if (strLength < 150) {
                document.getElementById("charNum").innerHTML = '<span style="color: red;">The ad description must be at least 150 characters.</span>';
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
                        $('#ad_subcategory').append( `<option ${matched ? 'selected':''} value="${subcat.id}">${subcat.name}</option>`
                        );
                    });
                } else {
                    $('#ad_subcategory').empty();
                }
            }))
        }

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
                        $.each(data, function(key, value) {
                            $('#areaid').append('<option value="' + value.id + '">' + value.city_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    </script>
@endpush