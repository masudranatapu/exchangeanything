@extends('frontend.postad.index')

@section('title', __('step1'))

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
            <form action="{{ route('frontend.post.store') }}" method="POST">
                @csrf
                <div class="dashboard-post__information-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="title" for="Title" required="true" />
                                <input onkeyup="countChars(this);" value="@if(@error('title'))asdfff{{old('title')}}@endif" name="title" type="text" placeholder="{{ __('title') }}" id="adname"  class="@error('title') border-danger @enderror" />
                                <p style="display: none;" id="charNum">0 characters</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="price" for="price" required="true" />($)
                                <input value="@if(@error('price'))asdfff{{old('price')}}@endif" name="price" type="number" min="1" placeholder="{{ __('price') }}" id="price"  class="@error('price') border-danger @enderror"/ step="any">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="category" for="allCategory" required="true" />
                                <select name="category_id" id="ad_category" class="form-control select-bg @error('category_id') border-danger @enderror">
                                    <option value="" hidden>{{ __('select_category') }}</option>
                                        @foreach ($categories as $category)
                                            <option {{ old('category_id') == $category->id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="subcategory" for="subcategory" required="true" />
                                <select name="subcategory_id" id="ad_subcategory" class="form-control select-bg @error('subcategory_id') border-danger @enderror">
                                    <option value="" selected>{{ __('select_subcategory') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="brand" for="brand" />
                                <select name="brand_id" id="brand" class="form-control select-bg @error('brand_id') border-danger @enderror">
                                    <option value="">{{ __('select_brand') }}</option>
                                        @foreach ($brands as $brand)
                                            <option {{ old('brand_id') == $brand->id ? 'selected':'' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="model" for="modell" />
                                <input value="{{ old('model') }}" name="model" type="text" placeholder="{{ __('model') }}" id="modell" class="@error('model') border-danger @enderror" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-field">
                                <x-forms.label name="condition" for="conditionss" required="true" />
                                <select name="condition" id="conditionss" class="form-control select-bg @error('condition') border-danger @enderror">
                                    @isset($ad->condition)
                                        <option {{ $ad->condition == 'new' ? 'selected':'' }} value="new">{{ __('new') }}</option>
                                        <option {{ $ad->condition == 'used' ? 'selected':'' }} value="used">{{ __('used') }}</option>
                                    @else
                                        <option value="new">{{ __('new') }}</option>
                                        <option value="used">{{ __('used') }}</option>
                                    @endisset
                                </select>
                            </div>
                        </div>
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
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-3">
                            <div class="form-check">
                                <input name="negotiable" type="hidden" value="0">
                                @isset($ad->negotiable)
                                    <input {{ $ad->negotiable == 1 ? 'checked':'' }} value="1" name="negotiable" type="checkbox" class="form-check-input" id="checkme" />
                                @else
                                    <input value="1" name="negotiable" type="checkbox" class="form-check-input" id="checkme" />
                                @endisset
                                <x-forms.label name="Price Negotiable" class="form-check-label" for="checkme" />
                            </div>
                        </div>
                        @php
                            $ad = Modules\Ad\Entities\Ad::where('customer_id',Auth::user()->id)->where(['featured'=>1,'status'=>'active'])->count();
                            // dd(session('user_plan')->featured_limit>$ad);
                        @endphp
                        @if (session('user_plan')->featured_limit)
                            @if (session('user_plan')->featured_limit>$ad)
                                <div class="col-lg-3">
                                    <div class="form-check">
                                        <input name="featured" type="hidden" value="0">
                                        @isset($ad->featured)
                                            <input {{ $ad->featured == 1 ? 'checked':'' }} value="1" name="featured" type="checkbox" class="form-check-input" id="featured" />
                                        @else
                                            <input value="1" name="featured" type="checkbox" class="form-check-input" id="featured" />
                                        @endisset
                                        <x-forms.label name="featured" class="form-check-label" for="featured" />
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="dashboard-post__action-btns">
                    <a href="{{ route('frontend.post.rules') }}" class="btn btn--lg btn--outline">
                        {{ __('view_posting_rules') }}
                    </a>
                    <button type="submit" class="btn btn--lg">
                        {{ __('next_steps') }}
                        <span class="icon--right">
                            <x-svg.right-arrow-icon />
                        </span>
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

@section('frontend_script')
    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/venobox.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>
    <script src="{{ asset('frontend') }}/js/axios.min.js"></script>
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
            
            if(strLength < 30){
                document.getElementById("charNum").innerHTML = '<span style="color: red;">The title must be at least 30 characters.</span>';
            }else{
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
    </script>


@endsection