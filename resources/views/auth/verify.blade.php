@extends('layouts.frontend.layout_one')

@section('title',__('verify_account'))

@section('content')
<section class="section registration">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="registration-form">
                    <h2 class="text-center text--heading-1 registration-form__title">
                        {{ __('verify_your_email_address') }}
                    </h2>
                    <h3 class="text-center registration-form__title">
                        {{ __('before_proceeding') }}
                    </h3>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('fresh_link') }}
                        </div>
                    @endif

                    <div class="registration-form__wrapper text-center">
                        <form action="{{ route('verification.resend') }}" method="POST">
                            @csrf
                            <button class="btn btn--lg w-25 registration-form__btns" type="submit">
                                {{ __('click_to_verify') }}
                                <span class="icon--right">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.75 12H20.25" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.5 5.25L20.25 12L13.5 18.75" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </button>

                            <p class="text--body-3 registration-form__redirect">
                                {{ __('if_you_did_not_receive_the_email') }}
                                <form action="{{ route('verification.resend') }}" method="POST">
                                    @csrf
                                    <button class="resend">{{ __('resend_link') }}</button>
                                </form>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .resend{
        color: #06D7A0;
    }
    .resend:hover {
        text-decoration: underline;
    }
</style>
@endsection
