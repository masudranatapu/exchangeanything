@extends('backend.settings.setting-layout')

@section('title') {{ __('website_setting') }} @endsection

@section('ads-setting')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">{{ __('ads') }}</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('ads.setting.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                                <x-forms.label name="Ads Expire Day" class="col-sm-3" />
                                <div class="col-sm-9">
                                    <input value="{{ @$setting->ads_expire_day }}" name="ads_expire_day" type="text"
                                        class="form-control @error('ads_expire_day') is-invalid @enderror"
                                        autocomplete="off">
                                    @error('ads_expire_day') <span class="invalid-feedback"
                                        role="alert"><span>{{ $message }}</span></span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <x-forms.label name="Notification Sending Day Before Expire" class="col-sm-3" />
                                <div class="col-sm-9">
                                    <input value="{{ @$setting->ads_expire_notify }}" name="ads_expire_notify" type="text"
                                        class="form-control @error('ads_expire_notify') is-invalid @enderror"
                                        autocomplete="off">
                                    @error('ads_expire_notify') <span class="invalid-feedback"
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
