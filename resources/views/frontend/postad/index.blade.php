@extends('layouts.frontend.layout_one')

@section('title', __('ad_post'))

@section('frontend_style')
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2-bootstrap-5-theme.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/slick.css" />
    @if (auth('customer')->check() && isset(session('user_plan')->ad_limit) && session('user_plan')->ad_limit < $settings->free_ad_limit)
        <style>
            .header--one {
                top: 50px !important;
            }
            .header--fixed {
                top: 0 !important;
            }
        </style>
    @endif
@endsection

@section('content')
    <!-- Banner section start  -->
    {{--  
    <div class="banner banner--three" style="background:url('https://adlisting.templatecookie.com/frontend/default_images/index3_search_filter_background.png') center center/cover no-repeat;">
        <div class="container">
            @include('frontend.user-search-filter')
        </div>
    </div>
    --}}
    <!-- Banner section end   -->
    <!-- dashboard section start  -->
    <section class="section dashboard">
        <div class="container">
            @include('frontend.dashboard-alert')
            <div class="row">
                <div class="col-xl-3">
                    @include('layouts.frontend.partials.dashboard-sidebar')
                </div>
                <div class="col-xl-9">
                    <div class="dashboard-post">
                        
                        <!-- <ul class="nav dashboard-post__nav mb-3">
                            {{-- Step 1  --}}
                            @if (request()->route()->getName() === "frontend.post")
                                <a href="{{ route('frontend.post') }}">
                                    <x-ad.ad-step/>
                                </a>
                            @else
                                <button disabled>
                                    <x-ad.ad-step/>
                                </button>
                            @endif

                            {{-- Step 2 --}}
                            @if (request()->route()->getName() === "frontend.post.step2")
                                <a href="{{ route('frontend.post.step2') }}">
                                    <x-ad.ad-step2/>
                                </a>
                            @else
                                <button disabled>
                                    <x-ad.ad-step2/>
                                </button>
                            @endif

                            {{-- Step 3 --}}
                            @if (request()->route()->getName() === "frontend.post.step3")
                                <a href="{{ route('frontend.post.step3') }}">
                                    <x-ad.ad-step3/>
                                </a>
                            @else
                                <button disabled>
                                    <x-ad.ad-step3/>
                                </button>
                            @endif
                        </ul>
                         -->
                        <div class="tab-content dashboard-post__content" id="pills-tabContent">
                            @yield('post-ad-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @isset($ad->category_id)
            <input type="hidden" id="cat_id" value="{{ $ad->category_id }}">
        @else
            <input type="hidden" id="cat_id" value="">
        @endisset

        @isset($ad->city_id)
            <input type="hidden" id="ct_id" value="{{ $ad->city_id }}">
        @else
            <input type="hidden" id="ct_id" value="">
        @endisset

        @isset($ad->subcategory_id)
            <input type="hidden" id="subct_id" value="{{ $ad->subcategory_id }}">
        @else
            <input type="hidden" id="subct_id" value="">
        @endisset

        @isset($ad->town_id)
            <input type="hidden" id="town_id" value="{{ $ad->town_id }}">
        @else
            <input type="hidden" id="town_id" value="">
        @endisset
    </section>
    <!-- dashboard section end  -->
@endsection

@section('frontend_script')
    <script src="{{ asset('frontend') }}/js/axios.min.js"></script>
    <script>
        // session category wise subcategory
        var cat_id = document.getElementById('cat_id').value;
        var ct_id = document.getElementById('ct_id').value;
        var subct_id = document.getElementById('subct_id').value;
        var town_id = document.getElementById('town_id').value;

        if (cat_id){ cat_wise_subcat(cat_id) }
        if (ct_id){ city_wise_town(ct_id) }

        // Category wise subcategories
        $('#ad_category').on('change', function() {
        var categoryID = $(this).val();
            if(categoryID) {
                cat_wise_subcat(categoryID);
            }
        });

        // City wise town
        $('#cityy').on('change', function() {
        var cityID = $(this).val();
            if(cityID) {
                city_wise_town(cityID);
            }else{
                $('#townn').empty();
            }
        });

        // cat wise subcat function
        function cat_wise_subcat(categoryID){
            axios.get('/get-sub-categories/'+categoryID).then((res => {
                if(res.data){
                    $('#ad_subcategory').empty();
                    $.each(res.data, function(key, subcat){
                        var matched = parseInt(subct_id) === subcat.id ? true: false

                        $('select[name="subcategory_id"]').append(
                            `<option ${matched ? 'selected':''} value="${subcat.id}">${subcat.name}</option>`
                        );
                    });
                }else{
                    $('#ad_subcategory').empty();
                }
            }))
        }

        // city wise town function
        function city_wise_town(cityID){
            axios.get('/get-towns/'+cityID).then((res => {
                if(res.data){
                    $('#townn').empty();
                    $.each(res.data, function(key, town){
                        var matched = parseInt(town_id) === town.id ? true: false

                        $('select[name="town_id"]').append(
                            `<option ${matched ? 'selected':''} value="${town.id}">${town.name}</option>`
                        );
                    });
                }else{
                    $('#townn').empty();
                }
            }))
        }
    </script>

    @stack('post-ad-scripts')
@endsection

@section('frontend_style')
    <link rel="stylesheet" href="{{ asset('css/zakirsoft.css') }}">
@endsection
