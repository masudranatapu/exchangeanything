<div class="product-item__sidebar-item">
    @if (auth('customer')->check())
        @php
            $userPlan = App\Models\UserPlan::CustomerData(auth('customer')->user()->id)->first();
            $plan = Modules\Plan\Entities\Plan::where('id', $userPlan->plans_id)->latest()->first();
            $checkuserforphone = DB::table('customers')->where('username', $name)->first();
        @endphp
        @if($checkuserforphone->provider_id)
            @if($checkuserforphone->email_share == 1)
                <div class="card-number">
                    <div class="number number--hide text--body-2">
                        <span class="icon">
                            <!-- <x-svg.phone-icon width="32" height="32" /> -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </span>
                        <span style=" text-transform: lowercase;">
                            {{ Str::limit($checkuserforphone->email, 8, 'XXXXXXXX') }}
                        </span>
                    </div>
                    <div class="number number--show text--body-2">
                        <span class="icon">
                            <!-- <x-svg.phone-icon width="32" height="32" /> -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </span>
                        <span style=" text-transform: lowercase;">
                            {{ $checkuserforphone->email }}
                        </span>
                    </div>
                    <!-- <span class="text--body-4 message">{{ __('reveal_phone_number') }}.</span>
                    <p>Best time to call : {{ @$callingtime }}</p> -->
                </div>
            @endif
        @else
            @if($checkuserforphone->phone_share == 1)
                @if($checkuserforphone->phone)
                    <div class="card-number">
                        <div class="number number--hide text--body-2">
                            <span class="icon">
                                <x-svg.phone-icon width="32" height="32" />
                            </span>
                            {{ Str::limit($checkuserforphone->phone, 8, 'XXXXXXXX') }}
                        </div>
                        <div class="number number--show text--body-2">
                            <span class="icon">
                                <x-svg.phone-icon width="32" height="32" />
                            </span>
                            {{ $checkuserforphone->phone }}
                        </div>
                        <!-- <span class="text--body-4 message">{{ __('reveal_phone_number') }}.</span>
                        <p>Best time to call : {{ @$callingtime }}</p> -->
                    </div>
                @endif
            @endif
        @endif
    @endif

    @if (auth('customer')->check() && auth('customer')->user()->username !== $name)
        {{-- @if ($plan->immediate_access_to_new_ads == 1) --}}
        <form action="{{ route('frontend.message.store', $name) }}" method="POST" id="sendMessageForm">
            @csrf
            <input type="hidden" value="." name="body">
            <input type="hidden" value="{{ $id }}" name="ad_id">
            <button type="submit" class="btn w-100">
                <span class="icon--left">
                    <x-svg.message-icon width="24" height="24" stroke="white" strokeWidth="1.6" />
                </span>
                {{ __('send_message') }}
            </button>
        </form>
    @endif

    @if (!auth('customer')->check())
        <a href="{{ url('price-plan') }}" class="btn w-100 login_required">
            <span class="icon--left">
                <x-svg.message-icon width="24" height="24" stroke="white" strokeWidth="1.6" />
            </span>
            {{ __('send_message') }}
        </a>
    @endif
    
    @php
        $add = Modules\Ad\Entities\Ad::find($id);
    @endphp
    @if ($add->web)
        <a href="{{ $add->web }}" class="btn mt-2 w-100 login_required">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><g fill="none" fill-rule="evenodd"><path d="M18 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h5M15 3h6v6M10 14L20.2 3.8"/></g></svg>
            Visit My Website
        </a>
    @endif
</div>
@if (!empty(auth('customer')->user()))
    @php

        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Carbon\Carbon::today());
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $add->created_at);

        $diff_in_days = $to->diffInDays($from);
        $end_day = 7 - $diff_in_days;
    @endphp
    <input type="hidden" id="accessDate" value="{{ $end_day }}">
@endif

<input type="hidden" id="immediateAccessToNewAds" value="{{ $immediateAccessToNewAds }}">

<script>
    function formValidation() {
        var immediateAccessToNewAds = document.getElementById('immediateAccessToNewAds').value;
        var date = document.getElementById('accessDate').value;
        if (immediateAccessToNewAds == 1) {
            toastr.error("Basic accounts can only respond to new ads after " + date +
                " days. Upgrade to gain immediate access.");
            return false;
        }
    }

    function giveAlert() {
        var immediateaccesstonewads = $("#immediateaccesstonewads").val();
        // alert(immediateaccesstonewads)
        var date = document.getElementById('accessDate').value;

        if (immediateaccesstonewads == 0) {
            toastr.error("Basic accounts can only respond to new ads after " + date +
                " days. Upgrade to gain immediate access");
            return false;
        }
    }
</script>
