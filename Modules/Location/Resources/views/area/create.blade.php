@extends('layouts.backend.admin')

@section('title') {{ __('Create State') }} @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('Create State') }}</h3>
                        <a href="{{ route('module.area.index') }}" class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}
                        </a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('module.area.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <x-forms.label name="Select Country" required="true" class="col-sm-3"/>
                                    <div class="col-sm-9">
                                        <select name="country_id" id="countryid" class="form-control @error('country_id') is-invalid @enderror">
                                            <option value="" disabled selected>Select One</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <x-forms.label name="Select State" required="true" class="col-sm-3"/>
                                    <div class="col-sm-9">
                                        <select name="state_id" id="stateid" class="form-control @error('state_id') is-invalid @enderror">

                                        </select>
                                        @error('state_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <x-forms.label name="City name" required="true" class="col-sm-3"/>
                                    <div class="col-sm-9">
                                        <input type="text" name="city_name" placeholder="{{ __('Enter City name') }}" value="{{ old('city_name') }}"  class="form-control @error('city_name') is-invalid @enderror">
                                        @error('city_name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-plus"></i>
                                            &nbsp; {{ __('create') }}
                                        </button>
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
@section('script')
    <script>
        $("#countryid").on('change', function() {
            var countryid = $("#countryid").val();
            // alert(countryid);
            if(countryid){
                $.ajax({
                    url: "{{  url('/admin/city/country-get-ajax') }}/"+countryid,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        console.log(data);
                        $('#stateid').html('');
                        var d =$('#stateid').empty();
                        $('#stateid').append('<option value="" disabled selected> Select One </option>');
                        $.each(data, function(key, value){
                            $('#stateid').append('<option value="'+ value.id +'">' + value.name + '</option>');
                        });
                    },

                });
            }else {
                alert('Select your country');
            }
        });
    </script>
@endsection
