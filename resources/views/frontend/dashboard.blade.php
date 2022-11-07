 @extends('layouts.frontend.layout_one')

@section('title',__('dashboard'))

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
    <div class="banner banner--three" style="background:url('{{ asset('ads/adsbackground.jpg') }}') center center/cover no-repeat;">
        <div class="container">
             @include('frontend.user-search-filter')
        </div>
    </div>
    --}}
    <!-- Banner section end   -->
    <!-- dashboard section start  -->
    <section class="section dashboard dashboard--user">
        <div class="container">
            @include('frontend.dashboard-alert')
            <div class="row">
                <div class="col-xl-3">
                    @include('layouts.frontend.partials.dashboard-sidebar')
                </div>
                <div class="col-xl-9">
                    <div class="dashboard__count-card row">
                        <div class="col-lg-4">
                            <div class="dashboard-card dashboard-card--count bgcolor--primary-9">
                                <div class="dashboard-card--count__info">
                                    <span class="counter-number text--heading-2"> {{ $posted_ads_count }} </span>

                                    <h2 class="counter-title text--body-3">{{ __('posted_ads') }}</h2>
                                </div>
                                <div class="dashboard-card--count__icon">
                                    <span class="icon">
                                        <x-svg.list-icon />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dashboard-card dashboard-card--count bgcolor--success-9">
                                <div class="dashboard-card--count__info">
                                    <span class="counter-number text--heading-2"> {{ $favouriteadcount }} </span>
                                    <h2 class="counter-title text--body-3">{{ __('favorite_ads') }}</h2>
                                </div>
                                <div class="dashboard-card--count__icon">
                                    <span class="icon">
                                        <x-svg.favourite-icon />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="dashboard-card dashboard-card--count bgcolor--danger-9">
                                <div class="dashboard-card--count__info">
                                    <span class="counter-number text--heading-2"> {{ $expire_ads_count }} </span>
                                    <h2 class="counter-title text--body-3">{{ __('expire_ads') }}</h2>
                                </div>
                                <div class="dashboard-card--count__icon">
                                    <span class="icon">
                                        <x-svg.cube-icon />
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row dashboard__ads-activity">
                        <div class="col-lg-7">
                            <div class="dashboard-card dashboard-card--benefits">
                                <!-- <div class="row">
                                    <div class="col-md-8" >
                                        <h2 class="dashboard-card__title">{{ __('plan_benefits') }}</h2>
                                    </div>
                                    <div class="col-md-4" >
                                        <p class="dashboard-card__title" style="font-size: 16px">{{ __('Status') }}:  <span >{{$plan_info->is_active == 1 ? 'Active' :'Pending' }}</span></p>
                                    </div>
                                </div> -->

                                <ul class="dashboard__benefits">
                                    <li class="dashboard__benefits-left">
                                        <ul>
                                            <li class="dashboard__benefits-item">
                                                <p class="text--body-4">{{ __('plan_name') }} :
                                                    <span>{{ $plan->label }}</span>
                                                </p>
                                            </li>

                                            <li class="dashboard__benefits-item">
                                                <i class="fas fa-check-circle" style="color:#bd9746; margin-right: 5px; font-size: 21px;"></i>
                                                <p class="text--body-4">
                                                    <span>@if($plan->ad_limit == 0) Unlimited  adverts @else {{ __('ads_limit') }} : {{ $plan->ad_limit }}  @endif</span>
                                                </p>
                                            </li>

                                            <li class="dashboard__benefits-item">
                                                <i class="fas fa-check-circle" style="color:#bd9746; margin-right: 5px; font-size: 21px;"></i>
                                                 <p class="text--body-3">{{ $plan->featured_limit }} {{ __('featured_ads') }}</p>
                                            </li>

                                            <li class="dashboard__benefits-item">
                                                 @if($plan->badge == true)
                                                        <i class="fas fa-check-circle" style="color:#bd9746; margin-right: 5px; font-size: 21px;"></i>
                                                    @else
                                                         <i class="fas fa-times" style="color:red; margin-right: 5px; font-size: 21px;"></i>
                                                    @endif
                                                 <p class="text--body-3">{{ __('special_membership_badge') }}</p>
                                            </li>
                                        </ul>
                                    </li>
                                 
                                </ul>
                            </div>
                        </div>

