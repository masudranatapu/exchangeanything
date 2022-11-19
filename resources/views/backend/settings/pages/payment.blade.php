@extends('backend.settings.setting-layout')
@section('title')
    {{ __('website_setting') }}
@endsection

@section('payment-setting')
    <div class="row">
        <div class="col-sm-6">
            {{-- paypal settings --}}
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('paypal_settings') }}</h3>
                        <div class="form-group row">
                            <input {{ env('PAYPAL_ACTIVE') ? 'checked' : '' }} type="checkbox" name="paypal"
                                data-bootstrap-switch value="1">
                        </div>
                    </div>
                </div>
                @if (env('PAYPAL_ACTIVE'))
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.paypalsetting') }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="paypal" name="type">
                            <div class="form-group row">
                                <x-forms.label name="{{ __('live_mode') }}" class="col-sm-3" />
                                <div class="col-sm-9">
                                    <input id="paylive" {{ env('PAYPAL_MODE') == 'live' ? 'checked' : '' }}
                                        type="checkbox" name="paypal_live_mode" button="button1"
                                        oldvalue="{{ env('PAYPAL_MODE') }}" data-bootstrap-switch value="1">
                                </div>
                            </div>
                            @if (env('PAYPAL_MODE') == 'sandbox')
                                <div class="form-group row">
                                    <x-forms.label name="{{ __('client_id') }}" class="col-sm-3" />
                                    <div class="col-sm-9">
                                        <input
                                            onkeyup="ButtonDisabled('button1', 'paypal_client_id' , '{{ env('PAYPAL_SANDBOX_CLIENT_ID') }}')"
                                            value="{{ env('PAYPAL_SANDBOX_CLIENT_ID') }}" name="paypal_client_id"
                                            type="text"
                                            class="form-control @error('paypal_client_id') is-invalid @enderror"
                                            autocomplete="off">
                                        @error('paypal_client_id')
                                            <span class="invalid-feedback"
                                                role="alert"><span>{{ $message }}</span></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <x-forms.label name="{{ __('client_secret') }}" class="col-sm-3" />
                                    <div class="col-sm-9">
                                        <input
                                            onkeyup="ButtonDisabled('button1', 'paypal_client_secret' , '{{ env('PAYPAL_SANDBOX_CLIENT_SECRET') }}')"
                                            value="{{ env('PAYPAL_SANDBOX_CLIENT_SECRET') }}" name="paypal_client_secret"
                                            type="text"
                                            class="form-control @error('paypal_client_secret') is-invalid @enderror"
                                            autocomplete="off">
                                        @error('paypal_client_secret')
                                            <span class="invalid-feedback"
                                                role="alert"><span>{{ $message }}</span></span>
                                        @enderror
                                    </div>
                                </div>
                            @else
                                <div class="form-group row">
                                    <x-forms.label name="{{ __('client_id') }}" class="col-sm-3" />
                                    <div class="col-sm-9">
                                        <input
                                            onkeyup="ButtonDisabled('button1', 'paypal_client_id' , '{{ env('PAYPAL_LIVE_CLIENT_ID') }}')"
                                            value="{{ env('PAYPAL_LIVE_CLIENT_ID') }}" name="paypal_client_id"
                                            type="text"
                                            class="form-control @error('paypal_client_id') is-invalid @enderror"
                                            autocomplete="off">
                                        @error('paypal_client_id')
                                            <span class="invalid-feedback"
                                                role="alert"><span>{{ $message }}</span></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <x-forms.label name="{{ __('client_secret') }}" class="col-sm-3" />
                                    <div class="col-sm-9">
                                        <input
                                            onkeyup="ButtonDisabled('button1', 'paypal_client_secret' , '{{ env('PAYPAL_LIVE_CLIENT_SECRET') }}')"
                                            value="{{ env('PAYPAL_LIVE_CLIENT_SECRET') }}" name="paypal_client_secret"
                                            type="text"
                                            class="form-control @error('paypal_client_secret') is-invalid @enderror"
                                            autocomplete="off">
                                        @error('paypal_client_secret')
                                            <span class="invalid-feedback"
                                                role="alert"><span>{{ $message }}</span></span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            @if (userCan('setting.update'))
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button id="button1" type="submit" class="btn btn-success"><i
                                                class="fas fa-sync"></i>
                                            {{ __('update') }}</button>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-sm-6">
            {{-- Stripe Setting --}}
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('stripe_settings') }}</h3>
                        <div class="form-group row">
                            <input {{ env('STRIPE_ACTIVE') ? 'checked' : '' }} type="checkbox" name="stripe"
                                data-bootstrap-switch value="1">
                        </div>
                    </div>
                </div>
                @if (env('STRIPE_ACTIVE'))
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('settings.payment.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="stripe" name="type">
                            <div class="form-group row">
                                <x-forms.label name="{{ __('secret_key') }}" class="col-sm-3" />
                                <div class="col-sm-9">
                                    <input onkeyup="ButtonDisabled('button3', 'stripe_key' , '{{ env('STRIPE_KEY') }}')"
                                        value="{{ env('STRIPE_KEY') }}" name="stripe_key" type="text"
                                        class="form-control @error('stripe_key') is-invalid @enderror" autocomplete="off">
                                    @error('stripe_key')
                                        <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <x-forms.label name="{{ __('publisher_key') }}" class="col-sm-3" />
                                <div class="col-sm-9">
                                    <input
                                        onkeyup="ButtonDisabled('button3', 'stripe_secret' , '{{ env('STRIPE_SECRET') }}')"
                                        value="{{ env('STRIPE_SECRET') }}" name="stripe_secret" type="text"
                                        class="form-control @error('stripe_secret') is-invalid @enderror"
                                        autocomplete="off">
                                    @error('stripe_secret')
                                        <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                    @enderror
                                </div>
                            </div>
                            @if (userCan('setting.update'))
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button id="button3" type="submit" class="btn btn-success"><i
                                                class="fas fa-sync"></i>
                                            {{ __('update') }}</button>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                @endif
            </div>
        </div>
        {{-- Razorpay Setting  --}}
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">{{ __('razorpay_settings') }}</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.razorpaysetting') }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <x-forms.label name="secret_key" class="col-sm-3" />
                            <div class="col-sm-9">
                                <input value="{{ env('RAZORPAY_KEY') }}" name="razorpay_client_id" type="text"
                                    class="form-control @error('razorpay_client_id') is-invalid @enderror"
                                    autocomplete="off">
                                @error('razorpay_client_id')
                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <x-forms.label name="publisher_key" class="col-sm-3" />
                            <div class="col-sm-9">
                                <input value="{{ env('RAZORPAY_SECRET') }}" name="razorpay_client_secret" type="text"
                                    class="form-control @error('razorpay_client_secret') is-invalid @enderror"
                                    autocomplete="off">
                                @error('razorpay_client_secret')
                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <x-forms.label name="status" class="col-sm-3" />
                            <div class="col-sm-9">
                                <input {{ $paymentsetting->razorpay ? 'checked' : '' }} type="checkbox" name="razorpay"
                                    data-bootstrap-switch value="1">
                            </div>
                        </div>
                        @if (userCan('setting.update'))
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                        {{ __('update') }}</button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        {{-- SSL Commerz Setting  --}}
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">{{ __('sslcommerz_settings') }}</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.sslcommerzsetting') }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <x-forms.label name="store_id" class="col-sm-3" />
                            <div class="col-sm-9">
                                <input value="{{ env('STORE_ID') }}" name="ssl_client_id" type="text"
                                    class="form-control @error('ssl_client_id') is-invalid @enderror" autocomplete="off">
                                @error('ssl_client_id')
                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <x-forms.label name="store_password" class="col-sm-3" />
                            <div class="col-sm-9">
                                <input value="{{ env('STORE_PASSWORD') }}" name="ssl_client_secret" type="text"
                                    class="form-control @error('ssl_client_secret') is-invalid @enderror"
                                    autocomplete="off">
                                @error('ssl_client_secret')
                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <x-forms.label name="status" class="col-sm-3" />
                            <div class="col-sm-9">
                                <input {{ $paymentsetting->ssl_commerz ? 'checked' : '' }} type="checkbox"
                                    name="ssl_commerz" data-bootstrap-switch value="1">
                            </div>
                        </div>
                        @if (userCan('setting.update'))
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                        {{ __('update') }}</button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        {{-- Paystack Setting  --}}
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">{{ __('paystack_settings') }}</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.paystacksetting') }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <x-forms.label name="client_id" class="col-sm-3" />
                            <div class="col-sm-9">
                                <input value="{{ env('PAYSTACK_PUBLIC_KEY') }}" name="paystack_client_id" type="text"
                                    class="form-control @error('paystack_client_id') is-invalid @enderror"
                                    autocomplete="off">
                                @error('paystack_client_id')
                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <x-forms.label name="client_secret" class="col-sm-3" />
                            <div class="col-sm-9">
                                <input value="{{ env('PAYSTACK_SECRET_KEY') }}" name="paystack_client_secret"
                                    type="text"
                                    class="form-control @error('paystack_client_secret') is-invalid @enderror"
                                    autocomplete="off">
                                @error('paystack_client_secret')
                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <x-forms.label name="merchant_email" class="col-sm-3" />
                            <div class="col-sm-9">
                                <input value="{{ env('MERCHANT_EMAIL') }}" name="merchant_email" type="text"
                                    class="form-control @error('merchant_email') is-invalid @enderror"
                                    autocomplete="off">
                                @error('merchant_email')
                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <x-forms.label name="status" class="col-sm-3" />
                            <div class="col-sm-9">
                                <input {{ $paymentsetting->paystack ? 'checked' : '' }} type="checkbox" name="paystack"
                                    data-bootstrap-switch value="1">
                            </div>
                        </div>
                        @if (userCan('setting.update'))
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                        {{ __('update') }}</button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">{{ __('Bank Address / Pay To') }}</h3>
                </div>

                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.payto') }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <x-forms.label name="Pay To" class="col-sm-3" />
                            <div class="col-sm-9">

                                <input value="{{ @$paymentsetting->pay_to }}" name="pay_to" type="text"
                                    class="form-control @error('pay_to') is-invalid @enderror" autocomplete="off">

                                @error('pay_to')
                                    <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                                @enderror

                            </div>
                        </div>



                        @if (userCan('setting.update'))
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                        {{ __('update') }}</button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script>
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>
@endsection
