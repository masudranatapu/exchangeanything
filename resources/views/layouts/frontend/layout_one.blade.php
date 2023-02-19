<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @hasSection('meta')
        @yield('meta')
    @else
        <meta name="title" content="{{ $settings->seo__meta_title }}">
        <meta name="description" content="{{ $settings->seo_meta_description }}">
        <meta name="keywords" content="{{ $settings->seo_meta_keywords }}">
    @endif
    <title>@yield('title') - {{ config('app.name') }}</title>
    <!-- Styles goes here -->
    @include('layouts.frontend.partials.links')
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2.min.css" />
    <style>
        .category-menu__subdropdown__item {
            width: 270px !important;
        }

        .navigation-bar__buttons .user {
            margin: 0px 24px;
        }

        a.categories__link.active {
            color: #000 !important;
            transition: all 0.3s linear;
            font-weight: 800;
        }

        .subscribe__input-group.is-invalid {
            border: 1px solid red;
        }
    </style>
    {!! $settings->header_css !!}
    {!! $settings->header_script !!}
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/main.css">
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/modal.min.css">
    <link rel="stylesheet" href="{{ asset('massage/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('image_uploader/image-uploader.css') }}">
    <!-- Format Images loader CSS -->
    <link rel="stylesheet" href="{{ asset('image_uploader/jquery.imagesloader.css') }}">


</head>

