@if ($social_setting->google || $social_setting->linkedin)
    <div class="registration-form__sign-btns">
        @if ($social_setting->google && env('GOOGLE_CLIENT_ID') && env('GOOGLE_CLIENT_SECRET'))
            <a href="/auth/google/redirect" class="btn-sign">
                <span class="icon">
                    <x-svg.google-icon/>
                </span>
                {{ __('sign_in_with_google') }}
            </a>
        @endif
        @if ($social_setting->linkedin && env('LINKEDIN_CLIENT_ID') && env('LINKEDIN_CLIENT_SECRET'))
            <a href="/auth/linkedin/redirect" class="btn-sign">
                <span class="icon ">
                    <x-svg.linkedin-icon fill="#0288d1"/>
                </span>
                {{ __('sign_in_with_linkedin') }}
            </a>
        @endif
    </div>
@endif

@if ($social_setting->twitter || $social_setting->facebook)
    <div class="registration-form__sign-btns">
        @if ($social_setting->facebook && env('FACEBOOK_CLIENT_ID') && env('FACEBOOK_CLIENT_SECRET'))
            <a href="/auth/facebook/redirect" class="btn-sign">
                <span class="icon">
                    <x-svg.facebook-icon/>
                </span>
                {{ __('sign_in_with_facebook') }}
            </a>
        @endif
        @if ($social_setting->twitter && env('TWITTER_CLIENT_ID') && env('TWITTER_CLIENT_SECRET'))
            <a href="/auth/twitter/redirect" class="btn-sign">
                <span class="icon">
                    <x-svg.twitter-icon fill="#03A9F4"/>
                </span>
                {{ __('sign_in_with_twitter') }}
            </a>
         @endif
    </div>
@endif

@if ($social_setting->github || $social_setting->gitlab)
    <div class="registration-form__sign-btns">
        @if ($social_setting->github && env('GITHUB_CLIENT_ID') && env('GITHUB_CLIENT_SECRET'))
            <a href="/auth/github/redirect" class="btn-sign">
                <span class="icon">
                    <x-svg.github-icon/>
                </span>
                {{ __('sign_in_with_github') }}
            </a>
        @endif
        @if ($social_setting->gitlab && env('GITLAB_CLIENT_ID') && env('GITLAB_CLIENT_SECRET'))
            <a href="/auth/gitlab/redirect" class="btn-sign">
                <span class="icon ">
                    <x-svg.gitlab-icon/>
                </span>
                {{ __('sign_in_with_gitlab') }}
            </a>
        @endif
    </div>
@endif

@if (env('BITBUCKET_CLIENT_ID') && env('BITBUCKET_CLIENT_SECRET'))
    <div class="registration-form__sign-btns">
        @if ($social_setting->bitbucket)
            <a href="/auth/bitbucket/redirect" class="btn-sign">
                <span class="icon">
                    <x-svg.bitbucket-icon />
                </span>
                {{ __('sign_in_with_bitbucket') }}
            </a>
        @endif
    </div>
@endif

@if ($social_setting->google || $social_setting->linkedin || $social_setting->twitter || $social_setting->facebook || $social_setting->github || $social_setting->gitlab || $social_setting->bitbucket)
    <h2 class="registration-form__alternative-title text--body-3">{{ __('or_sign_in_with_email') }}</h2>
@endif
