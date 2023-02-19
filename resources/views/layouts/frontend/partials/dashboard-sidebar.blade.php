<div class="dashboard__navigation">
    @php
        $user = auth('customer')->user();
        $user_plan = DB::table('user_plans')->where('customer_id', auth('customer')->user()->id)->first();
    @endphp
    <div class="dashboard__navigation-top">
        <div class="dashboard__user-proifle">
            <!-- <div class="dashboard__user-img">
                <img src="{{ $user->image_url }}" alt="user-photo" />
            </div> -->
            <div class="dashboard__user-img" style="position: relative">
                <img src="{{ $user->image_url }}" alt="{{ $user->name }}">
                @if ($user->certified_seller == 1 && $user->certificate_validity > now())
                    @php
                        $certified = DB::table('get_certified_plans')->latest()->first();
                    @endphp
                    <img src="@if($certified->badge_image) {{asset($certified->badge_image)}} @else {{ asset('images/certified.jpg') }} @endif" style="width: 25px;height: 25px;border-radius: 50%;position: absolute;bottom: 0px; top: 37px; right: -5px;" alt="{{ $user->name }}">
                @endif
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
            <li class="dashboard__nav-item" title="User Overview">
                <a data-toggle="tooltip" title="Reports & Plan Overview" href="{{ route('frontend.dashboard') }}"
                    class="dashboard__nav-link {{ request()->routeIs('frontend.dashboard') ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.overview-icon />
                    </span>
                    {{ __('overview') }}
                </a>
            </li>

            @if($user_plan->ad_limit > 0 || $user_plan->valid_date > now())
                <li class="dashboard__nav-item" title="Post an ads">
                    <a data-toggle="tooltip" title="Ads Post Form" href="{{ route('frontend.post') }}"
                        class="dashboard__nav-link {{ request()->routeIs('frontend.post') ? 'active' : '' }}">
                        <span class="icon">
                            <x-svg.image-select-icon />
                        </span>
                        {{ __('post_ads') }}
                    </a>
                </li>
            @else
                <li class="dashboard__nav-item" title="Post an ads">
                    <a data-toggle="tooltip" title="Ads Post Form" href="{{ route('frontend.priceplan') }}"
                        class="dashboard__nav-link {{ request()->routeIs('frontend.post') ? 'active' : '' }}">
                        <span class="icon">
                            <x-svg.image-select-icon />
                        </span>
                        {{ __('post_ads') }}
                    </a>
                </li>
            @endif




            <li class="dashboard__nav-item" title="My ads">
                <a data-toggle="tooltip" title="Your ads list" href="{{ route('frontend.adds') }}"
                    class="dashboard__nav-link {{ request()->routeIs('frontend.adds') ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.list-icon width="24" height="24" stroke="currentColor" />
                    </span>
                    {{ __('my_ads') }}
                </a>
            </li>
            <li class="dashboard__nav-item" title="My favorite ads">
                <a data-toggle="tooltip" title="Your favorites ads list" href="{{ route('frontend.favourites') }}"
                    class="dashboard__nav-link {{ request()->routeIs('frontend.favourites') ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.heart-icon fill="none" stroke="currentColor" />
                    </span>
                    {{ __('favorite_ads') }}
                </a>
            </li>
            <li class="dashboard__nav-item" title="Message list">
                <a data-toggle="tooltip" title="Chat with buyer/seller" href="{{ route('frontend.message') }}"
                    class="dashboard__nav-link {{ request()->routeIs('frontend.message') ? 'active' : '' }}"">
                    <span class="icon">
                        <x-svg.message-icon width="24" height="24" stroke="currentColor" />
                    </span>
                    @php
                        $msg_count = App\Models\Messenger::where('to_id', Auth::user()->id)
                            ->where('status', 0)
                            ->count();
                    @endphp
                    {{ __('message') }}@if ($msg_count)
                        <span style="    color: #0088cc; padding-left: 7px;">({{ $msg_count }})</span>
                    @endif
                </a>
            </li>
            {{-- <li class="dashboard__nav-item" title="Plans billing">
                <a data-toggle="tooltip" title="Your plan & billing information" href="{{ route('frontend.plans-billing') }}"
                    class="dashboard__nav-link  {{ request()->routeIs('frontend.plans-billing') ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.invoice-icon width="24" height="24" stroke="currentColor" />
                    </span>
                    {{ __('plans_billing') }}
                </a>
            </li>
            <li class="dashboard__nav-item" title="Account settings">
                <a data-toggle="tooltip" title="Customize your account" href="{{ route('frontend.getCertified') }}"
                    class="dashboard__nav-link {{ request()->routeIs('frontend.getCertified') ? 'active' : '' }}">
                    <span class="icon">
                        <i class="fa-solid fa-ribbon fa-lg"></i>
                    </span>
                    {{ __('get_certified') }}
                </a>
            </li> --}}
            <li class="dashboard__nav-item" title="Account settings">
                <a data-toggle="tooltip" title="Customize your account" href="{{ route('frontend.account-setting') }}"
                    class="dashboard__nav-link {{ request()->routeIs('frontend.account-setting') ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.setting-icon />
                    </span>
                    {{ __('account_settings') }}
                </a>
            </li>
            <li class="dashboard__nav-item" title="Sign out">
                <a data-toggle="tooltip" title="Log out from the system" href="#" class="dashboard__nav-link"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
