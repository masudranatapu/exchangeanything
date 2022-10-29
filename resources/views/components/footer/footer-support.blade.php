<div class="col-xl-2 col-lg-6 col-sm-6">
    <h2 class="footer__title text--body-2-600">{{ __('Support') }}</h2>

    <ul class="footer-menu">
        @if ($contact_enable)
        <li class="footer-menu__item">
            <a href="{{ route('frontend.contact') }}" class="footer-menu__link text--body-3">{{ __('contact') }}</a>
        </li>
        @endif
        @if ($faq_enable)
            <li class="footer-menu__item">
                <a href="{{ route('frontend.faq') }}" class="footer-menu__link text--body-3">{{ __('faqs') }}</a>
            </li>
        @endif

        <li class="footer-menu__item">
            <a href="{{ route('frontend.about') }}" class="footer-menu__link text--body-3">About Us</a>
        </li>
    </ul>
</div>
