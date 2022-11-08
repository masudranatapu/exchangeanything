@extends('layouts.backend.admin')
@section('title') {{ __('create_plan') }} @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="line-height: 36px;">{{ __('create_plan') }}</h3>
                    <a href="{{ route('module.plan.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                        <i class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}
                    </a>
                </div>
                <div class="card-body">
                    <!-- <form action="{{ route('module.plan.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-forms.label name="label" required="true" for="label" />
                                    <input type="text" id="label" name="label" value="{{ old('label') }}" class="form-control @error('label') is-invalid @enderror" placeholder="{{ __('basic') }} / {{ __('standard') }} / {{ __('premium') }}">
                                    @error('label') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-forms.label name="price" required="true" for="price" />
                                    <input type="number" id="price" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror">
                                    @error('price') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-forms.label name="package_duration" required="true" for="package_duration" />
                                    <select name="package_duration" id="package_duration" class="form-control @error('package_duration') is-invalid @enderror" required>
                                        <option value="">select plan duration</option>
                                        <option value="1">Lifetime Membership</option>
                                        <option value="2">Annually</option>
                                        <option value="3">Monthly</option>
                                    </select>
                                    @error('package_duration') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-forms.label name="unlimited_adverts" required="true" for="ad_limit" />
                                    <input type="number" id="ad_limit" name="ad_limit" value="{{ old('ad_limit') }}" class="form-control @error('ad_limit') is-invalid @enderror">
                                    <small>0 for unlimited adverts and 1-n to adverts limit</small>
                                    @error('ad_limit') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-forms.label name="order" required="false" for="order" />
                                    <input type="number" id="order" name="order" value="{{ old('order') }}" class="form-control @error('order') is-invalid @enderror">
                                    @error('order') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-field--textarea">
                                        <label>Add New Featured</label>
                                        <div id="multiple_feature_part">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="input-field mb-3">
                                                        <input name="new_featured[]" type="text" id="adname" class="form-control" placeholder="Enter new features" />
                                                    </div>
                                                </div>
                                                <div class="col-2 mt-10">
                                                    <a role="button" onclick="add_features_field()"
                                                    class="btn bg-primary btn-sm text-light"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-success btn-lg" type="submit"><i class="fas fa-plus"></i>&nbsp; {{ __('add') }}</button>
                        </div>
                    </form> -->
                    <form action="{{ route('module.plan.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-forms.label name="plan_type" required="true" for="ad_limit"
                                    for="plan_type" />
                                    <select name="interval" class="custom-select mr-sm-2" id="plan_type">
                                        <option {{ old('interval') == 'monthly' ? 'selected' : '' }}
                                            value="monthly">
                                            {{ __('Monthly') }}
                                        </option>
                                        <option {{ old('interval') == 'yearly' ? 'selected' : '' }}
                                            value="yearly">
                                            {{ __('Yearly') }}
                                        </option>
                                        <option {{ old('interval') == 'custom_date' ? 'selected' : '' }}
                                            value="custom_date">
                                            {{ __('Duration') }}
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
                                    <input type="number" min="1" id="custom_interval_days" name="custom_interval_days" value="15" class="form-control " placeholder="Interval Days">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-forms.label name="label" required="true" for="label" />
                                    <input type="text" id="label" name="label" value="{{ old('label') }}"
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
                                    <input type="number" id="ad_limit" name="ad_limit"
                                    value="{{ old('ad_limit') }}"
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
                                    <input type="number" id="price" name="price" value="{{ old('price') }}"
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
                                    value="{{ old('featured_limit') }}"
                                    class="form-control @error('featured_limit') is-invalid @enderror">
                                    @error('featured_limit')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <x-forms.label name="premium_badge" for="badge" />
                                    <select name="badge" id="badge"
                                        class="form-control @error('badge') is-invalid @enderror">
                                        <option value="1">{{ __('yes') }}</option>
                                        <option value="0">{{ __('no') }}</option>
                                    </select>
                                    @error('badge')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-success" type="submit"><i class="fas fa-plus"></i>&nbsp;
                            {{ __('create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
// function add_features_field() {
//     $("#multiple_feature_part").append(`
//         <div class="row">
    //             <div class="col-lg-10">
        //                     <div class="input-field mb-3">
            //                         <input name="new_featured[]" type="text"  id="adname" class="form-control @error('new_featured') border-danger @enderror" placeholder="Enter new features"/>
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
<script>
    if ('' == 'custom_date') {
        $('#interval_date').removeClass('d-none');
    }

    $(document).ready(function() {
        $('#plan_type').on('change', function() {
            if ($(this).val() == 'custom_date') {
                $('#interval_date').removeClass('d-none');
            } else {
                $('#interval_date').addClass('d-none');
            }
        });
    });
</script>
@endsection