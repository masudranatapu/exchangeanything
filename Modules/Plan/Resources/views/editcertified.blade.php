@extends('layouts.backend.admin')

@section('title')
    {{ __('Edit Certified') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('Edit Certified') }}</h3>
                        <a href="{{ route('module.plan.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('module.certified.updateCertified', $certified->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{$certified->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Certified Plan Duration <span class="text-danger">*</span></label>
                                        <select name="package_duration" class="custom-select" required>
                                            <option {{ $certified->package_duration == '1' ? 'selected' : '' }} value="1">
                                                {{ __('lifetime') }}
                                            </option>
                                            <option {{ $certified->package_duration == '2' ? 'selected' : '' }} value="2">
                                                {{ __('anually') }}
                                            </option>
                                            <option {{ $certified->package_duration == '3' ? 'selected' : '' }} value="3">
                                                {{ __('monthly') }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image </label>
                                        <input type="file" name="badge_image" onChange="mainTham(this)" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Price <span class="text-danger">*</span></label>
                                        <input type="number" min="1" name="price" value="{{$certified->price}}" class="form-control @error('price') is-invalid @enderror" placeholder="Price" required>
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <img src="@if($certified->badge_image) {{asset($certified->badge_image)}} @else {{asset('images/certified.jpg')}} @endif" id="showTham" width="100" heigth="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Certified Badge <span class="text-danger">*</span></label>
                                        <input type="text" name="certified_badge" value="{{$certified->certified_badge}}" class="form-control @error('certified_badge') is-invalid @enderror" placeholder="Certified Badge" required>
                                        @error('certified_badge')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Review Request <span class="text-danger">*</span></label>
                                        <input type="text" name="review_request" value="{{$certified->review_request}}" class="form-control @error('review_request') is-invalid @enderror" placeholder="Review Request" required>
                                        @error('review_request')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Share Review <span class="text-danger">*</span></label>
                                        <input type="text" name="share_review" value="{{$certified->share_review}}" class="form-control @error('share_review') is-invalid @enderror" placeholder="Share Review" required>
                                        @error('share_review')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                            <option value="1" @if($certified->status == 1) selected @endif>Active</option>
                                            <option value="0" @if($certified->status == 0) selected @endif>Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="4" placeholder="Description">{{$certified->description}}</textarea>
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
        function mainTham(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showTham').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