<body
    class="{{ auth('customer')->check() && isset(session('user_plan')->ad_limit) && session('user_plan')->ad_limit < $settings->free_ad_limit ? 'wraning-show_hide' : '' }}"
    dir="{{ langDirection() }}">
    <!-- Top bar start  -->
    @if (auth('customer')->check() &&
            isset(session('user_plan')->ad_limit) &&
            session('user_plan')->ad_limit < $settings->free_ad_limit)
        @include('layouts.frontend.partials.top-bar')
    @endif
    <!-- Top bar end  -->
    <!-- loader start  -->
    @if (setting('website_loader'))
        @include('layouts.frontend.partials.loader')
    @endif
    <!-- loader end  -->
    <x-header.main-header />
    @yield('content')

    <!-- Location Modal -->
    <div class="location_modal">
        <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            By Location
                            <span class="city_name">
                                <i class="fa fa-angle-right"></i>
                                <span id="country_name"></span>
                            </span>
                            <span class="go_back">
                                <i class="fa fa-angle-left"></i>
                                Go Back
                            </span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="city_list">
                            @php
                                $countries = Modules\Location\Entities\City::orderBy('name')->get();
                                $country_name = explode(',', request('country'));
                            @endphp
                            <ul>
                                @if (isset($countries) && count($countries) > 0)
                                    @foreach ($countries as $country)
                                        <li>
                                            <a class="nav-link country_name" id="selectCountry"
                                                data-id="{{ $country->id }}" href="javascript:void(0)">
                                                {{ Str::ucfirst($country->name) }}
                                                <i class="fa fa-angle-right"></i>
                                                @php
                                                    $country_ads_count = DB::table('ads')
                                                        ->where('city_id', $country->id)
                                                        ->count();
                                                @endphp
                                                <span>({{ $country_ads_count }})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="loadding_icon text-center" style="display: none;">
                            <img src="{{ asset('loading.gif') }}" alt="">
                        </div>
                        <div class="area_list" id="city_show">
                            {{--
                               @php
                                    $towns = Modules\Location\Entities\Town::latest()->get();
                                    $town_name = explode(',', request('town'));
                                @endphp
                                <ul>
                                    @if (isset($towns) && count($towns) > 0)
                                        @foreach ($towns as $town)
                                            <li>
                                                <a class="nav-link town_name" data-id="{{$town->name}}" href="#">{{ Str::ucfirst($town->name) }}

                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Modal -->
    <div class="location_modal">
        <div class="modal fade" id="staticBackdropCat" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            By Category
                            <span class="category_name">
                                <i class="fa fa-angle-right"></i>
                                <span id="cat_name"></span>
                            </span>
                            <span class="back_catlist">
                                <i class="fa fa-angle-left"></i>
                                Go Back
                            </span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="category_list">
                            <ul>
                                @php
                                    $categories = DB::table('categories')
                                        ->orderBy('id', 'DESC')
                                        ->get();
                                @endphp
                                @foreach ($categories as $row)
                                    <li>
                                        <a class="nav-link" id="selectCategory" data-id="{{ $row->id }}"
                                            href="javascript:void(0)">
                                            {{ $row->name }}
                                            <i class="fa fa-angle-right"></i>
                                            @php
                                                $ads_count = DB::table('ads')
                                                    ->where('category_id', $row->id)
                                                    ->count();
                                            @endphp
                                            <span>({{ $ads_count }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="loadding_icon text-center" style="display: none;">
                            <img src="{{ asset('loading.gif') }}" alt="">
                        </div>
                        <div class="subcat_list" id="subcat_show">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}



    <!-- footer section start  -->
    <x-footer.footer-top />
    <!-- footer section end -->
    <!-- Back To Top Btn Start-->
    @include('layouts.frontend.partials.back-to-top')
    <!-- Back To Top Btn End-->
    <!-- Scripts goes here -->
    @include('layouts.frontend.partials.scripts')

    <script src="{{ asset('massage/toastr/toastr.js') }}"></script>
    {!! Toastr::message() !!}
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            @endforeach
        @endif
    </script>
    <script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>
    {{-- <script src="{{ asset('image_uploader/image-uploader.min.js') }}"></script> --}}
    <!-- jQuery -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script> --}}

    <!-- Bootstrap JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <!-- Font awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js" crossorigin="anonymous"></script>

        <!-- Images loader -->
        <script src="{{ asset('image_uploader/jquery.imagesloader-1.0.1.js') }}"></script> --}}
    {{-- <script>
            $('.input-images-2').imageUploader({
                maxSize: 2 * 1024 * 1024,
                maxFiles: 10,
                multiple: true,
                previewFileIcon: '<i class="fa fa-file"></i>',
            });

        </script> --}}

    <script>
        /*         $(document).ready(function () {

                        //Image loader var to use when you need a function from object
                        var auctionImages = null;

                        // Create image loader plugin
                        var imagesloader = $('[data-type=imagesloader]').imagesloader({
                        maxFiles: 4
                        , minSelect: 1
                        , imagesToLoad: auctionImages
                        });

                    }); */
    </script>
    <!-- <script>
        $('#country').on('change', function() {
            var country_name = $(this).val();
            // alert(country_name);
            if (country_name) {
                $.ajax({
                    url: "{{ url('adlist-search-ajax') }}/" + country_name,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('#town').empty();
                        $('#town').append(
                            '<option value="" disabled selected> Select Region </option>');
                        $.each(data, function(key, value) {
                            $('#town').append('<option value="' + value.name + '">' + value
                                .name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    </script> -->

    <!-- <script>
        $(".country_name").click(function() {
            var country_name = $(this).data('id');
            document.getElementById("country_name").innerHTML = country_name;
            $("#selected_country").val(country_name);
        });
        $(".town_name").click(function() {
            var town_name = $(this).data('id');
            $("#selected_town").val(town_name);
        });
    </script> -->


    <!-- Country wise city show -->
    <script>
        $(document).on('click', '#selectCountry', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('country/to/city') }}/" + id,
                type: 'get',
                dataType: "json",
                beforeSend: function() {
                    $('.loadding_icon').show();
                },
                success: function(data) {
                    $('.loadding_icon').hide();
                    $('.city_name').show();
                    $("#city_show").html(data.html);
                    $("#country_name").text(data.city.name);
                }
            });
        });
    </script>

    <!-- Category wise subcategory show -->
    <script>
        $(document).on('click', '#selectCategory', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('category/to/subcategory') }}/" + id,
                type: 'get',
                dataType: "json",
                beforeSend: function() {
                    $('.loadding_icon').show();
                },
                success: function(data) {
                    $('.loadding_icon').hide();
                    $('.category_name').show();
                    $("#subcat_show").html(data.html);
                    $("#cat_name").text(data.category_name.name);
                }
            });
        });
    </script>

    <script></script>
    <script>
        // location modal
        $(document).on('click', '.city_list .nav-link', function() {
            $('.city_list').hide();
            $('.area_list').show();
            $('.go_back').show();
            // $('.backcategory').show();
        });
        $(document).on('click', '.go_back', function() {
            $('.city_list').show();
            $('.area_list').hide();
            $('.city_name').hide();
            $("#city_show").empty();
            $("#country_name").empty();
            $('.go_back').hide();
        });
    </script>


    <script>
        // category modal
        $(document).on('click', '.category_list .nav-link', function() {
            $('.category_list').hide();
            $('.subcat_list').show();
            $('.back_catlist').show();
        });
        $(document).on('click', '.back_catlist', function() {
            $('.category_list').show();
            $('.subcat_list').hide();
            $('.category_name').hide();
            $("#subcat_show").empty();
            $("#cat_name").empty();
            $('.back_catlist').hide();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>
