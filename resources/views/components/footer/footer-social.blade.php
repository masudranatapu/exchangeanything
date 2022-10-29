<ul class="social-icon">
    <!-- facebook -->
    @if($settings->facebook)
    <li class="social-icon__item">
        <a target="_blank" href="{{ $settings->facebook }}" class="social-icon__link">
            <x-svg.facebook-icon fill="currentColor"/>
        </a>
    </li>
    @endif
    <!-- Twitter -->
    @if($settings->twitter)
    <li class="social-icon__item">
        <a target="_blank" href="{{ $settings->twitter }}" class="social-icon__link">
            <x-svg.twitter-icon fill="currentColor" />
        </a>
    </li>
    @endif
    <!-- Instagram -->
    @if($settings->instagram)
    <li class="social-icon__item">
        <a target="_blank" href="{{ $settings->instagram }}" class="social-icon__link">
            <x-svg.instagram-icon />
        </a>
    </li>
    @endif
    <!-- Youtube -->
    @if($settings->youtube)
    <li class="social-icon__item">
        <a target="_blank" href="{{ $settings->youtube }}" class="social-icon__link">
           <x-svg.youtube-icon />
        </a>
    </li>
    @endif
    <!-- Linkedin -->
    @if($settings->telegam)
    <li class="social-icon__item">
        <a target="_blank" href="{{ $settings->telegam }}" class="social-icon__link">
            <x-svg.telegam-footer-icon />
        </a>
    </li>
    @endif
    <!-- discord  -->
    @if($settings->discord)
    <li class="social-icon__item">
        <a target="_blank" href="{{ $settings->discord }}" class="social-icon__link">
            <x-svg.discord-footer-icon />
        </a>
    </li>
    @endif
</ul>
