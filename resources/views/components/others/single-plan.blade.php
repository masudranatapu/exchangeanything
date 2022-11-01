<div class="col-xl-4 col-lg-6">
    <div class="plan-card {{ $plan->recommended ? 'plan-card--active':'' }}">
        <div class="plan-card__top">
            <h2 class="plan-card__title text--body-1"> {{ $plan->label }} </h2>
            <p class="plan-card__description">
                {{ $plan->description }}
            </p>
            <div class="plan-card__price">
                <h5 class="text--display-3">
                    {{ currencyFormating($plan->price) }}*
                </h5>
            </div>
            <p class="plan-card__description">
                @if($plan->package_duration == 1) Lifetime Membership @elseif($plan->package_duration == 2) Annually @elseif($plan->package_duration == 3) Monthly  @endif
            </p>
            @if (auth('customer')->check())
                <a href="{{ route('frontend.priceplanDetails',$plan->label) }}"
                   class="plan-card__select-pack btn btn--bg w-100">
                    {{ __('choose_plan') }}
                    <span class="icon--right">
                        <x-svg.right-arrow-icon/>
                    </span>
                </a>
            @else
                <a href="{{ route('frontend.signup',$plan->id) }}" class="plan-card__select-pack btn btn--bg w-100">
                    {{ __('choose_plan') }}
                    <span class="icon--right">
                        <x-svg.right-arrow-icon/>
                    </span>
                </a>
            @endif
        </div>
        <div class="plan-card__bottom">
            <div class="plan-card__package">

                <div class="plan-card__package-list">
                    <i class="fas fa-check-circle" style="color:#06D7A0; margin-right: 5px; font-size: 21px;"></i>
                    <h5 class="text--body-3">@if($plan->ad_limit == 0) Unlimited  adverts @else {{ __('ads_limit') }} : {{ $plan->ad_limit }}  @endif</h5>
                </div>

                <div class="plan-card__package-list">
                    @if($plan->join_community_chat == true) <i class="fas fa-check-circle" style="color:#06D7A0; margin-right: 5px; font-size: 21px;"></i> @else <i class="fas fa-times-circle" style="color:red; margin-right: 5px; font-size: 21px;"></i> @endif
                    <h5 class="text--body-3">{{ __('join_community_chat') }}</h5>
                </div>

                <div class="plan-card__package-list">
                    @if($plan->immediate_access_to_new_ads == true) <i class="fas fa-check-circle" style="color:#06D7A0; margin-right: 5px; font-size: 21px;"></i> @else <i class="fas fa-times-circle" style="color:red; margin-right: 5px; font-size: 21px;"></i> @endif
                    <h5 class="text--body-3">{{ __('immediate_access_to_new_ads') }}</h5>
                </div>

                <div class="plan-card__package-list">
                    @if($plan->multiple_image == true) <i class="fas fa-check-circle" style="color:#06D7A0; margin-right: 5px; font-size: 21px;"></i> @else <i class="fas fa-times-circle" style="color:red; margin-right: 5px; font-size: 21px;"></i> @endif
                    <h5 class="text--body-3">{{ __('unlimited_photos') }}</h5>
                </div>

                <div class="plan-card__package-list {{ $plan->priority_situation == true ? 'active' : '' }}">
                    @if($plan->priority_situation == true) <i class="fas fa-check-circle" style="color:#06D7A0; margin-right: 5px; font-size: 21px;"></i> @else <i class="fas fa-times-circle" style="color:red; margin-right: 5px; font-size: 21px;"></i> @endif
                    <h5 class="text--body-3">{{ __('priority_situation_of_ads') }}</h5>
                </div>

                <div class="plan-card__package-list">
                    @if($plan->embed_yt_video_and_links == true) <i class="fas fa-check-circle" style="color:#06D7A0; margin-right: 5px; font-size: 21px;"></i> @else <i class="fas fa-times-circle" style="color:red; margin-right: 5px; font-size: 21px;"></i> @endif
                    <h5 class="text--body-3">{{ __('embed_youtube_videos_and_add_links_to_your_adverts') }}</h5>
                </div>

                <div class="plan-card__package-list">
                    @if($plan->browse_without_banner_ads == true) <i class="fas fa-check-circle" style="color:#06D7A0; margin-right: 5px; font-size: 21px;"></i> @else <i class="fas fa-times-circle" style="color:red; margin-right: 5px; font-size: 21px;"></i> @endif
                    <h5 class="text--body-3">{{ __('browse_without_banner_ads') }}</h5>
                </div>


                <!-- <div class="plan-card__package-list {{ $plan->featured_limit ? 'active':'' }}">
                    <span class="icon">
                        <x-svg.check-icon/>
                    </span>
                    <h5 class="text--body-3">{{ $plan->featured_limit }} {{ __('featured_ads') }}</h5>
                </div>

                <div class="plan-card__package-list {{ $plan->customer_support ? 'active':'' }} ">
                    <span class="icon">
                        <x-svg.check-icon/>
                    </span>
                    <h5 class="text--body-3">{{ __('basic_customer_support') }}</h5>
                </div> -->

                <!-- <div class="plan-card__package-list {{ $plan->badge? 'active':'' }} ">
                    <span class="icon">
                        <x-svg.check-icon/>
                    </span>
                    <h5 class="text--body-3">{{ __('special_membership_badge') }}</h5>
                </div> -->

                @foreach($plan->new_featured ?? [] as $subitem)
                    @if(empty($subitem))
                        @continue
                    @endif
                    <div class="plan-card__package-list {{ $subitem ? 'active':'' }} ">
                    <span class="icon">
                        <x-svg.check-icon/>
                    </span>
                        <h5 class="text--body-3">{{ $subitem }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