{{--                        <div class="col-lg-6">--}}
{{--                            <div class="dashboard-card">--}}
{{--                                <div class="dashboard__section-info">--}}
{{--                                    <h2 class="dashboard-card__title">{{ __('ads_view') }}</h2>--}}
{{--                                    --}}{{-- <ul class="history">--}}
{{--                                        <li class="history-item">--}}
{{--                                            <a href="#" class="history-link">--}}
{{--                                                This Week--}}
{{--                                                <span class="icon">--}}
{{--                                                    <x-svg.bottom-light-icon />--}}
{{--                                                </span>--}}
{{--                                            </a>--}}
{{--                                            <ul class="history-dropdown">--}}
{{--                                                <li class="history-dropdown__item">--}}
{{--                                                    <a href="#" class="history-dropdown__link">Previous Week</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="history-dropdown__item">--}}
{{--                                                    <a href="#" class="history-dropdown__link">Last Month</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="history-dropdown__item">--}}
{{--                                                    <a href="#" class="history-dropdown__link">Last years</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                    </ul> --}}
{{--                                </div>--}}
{{--                                <canvas id="adsview" width="536" height="436"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <x-dashboard.activity-log :activities="$activities"/>--}}
{{--                        </div>--}}
                    </div>
                    
    @php 
    $userPlan = App\Models\UserPlan::CustomerData($use_id)->first();
    $plan_id = $plan_info->plans_id;
    $plans = Modules\Plan\Entities\Plan::where('id', $plan_id)->first();

    $payment_setting = App\Models\PaymentSetting::first();
    @endphp


                   
            

                    
                    @if ($recent_ads->count() > 0)
                        <div class="dashboard__posted-ads">
                            <div class="dashboard__section-info">
                                <h2 class="dashboard-card__title">{{ __('recently_posted_ads') }}</h2>

                                <a href="{{ route('frontend.adlist') }}" class="view-page">
                                    {{ __('view_all') }}
                                    <span class="icon">
                                        <x-svg.right-arrow-icon stroke="#939AAD" />
                                    </span>
                                </a>
                            </div>
                            <div class="row dashboard__posted-ads-slider">
                                @foreach ($recent_ads as $ad)
                                    <div class="dashboard__posted-ads-slider--item">
                                        <div class="cards cards--one overflow-visible">
                                            <a href="{{ route('frontend.addetails', $ad->slug) }}" class="cards__img-wrapper">
                                                <img src="{{ $ad->thumbnail ? asset($ad->thumbnail) : asset('backend/image/default-ad.png') }}" alt="card-img" class="img-fluid" />
                                            </a>
                                            <div class="cards__info">
                                                <div class="cards__info-top">
                                                    <h6 class="text--body-4 cards__category-title">
                                                        <span class="icon">
                                                            <i class="{{ $ad->category->icon }}"></i>
                                                        </span>
                                                        {{ $ad->category->name }}
                                                    </h6>
                                                    <a href="{{ route('frontend.addetails', $ad->slug) }}" class="text--body-3-600 cards__caption-title">
                                                        {{ \Illuminate\Support\Str::limit($ad->title, 25, $end='...') }}
                                                    </a>
                                                </div>
                                                <div class="cards__info-bottom">
                                                    <span class="cards__price-title text--body-3-600">${{ $ad->price }} </span>
                                                    <ul class="edit">
                                                        <li class="edit-icon">
                                                            <span class="icon-toggle">
                                                                <x-svg.three-dots-icon />
                                                            </span>

                                                            <ul class="edit-dropdown">
                                                                <li class="edit-dropdown__item">
                                                                    <a href="{{ route('frontend.post.edit', $ad->slug) }}" class="edit-dropdown__link">
                                                                        <span class="icon">
                                                                            <x-svg.edit-icon />
                                                                        </span>
                                                                        <h5 class="text--body-4">{{ __('edit_ad') }}</h5>
                                                                    </a>
                                                                </li>
                                                                <li class="edit-dropdown__item">
                                                                    <x-dashboard.view-ad :ad="$ad"></x-dashboard.view-ad>
                                                                </li>
                                                                <li class="edit-dropdown__item">
                                                                    @if ($ad->status === 'expired')
                                                                        <x-dashboard.make-active :ad="$ad"/>
                                                                    @else
                                                                        <x-dashboard.make-expire :ad="$ad"/>
                                                                    @endif
                                                                </li>
                                                                <li class="edit-dropdown__item">
                                                                    <x-dashboard.delete-ad :ad="$ad"></x-dashboard.delete-ad>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- dashboard section end  -->

    <!-- payment popup start -->
    <div id="paymentPopupModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4" style="width: 41%;">

            <div class="w3-container my-2 py-5">
               
                <form action="{{route('frontend.planPurchase')}}" method="post"
                            enctype="multipart/form-data" id="iHavePaid">
                        @csrf
                    
                    <input type="hidden" name="users_unique_id" value="{{$unique_id}}">
                    <input type="hidden" name="plan_id" value="{{$plan_id}}">

                        <div class="mb-3 row">
                            <label for="user_id" class="col-sm-4 col-form-label">User Id :</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="user_id"
                                        value="{{ auth('customer')->user()->code  }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Pay To :</label>
                            <div class="col-sm-8">
                                <p class="form-control">{{@$payment_setting->pay_to}}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="payment_note" class="col-sm-4 col-form-label">You can write note to admin</label>
                            <div class="col-sm-8">
                                <textarea name="payment_note" id="payment_note" rows="3" class="form-control"></textarea>
                            </div>
                        </div>


                        <div class="row justify-content-center">
                            <div class="form-group col-md-3 col-sm-3 col-4 offset-2 text-center">
                            <span onclick="document.getElementById('paymentPopupModal').style.display='none'"
                                class="btn btn-danger">Cancel</span>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary btn-xs">Pay Now</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- payment popup end -->

