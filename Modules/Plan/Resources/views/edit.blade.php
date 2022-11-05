@extends('layouts.backend.admin')
@section('title') {{ __('edit_plan') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('edit_plan') }}</h3>
                        <a href="{{ route('module.plan.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center">
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
                                        <x-forms.label name="label" required="true" for="label" />
                                        <input type="text" id="label" name="label" value="{{ $plan->label }}" class="form-control @error('label') is-invalid @enderror" placeholder="{{ __('basic') }} / {{ __('standard') }} / {{ __('premium') }}">
                                        @error('label') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="price" required="true" for="price" />
                                        <input type="number" id="price" name="price" value="{{ $plan->price }}" class="form-control @error('price') is-invalid @enderror">
                                        @error('price') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="package_duration" required="true" for="package_duration" />
                                        <select name="package_duration" id="package_duration" class="form-control @error('package_duration') is-invalid @enderror" required>
                                            <option value="">select plan duration</option>
                                            <option value="1" {{ $plan->package_duration == 1 ? 'selected' : '' }}>Lifetime Membership</option>
                                            <option value="2" {{ $plan->package_duration == 2 ? 'selected' : '' }}>Annually</option>
                                            <option value="3" {{ $plan->package_duration == 3 ? 'selected' : '' }}>Monthly</option>
                                        </select>
                                        @error('package_duration') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="unlimited_adverts" required="true" for="ad_limit" />
                                        <input type="number" id="ad_limit" name="ad_limit" value="{{ $plan->ad_limit }}" class="form-control @error('ad_limit') is-invalid @enderror">
                                        <small>0 for unlimited adverts and 1-n to adverts limit</small>
                                        @error('ad_limit') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                             
                             
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="order" required="true" for="order" />
                                        <input type="number" id="order" name="order" value="{{ $plan->order }}" class="form-control @error('order') is-invalid @enderror">
                                        @error('order') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-field--textarea">
                                            <label>Features</label>
                                            <div id="multiple_feature_part">
                                                <div class="row">
                                                    @foreach($plan->new_featured as $value)
                                                    <div class="col-10">
                                                        <div class="input-field mb-3">
                                                            <input value="{{$value}}" name="new_featured[]" type="text" id="adname" class="form-control" />
                                                        </div>
                                                    </div>
                                                    @endforeach

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
                                <button class="btn btn-lg btn-success" type="submit"><i class="fas fa-sync"></i>&nbsp; {{ __('update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function add_features_field() {
            $("#multiple_feature_part").append(`
                <div class="row">
                    <div class="col-lg-10">
                            <div class="input-field mb-3">
                                <input name="new_featured[]" type="text"  id="adname" class="form-control @error('new_featured') border-danger @enderror"/>
                            </div>
                    </div>
                    <div class="col-lg-2 mt-10">
                        <button id="remove_item" class="btn btn-sm bg-danger text-light"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            `);
        }
        // $(document).on("click", "#remove_item", function() {
        //     $(this).parent().parent('div').remove();
        // });
    </script>
@endsection
