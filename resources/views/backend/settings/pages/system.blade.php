@extends('backend.settings.setting-layout')
@section('title')
    {{ __('website_setting') }}
@endsection

@section('system')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">
                {{ __('system_setting') }}
            </h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('setting', 'system') }}" method="POST"
                enctype="multipart/form-data" id="setting_form">
                @method('PUT')
                @csrf
                {{-- App Configuration --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('app_configuration') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="app_name" required="true" />
                                    <div class="col-sm-9">
                                        <x-forms.input name="app_name" value="{{ env('APP_NAME') }}" type="text" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <x-forms.label name="app_debug" required="true" />
                                    <div class="col-sm-9">
                                        <input {{ env('APP_DEBUG') ? 'checked' : '' }} type="checkbox" name="app_debug"
                                            data-bootstrap-switch value="{{ env('APP_DEBUG') ? 1 : 0 }}"
                                            data-on-text="Yes" data-off-text="No">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="timezone" /> <br>
                                    <select name="timezone" class="timezone-select form-control">
                                        @foreach ($timeszones as $timezone)
                                            <option {{ config('app.timezone') == $timezone->value ? 'selected' : '' }}
                                                value="{{ $timezone->value }}">
                                                {{ $timezone->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <x-forms.label name="app_url" /> <br>
                                    <input type="text" class="form-control" value="{{ env('APP_URL') }}"
                                        name="app_url">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Database Configuration --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('db_configuration') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-4">
                                <div class="form-group">
                                    <x-forms.label name="db_connection" required="true" />
                                    <x-forms.select name="db_connection">
                                        <x-forms.option :selected="env('DB_CONNECTION') == 'sqlite' ? true:false"
                                            label="sqlite" value="sqlite" />
                                        <x-forms.option :selected="env('DB_CONNECTION') == 'mysql' ? true:false"
                                            label="mysql" value="mysql" />
                                        <x-forms.option :selected="env('DB_CONNECTION') == 'pgsql' ? true:false"
                                            label="pgsql" value="pgsql" />
                                        <x-forms.option :selected="env('DB_CONNECTION') == 'sqlsrv' ? true:false"
                                            label="sqlsrv" value="sqlsrv" />
                                    </x-forms.select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <x-forms.label name="db_host" required="true" />
                                    <x-forms.input type="text" name="db_host" value="{{ env('DB_HOST') }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <x-forms.label name="db_port" required="true" />
                                    <x-forms.input type="text" name="db_port" value="{{ env('DB_PORT') }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <x-forms.label name="db_name" required="true" />
                                    <x-forms.input type="text" name="db_name" value="{{ env('DB_DATABASE') }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <x-forms.label name="db_username" required="true" />
                                    <x-forms.input type="text" name="db_username" value="{{ env('DB_USERNAME') }}" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <x-forms.label name="db_password" required="true" />
                                    <x-forms.input type="password" name="db_password" value="{{ env('DB_PASSWORD') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Website Configuration --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('website_configuration') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="free_ad_limit" required="true" />
                                    <x-forms.input type="text" name="free_ad_limit" value="{{ $setting->free_ad_limit }}"
                                        placeholder="{{ __('enter_ad_limit') }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="free_ad_featured_limit" required="true" />
                                    <x-forms.input type="text" name="free_featured_ad_limit"
                                        value="{{ $setting->free_featured_ad_limit }}"
                                        placeholder="{{ __('enter_featured_ad_limit') }}" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="website_loader" required="true" class="d-block" />
                                    <x-forms.switch-input name="website_loader"
                                        value="{{ $setting->website_loader ? 1 : 0 }}"
                                        :checked="$setting->website_loader" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="show_featured_ads_on_homepage" required="true"
                                        class="d-block" />
                                    <x-forms.switch-input name="featured_ads_homepage"
                                        value="{{ $setting->featured_ads_homepage ? 1 : 0 }}"
                                        :checked="$setting->featured_ads_homepage" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="show_regular_ads_on_homepage" required="true"
                                        class="d-block" />
                                    <x-forms.switch-input name="regular_ads_homepage"
                                        value="{{ $setting->regular_ads_homepage ? 1 : 0 }}"
                                        :checked="$setting->regular_ads_homepage" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="customer_email_verification" required="true"
                                        class="d-block" />
                                    <x-forms.switch-input name="customer_email_verification"
                                        value="{{ $setting->customer_email_verification ? 1 : 0 }}"
                                        :checked="$setting->customer_email_verification" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="ads_admin_approval" required="true" class="d-block" />
                                    <x-forms.switch-input name="ads_admin_approval"
                                        value="{{ $setting->ads_admin_approval ? 1 : 0 }}"
                                        :checked="$setting->ads_admin_approval" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('default_language_currency') }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="set_default_language" required="true" class="d-block" />
                                    <x-forms.select name="default_language">
                                        @foreach ($languages as $lang)
                                            <x-forms.option
                                                :selected="$lang->code == env('APP_DEFAULT_LANGUAGE') ? true:false"
                                                label="{{ $lang->name }}" value="{{ $lang->code }}" />
                                        @endforeach
                                    </x-forms.select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="set_default_currency" required="true" class="d-block" />
                                    <x-forms.select name="default_currency">
                                        @foreach ($currencies as $currency)
                                            <x-forms.option
                                                :selected="$currency->code == config('adlisting.currency') ? true:false"
                                                label="{{ $currency->code }}({{ $currency->symbol }})"
                                                value="{{ $currency->code }}" />
                                        @endforeach
                                    </x-forms.select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6 offset-3 text-center">
                        <button type="submit" class="btn btn-success" id="setting_button">
                            <span><i class="fas fa-sync"></i> {{ __('update_settings') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">
    <style>
        .select2-selection__rendered {
            line-height: 25px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }

    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"></script>
    <script>
        $('.timezone-select').select2();
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        // event change
        $("input[name='app_debug']").on('switchChange.bootstrapSwitch', function(event, state) {
            $("input[name='app_debug']").val(state ? 1 : 0);
        });

        $("input[name='website_loader']").on('switchChange.bootstrapSwitch', function(event, state) {
            $("input[name='website_loader']").val(state ? 1 : 0);
        });

        $("input[name='featured_ads_homepage']").on('switchChange.bootstrapSwitch', function(event, state) {
            $("input[name='featured_ads_homepage']").val(state ? 1 : 0);
        });

        $("input[name='regular_ads_homepage']").on('switchChange.bootstrapSwitch', function(event, state) {
            $("input[name='regular_ads_homepage']").val(state ? 1 : 0);
        });

        $("input[name='customer_email_verification']").on('switchChange.bootstrapSwitch', function(event, state) {
            $("input[name='customer_email_verification']").val(state ? 1 : 0);
        });

        $("input[name='ads_admin_approval']").on('switchChange.bootstrapSwitch', function(event, state) {
            $("input[name='ads_admin_approval']").val(state ? 1 : 0);
        });

        $('#setting_form').submit(function(e) {
            e.preventDefault();
            var app_name = $("input[name='app_name']").val();
            var app_debug = $("input[name='app_debug']").val();
            var timezone = $("select[name='timezone']").val();
            var app_url = $("input[name='app_url']").val();
            var db_connection = $("select[name='db_connection']").val();
            var db_host = $("input[name='db_host']").val();
            var db_port = $("input[name='db_port']").val();
            var db_name = $("input[name='db_name']").val();
            var db_username = $("input[name='db_username']").val();
            var db_password = $("input[name='db_password']").val();
            var free_ad_limit = $("input[name='free_ad_limit']").val();
            var free_featured_ad_limit = $("input[name='free_featured_ad_limit']").val();
            var website_loader = $("input[name='website_loader']").val();
            var featured_ads_homepage = $("input[name='featured_ads_homepage']").val();
            var regular_ads_homepage = $("input[name='regular_ads_homepage']").val();
            var customer_email_verification = $("input[name='customer_email_verification']").val();
            var ads_admin_approval = $("input[name='ads_admin_approval']").val();
            var default_language = $("select[name='default_language']").val();
            var default_currency = $("select[name='default_currency']").val();

            axios.put('{{ route('setting', 'system') }}', {
                app_name: app_name,
                app_debug: app_debug,
                timezone: timezone,
                app_url: app_url,
                db_connection: db_connection,
                db_host: db_host,
                db_port: db_port,
                db_name: db_name,
                db_username: db_username,
                db_password: db_password,
                free_ad_limit: free_ad_limit,
                free_featured_ad_limit: free_featured_ad_limit,
                website_loader: website_loader,
                featured_ads_homepage: featured_ads_homepage,
                regular_ads_homepage: regular_ads_homepage,
                customer_email_verification: customer_email_verification,
                ads_admin_approval: ads_admin_approval,
                default_language: default_language,
                default_currency: default_currency
            }).then((res) => {
                toastr.success(res.data.message, 'Success');

                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            })

        });
    </script>

    <x-alert.warning selector="#setting_button" title="{{ __('are_you_sure_to_update') }}"
        text="{{ __('confirmation_before_update') }}" />
@endsection