<!-- payment popup js start -->
<script>
    function openPaymentModal() {
        document.getElementById('iHavePaid').submit();
    }
</script>
<!-- payment popup js end -->

@endsection

@section('adlisting_style')
<link rel="stylesheet" href="{{ asset('frontend/css') }}/slick.css" />
    <style>
        .dashboard-card--recent__activity-item {
            align-items: center !important;
        }
    </style>
@endsection

@section('frontend_script')
    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/chart.min.js"></script>

    <script>
        const ctx = document.querySelector('#adsview');

        // ===== chart ===== \\
        if (ctx) {
            ctx.getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: '',
                        data: {{ json_encode($bar_chart_datas) }},
                        backgroundColor: '#0088cc',
                        borderWidth: 0,
                        barThickness: 28,
                        borderRadius: 100,
                    }, ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                    plugins: {
                        legend: {
                            display: false,
                        },
                    },
                },
            });
        }

        // ==== Internation telephone  Code ===== \\
        // if (inputNumber) {
        //     window.intlTelInput(inputNumber, {
        //         preferredCountries: ['us', 'bd'],
        //     });
        // }

    </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@if($userPlan->is_active != 1)
<script>
    var refreshIntervalId = setInterval(function () {
        $(".blinking").animate({ color: "red" }, "slow");
        $(".blinking").animate({ color: "#000" }, "slow");
    }, 200);

    setTimeout(function () {
        clearInterval(refreshIntervalId);
    }, 1000);    

    $('html, body').animate({scrollTop:$('.blinking').position().top}, 'slow');
</script>
@endif



    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/venobox.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>
    <script>
        function adFilterFunction(slug) {
            $('#adFilterInput').val(slug);
            $('#adFilterForm').submit();
        }
    </script>
@endsection
