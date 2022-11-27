@extends('layouts.frontend.layout_one')

@section('title', __('account_setting'))

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
                    <div class="dashboard-setting">
                        <!-- Account Information -->
                        <div class="dashboard-setting__box account-information">
                            <h2 class="text--body-2-600">{{ __('account_information') }}</h2>
                            <form action="{{ route('frontend.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="user-info">
                                    <div class="img">
                                        <div class="img-wrapper">
                                            <img src="{{ $user->image_url }}" class="rounded border" alt="user-img"
                                                id="image">
                                        </div>
                                        <input name="image"
                                            onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                            id="hiddenImgInput" type="file" hidden
                                            accept="image/png, image/jpg, image/jpeg" />
                                        <button onclick="$('#hiddenImgInput').click()" class="btn btn--bg"
                                            type="button">{{ __('choose_image') }}</button>
                                    </div>
                                </div>
                                <div class="input-field__group">
                                    <div class="input-field">
                                        <x-forms.label name="full_name" for="Fname" />
                                        <input name="name" value="{{ $user->name }}" type="text"
                                            placeholder="{{ __('full_name') }}" id="Fname"
                                            class="@error('name') is-invalid border-danger @enderror">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-field">
                                        <x-forms.label name="phone_number" for="telephonee" />
                                        <input type="hidden" id="iso2" value="{{ $user->iso2 ? $user->iso2 : '' }}"
                                            name="iso2">
                                        <input type="hidden" id="code"
                                            value="{{ $user->country_code ? $user->country_code : '' }}"
                                            name="country_code">
                                        <input type="phone_number" name="phone"
                                            value="{{ $user->phone ? $user->phone : '' }}"
                                            class="input form-control @error('phone') is-invalid border-danger @enderror">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-field__group">
                                    <div class="input-field">
                                        <x-forms.label name="email" for="email" />
                                        <input name="email" value="{{ $user->email }}" type="email"
                                            placeholder="{{ __('email_address') }}" id="email"
                                            class=" form-control @error('email') is-invalid border-danger @enderror">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-field">
                                        <x-forms.label name="About" for="about" />
                                        <textarea name="about" class="form-control" style="height: 48px">{{ $user->about }}</textarea>
                                        @error('about')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-1 mb-3">
                                    <div class="col-lg-3">
                                        <div class="form-check">
                                            <input value="1" name="subscribe" type="checkbox" class="form-check-input"
                                                id="checkme" @if ($check) checked @endif />
                                            @if ($user->subscribe == 1)
                                                <x-forms.label name="Subscribed to Newsletter" class="form-check-label"
                                                    for="checkme" />
                                            @else
                                                <x-forms.label name="Subscribed to Newsletter" class="form-check-label"
                                                    for="checkme" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1 mb-3">
                                    <div class="col-lg-3">
                                        <div class="form-check">
                                            <input value="1" name="email_share" type="checkbox" class="form-check-input"
                                                id="email_share" @if ($user->email_share == 1) checked @endif />
                                            <x-forms.label name="Share email to public" class="form-check-label"
                                                for="email_share" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1 mb-3">
                                    <div class="col-lg-3">
                                        <div class="form-check">
                                            <input value="1" name="phone_share" type="checkbox"
                                                class="form-check-input" id="phone_share"
                                                @if ($user->phone_share == 1) checked @endif />
                                            <x-forms.label name="Share phone to public" class="form-check-label"
                                                for="phone_share" />
                                        </div>
                                    </div>
                                </div>
                                <button class="btn" type="submit">{{ __('save_changes') }}</button>
                            </form>
                        </div>
                        <!-- change Password -->
                        <div class="dashboard-setting__box change-password">
                            <h2 class="text--body-2-600">{{ __('change_password') }}</h2>
                            <form action="{{ route('frontend.password') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-field__group">
                                    <div class="input-field">
                                        <x-forms.label name="current_password" for="cpassword" required="true"/>
                                        <input name="current_password"  required="" type="password"
                                            placeholder="{{ __('password') }}"  id="cpassword"
                                            class="@error('current_password') is-invalid border-danger @enderror" >
                                        @error('current_password')
                                            <span style="font-size: 12px" class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <span class="icon icon--eye" onclick="showPassword('cpassword',this)"
                                            @error('current_password') style="top: 50%;" @enderror>
                                            <x-svg.eye-icon />
                                        </span>
                                    </div>
                                    <div class="input-field">
                                        <x-forms.label name="new_password" for="npassword" required="true"/>
                                        <input name="password" type="password" required="" placeholder="{{ __('password') }}"
                                            id="npassword" class="@error('password') is-invalid border-danger @enderror">
                                        @error('password')
                                            <span style="font-size: 12px" class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <span class="icon icon--eye" onclick="showPassword('npassword',this)"
                                            @error('password') style="top: 50%;" @enderror>
                                            <x-svg.eye-icon />
                                        </span>
                                    </div>
                                    <div class="input-field">
                                        <x-forms.label name="confirm_password" for="confirmpass" required="true"/>
                                        <input name="password_confirmation" required="" type="password"
                                            placeholder="{{ __('password') }}" id="confirmpass"
                                            class="@error('password_confirmation') is-invalid border-danger @enderror">
                                        @error('password_confirmation')
                                            <span style="font-size: 12px" class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <span class="icon icon--eye" onclick="showPassword('confirmpass',this)"
                                            @error('password_confirmation') style="top: 50%;" @enderror>
                                            <x-svg.eye-icon />
                                        </span>
                                    </div>
                                </div>
                                <button class="btn" type="submit">
                                    {{ __('save_changes') }}
                                </button>
                            </form>
                        </div>
                        <!-- Delete Account -->
                        <div class="dashboard-setting__box delete-account">
                            <h2 class="text--body-2-600">{{ __('delete_account') }}</h2>
                            <p class="delete-account__details text--body-3">
                                {{ __('delete_account_alert') }}
                            </p>
                            <form action="{{ route('frontend.account.delete', auth()->id()) }}" method="POST"
                                onclick="return confirm('Are you sure?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn">
                                    <span class="icon--left">
                                        <x-svg.delete-icon />
                                    </span>
                                    {{ __('delete_account') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- dashboard section end  -->
@endsection

@section('frontend_script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput-jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/passwordType.js"></script>
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
            $('#town').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ?
                    $(this).data('width') : $(this).hasClass('w-100') ?
                    '100%' : 'style',
                placeholder: 'By Region',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
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

        });
        var instance = $("[name=phone]")
        instance.intlTelInput({
            initialCountry: "{{ $user->iso2 }}",
            setCountry: "{{ $user->iso2 ?? 'us' }} "
        });

        $("[name=phone]").on("blur", function() {
            $('#code').val(instance.intlTelInput('getSelectedCountryData').dialCode)
            $('#iso2').val(instance.intlTelInput('getSelectedCountryData').iso2)
        })
    </script>
@endsection
