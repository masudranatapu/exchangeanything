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
                        <form action="{{ route('module.plan.store') }}" method="POST">
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
                                        <x-forms.label name="join_community_chat" for="join_community_chat" />
                                        <select name="join_community_chat" id="join_community_chat" class="form-control @error('join_community_chat') is-invalid @enderror">
                                            <option value="1">{{ __('yes') }}</option>
                                            <option value="0">{{ __('no') }}</option>
                                        </select>
                                        @error('badge') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="immediate_access_to_new_ads" for="immediate_access_to_new_ads" />
                                        <select name="immediate_access_to_new_ads" id="immediate_access_to_new_ads" class="form-control @error('immediate_access_to_new_ads') is-invalid @enderror">
                                            <option value="1">{{ __('yes') }}</option>
                                            <option value="0">{{ __('no') }}</option>
                                        </select>
                                        @error('badge') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                   <div class="form-group">
                                         <x-forms.label name="featured_limit" required="true" for="featured_limit" />
                                        <input type="number" id="featured_limit" name="featured_limit" value="{{ old('featured_limit') }}" class="form-control @error('featured_limit') is-invalid @enderror">
                                        @error('featured_limit')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span> 
                                        @enderror
                                    </div>  
                                </div> --}}
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="unlimited_photos" for="multiple_image" />
                                        <select name="multiple_image" id="multiple_image" class="form-control @error('multiple_image') is-invalid @enderror">
                                            <option value="1">{{ __('yes') }}</option>
                                            <option value="0">{{ __('no') }}</option>
                                        </select>
                                        @error('multiple_image') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="priority_situation_of_ads" for="priority_situation" />
                                        <select name="priority_situation" id="priority_situation" class="form-control @error('priority_situation') is-invalid @enderror">
                                            <option value="1">{{ __('yes') }}</option>
                                            <option value="0">{{ __('no') }}</option>
                                        </select>
                                        @error('badge') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="embed_youtube_videos_and_add_links_to_your_adverts" for="embed_yt_video_and_links" />
                                        <select name="embed_yt_video_and_links" id="embed_yt_video_and_links" class="form-control @error('embed_yt_video_and_links') is-invalid @enderror">
                                            <option value="1">{{ __('yes') }}</option>
                                            <option value="0">{{ __('no') }}</option>
                                        </select>
                                        @error('badge') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="browse_without_banner_ads" for="browse_without_banner_ads" />
                                        <select name="browse_without_banner_ads" id="browse_without_banner_ads" class="form-control @error('browse_without_banner_ads') is-invalid @enderror">
                                            <option value="1">{{ __('yes') }}</option>
                                            <option value="0">{{ __('no') }}</option>
                                        </select>
                                        @error('badge') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-forms.label name="order" required="true" for="order" />
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
                                <input name="new_featured[]" type="text"  id="adname" class="form-control @error('new_featured') border-danger @enderror" placeholder="Enter new features"/>
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
