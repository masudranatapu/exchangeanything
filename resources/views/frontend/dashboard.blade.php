 @extends('layouts.frontend.layout_one')

 @section('title', __('dashboard'))

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
    @php
        $plans = Modules\Plan\Entities\Plan::where('id', $userplan->plans_id)->first();
        $payment_setting = App\Models\PaymentSetting::first();
    @endphp
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
                         <div class="col-12">
                             <div class="dashboard-card dashboard-card--benefits">
                                 <p class="dashboard-card__title" style="font-size: 16px">{{ __('Status') }}:
                                     <span>{{ $userplan->is_active == 1 ? 'Active' : 'Pending' }}</span>
                                 </p>
                                 @if ($userplan->is_active == 0)
                                     <p>
                                        You will be notified by email as soon as the account has been approved. (Please allow up to 24 hours).
                                    </p>
                                 @endif
                                @if ($userplan->ad_limit == 0 || $userplan->valid_date < now())
                                    <p>
                                        <strong class="text-danger">
                                            Your plan has been exceeded. Kindly Upgrade
                                        </strong>
                                        <a href="{{ route('frontend.priceplan') }}">
                                            <strong class="text-primary">
                                                Pricing Plan
                                            </strong>
                                        </a>
                                    </p>
                                @endif
                                 <br>
                                <ul class="dashboard__benefits">
                                    <li class="dashboard__benefits-left">
                                        <ul>
                                            <li class="dashboard__benefits-item">
                                                <p class="text--body-4">{{ __('plan_name') }} :
                                                    <span>
                                                        @if($userplan->plans_id == 1)
                                                            Free
                                                        @else
                                                            {{$plans->name }}
                                                        @endif
                                                    </span>
                                                </p>
                                            </li>
                                            <li class="dashboard__benefits-item">
                                                    <i class="fas fa-check-circle" style="color:#108ab1; margin-right: 5px; font-size: 21px;"></i>
                                                    <p class="text--body-4">
                                                        <span>
                                                            {{ __('Adverts Limit') }} : {{ $userplan->ad_limit }}
                                                        </span>
                                                    </p>
                                            </li>
                                            <li class="dashboard__benefits-item">
                                                    <i class="fas fa-check-circle" style="color:#108ab1; margin-right: 5px; font-size: 21px;"></i>
                                                    <p class="text--body-3">
                                                        {{ __('Featured Ads limit is ') }} : {{ $userplan->featured_limit }}
                                                    </p>
                                            </li>
                                            <li class="dashboard__benefits-item">
                                                @if ($userplan->badge == true)
                                                    <i class="fas fa-check-circle" style="color:#108ab1; margin-right: 5px; font-size: 21px;"></i>
                                                @else
                                                    <span style="margin-right: 5px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d32323" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                    </span>
                                                @endif
                                                <p class="text--body-3">{{ __('special_membership_badge') }}</p>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                             </div>
                         </div>
                     </div>
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
                                             <a href="{{ route('frontend.addetails', $ad->slug) }}"
                                                 class="cards__img-wrapper">
                                                 <img src="{{ $ad->thumbnail ? asset($ad->thumbnail) : asset('backend/image/default-ad.png') }}"
                                                     alt="card-img" class="img-fluid" />
                                             </a>
                                             <div class="cards__info">
                                                 <div class="cards__info-top">
                                                     <h6 class="text--body-4 cards__category-title">
                                                         <span class="icon">
                                                             <i class="{{ $ad->category->icon ?? '' }}"></i>
                                                         </span>
                                                         {{ $ad->category->name ?? '' }}
                                                     </h6>
                                                     <a href="{{ route('frontend.addetails', $ad->slug) }}"
                                                         class="text--body-3-600 cards__caption-title">
                                                         {{ \Illuminate\Support\Str::limit($ad->title, 25, $end = '...') }}
                                                     </a>
                                                 </div>
                                                 <div class="cards__info-bottom">
                                                     <span class="cards__price-title text--body-3-600">
                                                        $ {{ $ad->price ?? '0' }}
                                                     </span>
                                                     <ul class="edit">
                                                         <li class="edit-icon">
                                                             <span class="icon-toggle">
                                                                 <x-svg.three-dots-icon />
                                                             </span>

                                                             <ul class="edit-dropdown">
                                                                 <li class="edit-dropdown__item">
                                                                     <a href="{{ route('frontend.post.edit', $ad->slug) }}"
                                                                         class="edit-dropdown__link">
                                                                         <span class="icon">
                                                                             <x-svg.edit-icon />
                                                                         </span>
                                                                         <h5 class="text--body-4">{{ __('edit_ad') }}</h5>
                                                                     </a>
                                                                 </li>
                                                                 <li class="edit-dropdown__item">
                                                                     <x-dashboard.view-ad :ad="$ad">
                                                                     </x-dashboard.view-ad>
                                                                 </li>
                                                                 <li class="edit-dropdown__item">
                                                                     @if ($ad->status === 'expired')
                                                                         <x-dashboard.make-active :ad="$ad" />
                                                                     @else
                                                                         <x-dashboard.make-expire :ad="$ad" />
                                                                     @endif
                                                                 </li>
                                                                 <li class="edit-dropdown__item">
                                                                     <x-dashboard.delete-ad :ad="$ad">
                                                                     </x-dashboard.delete-ad>
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
                 <form action="{{ route('frontend.planPurchase') }}" method="post" enctype="multipart/form-data" id="iHavePaid">
                     @csrf
                     <input type="hidden" name="users_unique_id" value="{{ $unique_id }}">
                     <input type="hidden" name="plan_id" value="{{ $userplan->plans_id }}">
                     <div class="mb-3 row">
                         <label for="user_id" class="col-sm-4 col-form-label">User Id :</label>
                         <div class="col-sm-8">
                             <input type="text" readonly class="form-control" id="user_id"
                                 value="{{ auth('customer')->user()->code }}">
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label class="col-sm-4 col-form-label">Pay To :</label>
                         <div class="col-sm-8">
                             <p class="form-control">{{ @$payment_setting->pay_to }}</p>
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
     <!-- payment popup js start -->
     <script>
         function openPaymentModal() {
             document.getElementById('iHavePaid').submit();
         }
     </script>
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
     </script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     @if ($userplan->is_active != 1)
         <script>
             var refreshIntervalId = setInterval(function() {
                 $(".blinking").animate({
                     color: "red"
                 }, "slow");
                 $(".blinking").animate({
                     color: "#000"
                 }, "slow");
             }, 200);

             setTimeout(function() {
                 clearInterval(refreshIntervalId);
             }, 1000);

             $('html, body').animate({
                 scrollTop: $('.blinking').position().top
             }, 'slow');
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
