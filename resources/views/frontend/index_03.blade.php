@extends('layouts.frontend.layout_one')

@section('title', __('home'))

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
    <div class="banner banner--three"
        style="background:url('{{ asset('ads/banner.jpg') }}') center center/cover no-repeat; height: 425px !important; padding-top:87px; padding-bottom: 32px !important;">
        <div class="container">
            <span class="banner__tag text--body-2-600">{{ __('over') }} {{ $totalAds }} {{ __('live_ads') }}</span>
            <div class="banner__title text--display-2 animate__animated animate__bounceInDown">
                {{ $cms->index3_title }}
            </div>

            <h4 style="color: white;">
                {!! $cms->index3_short_title !!}
            </h4>


            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <div class="home_banner">
                        <x-frontend.adlist-search class="adlist-search" :categories="$categories" :towns="$towns"
                            :dark="true" :total-ads="$total_ads" :marginTop="124" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($viewadshistory->count() > 0)
        <section class="section recent-post">
            <div class="container">
                <h2 class="text--heading-1 section__title">{{ __('Recently Views') }}</h2>
                <div class="row">
                    @foreach ($viewadshistory as $adshistory)
                        @php
                            $ads = Modules\Ad\Entities\Ad::where('id', $adshistory->property_id)->first();
                        @endphp
                        <div class="col-xl-3 col-md-6 mb-4">
                            @php
                                $area = DB::table('areas')
                                    ->where('id', $ads->area_id)
                                    ->first();
                            @endphp
                            <div class="card_product">
                                <div class="card_img">
                                    <a href="{{ route('frontend.addetails', $ads->slug) }}" class="cards__img-wrapper">
                                        @if ($ads->thumbnail)
                                            <img src="{{ asset($ads->thumbnail) }}" alt="{{ $ads->title }}"
                                                class="img-fluid" />
                                        @else
                                            <img src="{{ asset('backend/image/default-ad.png') }}" alt="card-img"
                                                class="img-fluid" />
                                        @endif
                                    </a>
                                </div>
                                <div class="card_content">
                                    <h6>
                                        {{ date('d M , Y', strtotime($ads->created_at)) }}
                                        <span class="float-end">
                                            <a href="{{ route('frontend.seller.profile', $ads->customer->username) }}">
                                                {{ '@' . $ads->customer->username }}
                                            </a>
                                        </span>
                                    </h6>
                                    <h3>
                                        <a href="{{ route('frontend.addetails', $ads->slug) }}"
                                            class="text--body-3-600 cards__caption-title">
                                            {{ \Illuminate\Support\Str::limit($ads->title, 23, $end = '...') }}
                                        </a>
                                    </h3>
                                    <div class="cards__info-bottom">
                                        <h5 class="cards__location text--body-4">
                                            <span class="icon">
                                                <x-svg.location-icon width="20" height="20" stroke="#0088cc" />
                                            </span>
                                            @if ($ads->town)
                                                {{ $ads->town->name ?? '' }}
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- Poupular category Section start  -->
    {{-- <section class="section popular-category">
        <div class="container">
            <h2 class="text--heading-1 section__title">{{ __('popular_category') }}</h2>
            <div class="row">
                @foreach ($topCategories as $category)
                    <div class="col-6 col-sm-4 col-lg-4 col-xl-3 col-xxl-2">
                        <div class="category-card">

                            <div class="category-card__icon">
                                <i class="{{ $category->icon }}" style="font-size: 40px"></i>
                            </div>


                            <form method="GET" action="{{ route('frontend.adlist.search') }}" id="adFilterForm"
                                class="d-none">
                                <input type="hidden" name="category" value="" id="adFilterInput">
                            </form>
                            <a href="javascript:void(0)" onclick="adFilterFunction('{{ $category->slug }}')">
                                <h5 class="text--body-2 category-card__title"> {{ Str::limit($category->name, 16) }} </h5>
                            </a>
                            <div class="category-card__view">
                                <span class="first view-number"> {{ $category->ad_count ?? 0 }}
                                    {{ __('ads') }}</span>
                                <a href="javascript:void(0)" onclick="adFilterFunction('{{ $category->slug }}')"
                                        class="second view-btn">
                                        {{ __('view_ads') }}
                                        <span class="icon">
                                            <x-svg.right-arrow-icon stroke="#0088cc" />
                                        </span>
                                    </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    {{-- featured post Section start --}}
    @if ($settings->featured_ads_homepage)
        <section class="section recent-post">
            <div class="container">
                <h2 class="text--heading-1 section__title">{{ __('Latest Ads') }}</h2>
                <div class="row">
                    @foreach ($featuredAds as $ad)
                        <x-frontend.single-ad :ad="$ad" className="col-xl-3 col-md-6 mb-4"></x-frontend.single-ad>
                    @endforeach
                </div>
                @if (count($featuredAds) > 0)
                    <div class="recent-post__btn">
                        <a href="{{ route('frontend.adlist') }}" class="btn">
                            {{ __('view_all') }}
                            <!--  <span class="icon--right">
                                        <x-svg.right-arrow-icon />
                                    </span> -->
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif
    <!-- featured post Section end  -->
    <!-- recent post Section start  -->
    @if ($settings->regular_ads_homepage)
        <section class="section recent-post">
            <div class="container">
                <h2 class="text--heading-1 section__title">{{ __('regular_ads') }}</h2>
                <div class="row">
                    @foreach ($latestAds as $ad)
                        <x-frontend.single-ad :ad="$ad" className="col-xl-3 col-md-6"></x-frontend.single-ad>
                    @endforeach
                </div>
                @if (count($latestAds) > 0)
                    <div class="recent-post__btn">
                        <a href="{{ route('frontend.adlist') }}" class="btn">
                            {{ __('view_all') }}
                            <!-- <span class="icon--right">
                                        <x-svg.right-arrow-icon />
                                    </span> -->
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    <!-- How to work Section start  -->
    <x-others.how-it-work />

    <!-- popular-loc section start  -->
    <section class="section popular-location">
        <div class="container">
            <h2 class="text--heading-1 section__title">
                {{ __('Populars Cities') }}
            </h2>
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                @foreach ($townsandcitys as $city)
                    <div class="col">
                        <x-frontend.location.single-popular-location :city="$city">
                        </x-frontend.location.single-popular-location>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- price-plan section start  -->
    {{-- <section class="section price-plan">
        <div class="container">
            <h2 class="price-plan__title text--heading-1">{{ __('become_a_barrrter_member') }}</h2>
            <p class="price-plan__brief text--body-3">
                {{ $cms->membership_content }}
            </p>
            <div class="tab-content" id="nav-tabContent">
                <!-- Monthly -->
                <div class="tab-pane fade show active" id="nav-monthly" role="tabpanel" aria-labelledby="nav-monthly-tab">
                    <div class="row">
                        @forelse ($plans as $plan)
                            <x-others.single-plan :plan="$plan" />
                        @empty
                            <x-no-data-found />
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- price-plan section end  -->
    <!-- newsletter subscription  -->
    @if ($newsletter_enable)
        @include('layouts.frontend.partials.newsletter')
    @endif
@endsection

@section('frontend_script')
    <script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>
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
    @stack('newslater_script')
@endsection
