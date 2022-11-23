@extends('layouts.frontend.layout_one')

@section('title', __('sign_up'))

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

            // workaround
            .intl-tel-input {
                display: table-cell;
            }

            .intl-tel-input .selected-flag {
                z-index: 4;
            }

            .intl-tel-input .country-list {
                z-index: 5;
            }

            .input-group .intl-tel-input .form-control {
                border-top-left-radius: 4px;
                border-top-right-radius: 0;
                border-bottom-left-radius: 4px;
                border-bottom-right-radius: 0;
            }
        </style>
    @endif
@endsection

@section('content')
    <!-- Banner section start  -->
    {{--
    <div class="banner banner--three" style="background:url('{{ asset('ads/adsbackground.jpg') }}') center center/cover no-repeat;">
        <div class="container">
            <span class="banner__tag text--body-2-600">{{ __('over') }} {{ $totalAds }} {{ __('live_ads') }}</span>
            <div class="banner__title text--display-2 animate__animated animate__bounceInDown">
                {{ $cms->index3_title }}
            </div>

            <x-frontend.adlist-search class="adlist-search" :categories="$categories" :towns="$towns" :dark="true" :total-ads="$total_ads" :marginTop="124" />
        </div>
    </div>
    --}}
    <!-- Banner section end   -->

    <!-- registration section start   -->
    <section class="section registration">
        <div class="container">
            <div class="row d-flex justify-content-center">
                {{-- Signup Content  --}}
                <x-auth.content :verifiedusers="$verified_users" />

                {{-- Signup Form --}}
                {{-- <x-auth.signup-form :packageId="$package_id" /> --}}
                <x-auth.signup-form />
            </div>
        </div>
    </section>
    <!-- registration section  end    -->
@endsection

@section('frontend_script')
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
            console.log(1);
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
    <script>
        $(document).ready(function() {
            $("#valid_user_name").blur(function() {
                // alert('ok');
                var valid_user_name = $("#valid_user_name").val();
                var incorrect =
                    "<font color=red  font-size=16px>The user name has already been taken. </font>";
                var correct = "<font color=green  font-size=20px>This user name is available</font>";
                var url = "{{ route('user.valid_user_name') }}";
                var token = "{{ csrf_token() }}";
                // alert(url);
                // alert(token);
                if (valid_user_name != '') {
                    // alert(valid_user_name);
                    $.ajax({
                        type: 'post',
                        url: url,
                        data: {
                            valid_user_name: valid_user_name,
                            _token: token
                        },
                        success: function(resp) {
                            var response = JSON.parse(resp);
                            if (response.status == 1) {
                                $("#response_id").html(incorrect);
                            } else {
                                $("#response_id").html(correct);
                            }
                        },
                        error: function() {
                            alert("Error!");
                        }
                    });
                } else {
                    $("#response_id").empty();

                }
            });
        });
    </script>

@endsection
