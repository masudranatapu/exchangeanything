@extends('layouts.backend.admin')

@section('title')
    {{ __('Create Country') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('Add Country') }}</h3>
                        <a href="{{ route('module.city.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}
                        </a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('module.city.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <x-forms.label name="Country Name" required="true" class="col-sm-3" />
                                    <div class="col-sm-9">
                                        <input type="text" name="name" placeholder="{{ __('Enter Contry Name') }}"
                                            value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <x-forms.label name="select_image" required="true" class="col-sm-3" />
                                    <div class="col-sm-9">
                                        <input name="image" type="file" required
                                            class="form-control dropify @error('image') is-invalid @enderror"
                                            style="border:none;padding-left:0;" accept="image/png,image/jpg,image/jpeg"
                                            data-allowed-file-extensions='["jpg", "jpeg","png"]' data-max-file-size="3M">
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-plus"></i>&nbsp; {{ __('create') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/css/dropify.min.css" />
@endsection

@section('script')
    <script src="{{ asset('backend') }}/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
