<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput-jquery.min.js" integrity="sha512-QK4ymL3xaaWUlgFpAuxY+6xax7QuxPB3Ii/99nykNP/PlK3NTQa/f/UbQQnWsM4h5yjQoMjWUhCJbYgWamtL6g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="col-lg-6 order-1 order-lg-0">
    <div class="registration-form">
        <h2 class="text-center text--heading-1 registration-form__title">{{ __('sign_up') }}</h2>
       {{-- Social Login --}}
       <x-auth.social-login/>

        <div class="registration-form__wrapper">
            <form action="{{ route('customer.register') }}" method="POST" onsubmit="return checkForm(this);">
                @csrf
                <div class="input-field">
                    <input value="{{ old('name') }}" type="text" placeholder="{{ __('full_name') }}" name="name" class="@error('name') is-invalid border-danger @enderror" />
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="input-field">
                    <input class="@error('username') is-invalid border-danger @enderror" name="username" id="valid_user_name" required type="text" placeholder="{{__('User Name')}}" value="{{ old('username') }}" onkeypress="return AvoidSpace(event)" >
                    <span id="response_id"></span>
                    @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="input-field">
                    <input value="{{ old('email') }}" type="email" placeholder="{{ __('email_address') }}" name="email" class="@error('email') is-invalid border-danger @enderror" />
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="input-field">
                    <input type="hidden" id="iso2" value="" name="iso2">
                    <input type="hidden" id="code" value="" name="countrycode">
                    <input type="phone_number" name="phone" value="{{ old('phone') }}" placeholder="Phone No" class="input form-control" autocomplete="off">
                    {{-- <input value="{{ old('phone') }}" id="phone" type="tel" placeholder="{{ __('Phone Number') }}" name="phone[main]" class="input @error('phone') is-invalid border-danger @enderror" /> --}}
                    @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                {{--<div class="input-field">
                    <input value="{{ old('web') }}" type="text" placeholder="{{ __('Website(Optional)') }}" name="web" class="@error('phone') is-invalid border-danger @enderror" />
                    @error('web')<span class="text-danger">{{ $message }}</span>@enderror
                </div>--}}
                @php
                    $citis = Modules\Location\Entities\City::orderBy('name')->get();
                @endphp
                <div class="input-field">
                    
                    <select name="country_id" id="country" class="form-control select-bg @error('city_id') border-danger @enderror">
                        <option value="" selected>{{ __('select_country') }}</option>
                        @foreach ($citis as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field">
                    
                    <select name="region_id" id="townn" class="form-control select-bg @error('town_id') border-danger @enderror">
                        <option value="" selected disabled>First Select Country</option>
                    </select>
                </div>
                <div class="input-field">
                    <input type="password" id="password-field" name="password" placeholder="{{ __('password minimum 8 letter') }}" class="@error('password') is-invalid border-danger @enderror" />
                    <span id="psw_msg"></span>
                    <span toggle="#password-field" class="icon icon--eye toggle-password">
                        <x-svg.eye-icon />
                    </span>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="input-field">
                    <input type="password" name="password_confirmation" placeholder="{{ __('confirm password minimum 8 letter') }}" id="password-field2" class="@error('password') is-invalid border-danger @enderror" />
                    <span toggle="#password-field2" class="icon icon--eye toggle-password2">
                        <x-svg.eye-icon />
                    </span>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="registration-form__option">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkme" required/>
                        <input type="hidden" class="form-check-input" name="package_id" value="{{$package_id}}" />
                        <label class="form-check-label" for="checkme">
                            {{ __('read_agree') }} <!-- <a href="{{ route('frontend.privacy') }}">
                            {{ __('privacy_policy') }}</a> {{ __('and') }} -->
                            <a href="{{ route('frontend.terms') }}">
                                {{ __('terms_conditions') }}
                            </a>
                        </label>
                    </div>
                </div>
                <button class="btn btn--lg w-100 registration-form__btns" type="submit">
                    {{ __('sign_up') }}
                    <!-- <span class="icon--right">
                        <x-svg.right-arrow-icon stroke="#fff" />
                    </span> -->
                </button>
                <p class="text--body-3 registration-form__redirect">{{ __('have_account') }} ? <a href="{{ route('customer.login') }}">{{ __('sign_in') }}</a></p>
            </form>
        </div>
    </div>
</div>

<script>
    var instance = $("[name=phone]")
    instance.intlTelInput();

    $("[name=phone]").on("blur", function() {
        $('#code').val(instance.intlTelInput('getSelectedCountryData').dialCode)
        $('#iso2').val(instance.intlTelInput('getSelectedCountryData').iso2)
    })
</script>
@section('frontend_script')
<script>
    $('#country').on('change', function(){
        var country_id = $(this).val();
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
<script type="text/javascript">

    function checkForm(form)
    {
      
      if(form.password.value != "" && form.password.value == form.password_confirmation.value) {
        if(form.password.value.length < 6) {
          alert("Error: Password must contain at least six characters!");
          document.getElementById("psw_msg").text('Password must contain at least six characters!')
          form.password.focus();
          return false;
        }
        if(form.password.value == form.username.value) {
          alert("Error: Password must be different from Username!");
          form.password.focus();
          return false;
        }
        re = /[0-9]/;
        if(!re.test(form.password.value)) {
          alert("Error: password must contain at least one number (0-9)!");
          form.password.focus();
          return false;
        }
        re = /[a-z]/;
        if(!re.test(form.password.value)) {
          alert("Error: password must contain at least one lowercase letter (a-z)!");
          form.password.focus();
          return false;
        }
        re = /[A-Z]/;
        if(!re.test(form.password.value)) {
          alert("Error: password must contain at least one uppercase letter (A-Z)!");
          form.password.focus();
          return false;
        }
      } else {
        alert("Error: Please check that you've entered and confirmed your password!");
        form.password.focus();
        return false;
      }
  
    //   alert("You entered a valid password: " + form.password.value);
      return true;
    }
  
  </script>
  <!-- Show Password -->
  <script>
      $(".toggle-password").click(function() {
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
       });

      $(".toggle-password2").click(function() {
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
       });
  </script> 
@endsection