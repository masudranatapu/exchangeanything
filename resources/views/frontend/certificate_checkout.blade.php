@extends('layouts.frontend.layout_one')
@section('title')
    {{ __('plan_details') }} ({{ @$plan->name }})
@endsection
@section('content')


    <section class="section benefits bgcolor--gray-10">
        <div class="container">
            <h2 class="text--heading-1 section__title">{{ __('get_certified') }} </h2>
            <div class="row justify-content-center my-3">
                <div class="col-lg-6">
                    <div class="dashboard-card dashboard-card--benefits">
                        <h2 class="dashboard-card__title">{{ $plan->name }}</h2>
                        <ul class="dashboard__benefits">

                            <li class="dashboard__benefits-left">
                                <ul>
                                    <div class="dashboard__benefits-item">
                                        <span class="icon">
                                            <x-svg.check-icon />
                                        </span>
                                        <h5 class="text--body-3">{{ __('Get certified Badge') }}</h5>
                                    </div>
                                    <div class="dashboard__benefits-item">
                                        <span class="icon">
                                            <x-svg.check-icon />
                                        </span>
                                        <h5 class="text--body-3"> {{ __('Send review request to customer') }}
                                        </h5>
                                    </div>
                                    <div class="dashboard__benefits-item ">
                                        <span class="icon">
                                            <x-svg.check-icon />
                                        </span>
                                        <h5 class="text--body-3"> {{ __('Share your review and rating to others') }}
                                        </h5>
                                    </div>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">

                {{-- Paypal payment --}}
                @if (config('paypal.mode') == 'sandbox')
                    @if (config('paypal.active') && config('paypal.sandbox.client_id') && config('paypal.sandbox.client_id'))
                        <div class="col-xl-6">
                            <div class="membership-card">
                                <div class="membership-card__icon" style="background-color: #e8f7ff">
                                    <x-svg.paypal-icon />
                                </div>
                                <div class="membership-card__info">
                                    <h2 class="membership-card__title text--body-1">{{ __('paypal_payment') }}</h2>
                                    <button id="paypal_btn" class="mt-3 btn btn--lg price-plan__checkout-btn">
                                        {{ __('pay_now') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    @if (config('paypal.active') && config('paypal.live.client_id') && config('paypal.live.client_secret'))
                        <div class="col-xl-6">
                            <div class="membership-card">
                                <div class="membership-card__icon" style="background-color: #e8f7ff">
                                    <x-svg.paypal-icon />
                                </div>
                                <div class="membership-card__info">
                                    <h2 class="membership-card__title text--body-1">{{ __('paypal_payment') }}</h2>
                                    <button id="paypal_btn" class="mt-3 btn btn--lg price-plan__checkout-btn">
                                        {{ __('pay_now') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif


                {{-- Stripe payment --}}

                @if (env('STRIPE_ACTIVE'))
                    <div class="col-xl-6">
                        <div class="membership-card">
                            <div class="membership-card__icon" style="background-color: #e8f7ff">
                                <x-svg.stripe-icon />
                            </div>
                            <div class="membership-card__info">
                                <h2 class="membership-card__title text--body-1">{{ __('stripe_payment') }}</h2>
                                <button id="stripe_btn" class="mt-3 btn btn--lg price-plan__checkout-btn">
                                    {{ __('pay_now') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif


                {{-- Razorpay payment --}}

                @if (env('RAZORPAY_ACTIVE'))
                    <div class="col-xl-6">
                        <div class="membership-card">
                            <div class="membership-card__icon" style="background-color: #e8f7ff">
                                <img src="{{ asset('frontend/images/payment/razorpay.svg') }}" alt="">
                            </div>
                            <div class="membership-card__info">
                                <h2 class="membership-card__title text--body-1">{{ __('razor_payment') }}</h2>
                                <button id="razorpay_btn" class="mt-3 btn btn--lg price-plan__checkout-btn">
                                    {{ __('pay_now') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif


                {{-- SSl Commerz payment --}}
                @if (config('sslcommerz.active'))
                    <div class="col-xl-6">
                        <div class="membership-card">
                            <div class="membership-card__icon" style="background-color: #e8f7ff">
                                <img src="{{ asset('frontend/images/payment/ssl.jpeg') }}" alt="">
                            </div>
                            <div class="membership-card__info">
                                <h2 class="membership-card__title text--body-1">{{ __('sslcommerz_payment') }}</h2>
                                <button type="button" id="ssl_btn" class="mt-3 btn btn--lg price-plan__checkout-btn">
                                    {{ __('pay_now') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif



                @if (env('PAYSTACK_ACTIVE'))
                    {{-- Paystack payment --}}

                    <div class="col-xl-6">
                        <div class="membership-card">
                            <div class="membership-card__icon" style="background-color: #e8f7ff">
                                <img src="{{ asset('frontend/images/payment/paystack.png') }}" alt="">
                            </div>
                            <div class="membership-card__info">
                                <h2 class="membership-card__title text--body-1">{{ __('paystack_payment') }}</h2>
                                @if (config('adlisting.currency') == 'USD')
                                    <button id="paystack_btn" class="mt-3 btn btn--lg price-plan__checkout-btn">
                                        {{ __('pay_now') }}
                                    </button>
                                @else
                                    <p class="text-danger">{{ __('paystack_does_not_support') }}
                                        {{ config('adlisting.currency') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Paypal Form --}}
                <form action="{{ route('paypal.post') }}" method="POST" class="d-none" id="paypal-form">
                    @csrf
                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                    <input type="hidden" name="transaction_type" value="2">
                    <input type="hidden" name="amount" value="{{ $plan->price }}">
                </form>


                {{-- Stripe Form --}}
                <form action="{{ route('stripe.post') }}" method="POST" class="d-none">
                    @csrf
                    <input type="hidden" name="amount" id="" value="{{ $plan->price }}">
                    <input type="hidden" name="transaction_type" value="2">
                    <input type="hidden" name="plan_id" id="" value="{{ $plan->id }}">
                    <script id="stripe_script" src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{ env('STRIPE_KEY') }}" data-amount="{{ $plan->price * 100 }}" data-plan="{{ $plan->id }}"
                        data-name="{{ config('app.name') }}" data-description="Money pay with stripe"
                        data-locale="{{ app()->getLocale() == 'default' ? 'en' : app()->getLocale() }}" data-currency="USD"></script>
                </form>

                {{-- Razorpay Form --}}
                <form action="{{ route('razorpay.post') }}" method="POST" class="d-none">
                    @csrf
                    <input type="hidden" name="transaction_type" value="2">
                    <script id="razor_script" src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ config('zakirsoft.razorpay_key') }}" data-amount="{{ session('razor_amount') }}"
                        data-buttontext="Pay with Razorpay" data-name="{{ config('app.name') }}" data-description="Money pay with razorpay"
                        data-prefill.name="{{ auth('customer')->user()->name }}"
                        data-prefill.email="{{ auth('customer')->user()->email }}" data-theme.color="#2980b9" data-currency="INR"></script>
                </form>

                {{-- paystack_btn Form --}}
                <form action="{{ route('paystack.post') }}" method="POST" class="d-none" id="paystack-form">
                    @csrf
                </form>

                {{-- SSL Form --}}
                <form method="POST" class="needs-validation d-none" novalidate>
                    <input type="hidden" value="{{ session('ssl_amount') }}" name="amount" id="total_amount" />
                    <input id="ssl_plan_id" type="hidden" name="plan_id" value="{{ $plan->id }}">
                    <input type="hidden" name="transaction_type" value="2">
                    <button class="btn btn-primary" id="sslczPayBtn" token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ route('ssl.pay') }}"> {{ __('pay_now') }}
                    </button>
                </form>

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

    <script>
        $('#paypal_btn').on('click', function(e) {
            e.preventDefault();
            $('#paypal-form').submit();
        });
        $('#pesapal_btn').on('click', function(e) {
            e.preventDefault();
            $('#pesapal-payment-form').submit();
        });

        $('#stripe_btn').on('click', function(e) {
            e.preventDefault();
            $('.stripe-button-el').click();
        });

        $('#razorpay_btn').on('click', function(e) {
            e.preventDefault();
            $('.razorpay-payment-button').click();
        });

        $('#paystack_btn').on('click', function(e) {
            e.preventDefault();
            $('#paystack-form').submit();
        });
        $('#ssl_btn').on('click', function(e) {
            e.preventDefault();
            $('#sslczPayBtn').click();
        });

        // ssl commerz
        var obj = {};
        obj.amount = $('#total_amount').val();
        obj.plan_id = $('#ssl_plan_id').val();

        $('#sslczPayBtn').prop('postdata', obj);

        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                    7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>
@endsection
