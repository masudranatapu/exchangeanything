@extends('frontend.postad.index')

@section('title', __('step2'))

@section('post-ad-content')
 <!-- Step 02 -->
 <div class="tab-pane fade show active" id="pills-post" role="tabpanel" aria-labelledby="pills-post-tab">
    <div class="dashboard-post__ads step-information">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('frontend.post.step2.store') }}" method="POST" onsubmit="return validateForm()" id="step2Form" class="registration-form__wrapper">
            @csrf
            {{-- <input type="hidden" name="phone_number_showing_permission" id="phone_number_showing_permission"> --}}

            <div class="row">
                <div class="col-md-6">
                    <div class="input-field">
                        <x-forms.label name="phone_number_showing_permission" for="phoneNumber" />
                        <div class="form-check">
                            <input class="form-check-input phone_show" type="checkbox" name="phone_number_showing_permission" value="1">
                            <label class="form-check-label">
                              Yes
                            </label>
                          </div>
                    </div>
                </div>

                <div class="col-md-6 phone_input" style="display: none">
                    <div class="input-field">
                        <input type="hidden" id="code" value="" name="countrycode">
                        <input type="phone_number" name="phone" value="{{ $ad->phone ?? $authUser->phone }}"  class="input form-control">
                    </div>
                </div>
                
                <!-- <div class="col-md-6">
                    <div class="input-field">
                        <x-forms.label name="backup_phone_number" for="backupPhone" />
                        <input name="phone_2" id="backupPhone" type="tel" class="backupPhone" placeholder="{{ __('phone_number') }}" value="{{ $ad->phone_2 ?? '' }}"/>
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="input-field">
                        <x-forms.label name="Best Time To Call" for="backupPhone" />
                        <select name="estimate_calling_time" class="form-control select-bg @error('estimate_calling_time') border-danger @enderror">
                            <option value="Any" selected>Any</option>
                            <option value="Morning" selected>Morning</option>
                            <option value="Afternoon" selected>Afternoon</option>
                            <option value="Evening" selected>Evening</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-select">
                        <x-forms.label name="country" required="true" for="cityy" />
                        <select required name="city_id" id="country" class="form-control select-bg @error('city_id') border-danger @enderror">
                            <option class="d-none" value="" selected>{{ __('select_city') }}</option>
                            @foreach ($citis as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-select">
                        <x-forms.label  required="true" name="region" for="townn" />
                        <select required name="town_id" id="townn" class="form-control select-bg @error('town_id') border-danger @enderror">
                            <option value="" hidden>{{ __('select_town') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <input type="hidden" value="{{$authUser->country_id ?? ''}}" name="city_id">
                <input type="hidden" value="{{$authUser->region_id ?? ''}}" name="town_id">
                @php
                    $user_plan =  App\Models\UserPlan::where('customer_id',Auth::user()->id)->first();
                    $plan = Modules\Plan\Entities\Plan::find($user_plan->plans_id);
                   
                @endphp
                @if($plan->embed_yt_video_and_links==1)
                <div class="col-md-6">
                    <div class="input-field">
                        <x-forms.label name="web" for="website url" />
                        <input name="web" id="web" type="text" placeholder="{{ __('web') }}" value="{{ old('web') }}" class="@error('web') border-danger @enderror"/>
                    </div>
                </div>
                @endif
            </div>
            <div class="dashboard-post__action-btns">
                <a href="{{ route('frontend.post.step1.back') }}" class="btn btn--lg btn--outline">
                    {{ __('previous') }}
                </a>
                <button type="submit" class="btn btn--lg">
                    {{ __('next_step') }}
                    <span class="icon--right">
                        <x-svg.right-arrow-icon />
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

    <!-- phone number showing permission modal start -->
    {{-- <div id="paymentPopupModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4" style="width: 41%;">
            <div class="w3-container my-2 py-5">
                <p><i class="fa-solid fa-triangle-exclamation"></i> Allow phone connection ?</p>
                <div class="d-flex">
                    <button onclick="PermissionYes()" class="btn btn-success form-control" style="margin-right: 15px;">Yes</button>
                    <button onclick="PermissionNo()" class="btn btn-success form-control">No</button>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- phone number showing permission modal end -->

@endsection
@section('frontend_script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput-jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/venobox.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>
    <script>
        function adFilterFunction(slug) {
            $('#adFilterInput').val(slug);
            $('#adFilterForm').submit();
        }
        $(document).ready(function() {
            // ===== Select2 ===== \\
            $('#town').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ?
                    $(this).data('width') : $(this).hasClass('w-100') ?
                    '100%' : 'style',
                placeholder: 'Select Region',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
        });

        //form validation start
        function validateForm(){
            document.getElementById('paymentPopupModal').style.display = 'block';
            return false;
        }

        function PermissionYes(){
            //1 for yes
            document.getElementById('phone_number_showing_permission').value = '1';
            document.getElementById('step2Form').submit();

        }
        function PermissionNo(){
            //1 for yes
            document.getElementById('phone_number_showing_permission').value = '0';
            document.getElementById('step2Form').submit();

        }

    </script>
    <script>
            //form validation end
        $(".phone_show").click(function() {
            if($(this).is(":checked")) {
                $(".phone_input").show(300);
            } else {
                $(".phone_input").hide(200);
            }
        });
    </script>
    <script>
        var instance = $("[name=phone]")
        instance.intlTelInput({
            initialCountry: "{{ $authUser->iso2 }}",
        });

        $("[name=phone]").on("blur", function() {
            $('#code').val(instance.intlTelInput('getSelectedCountryData').dialCode)
        })
    </script>
    <script>
        $('#country').on('change', function(){
            var country_id = $(this).val();
            // alert(country_id);
            if(country_id) {
                $.ajax({
                        url: "{{  url('adlist-search-ajax') }}/"+country_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('#townn').empty();
                        $('#townn').append('<option value="" disabled selected> Select Region </option>');
                        $.each(data, function(key, value){
                        $('#townn').append('<option value="'+ value.id +'">' + value.name + '</option>');
                    });
                },
                });
            } else {
                alert('danger');
            }
        });
    </script>
@endsection
