@extends('layouts.frontend.layout_one')

@section('title')
    {{ $ad->title }}
@endsection

@php
    $keywords = sprintf('%s, %s', $settings->seo_meta_keywords, join(', ', $ad->adFeatures->pluck('name')->all()));
    $test = '';
@endphp

@section('meta')
    <meta name="title" content="{{ $ad->title }}">
    <meta name="description" content="{{ $ad->description }}">
    <meta name="keywords" content="{{ $keywords }}">

    <meta property="og:image" content="{{ $ad->image_url }}" />
    <meta property="og:site_name" content="{{ $settings->name }}">
    <meta property="og:title" content="{{ $ad->title }}">
    <meta property="og:url" content="{{ route('frontend.addetails', $ad->slug) }}">
    <meta property="og:type" content="article">
    <meta property="og:description" content="{{ $ad->description }}">

    <meta name=twitter:card content=summary_large_image />
    <meta name=twitter:site content="{{ $settings->name }}" />
    <meta name=twitter:creator content="{{ $ad->customer->name }}" />
    <meta name=twitter:url content="{{ route('frontend.addetails', $ad->slug) }}" />
    <meta name=twitter:title content="{{ $ad->title }}" />
    <meta name=twitter:description content="{{ $ad->description }}" />
    <meta name=twitter:image content="{{ $ad->image_url }}" />
@endsection

@section('frontend_style')
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2-bootstrap-5-theme.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/slick.css" />
    @if (auth('customer')->check() &&
            isset(session('user_plan')->ad_limit) &&
            session('user_plan')->ad_limit < $settings->free_ad_limit)
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
    {{-- <div class="banner banner--three" style="background:url('{{ asset('ads/adsbackground.jpg') }}') center center/cover no-repeat;">
        <div class="container">
           <span class="banner__tag text--body-2-600">{{ __('over') }} {{ $totalAds }} {{ __('live_ads') }}</span>
            <div class="banner__title text--display-2 animate__animated animate__bounceInDown">
                {{ $cms->index3_title }}
            </div>

            <x-frontend.adlist-search class="adlist-search" :categories="$categories" :towns="$towns" :dark="true" :total-ads="$total_ads" :marginTop="124" />
        </div>
    </div> --}}
    <!-- Banner section end   -->

    <!-- single ads section start  -->
    <section class="product-item section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    {{-- ad info --}}
                    <x-ad-details.ad-info :ad="$ad" />
                    {{-- ad gallery --}}
                    <x-ad-details.ad-gallery :galleries="$ad->galleries" :thumbnail="$ad->image_url" :slug="$ad->slug" />
                    {{-- ad description --}}
                    <x-ad-details.ad-description :description="$ad->description" :features="$ad->adFeatures" />
                </div>
                <div class="col-xl-4">
                    <div class="product-item__sidebar" >
                        <span class="toggle-bar">
                            <x-svg.toggle-icon />
                        </span>
                        <div class="product-item__sidebar-top">
                            {{-- ad wishlist --}}
                            <x-ad-details.ad-wishlist :id="$ad->id" :price="$ad->price" />
                            {{-- ad contact --}}
                            <x-ad-details.ad-contact :id="$ad->id" :phone="$ad->phone" :name="$ad->customer->username"
                                :callingtime="$ad->estimate_calling_time" :numberShowingPermission="$ad->phone_number_showing_permission" :immediateAccessToNewAds="$immediate_access_to_new_ads" />

                            {{-- ad customer info --}}
                            <x-ad-details.ad-customer-info :customer="$ad->customer" :town="$ad->town" :city="$ad->city"
                                :link="$ad->website_link" :area="$ad->area_name" />

                            <div class="product-item__sidebar-item user-details d-block d-lg-none" style="min-height: 500px;">
                                <h2 class="text--body-1">{{ __('overview') }}</h2>
                                <ul class="overview-details">
                                    @if ($ad->condition)
                                        <li class="overview-details__item">
                                            <span class="text--body-3 title">{{ __('condition') }}:</span>
                                            <span class="text--body-3 info">{{ $ad->condition }}</span>
                                        </li>
                                    @endif
                                </ul>
                                <br>
                                <h2 class="share-content__title text--body-3">
                                    <span class="icon">
                                        <x-svg.share-icon />
                                    </span>
                                    {{ __('share_ads') }}
                                </h2>
                                <ul class="d-flex">
                                    <li style="margin-right: 5px;">
                                        <a target="_blank" href="{{ socialMediaShareLinks(url()->current(), 'whatsapp') }}"
                                            class="social-link social-link--wa share__link">
                                            <x-svg.whatsapp-icon />
                                        </a>
                                    </li>
                                    <li style="margin-right: 5px;">
                                        <a target="_blank" href="{{ socialMediaShareLinks(url()->current(), 'facebook') }}"
                                            class="social-link social-link--fb share__link">
                                            <x-svg.facebook-icon fill="#fff" />
                                        </a>
                                    </li>
                                    <li style="margin-right: 5px;">
                                        <a target="_blank" href="{{ socialMediaShareLinks(url()->current(), 'twitter') }}"
                                            class="social-link social-link--tw share__link">
                                            <x-svg.twitter-icon fill="#fff" />
                                        </a>
                                    </li>
                                    <li style="margin-right: 5px;">
                                        <a target="_blank" href="{{ socialMediaShareLinks(url()->current(), 'linkedin') }}"
                                            class="social-link social-link--in share__link">
                                            <x-svg.linkedin-icon />
                                        </a>
                                    </li>
                                    <li style="margin-right: 5px;">
                                        <a href="{{ socialMediaShareLinks(url()->current(), 'gmail') }}"
                                            class="social-link social-link--p share__link">
                                            <x-svg.envelope-icon stroke="#ffffff" />
                                        </a>
                                    </li>
                                    <li style="margin-right: 5px;" onclick="copyToClipboard()" style="cursor: pointer"
                                        title="{{ __('copy_to_clipboard') }}">
                                        <a class="social-link social-link--lk share__link">
                                            <x-svg.link-icon />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-item__sidebar-bottom">
                            <div class="product-item__sidebar-item overview">
                                {{-- ad overview --}}
                                <x-ad-details.ad-overview :ad="$ad" />
                                <p style="display-block;border-bottom: 1px solid #ebeef7"></p>
                                {{-- ad share --}}
                                <x-ad-details.ad-share :slug="$ad->slug" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- single ads section End  -->
    <!-- related ads section start  -->
    <x-ad-details.ad-related-item :lists="$lists" />
    <!-- related ads section end  -->
@endsection

@section('adlisting_style')
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/slick.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/productslider.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lightgallery-bundle.min.css">
@endsection

@section('frontend_script')
    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/js/swiperslider.config.js"></script>
    @stack('ad_scripts')
    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/venobox.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>

    <!-- lightgallery plugins -->
    <script src="{{ asset('lightgallery/lightgallery.js') }}"></script>
    <script src="{{ asset('lightgallery/thumbnail.js') }}"></script>
    <script src="{{ asset('lightgallery/zoom.js') }}"></script>
    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'), {
            plugins: [lgZoom, lgThumbnail],
            speed: 500,
        });
    </script>
    <script>
        function adFilterFunction(slug) {
            $('#adFilterInput').val(slug);
            $('#adFilterForm').submit();
        }
        $(document).ready(function() {
            // ===== Select2 ===== \\
            $('#country').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ?
                    $(this).data('width') : $(this).hasClass('w-100') ?
                    '100%' : 'style',
                placeholder: 'By Country',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });

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
    </script>
@endsection
