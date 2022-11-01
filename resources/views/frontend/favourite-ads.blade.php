@extends('layouts.frontend.layout_one')

@section('title', __('favorite_ads'))

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
{{--  
    <!-- Banner section start  -->
    <div class="banner banner--three" style="background:url('{{ asset('ads/adsbackground.png') }}') center center/cover no-repeat;">
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
                    @include(
                        'layouts.frontend.partials.dashboard-sidebar'
                    )
                </div>
                <div class="col-xl-9">
                    @include(
                        'layouts.frontend.partials.dashboard-myads-filter',
                        ['routeName' => 'frontend.favourites']
                    )
                    <div class="dashboard__myads">
                        @if ($wishlists->count() > 0)
                            <!-- <div class="header-table">
                                <div class="header-item">
                                    <h6 class="text--body-4-600">
                                        {{ __('ads') }}
                                    </h6>
                                </div>
                                <div class="header-item">
                                    <h6 class="text--body-4-600">
                                        {{ __('date') }}
                                    </h6>
                                </div>
                                <div class="header-item">
                                    <h6 class="text--body-4-600">
                                        {{ __('prices') }}
                                    </h6>
                                </div>
                                <div class="header-item">
                                    <h6 class="text--body-4-600">
                                        {{ __('category') }}
                                    </h6>
                                </div>
                                <div class="header-item">
                                    <h6 class="text--body-4-600">
                                        {{ __('action') }}
                                    </h6>
                                </div>
                            </div> -->
                            <table class="table">
                                <tr>
                                    <th>{{ __('Ads Image') }}</th>
                                    <th>{{ __('ads') }}</th>
                                    <th>{{ __('date') }}</th>
                                    <th>{{ __('prices') }}</th>
                                    <th> {{ __('category') }}</th>
                                    <th>{{ __('action') }}</th>
                                </tr>
                            </table>
                        @endif
                        <div class="body">
                            @forelse ($wishlists as $ad)
                                <x-dashboard.ads-lg :ad="$ad" showstatue="no">
                                    <form action="{{ route('frontend.add.wishlist') }}" method="POST">
                                        @csrf
                                        @if (auth('customer')->check())
                                            <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                                            <input type="hidden" name="customer_id"
                                                value="{{ auth('customer')->user()->id }}">
                                        @endif
                                        <button type="submit" class="btn btn--bg btn--fav">
                                            <span class="icon">
                                                <x-svg.heart-icon fill="#06D7A0" strokeWidth="0.5" />
                                            </span>
                                        </button>
                                    </form>
                                </x-dashboard.ads-lg>
                                <x-dashboard.ads-sm :ad="$ad" showstatue="no">
                                    <form action="{{ route('frontend.add.wishlist') }}" method="POST">
                                        @csrf
                                        @if (auth('customer')->check())
                                            <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                                            <input type="hidden" name="customer_id"
                                                value="{{ auth('customer')->user()->id }}">
                                        @endif
                                        <button type="submit" class="btn btn--bg btn--fav">
                                            <span class="icon">
                                                <x-svg.heart-icon fill="#06D7A0" strokeWidth="0.5" />
                                            </span>
                                        </button>
                                    </form>
                                </x-dashboard.ads-sm>
                            @empty
                                <x-not-found2 />
                            @endforelse
                        </div>
                        <div class="page-navigation">
                            {{ $wishlists->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- dashboard section end  -->
@endsection

@section('frontend_style')
    <link rel="manifest" href="{{ asset('frontend') }}/images/favicon_io/site.webmanifest" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/js/plugins/css/slick.css" />
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">

    <style>
        .header-table {
            position: relative;
            min-height: 45px;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
        }

        .dashboard__myads .header-table {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-top: 32px;
            background-color: #fff;
            -webkit-box-shadow: 0px -1px 0px 0px #ebeef7 inset;
            box-shadow: 0px -1px 0px 0px #ebeef7 inset;
        }

    </style>
@endsection

@section('frontend_script')
    <script src="{{ asset('frontend') }}/js/plugins/bvselect.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sortBy = new BVSelect({
                selector: '#sortByFilter',
                searchbox: false,
                offset: false,
                placeholder: 'Sort By',
                search_autofocus: true,
                breakpoint: 450,
            });
            var category = new BVSelect({
                selector: '#myadFilterCategory',
                searchbox: false,
                offset: false,
                placeholder: 'All category',
                search_autofocus: true,
                breakpoint: 450,
            });
        });
    </script>
    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/venobox.min.js"></script>
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
@endsection
