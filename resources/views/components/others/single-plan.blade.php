<div class="col-xl-4 col-lg-6">
    <div class="plan-card {{ $plan->recommended ? 'plan-card--active' : '' }}">
        <div class="plan-card__top">
            <h2 class="plan-card__title text--body-1"> {{ $plan->label }} </h2>
            <p class="plan-card__description">
                {{ $plan->description }}
            </p>
            <div class="plan-card__price">
                <h5 class="text--display-3">
                    {{ currencyFormating($plan->price) }}
                </h5>
            </div>
            <p class="plan-card__description">
                @if ($plan->package_duration == 1)
                    Lifetime Membership
                @elseif($plan->package_duration == 2)
                    Annually
                @elseif($plan->package_duration == 3)
                    Monthly
                @endif
            </p>
            @if (auth('customer')->check())
                <a href="{{ route('frontend.priceplanDetails', $plan->label) }}"
                    class="plan-card__select-pack btn btn--bg w-100">
                    {{ __('choose_plan') }}
                    <span class="icon--right">
                        <x-svg.right-arrow-icon />
                    </span>
                </a>
            @else
                <a href="{{ route('frontend.signup') }}" class="plan-card__select-pack btn btn--bg w-100">
                    {{ __('choose_plan') }}
                    <span class="icon--right">
                        <x-svg.right-arrow-icon />
                    </span>
                </a>
            @endif
        </div>
        <div class="plan-card__bottom">
            <div class="plan-card__package">
                <div class="plan-card__package-list active">
                    <span class="icon">
                        <x-svg.check-icon />
                    </span>
                    <h5 class="text--body-3">{{ __('post') }} {{ $plan->ad_limit }} {{ __('ads') }}</h5>
                </div>
                <div class="plan-card__package-list {{ $plan->featured_limit ? 'active' : '' }}">
                    <span class="icon">
                        <x-svg.check-icon />
                    </span>
                    <h5 class="text--body-3">{{ $plan->featured_limit }} {{ __('featured_ads') }}</h5>
                </div>
                <div class="plan-card__package-list {{ $plan->badge ? 'active' : '' }} ">
                    @if ($plan->badge == true)
                        <span class="">
                            <x-svg.check-icon />
                        </span>
                    @else
                        <span class="icon bg-white">
                            <i class="fa fa-times text-danger"></i>
                        </span>
                    @endif
                    <h5 class="text--body-3">{{ __('special_membership_badge') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
