@extends('layouts.frontend.layout_one')
@section('title')
    {{ __('plan_details') }} ({{ @$plan->label }})
@endsection
@section('content')
    {{-- <!-- breedcrumb section start  -->
<x-frontend.breedcrumb-component :background="$cms->pricing_plan_background_path">
{{ __('overview') }}
<x-slot name="items">
<li class="breedcrumb__page-item">
    <a href="{{ route('frontend.priceplan') }}"
    class="breedcrumb__page-link text--body-3">{{ __('plan_details') }}</a>
</li>
<li class="breedcrumb__page-item">
    <a class="breedcrumb__page-link text--body-3">/</a>
</li>
<li class="breedcrumb__page-item">
    <a class="breedcrumb__page-link text--body-3">{{ __('plan_details') }}</a>
</li>
</x-slot>
</x-frontend.breedcrumb-component>
<!-- breedcrumb section end  -->
--}}
    <!-- i have paid form submit -->
    <form action="{{ route('frontend.planPurchase') }}" method="post" enctype="multipart/form-data" id="iHavePaid">
        @csrf
        <input type="hidden" name="users_unique_id" value="{{ auth('customer')->user()->id }}">
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
        <div class="mb-3 row">
            <label for="user_id" class="col-sm-4 col-form-label">User Id :</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control" id="user_id"
                    value="{{ auth('customer')->user()->code }}">
            </div>
        </div>
    </form>
    <!-- Banner section start  -->
    {{--
<div class="banner banner--three" style="background:url('{{ asset('ads/adsbackground.jpg') }}') center center/cover no-repeat; height: 232px !important;">
    <div class="container">
       <span class="banner__tag text--body-2-600">{{ __('over') }} {{ $totalAds }} {{ __('live_ads') }}</span>
        <div class="banner__title text--display-2 animate__animated animate__bounceInDown">
            {{ $cms->index3_title }}
        </div>

        <x-frontend.adlist-search class="adlist-search" :categories="$categories" :towns="$towns" :dark="true" :total-ads="$total_ads" :marginTop="75" />
    </div>
</div>
--}}
    <!-- Banner section end   -->

    <section class="section benefits bgcolor--gray-10">
        <div class="container">
            <h2 class="text--heading-1 section__title">{{ __('plan_details_and_benefits') }} </h2>
            <div class="row justify-content-center my-3">
                <div class="col-lg-6">
                    <div class="dashboard-card dashboard-card--benefits">
                        <h2 class="dashboard-card__title">{{ __('current_plan_benefits') }}</h2>
                        <ul class="dashboard__benefits">

                            <li class="dashboard__benefits-left">
                                <ul>
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
                                        <p class="text--body-3">{{ $plan->featured_limit }} {{ __('featured_ads') }}</p>
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
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    @if ($message = Session::get('success'))
                        <div class="alert bg-success" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert bg-danger" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                    <div class="membership-card">
                        <div class="membership-card__info">
                            @php
                                $userPlan = App\Models\UserPlan::CustomerData(auth('customer')->id())->first();
                                $plan_id = $plan->plans_id;
                                $plans = Modules\Plan\Entities\Plan::where('id', $plan_id)->first();
                                $payment_setting = App\Models\PaymentSetting::first();
                            @endphp

                            {{--  @if ($userPlan->is_active == 1)
                        <p class="blinking">Thank you for choosing the <strong>{{$plan->label}}</strong>   membership package. </p>

                        <p>Your membership ID is <strong>{{ auth('customer')->user()->code  }}</strong> .</p>

                        <p> Please send your ARRR equivalent payment of <strong>${{$plan->price}}</strong>  to: <br> <strong>{{$payment_setting->pay_to}}</strong></p>

                        <p>You <strong>MUST</strong> include your membership ID in the MEMO FIELD so we can confirm payment and activate your account. </p>
                        <p><strong> Please use the converter below for the current exchange rate.</strong></p>
                        <br>
                            <div style="width: 250px; height:335px; background-color: #FAFAFA; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; block-size:335px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;margin: 0;width: 250px;padding:1px;padding: 0px; margin: 0px;"><div style="height:315px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=converter&theme=light" width="250" height="310px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div>
                            <br>
                            <p>When you have sent the payment press the ‘I have paid’ button.</p>
                            <p> You will be notified by email as soon as the account has been approved. (Please allow up to 24 hours).</p>
                            <p>Thank you for joining the ExchangeAnything Pirate Chain Community!</p>

                        <button onclick="openPaymentModal()" class="btn btn-success btn-sm">I have paid</button>
                        @endif
                        --}}
                            {{-- <form action="{{route('frontend.planPurchase')}}" method="post"
                            enctype="multipart/form-data" onsubmit="return formValidation()" id="step2Form">
                            @csrf
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
                                    <input type="hidden" name="plan_id" class="form-control" id="plan_id"
                                    value="{{@$plan->id}}">

                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <label for="proof_image" class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-4">
                                    <button class="btn btn-primary btn-xs">Submit</button>
                                </div>
                            </div>
                        </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- popup for package change alert start -->
    <div id="paymentPopupModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4" style="width: 41%;">
            <div class="w3-container my-2 py-5">
                <p class="text-center py-3">You will be locked before approved by admin. </p>
                <div class="d-flex justify-content-center">
                    <button onclick="PermissionYes()" class="btn btn-success">Ok</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- popup for package change alert end -->
@endsection
@section('frontend_script')
    <script>
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
        //form validation start
        function formValidation() {
            document.getElementById('paymentPopupModal').style.display = 'block';
            return false;
        }

        function PermissionYes() {
            document.getElementById('step2Form').submit();
        }
    </script>
    <script>
        function openPaymentModal() {
            var yes = window.confirm('Your current plan will be deactivated. Are you sure to proceed ?');
            if (yes) {
                document.getElementById('iHavePaid').submit();
            } else {
                //some code
            }

        }
    </script>
@endsection
