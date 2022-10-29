@extends('backend.settings.setting-layout')
@section('title') {{ __('website_setting') }} @endsection

@section('payment-setting')
<div class="row">
    {{-- Razorpay Setting  --}}
   <!--  <div class="col-sm-6">
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
                            <input value="{{ env("RAZORPAY_KEY") }}" name="razorpay_client_id" type="text"
                                class="form-control @error('razorpay_client_id') is-invalid @enderror" autocomplete="off">
                            @error('razorpay_client_id') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <x-forms.label name="publisher_key" class="col-sm-3" />
                        <div class="col-sm-9">
                            <input value="{{ env('RAZORPAY_SECRET') }}" name="razorpay_client_secret" type="text"
                                class="form-control @error('razorpay_client_secret') is-invalid @enderror" autocomplete="off">
                            @error('razorpay_client_secret') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <x-forms.label name="status" class="col-sm-3" />
                        <div class="col-sm-9">
                            <input {{ $paymentsetting->razorpay ? 'checked':'' }} type="checkbox" name="razorpay"
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
    </div> -->

    {{-- SSL Commerz Setting  --}}
    <!-- <div class="col-sm-6">
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
                            <input value="{{ env("STORE_ID") }}" name="ssl_client_id" type="text"
                                class="form-control @error('ssl_client_id') is-invalid @enderror" autocomplete="off">
                            @error('ssl_client_id') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <x-forms.label name="store_password" class="col-sm-3" />
                        <div class="col-sm-9">
                            <input value="{{ env('STORE_PASSWORD') }}" name="ssl_client_secret" type="text"
                                class="form-control @error('ssl_client_secret') is-invalid @enderror"
                                autocomplete="off">
                            @error('ssl_client_secret') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <x-forms.label name="status" class="col-sm-3" />
                        <div class="col-sm-9">
                            <input {{ $paymentsetting->ssl_commerz ? 'checked':'' }} type="checkbox" name="ssl_commerz"
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
    </div> -->

    {{-- Paystack Setting  --}}
    <!-- <div class="col-sm-6">
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
                            <input value="{{ env("PAYSTACK_PUBLIC_KEY") }}" name="paystack_client_id" type="text"
                                class="form-control @error('paystack_client_id') is-invalid @enderror" autocomplete="off">
                            @error('paystack_client_id') <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <x-forms.label name="client_secret" class="col-sm-3" />
                        <div class="col-sm-9">
                            <input value="{{ env('PAYSTACK_SECRET_KEY') }}" name="paystack_client_secret" type="text"
                                class="form-control @error('paystack_client_secret') is-invalid @enderror"
                                autocomplete="off">
                            @error('paystack_client_secret') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <x-forms.label name="merchant_email" class="col-sm-3" />
                        <div class="col-sm-9">
                            <input value="{{ env('MERCHANT_EMAIL') }}" name="merchant_email" type="text"
                                class="form-control @error('merchant_email') is-invalid @enderror"
                                autocomplete="off">
                            @error('merchant_email') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <x-forms.label name="status" class="col-sm-3" />
                        <div class="col-sm-9">
                            <input {{ $paymentsetting->paystack ? 'checked':'' }} type="checkbox" name="paystack"
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
    </div> -->

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
                                    class="form-control @error('pay_to') is-invalid @enderror"
                                    autocomplete="off">

                                @error('pay_to') <span class="invalid-feedback"
                                    role="alert"><span>{{ $message }}</span></span>
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
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
@endsection
