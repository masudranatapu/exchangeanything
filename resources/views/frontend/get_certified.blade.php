@extends('layouts.frontend.layout_one')

@section('title', __('price_and_billing'))

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
    <style>
        .header-table {
            position: relative;
            min-height: 45px;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
        }

        .dashboard-card--recentvoice__history .header-table {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }
    </style>
@endsection

@section('content')
    <!-- dashboard section start  -->
    <section class="section dashboard">
        <div class="container">
            @include('frontend.dashboard-alert')
            <div class="row">
                <div class="col-xl-3">
                    @include('layouts.frontend.partials.dashboard-sidebar')
                </div>
                <div class="col-xl-9">
                    <div class="row dashboard__bill-two">
                        <div class="col-lg-12">
                            <div class="dashboard-card dashboard-card--benefits">
                                @if (Auth::user()->certified_seller == 1 && Auth::user()->certificite_validity < now())
                                    <h2 class="text--heading-1 section__title">{{ __('get_certified') }} </h2>
                                    <div class="my-3">
                                        <div class="col-lg-6 container-fluid">
                                            <h2 class=" text-center">{{ __('You are a certified seller') }}</h2>
                                            <div class="content text-center">
                                                <img src="@if($plan->badge_image) {{asset($plan->badge_image)}} @else {{ asset('images/certified.jpg') }} @endif" style=" width: 200px ; height: 200px;">
                                            </div>
                                            <div class="content mt-5">
                                                <h3 class="dashboard-card__title">Benifits</h3>
                                                <ul class="dashboard__benefits">
                                                    <li class="dashboard__benefits-left">
                                                        <ul>
                                                            {{-- <div class="dashboard__benefits-item">
                                                                <span class="icon">
                                                                    <x-svg.check-icon />
                                                                </span>
                                                                <h5 class="text--body-3">{{ __($plan->certified_badge) }}
                                                                </h5>
                                                            </div>
                                                            <div class="dashboard__benefits-item">
                                                                <span class="icon">
                                                                    <x-svg.check-icon />
                                                                </span>
                                                                <h5 class="text--body-3">
                                                                    {{ __($plan->review_request) }}
                                                                </h5>
                                                            </div>
                                                            <div class="dashboard__benefits-item ">
                                                                <span class="icon">
                                                                    <x-svg.check-icon />
                                                                </span>
                                                                <h5 class="text--body-3">
                                                                    {{ __($plan->share_review) }}
                                                                </h5>
                                                            </div> --}}
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <h2 class="dashboard-card__title">{{ __('Get Certified') }}</h2>
                                    <div class="w-75 container-fluid">
                                        <div class="plan-card plan-card--active">
                                            <div class="plan-card__top">
                                                <h2 class="plan-card__title text--body-1"> {{ $plan->name }} </h2>
                                                <p class="plan-card__description">
                                                    {{ $plan->description }}
                                                </p>
                                                <div class="plan-card__price">
                                                    <h5 class="text--display-3">
                                                        {{ currencyFormating($plan->price) }}
                                                    </h5>
                                                </div>
                                                <p class="plan-card__description">
                                                    @if ($plan->package_duration == 1)
                                                        Lifetime Membership
                                                    @elseif($plan->package_duration == 2)
                                                        Annually
                                                    @elseif($plan->package_duration == 3)
                                                        Monthly
                                                    @endif
                                                </p>
                                                <a href="{{ route('frontend.certifiedCheckout', $plan->id) }}"
                                                    class="plan-card__select-pack btn btn--bg w-100">
                                                    {{ __('choose_plan') }}
                                                    <span class="icon--right">
                                                        <x-svg.right-arrow-icon />
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="plan-card__bottom">
                                            <div class="plan-card__package">
                                                {{-- <div class="plan-card__package-list active">
                                                    <span class="icon">
                                                        <x-svg.check-icon />
                                                    </span>
                                                    <h5 class="text--body-3">{{ __($plan->certified_badge) }}</h5>
                                                </div>
                                                <div class="plan-card__package-list active">
                                                    <span class="icon">
                                                        <x-svg.check-icon />
                                                    </span>
                                                    <h5 class="text--body-3"> {{ __($plan->review_request) }}
                                                    </h5>
                                                </div>
                                                <div class="plan-card__package-list active ">
                                                    <span class="icon">
                                                        <x-svg.check-icon />
                                                    </span>
                                                    <h5 class="text--body-3">
                                                        {{ __($plan->share_review) }}
                                                    </h5>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- dashboard section end  -->
@endsection

@section('frontend_script')
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
