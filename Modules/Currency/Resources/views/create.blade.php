
@extends('layouts.backend.admin')
@section('title') {{ __('create_currency') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('create_currency') }}</h3>
                        <a href="{{ route('module.currency.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('module.currency.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <x-forms.label name="name" required="true" class="col-sm-3 col-form-label"/>
                                    <div class="col-sm-9">
                                        <x-forms.input type="text" name="name" value="{{ old('name') }}" placeholder="E.g - Dollar"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <x-forms.label name="code" required="true" class="col-sm-3 col-form-label"/>
                                    <div class="col-sm-9">
                                        <x-forms.input type="text" name="code" value="{{ old('code') }}" placeholder="E.g - USD"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <x-forms.label name="symbol" required="true" class="col-sm-3 col-form-label"/>
                                    <div class="col-sm-9">
                                        <x-forms.input type="text" name="symbol" value="{{ old('symbol') }}" placeholder="E.g - $"/>
                                    </div>
                                </div>
                           
                                <div class="form-group row">
                                    <x-forms.label name="position" required="true" class="col-sm-3 col-form-label"/>
                                    <div class="col-sm-9">
                                        <x-forms.select name="symbol_position">
                                            <x-forms.option :selected="old('symbol_position') == 'left' ? true:false" label="left" value="left"/>
                                            <x-forms.option :selected="old('symbol_position') == 'right' ? true:false" label="right" value="right"/>
                                        </x-forms.select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
                                        <button type="submit" class="btn btn-success"><i
                                                class="fas fa-plus"></i>&nbsp;{{ __('create') }}</button>
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
