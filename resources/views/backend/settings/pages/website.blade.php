@extends('backend.settings.setting-layout')
@section('title')
    {{ __('website_setting') }}
@endsection

@section('website-settings')
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ session('website_setting_section') == 'basic' ? 'active' : '' }}" id="basic-tab"
                        data-toggle="pill" href="#basic" role="tab" aria-controls="basic"
                        aria-selected="true">{{ __('basic') }}</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ session('website_setting_section') == 'social_links' ? 'active' : '' }}"
                        id="basic-tab" data-toggle="pill" href="#social_media_links" role="tab" aria-controls="basic"
                        aria-selected="true">{{ __('social_media_links') }}</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ session('website_setting_section') == 'logo' ? 'active' : '' }}" id="basic-tab"
                        data-toggle="pill" href="#logo" role="tab" aria-controls="basic"
                        aria-selected="true">{{ __('logo') }}</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                {{-- Basic Settings --}}
                <div class="tab-pane fade {{ session('website_setting_section') == 'basic' ? 'show active' : '' }}"
                    id="basic" role="tabpanel" aria-labelledby="basic-tab">
                    <x-backend.setting.website.basic-setting :setting="$setting" />
                </div>

                {{-- Social Media Links Settings --}}
                <div class="tab-pane fade {{ session('website_setting_section') == 'social_links' ? 'show active' : '' }}"
                    id="social_media_links" role="tabpanel" aria-labelledby="basic-tab">
                    <form class="form-horizontal" action="{{ route('setting', 'website') }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input name="section" type="text" value="social_links" hidden>
                        <div class="row ">
                            <div class="col-6">
                                
                                <div class="form-group">
                                    <x-forms.label name="facebook" />
                                    <input type="url" class="form-control @error('facebook') is-invalid @enderror"
                                        name="facebook" placeholder="{{ __('enter_company_facebook_link') }}"
                                        value="{{ $setting->facebook }}">
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="twitter" />
                                    <input type="url" class="form-control @error('facebook') is-invalid @enderror"
                                        name="twitter" placeholder="{{ __('enter_company_twitter_link') }}"
                                        value="{{ $setting->twitter }}">
                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="instagram" />
                                    <input type="url" class="form-control @error('instagram') is-invalid @enderror"
                                        name="instagram" placeholder="{{ __('enter_company_instagram_link') }}"
                                        value="{{ $setting->instagram }}">
                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="youtube" />
                                    <input type="url" class="form-control @error('youtube') is-invalid @enderror"
                                        name="youtube" placeholder="{{ __('enter_company_youtube_link') }}"
                                        value="{{ $setting->youtube }}">
                                    @error('youtube')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="Telegram" />
                                    <input type="url" class="form-control @error('telegam') is-invalid @enderror"
                                        name="telegam" placeholder="{{ __('Enter Company Telegram Link') }}"
                                        value="{{ $setting->telegam }}">
                                    @error('telegam')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <x-forms.label name="Discord" />
                                    <input type="url" class="form-control @error('discord') is-invalid @enderror"
                                        name="discord" placeholder="{{ __('Enter Company Discord Link') }}"
                                        value="{{ $setting->discord }}">
                                    @error('discord')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 offset-3 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-sync"></i> {{ __('update_settings') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Logo Settings --}}
                <div class="tab-pane fade {{ session('website_setting_section') == 'logo' ? 'show active' : '' }}"
                    id="logo" role="tabpanel" aria-labelledby="basic-tab">
                    {{-- <x-backend.setting.website.basic-setting :setting="$setting"/> --}}
                    <form class="form-horizontal" action="{{ route('setting', 'website') }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input name="section" type="text" value="logo" hidden>
                        <div class="row justify-content-between">
                            <div class="col-3">
                                <div class="form-group">
                                    <x-forms.label name="theme_logo_white_background" />
                                    <div class="row">
                                        <input type="file" class="form-control dropify"
                                            data-default-file="{{ $setting->logo_image_url }}" name="logo_image"
                                            autocomplete="image" accept="image/png, image/jpg, image/jpeg"
                                            data-allowed-file-extensions='["jpg", "jpeg","png"]' data-max-file-size="3M">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 mx-2">
                                <div class="form-group">
                                    <x-forms.label name="theme_logo_dark_background" />
                                    <div class="row">
                                        <input type="file" class="form-control dropify"
                                            data-default-file="{{ $setting->logo2_image_url }}" name="logo_image2"
                                            autocomplete="image" accept="image/png, image/jpg, image/jpeg"
                                            data-allowed-file-extensions='["jpg", "jpeg","png"]' data-max-file-size="3M">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <x-forms.label name="site_favicon" />
                                    <div class="row">
                                        <input type="file" class="form-control dropify"
                                            data-default-file="{{ $setting->favicon_image_url }}" name="favicon_image"
                                            accept="image/png, image/jpg, image/jpeg"
                                            data-allowed-file-extensions='["jpg", "jpeg","png"]' data-max-file-size="3M">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <x-forms.label name="loader_image" />
                                    <div class="row">
                                        <input type="file" class="form-control dropify"
                                            data-default-file="{{ $setting->loader_image_url }}" name="loader_image"
                                            accept="image/png, image/jpg, image/jpeg"
                                            data-allowed-file-extensions='["jpg", "jpeg","png"]' data-max-file-size="3M">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 offset-3 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-sync"></i> {{ __('update_settings') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/css/dropify.min.css" />
    <style>
        .ck-editor__editable_inline {
            min-height: 170px;
        }

    </style>
@endsection

@section('script')
    <script src="{{ asset('backend') }}/js/dropify.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
