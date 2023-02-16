@extends('layouts.backend.admin')

@section('title') {{ __('Create City') }} @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">{{ __('Create City') }}</h3>
                    <a href="{{ route('module.town.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                        <i class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}
                    </a>
                </div>
                <div class="row pt-3 pb-4">
                    <div class="col-md-6 offset-md-3">
                        <form class="form-horizontal" action="{{ route('module.town.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <x-forms.label name="Select Country" required="true" class="col-sm-3"/>
                                <div class="col-sm-9">
                                    <select name="city_id" class="form-control @error('city_id') is-invalid @enderror">
                                        <option value="" disabled selected>Select One</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <x-forms.label name="City name" required="true" class="col-sm-3"/>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        name="name"
                                        placeholder="{{ __('Enter City name') }}"
                                        value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                    >
                                    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
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
