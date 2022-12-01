@extends('layouts.backend.admin')
@section('title')
    {{ __('edit_plan') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('edit_plan') }}</h3>
                        <a href="{{ route('module.plan.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('module.plan.update', $plan->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="plan_type" required="true" for="ad_limit" for="plan_type" />
                                        <select name="package_duration" class="custom-select mr-sm-2" id="plan_type">
                                            <option {{ $plan->package_duration == '1' ? 'selected' : '' }} value="1">
                                                {{ __('lifetime') }}
                                            </option>
                                            <option {{ $plan->package_duration == '2' ? 'selected' : '' }} value="2">
                                                {{ __('anually') }}
                                            </option>
                                            <option {{ $plan->package_duration == '3' ? 'selected' : '' }} value="3">
                                                {{ __('monthly') }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 d-none" id="interval_date">
                                    <div class="form-group">
                                        <label class="" for="custom_interval_days">
                                            Interval Days
                                            <span class="form-label-required text-danger">*</span>
                                        </label>
                                        <input type="number" min="1" id="custom_interval_days"
                                            name="custom_interval_days" value="15" class="form-control "
                                            placeholder="Interval Days">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="label" required="true" for="label" />
                                        <input type="text" id="label" name="label" value="{{ $plan->label }}"
                                            class="form-control @error('label') is-invalid @enderror"
                                            placeholder="{{ __('basic') }} / {{ __('standard') }} / {{ __('premium') }}">
                                        @error('label')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="ad_limit" required="true" for="ad_limit" />
                                        <input type="number" id="ad_limit" name="ad_limit" value="{{ $plan->ad_limit }}"
                                            class="form-control @error('ad_limit') is-invalid @enderror">
                                        @error('ad_limit')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="price" required="true" for="price">
                                        </x-forms.label>
                                        <input type="number" id="price" name="price" value="{{ $plan->price }}"
                                            class="form-control @error('price') is-invalid @enderror">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="featured_limit" required="true" for="featured_limit" />
                                        <input type="number" id="featured_limit" name="featured_limit"
                                            value="{{ $plan->featured_limit }}"
                                            class="form-control @error('featured_limit') is-invalid @enderror">
                                        @error('featured_limit')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Premium Badge</label>
                                        <select name="badge" id="badge"
                                            class="form-control @error('badge') is-invalid @enderror">
                                            <option value="1" {{ $plan->badge == true ? 'selected' : '' }}>
                                                {{ __('yes') }}</option>
                                            <option value="0" {{ $plan->badge == false ? 'selected' : '' }}>
                                                {{ __('no') }}</option>
                                        </select>
                                        @error('badge')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-success" type="submit"><i class="fas fa-sync"></i>&nbsp;
                                    {{ __('update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // function add_features_field() {
        //     $("#multiple_feature_part").append(`
    //         <div class="row">
    //             <div class="col-lg-10">
    //                     <div class="input-field mb-3">
    //                         <input name="new_featured[]" type="text"  id="adname" class="form-control @error('new_featured') border-danger @enderror"/>
    //                     </div>
    //             </div>
    //             <div class="col-lg-2 mt-10">
    //                 <button id="remove_item" class="btn btn-sm bg-danger text-light"><i class="fas fa-times"></i></button>
    //             </div>
    //         </div>
    //     `);
        // }
        //  $(document).on("click", "#remove_item", function() {
        //      $(this).parent().parent('div').remove();
        //  });
    </script>
@endsection
