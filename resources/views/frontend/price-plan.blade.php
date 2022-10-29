@extends('layouts.frontend.layout_one')

@section('title', __('price_and_plan'))

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
    <div class="banner banner--three" style="background:url('{{ asset('ads/adsbackground.png') }}') center center/cover no-repeat;">
        <div class="container">
            {{--<span class="banner__tag text--body-2-600">{{ __('over') }} {{ $totalAds }} {{ __('live_ads') }}</span>
            <div class="banner__title text--display-2 animate__animated animate__bounceInDown">
                {{ $cms->index3_title }}
            </div>--}}
            <!-- Search Box -->
            <x-frontend.adlist-search class="adlist-search" :categories="$categories" :towns="$towns" :dark="true" :total-ads="$total_ads" :marginTop="124" />
        </div>
    </div>
    <!-- Banner section end   -->
    
    <!-- price-plan section start  -->
    <section class="section price-plan mt-5 mb-2">
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
                            <x-others.single-plan :plan="$plan"/>
                        @empty
                        <x-no-data-found/>
                        @endforelse
                    </div>
                </div>
            </div>
            <p class="price-plan__brief mt-3"><b>* Payable in ARRR equivalent at time of registration</b></p>
        </div>
    </section>
    <!-- price-plan section end  -->
@endsection

@section('frontend_script')
    <script type="module" src="{{ asset('frontend') }}/js/plugins/bvselect.js"></script>
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

