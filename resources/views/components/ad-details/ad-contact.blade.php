<div class="product-item__sidebar-item">
@if(auth('customer')->check())
        @php
            $userPlan = App\Models\UserPlan::CustomerData(auth('customer')->user()->id)->first();
            $plan = Modules\Plan\Entities\Plan::where('id', $userPlan->plans_id)->latest()->first();
        @endphp
    @if($numberShowingPermission == 1)
    @if($plan->immediate_access_to_new_ads == 1)
            <div class="card-number">
                <div class="number number--hide text--body-2">
                    <span class="icon">
                        <x-svg.phone-icon width="32" height="32" />
                    </span>
                    {{auth('customer')->user()->country_code ?? ''}}{{ Str::limit($phone, 8, 'XXXXXXXX') }}
                </div>
                <div class="number number--show text--body-2">
                    <span class="icon">
                        <x-svg.phone-icon width="32" height="32" />
                    </span>

                    {{auth('customer')->user()->country_code ?? ''}}{{ substr($phone, 0, 3) }} {{ substr($phone, 3) }}
                </div>
                <span class="text--body-4 message">{{ __('reveal_phone_number') }}.</span>
                <p>Best time to call : {{ @$callingtime }}</p>
            </div>
        @else
            <input type="hidden" value="{{$plan->immediate_access_to_new_ads}}" id="immediateaccesstonewads">
            <button href="javascript:;" class="" onclick="giveAlert()" style="margin-bottom: 20px;">
                <div class="number number--hide text--body-2">
                    <span class="icon">
                        <x-svg.phone-icon width="32" height="32" />
                    </span>
                    {{auth('customer')->user()->country_code ?? ''}}{{ Str::limit($phone, 8, 'XXXXXXXX') }}
                </div>
            </button>
    
    @endif
    @endif
    @endif

    @if (auth('customer')->check() && auth('customer')->user()->username !== $name )
        
        @if($plan->immediate_access_to_new_ads == 1)
            <form action="{{ route('frontend.message.store', $name) }}" method="POST" id="sendMessageForm">
            

                @csrf
                <input type="hidden" value="." name="body">
                <input type="hidden" value="{{$id}}" name="ad_id">
                <button type="submit" class="btn w-100">
                    <span class="icon--left">
                        <x-svg.message-icon width="24" height="24" stroke="white" strokeWidth="1.6" />
                    </span>
                    {{ __('send_message') }}
                </button>
            </form>
        @else
            <input type="hidden" value="{{$plan->immediate_access_to_new_ads}}" id="immediateaccesstonewads">
            <button href="javascript:;" class="btn w-100" onclick="giveAlert()">
                Send Message
            </button>
        @endif
    @endif

    @if(!auth('customer')->check())
        <a href="{{ url('price-plan') }}" class="btn w-100 login_required">
            <span class="icon--left">
                <x-svg.message-icon width="24" height="24" stroke="white" strokeWidth="1.6" />
            </span>
            {{ __('send_message') }}
        </a>
    @endif
    {{-- web --}}
    @php
        $add = Modules\Ad\Entities\Ad::find($id);
    @endphp
    @if($add->web)
    <span><a href="{{$add->web}}" target="_blank" style="text-decoration:underline; color: #bd9746;">Visit My Website</a></span>
    @endif
</div>
@if(!empty(auth('customer')->user()))
@php
    
    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Carbon\Carbon::today());
    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $add->created_at);

    $diff_in_days = $to->diffInDays($from);
    $end_day = 7-$diff_in_days;
    @endphp
    <input type="hidden" id="accessDate" value="{{$end_day}}">
@endif

<input type="hidden" id="immediateAccessToNewAds" value="{{$immediateAccessToNewAds}}">

<script>

    function formValidation(){
        var immediateAccessToNewAds = document.getElementById('immediateAccessToNewAds').value;
        var date = document.getElementById('accessDate').value;
        if(immediateAccessToNewAds == 1){
            toastr.error("Basic accounts can only respond to new ads after "+date+" days. Upgrade to gain immediate access.");
            return false;
        }
    }

    function giveAlert(){
        var immediateaccesstonewads = $("#immediateaccesstonewads").val();
        // alert(immediateaccesstonewads)
        var date = document.getElementById('accessDate').value;

        if(immediateaccesstonewads == 0){
            toastr.error("Basic accounts can only respond to new ads after "+ date + " days. Upgrade to gain immediate access");
            return false;
        }
    }

</script>