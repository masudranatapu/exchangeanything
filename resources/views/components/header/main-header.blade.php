<style>
    .menu__item {
        margin-right: 18px;
        position: relative;
        display: inline-block;
    }
</style>
<header class="header header--home-three header--four">
    <div class="container navigation-bar">
        <div class="d-flex align-items-center ">
            <button class="toggle-icon  ">
                <span class="toggle-icon__bar"></span>
                <span class="toggle-icon__bar"></span>
                <span class="toggle-icon__bar"></span>
            </button>
            <!-- Brand Logo -->
            <a href="{{ route('frontend.index') }}"
                class="navigation-bar__logo @if (auth('customer')->check()) auth_logo @endif">
                <img src="{{ $settings->logo_image_url }}" alt="brand-logo" class="logo-dark">
            </a>
        </div>
        <!-- Menu -->
        <ul class="menu">
            {{--
                <li class="menu__item">
                    <a href="{{ route('frontend.index') }}" class="menu__link">{{ __('home') }}</a>
                </li>
                <li class="menu__item">
                    <a href="{{ route('frontend.about') }}" class="menu__link {{ Route::is('frontend.about') ? 'active' : '' }}">{{ __('About Us') }}</a>
                </li>
                @if ($blog_enable)
                <li class="menu__item">
                    <a href="{{ route('frontend.blog') }}" class="menu__link {{ Route::is('frontend.blog') ? 'active' : '' }}">{{ __('blog') }}</a>
                </li>
                @endif
                <li class="menu__item">
                    <a href="{{ route('frontend.contact') }}" class="menu__link {{ Route::is('frontend.contact') ? 'active' : '' }}">{{ __('contact') }}</a>
                </li>
            --}}
        </ul>
        <!-- Action Buttons -->
        <div class="navigation-bar__buttons">
            @if (auth('customer')->check())
                @php
                    $user_plan = DB::table('user_plans')
                        ->where('customer_id', auth('customer')->user()->id)
                        ->first();
                @endphp
                <div class="d-none d-xl-block">
                    <li class="menu__item">
                        <a href="{{ route('frontend.ad-list') }}"
                            class="menu__link {{ Route::is('frontend.ad-list') ? 'active' : '' }}">{{ __('ads') }}</a>
                    </li>
                    {{-- @if ($priceplan_enable)
                        <li class="menu__item">
                            <a href="{{ route('frontend.priceplan') }}" class="menu__link {{ Route::is('frontend.priceplan') ? 'active' : '' }}">{{ __('pricing') }}</a>
                        </li>
                    @endif --}}
                </div>
                <a href="{{ route('frontend.message') }}" class="user">
                    @php
                        $msg_count = App\Models\Messenger::where('to_id', auth('customer')->user()->id)
                            ->where('status', 0)
                            ->count();
                    @endphp
                    <div class="user__img-wrapper">
                        <span class="icon">
                            <x-svg.message-icon width="24" height="24" stroke="currentColor" />
                        </span>
                        @if ($msg_count)
                            <span style="color:#0088cc">({{ $msg_count }})</span>
                        @endif
                    </div>
                </a>
                <a href="{{ route('frontend.dashboard') }}" class="user">
                    <div class="user__img-wrapper" style="position: relative">
                        <img src="{{ auth('customer')->user()->image_url }}"
                            style="width: 40px; height: 40px; border-radius: 50%" alt="User Image">
                        @if (auth('customer')->user()->certified_seller == 1 && auth('customer')->user()->certificate_validity > now())
                            @php
                                $certified = DB::table('get_certified_plans')
                                    ->latest()
                                    ->first();
                            @endphp
                            <img src="@if ($certified->badge_image) {{ asset($certified->badge_image) }} @else {{ asset('images/certified.jpg') }} @endif"
                                style="width: 20px;height: 20px;border-radius: 50%;position: absolute;bottom: 0px; top: 20px; right: -8px;">
                        @endif
                    </div>
                </a>
                @if ($user_plan->ad_limit > 0 || $user_plan->valid_date > now())
                    <a href="{{ route('frontend.post') }}" class="btn">
                        <span class="icon--left">
                            <x-svg.image-select-icon />
                        </span>
                        {{ __('post_ads') }}
                    </a>
                @else
                    <a href="{{ route('frontend.priceplan') }}" class="btn">
                        <span class="icon--left">
                            <x-svg.image-select-icon />
                        </span>
                        {{ __('post_ads') }}
                    </a>
                @endif
            @else
                <div class="d-none d-xl-block me-5">
                    <li class="menu__item">
                        <a href="{{ route('frontend.ad-list') }}"
                            class="menu__link {{ Route::is('frontend.ad-list') ? 'active' : '' }}">{{ __('ads') }}</a>
                    </li>

                    @if ($priceplan_enable)
                        {{-- <li class="menu__item">
                            <a href="{{ route('frontend.priceplan') }}"
                                class="menu__link {{ Route::is('frontend.priceplan') ? 'active' : '' }}">{{ __('pricing') }}</a>
                        </li> --}}
                    @endif
                </div>
                <a href="{{ route('customer.login') }}"
                    class="btn btn--bg {{ Route::is('customer.login') ? 'active' : '' }}">
                    <span class="icon--left">
                        <x-svg.user-login-icon />
                    </span>
                    {{ __('sign_in') }}
                </a>
                <a href="{{ route('frontend.priceplan') }}" class="btn">
                    <span class="icon--left">
                        <x-svg.image-select-icon />
                    </span>
                    {{ __('post_ads') }}
                </a>
            @endif
            <!-- <x-frontend.language-switcher/> -->
        </div>
        <!-- Responsive Navigation Menu  -->
        <x-frontend.responsive-menu />
    </div>
</header>
