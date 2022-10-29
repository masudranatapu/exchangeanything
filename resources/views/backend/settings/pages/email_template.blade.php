@extends('backend.settings.setting-layout')
@section('title') {{ __('website_setting') }} @endsection

@section('emailtemplate-setting')
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
                        <x-forms.label name="mail_driver" for="driver" class="form-label" />
                        <input disabled type="text" class="form-control @error('driver') is-invalid @enderror"
                            id="driver" value="smtp" name="driver">
                        @error('driver') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <x-forms.label name="mail_driver" for="driver" class="form-label" />
                        <textarea name="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            @if (userCan('setting.update'))
            <div class="mx-auto">
                <div class="text-center">
                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                        {{ __('update') }}</button>
                </div>
            </div>
            @endif
        </form>
    </div>
</div>
@endsection
