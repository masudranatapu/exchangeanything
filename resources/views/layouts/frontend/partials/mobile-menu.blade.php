<ul class="menu--sm">
    <li class="menu--sm__item">
        <a href="{{ route('frontend.index') }}" class="menu--sm__link">{{ __('home') }}</a>
    </li>
    <li class="menu__item">
        <a href="{{ route('frontend.about') }}" class="menu__link {{ Route::is('frontend.about') ? 'active' : '' }}">{{ __('About Us') }}</a>
    </li>
    <li class="menu--sm__item">
        <a href="{{ route('frontend.adlist') }}" class="menu--sm__link">{{ __('ads') }}</a>
    </li>
    @if ($blog_enable)
        <li class="menu--sm__item">
            <a href="{{ route('frontend.blog') }}" class="menu--sm__link">{{ __('blog') }}</a>
        </li>
    @endif
    @if ($priceplan_enable)
        <li class="menu--sm__item">
            <a href="{{ route('frontend.pricepla') }}" class="menu--sm__link">{{ __('Membership') }}</a>
        </li>
    @endif
    <li class="menu__item">
        <a href="{{ route('frontend.contact') }}" class="menu__link {{ Route::is('frontend.contact') ? 'active' : '' }}">{{ __('contact') }}</a>
    </li>
</ul>