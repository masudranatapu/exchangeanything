<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <style>
            .navigation-bar__logo {
                margin-right: 32px;
            }
            .navigation-bar .menu {
                margin-left: 32px;
            }
            .navigation-bar__buttons .user {
                margin: 0px 24px;
            }
            .search.search-no-borders {
                border: none;
            }
        </style>
        {!! $settings->header_css !!}
        {!! $settings->header_script !!}
        <link rel="stylesheet" href="{{ asset('frontend/css') }}/main.css">
        <link rel="stylesheet" href="{{asset('massage/toastr/toastr.css')}}">
    </head>
    <body class="{{ auth('customer')->check() && isset(session('user_plan')->ad_limit) && session('user_plan')->ad_limit < $settings->free_ad_limit ? 'wraning-show_hide':'' }}" dir="{{ langDirection() }}">
        <!-- Top bar start  -->
        @if (auth('customer')->check() && isset(session('user_plan')->ad_limit) && session('user_plan')->ad_limit < $settings->free_ad_limit)
            @include('layouts.frontend.partials.top-bar')
        @endif
        <!-- loader start  -->
        @if (setting('website_loader'))
            @include('layouts.frontend.partials.loader')
        @endif
        <!-- loader end  -->
        <!-- Top bar end  -->
        <x-header.home3-header />
        @yield('content')
        <!-- Location Modal -->
        <div class="location_modal">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">
                            By Location
                            <span class="city_name">
                                <i class="fa fa-angle-right"></i>
                                Louisiana
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
                                    @if(isset($countries) && count($countries) > 0)
                                        @foreach ($countries as $country)
                                            <li>
                                                <a class="nav-link" href="#">
                                                    {{ Str::ucfirst($country->name) }}
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="area_list">
                                @php
                                    $towns = Modules\Location\Entities\Town::latest()->get();
                                    $town_name = explode(',', request('town'));
                                @endphp
                                <ul>
                                    @if(isset($towns) && count($towns) > 0)
                                        @foreach ($towns as $town)
                                            <li>
                                                <a class="nav-link" href="#">{{ Str::ucfirst($town->name) }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).on('click', '.city_list .nav-link', function(){
                $('.city_list').hide();
                $('.area_list').show();
                $('.city_name').show();
                $('.go_back').show();
                // $('.backcategory').show();
            });
            $(document).on('click', '.go_back', function(){
                $('.city_list').show();
                $('.area_list').hide();
                $('.city_name').hide();
                $('.go_back').hide();
            });
        </script>
        <!-- footer section start  -->
        <x-footer.footer-top />
        <!-- footer section end -->
        <!-- Back To Top Btn Start-->
        @include('layouts.frontend.partials.back-to-top')
        <!-- Back To Top Btn End-->
        <!-- Scripts goes here -->
        @include('layouts.frontend.partials.scripts')
        
        <script src="{{asset('massage/toastr/toastr.js')}}"></script>
        {!! Toastr::message() !!}
        <script>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr.error('{{ $error }}','Error',{
                        closeButton:true,
                        progressBar:true,
                    });
                @endforeach
            @endif
        </script>
        
        <script>
            $('#country').on('change', function(){
                var country_name = $(this).val();
                // alert(country_name);
                if(country_name) {
                    $.ajax({
                        url: "{{  url('adlist-search-ajax') }}/"+country_name,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('#town').empty();
                            $('#town').append('<option value="" disabled selected> Select Region </option>');
                            $.each(data, function(key, value){
                                $('#town').append('<option value="'+ value.name +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        </script>
    </body>
</html>
