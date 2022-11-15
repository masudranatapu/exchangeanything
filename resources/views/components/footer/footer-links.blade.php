<div class="col-xl-2 col-lg-6 col-6">
    <h2 class="footer__title text--body-2-600">{{ __('quick_links') }}</h2>

    <ul class="footer-menu">
        <li class="footer-menu__item">
            <a href="{{ route('frontend.terms') }}" class="footer-menu__link text--body-3">{{ __('terms_conditions') }}</a>
        </li>
        <li class="footer-menu__item">
            <a href="{{ route('frontend.privacy') }}" class="footer-menu__link text--body-3">{{ __('privacy_policy') }}</a>
        </li>
        <li class="footer-menu__item">
            <a href="{{ route('frontend.cookie.policy') }}" class="footer-menu__link text--body-3">{{ __('Cookie Policy') }}</a>
        </li>
    </ul>
</div>
