<div class="dashboard__navigation">
    @php
        $user = auth('customer')->user();
    @endphp
    <div class="dashboard__navigation-top">
        <div class="dashboard__user-proifle">
            <div class="dashboard__user-img">
                <img src="{{ $user->image_url }}" alt="user-photo" />
            </div>
            <div class="dashboard__user-info">
                <h2 class="name text--body-2-600">{{ $user->name }}</h2>
                <p class="designation">{{ $user->username }}</p>
                <p class="designation">{{ $user->code }}</p>
            </div>
        </div>
    </div>
    <div class="dashboard__navigation-bottom">
        <ul class="dashboard__nav">
            <li class="dashboard__nav-item">
                <a href="{{ route('frontend.dashboard') }}" class="dashboard__nav-link {{ request()->routeIs('frontend.dashboard')  ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.overview-icon />
                    </span>
                    {{ __('overview') }}
                </a>
            </li>

            @php
                $plan = Modules\Plan\Entities\Plan::find(Auth::user()->userPlan->plans_id);
               
            @endphp

            @if (session('user_plan') && session('user_plan')->ad_limit > 0)
                <li class="dashboard__nav-item">
                    <a href="{{ route('frontend.post') }}"
                        class="dashboard__nav-link {{ request()->routeIs('frontend.post') ? 'active' : '' }}">
                        <span class="icon">
                            <x-svg.image-select-icon />
                        </span>
                        {{ __('post_ads') }}
                    </a>
                </li>
            @endif


            

            <li class="dashboard__nav-item">
                <a href="{{ route('frontend.adds') }}" class="dashboard__nav-link {{ request()->routeIs('frontend.adds')  ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.list-icon  width="24" height="24" stroke="currentColor"/>
                    </span>
                    {{ __('my_ads') }}
                </a>
            </li>
            <li class="dashboard__nav-item">
                <a href="{{ route('frontend.favourites') }}" class="dashboard__nav-link {{ request()->routeIs('frontend.favourites')  ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.heart-icon fill="none" stroke="currentColor"/>
                    </span>
                    {{ __('favorite_ads') }}
                </a>
            </li>
            <li class="dashboard__nav-item">
                <a href="{{ route('frontend.message') }}" class="dashboard__nav-link {{ request()->routeIs('frontend.message')  ? 'active' : '' }}"">
                    <span class="icon">
                        <x-svg.message-icon width="24" height="24" stroke="currentColor" />
                    </span>
                    @php
                        $msg_count = App\Models\Messenger::where('to_id',Auth::user()->id)->where('status',0)->count()
                    @endphp
                    {{ __('message') }}@if($msg_count)<span style="    color: #0088cc; padding-left: 7px;">({{$msg_count}})</span>@endif
                </a>
            </li>
            <li class="dashboard__nav-item">
                <a href="{{ route('frontend.plans-billing') }}" class="dashboard__nav-link  {{ request()->routeIs('frontend.plans-billing')  ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.invoice-icon width="24" height="24" stroke="currentColor" />
                    </span>
                    {{ __('plans_billing') }}
                </a>
            </li>
            <li class="dashboard__nav-item">
                <a href="{{ route('frontend.account-setting') }}" class="dashboard__nav-link {{ request()->routeIs('frontend.account-setting')  ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.setting-icon />
                    </span>
                    {{ __('account_settings') }}
                </a>
            </li>
            <li class="dashboard__nav-item">
                <a href="#" class="dashboard__nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <span class="icon">
                        <x-svg.logout-icon />
                    </span>
                    {{ __('sign_out') }}
                </a>
                <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <span class="dashboard__navigation-toggle-btn">
        <x-svg.toggle-icon />
    </span>
</div>