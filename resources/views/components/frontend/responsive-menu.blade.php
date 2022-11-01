<div class="menu--sm mobile-menu">
    <!-- Head -->
    <div class="mobile-menu__header">
        <!-- brand -->
        <div class="mobile-menu__brand">
            <a href="{{ route('frontend.index') }}">
                <img src="{{ $settings->logo_image_url }}"  alt="brand-logo">
            </a>
            <div class="close">
                <span>
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 5.08325L15.6066 15.6899" stroke="#191F33" stroke-width="1.9375" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.99999 15.9167L15.6066 5.31015" stroke="#191F33" stroke-width="1.9375" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
        </div>
        <div class="mobile-menu__search">
            <form action="{{ route('frontend.adlist.search') }}" method="GET">
                <div class="input-field">
                    <input type="text" placeholder="{{ __('ads_title_keyword') }}..." name="keyword">
                    <button class="icon icon-search">
                    <x-svg.search-icon />
                    </button>
                </div>
            </form>
        </div>
        <div class="mobile-menu__body">
            <ul>
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.index') }}" class="menu--sm__link">{{ __('home') }}</a>
                </li>
                {{--
                <li class="menu--sm__item">
                    <!-- <a href="#" class="menu--sm__link">
                        {{ __('all_category') }}
                        <span class="icon">
                            <x-svg.category-arrow-icon />
                        </span>
                    </a>
                    <ul class="menu--sm-dropdown">
                        @foreach ($footer_categories as $category)
                        <li class="menu--sm-dropdown__item">
                            <a href="javascript:void(0)" onclick="adFilterFunctionTwo('{{ $category->slug }}')" class="menu--sm-dropdown__link">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul> -->
                    
                    <div class="accordion sidebar_category" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> {{ __('all_category') }}</button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        @foreach ($footer_categories as $category)
                                        <li class="menu--sm-dropdown__item">
                                            <a href="javascript:void(0)" onclick="adFilterFunctionTwo('{{$category->slug}}')" class="menu--sm-dropdown__link">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                --}}
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.adlist') }}" class="menu--sm__link">{{ __('ads') }}</a>
                </li>
                {{--  
                @if ($blog_enable)
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.blog') }}" class="menu--sm__link">{{ __('blog') }}</a>
                </li>
                @endif
                --}}
                @if ($priceplan_enable)
                <li class="menu--sm__item">
                    <a href="{{ route('frontend.priceplan') }}" class="menu--sm__link">{{ __('Membership') }}</a>
                </li>
                @endif
            </ul>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="search__content-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="padding:0;">
                            <div class="input-field input-field--transparent">
                                <span class="by_location" style="width: calc(100% - 0px);margin-left: 8px;border: 1px solid #e8e5e5;padding: 8px 0px 9px 31px;border-radius: 3px;">By Location</span>
                                <span class="icon icon--left">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 12.75C13.6569 12.75 15 11.4069 15 9.75C15 8.09315 13.6569 6.75 12 6.75C10.3431 6.75 9 8.09315 9 9.75C9 11.4069 10.3431 12.75 12 12.75Z" stroke="#06D7A0" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M19.5 9.75C19.5 16.5 12 21.75 12 21.75C12 21.75 4.5 16.5 4.5 9.75C4.5 7.76088 5.29018 5.85322 6.6967 4.4467C8.10322 3.04018 10.0109 2.25 12 2.25C13.9891 2.25 15.8968 3.04018 17.3033 4.4467C18.7098 5.85322 19.5 7.76088 19.5 9.75V9.75Z" stroke="#06D7A0" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                            </div>
                        </div>
                    </div>
                <div class="col-6">
                    <div class="search__content-item" data-bs-toggle="modal" data-bs-target="#staticBackdropCat" style="padding:0;">
                        <div class="input-field input-field--transparent">
                            <input type="hidden" name="country" value="" id="selected_country">
                            <input type="hidden" name="town" value="" id="selected_town">
                            <span class="by_location" style="width: calc(100% - 0px);border: 1px solid #e8e5e5;padding: 8px 0px 9px 33px;border-radius: 3px;">By Category</span>
                            <span class="icon icon--left" style="left:9px !important;">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="#06D7A0" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <div class="mobile-menu__footer ">
    @if (auth('customer')->check())
    <div class="mobile-menu__footer ">
        <div class="mobile-menu-user-wrap">
        <div class="mobile-menu-user-left">
        <div class="mobile-menu-user">
            <img src="{{ auth('customer')->user()->image_url }}" alt="">
        </div>
        <div class="mobile-menu-user-data">
            <h5>{{ auth('customer')->user()->name }}</h5>
            <p>{{ auth('customer')->user()->username }}</p>
        </div>
        </div>
        <div class="mobile-menu-user-right">
        <a class="sign-out" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <img src="{{ asset('frontend') }}/images/svg/SignOut.svg" alt="">
        </a>
        <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </div>
        </div>
        </div>
        @else
        <div class="d-flex align-items-center">
        <a href="{{ route('customer.login') }}" class="btn mr-3 login_required">
        <span class="icon--left">
        <x-svg.image-select-icon />
        </span>
        {{ __('post_ads') }}
        </a>
        <a href="{{ route('customer.login') }}" class="btn btn--bg ">{{ __('sign_in') }}</a>
        </div>
    @endif
</div>
</div>
</div>

</div>