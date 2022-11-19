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
    <!-- Banner section start  -->
    {{--
    <div class="banner banner--three" style="background:url('{{ asset('ads/adsbackground.jpg') }}') center center/cover no-repeat;">
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
                    <div class="row dashboard__bill-two">
                        <div class="col-lg-7">
                            <div class="dashboard-card dashboard-card--benefits">
                                <div class="row">
                                    <h2 class="dashboard-card__title">{{ __('plan_benefits') }}</h2>
                                </div>
                                <ul class="dashboard__benefits">
                                    <li class="dashboard__benefits-left">
                                        <ul>
                                            <li class="dashboard__benefits-item">
                                                <p class="text--body-4">{{ __('plan_name') }} :
                                                    <span>{{ $plan->label }}</span>
                                                </p>
                                            </li>

                                            <li class="dashboard__benefits-item">
                                                <i class="fas fa-check-circle"
                                                    style="color:#108ab1; margin-right: 5px; font-size: 21px;"></i>
                                                <p class="text--body-4">
                                                    @if ($plan->ad_limit == 0)
                                                        Unlimited adverts
                                                    @else
                                                        {{ __('ads_limit') }} : {{ $plan->ad_limit }}
                                                    @endif
                                                </p>
                                            </li>
                                            <li class="dashboard__benefits-item">
                                                <i class="fas fa-check-circle"
                                                    style="color:#108ab1; margin-right: 5px; font-size: 21px;"></i>
                                                <p class="text--body-3">{{ $plan->featured_limit }} {{ __('featured_ads') }}
                                                </p>
                                            </li>

                                            <li class="dashboard__benefits-item">
                                                @if ($plan->badge == true)
                                                    <i class="fas fa-check-circle"
                                                        style="color:#108ab1; margin-right: 5px; font-size: 21px;"></i>
                                                @else
                                                    <i class="fas fa-times"
                                                        style="color:red; margin-right: 5px; font-size: 21px;"></i>
                                                @endif
                                                <p class="text--body-3">{{ __('special_membership_badge') }}</p>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5">

                            <div class="dashboard-card dashboard-card--invoice">
                                <h2 class="dashboard-card__title">{{ __('upgrade_plan') }}</h2>
                                <div class="dashboard-card--invoice-info">
                                    <div class="action">
                                        <a href="{{ route('frontend.priceplan') }}"
                                            class="btn">{{ __('upgrade_plan') }}</a>
                                    </div>
                                </div>
                                <span class="dashboard-card--invoice__icon">
                                    <x-svg.invoice-icon />
                                </span>
                            </div>

                        </div>
                    </div>

                    <div class="row dashboard__bill-three">
                        <div class="col-lg-12">
                            <div class="invoice-table">
                                <h4>{{ __('recent_invoice') }}</h4>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>{{ __('transaction_id') }}</th>
                                            <th>{{ __('plan_type') }}</th>
                                            <th>{{ __('payment_type') }}</th>
                                            <th>{{ __('amount') }}</th>
                                            <th>{{ __('date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->payment_id }}</td>
                                                <td>{{ $transaction->plan->label }}</td>
                                                <td>{{ $transaction->payment_type }}</td>
                                                <td>${{ $transaction->amount }}</td>
                                                <td>{{ Carbon\Carbon::parse($transaction->created_at)->format('M d, Y g:i A') }}
                                                </td>
                                            </tr>
                                        @empty
                                            <x-not-found2 message="No recent invoice found" />
                                        @endforelse
                                    </tbody>
                                </table>
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
