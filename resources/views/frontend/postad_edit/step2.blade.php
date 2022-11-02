@extends('frontend.postad.index')

@section('title')
    {{ __('edit_ad') }} ({{ __('steps02') }}) - {{ $ad->title }}
@endsection

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
        <form id="step2_edit_form" action="{{ route('frontend.post.step2.update',$ad->slug) }}" method="POST">

            @csrf
            @method('PUT')
            <div class="row">
                @if($ad->phone)
                <div class="col-md-6">
                    <div class="input-field">
                        <x-forms.label name="phone_number_showing_permission" for="phoneNumber" />
                        <div class="form-check">
                            <input class="form-check-input phone_show" type="checkbox" name="phone_number_showing_permission" value="1" @php if(isset($ad)){ if ($ad->phone_number_showing_permission == 1) { echo "checked"; } } @endphp>
                            <label class="form-check-label">
                              Yes
                            </label>
                          </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-field">
                        <input type="hidden" id="code" value="" name="countrycode">
                        <x-forms.label name="phone_number" for="phoneNumber" required="true" />
                        <input name="phone" id="phoneNumber" type="phone_number" placeholder="{{ __('phone') }}" value="{{ $ad->phone }}" class="@error('phone') border-danger @enderror"/>
                    </div>
                </div>
                @else
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
                        <x-forms.label name="phone_number" for="phoneNumber" />
                        <input name="phone" id="phoneNumber" type="phone_number" placeholder="{{ __('phone') }}" value="{{ $ad->phone }}" class="@error('phone') border-danger @enderror"/>
                    </div>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-6">
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
                        <x-forms.label name="country" for="cityy" required="true" />
                        <select name="city_id" id="cityy" class="form-control select-bg @error('city_id') border-danger @enderror">
                            <option value="" selected>{{ __('select_country') }}</option>
                                @foreach ($citis as $city)
                                    <option {{ $city->id == $ad->city_id ? 'selected':'' }} value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-select">
                        <x-forms.label name="region" for="townn" required="true" />
                        <select name="town_id" id="townn" class="form-control select-bg @error('town_id') border-danger @enderror">
                            <option value="" hidden>{{ __('select_region') }}</option>
                        </select>
                    </div>
                </div>
                @php
                $user_plan =  App\Models\UserPlan::where('customer_id',Auth::user()->id)->first();
                $plan = Modules\Plan\Entities\Plan::find($user_plan->plans_id);

            @endphp
                @if($plan->embed_yt_video_and_links==1)
                <div class="col-md-6">
                    <div class="input-field">
                        <x-forms.label name="website_url" for="website url" />
                        <input name="web" id="web" type="text" placeholder="{{ __('website_url') }}" value="{{ $ad->web ?? '' }}" class="@error('web') border-danger @enderror"/>
                    </div>
                </div>
                @endif
            </div>
            <div class="dashboard-post__action-btns">
                <a href="{{ route('frontend.post.step1.back', $ad->slug) }}" class="btn btn--lg btn--outline">
                    {{ __('previous') }}
                </a>
                <button type="button" onclick="updateCancelEdit()" class="btn btn--lg bg-warning text-light">
                    {{ __('update_cancel_edit') }}
                    <span class="icon--right">
                        <x-svg.cross-icon />
                    </span>
                </button>
                <button type="submit" class="btn btn--lg">
                    {{ __('update_next_step') }}
                    <span class="icon--right">
                        <x-svg.right-arrow-icon />
                    </span>
                </button>
            </div>
            <input type="hidden" id="cancel_edit_input" name="cancel_edit" value="0">
        </form>
    </div>
</div>
@endsection

@push('post-ad-scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput-jquery.min.js"></script>
<script>
    // ad update and cancel edit
    function updateCancelEdit(){
        $('#cancel_edit_input').val(1)
        $('#step2_edit_form').submit()
    }
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
    //form validation end
$(".phone_show").click(function() {
if($(this).is(":checked")) {
    $(".phone_input").show(300);
} else {
    $(".phone_input").hide(200);
}
});
</script>
@endpush
