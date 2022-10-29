@extends('backend.settings.setting-layout')
@section('title') {{ __('website_setting') }} @endsection

@section('mail-setting')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">{{ __('mail_settings') }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('setting', 'mail') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <x-forms.label name="mail_driver" for="driver" />
                            <input disabled type="text" class="form-control @error('driver') is-invalid @enderror" id="driver" value="smtp" name="driver">
                            @error('driver') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <x-forms.label name="mail_host" for="host" />
                            <input type="text" class="form-control @error('host') is-invalid @enderror" id="host" value="{{ config('mail.mailers.smtp.host') }}" name="host">
                            @error('host') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <x-forms.label name="mail_port" for="port" />
                            <input type="text" class="form-control @error('port') is-invalid @enderror" id="port" value="{{ config('mail.mailers.smtp.port') }}" name="port">
                            @error('port') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <x-forms.label name="mail_username" for="username" />
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="{{ __('change_mail_username') }}" name="username" value="{{ config('mail.mailers.smtp.username') }}">
                            @error('username') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <x-forms.label name="mail_password" for="password" />
                            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="{{ __('change_mail_password') }}" name="password" value="{{ config('mail.mailers.smtp.password') }}">
                            @error('password') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <x-forms.label name="mail_encryption" for="encryption" />
                            <input type="text" class="form-control @error('encryption') is-invalid @enderror" id="encryption" value="{{ config('mail.mailers.smtp.encryption') }}" name="encryption">
                            @error('encryption') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <x-forms.label name="mail_from_address" for="from_address" />
                            <input type="text" class="form-control @error('from_address') is-invalid @enderror" id="from_address" value="{{ config('mail.from.address') }}" name="from_address">
                            @error('from_address') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <x-forms.label name="mail_from_name" for="from_name" />
                            <input type="text" class="form-control @error('from_name') is-invalid @enderror" id="from_name" value="{{ config('mail.from.name') }}" name="from_name">
                            @error('from_name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if (userCan('setting.update'))
                <div class="mx-auto">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">{{ __('send_test_mail') }}</h3>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <form class="form-inline" action="{{ route('send.test.mail') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                      <x-forms.label name="email_address" for="staticEmail2" />
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                      <input name="email" type="email" class="form-control" id="email" placeholder="{{ __('enter_email') }}" style="min-width: 400px">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2"><i class="far fa-paper-plane"></i> {{ __('send_mail') }}</button>
                </form>
            </div>
        </div>
        </div>
@endsection

