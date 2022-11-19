@extends('layouts.frontend.layout_one')

@section('title', 'Seller Page')

@section('content')
    <!-- breedcrumb section start  -->
    <x-frontend.breedcrumb-component background="{{ asset('frontend/default_images/breadcrumbs.png') }}">
        {{ $user->name }}
        <x-slot name="items">
            <li class="breedcrumb__page-item">
                <a href="{{ route('frontend.dashboard') }}"
                    class="breedcrumb__page-link text--body-3">{{ __('seller') }}</a>
            </li>
            <li class="breedcrumb__page-item">
                <a class="breedcrumb__page-link text--body-3">/</a>
            </li>
            <li class="breedcrumb__page-item">
                <a class="breedcrumb__page-link text--body-3">{{ $user->username }}</a>
            </li>
        </x-slot>
    </x-frontend.breedcrumb-component>
    <!-- breedcrumb section end  -->
    <!-- dashboard section start  -->
    <section class="section dashboard dashboard--user">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ $user->image_url }}" style="width: 100px; height: 100px; border-radius: 50%;" alt="{{ $user->name }}">
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="font-size: 16px;">Name : {{ $user->name }}</li>
                                @if ($user->phone)
                                    <li class="list-group-item">
                                        <span class="icon" style="font-size: 16px;">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.9454 3.75C16.2168 4.09194 17.3761 4.76196 18.3071 5.69294C19.238 6.62392 19.908 7.78319 20.25 9.05462"
                                                    stroke="#dc3545" stroke-width="1.6" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M14.1687 6.6485C14.9316 6.85366 15.6271 7.25567 16.1857 7.81426C16.7443 8.37285 17.1463 9.06841 17.3515 9.83127"
                                                    stroke="#dc3545" stroke-width="1.6" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M8.66965 11.7014C9.44762 13.2919 10.7369 14.5753 12.3309 15.346C12.4475 15.4013 12.5765 15.4252 12.7052 15.4155C12.8339 15.4058 12.9579 15.3627 13.0648 15.2905L15.4119 13.7254C15.5157 13.6562 15.6352 13.6139 15.7594 13.6025C15.8837 13.5911 16.0088 13.6109 16.1235 13.66L20.5144 15.5419C20.6636 15.6052 20.7881 15.7154 20.8693 15.8556C20.9504 15.9959 20.9838 16.1588 20.9643 16.3197C20.8255 17.4057 20.2956 18.4039 19.4739 19.1273C18.6521 19.8508 17.5948 20.2499 16.5 20.25C13.1185 20.25 9.87548 18.9067 7.48439 16.5156C5.0933 14.1245 3.75 10.8815 3.75 7.49997C3.75006 6.40513 4.14918 5.34786 4.87264 4.5261C5.5961 3.70435 6.59428 3.17448 7.68028 3.03569C7.84117 3.01622 8.00403 3.04956 8.14432 3.1307C8.28461 3.21183 8.39473 3.33636 8.4581 3.48552L10.3416 7.88032C10.3903 7.994 10.4101 8.11796 10.3994 8.24116C10.3886 8.36436 10.3475 8.48299 10.2798 8.58647L8.72011 10.9696C8.64912 11.0768 8.60716 11.2006 8.59831 11.3288C8.58947 11.4571 8.61405 11.5855 8.66965 11.7014V11.7014Z"
                                                    stroke="#dc3545" stroke-width="1.6" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <span style="font-size: 16px;">
                                            {{ $user->phone }}
                                        </span>
                                    </li>
                                @endif
                                @if ($user->email)
                                    <li class="list-group-item">
                                        <span class="icon" style="font-size: 16px;">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 5.25L12 13.5L3 5.25" stroke="#dc3545" stroke-width="1.6"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M3 5.25H21V18C21 18.1989 20.921 18.3897 20.7803 18.5303C20.6397 18.671 20.4489 18.75 20.25 18.75H3.75C3.55109 18.75 3.36032 18.671 3.21967 18.5303C3.07902 18.3897 3 18.1989 3 18V5.25Z"
                                                    stroke="#dc3545" stroke-width="1.6" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M10.3637 12L3.23132 18.5381" stroke="#dc3545" stroke-width="1.6"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M20.7688 18.5381L13.6364 12" stroke="#dc3545" stroke-width="1.6"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <span style="font-size: 16px;">
                                            {{ $user->email }}
                                        </span>
                                    </li>
                                @endif
                                <li class="list-group-item">
                                    <p class="rating" style="font-size: 16px;">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.31015 13.4109L12.8564 15.6576C13.3097 15.9448 13.8725 15.5177 13.738 14.9886L12.7134 10.9581C12.6845 10.8458 12.688 10.7277 12.7233 10.6173C12.7586 10.5069 12.8243 10.4087 12.9129 10.334L16.093 7.68719C16.5108 7.33941 16.2951 6.64595 15.7583 6.61111L11.6054 6.34158C11.4935 6.33359 11.3862 6.29399 11.296 6.22738C11.2058 6.16078 11.1363 6.06991 11.0957 5.96537L9.54688 2.06492C9.50478 1.95396 9.42992 1.85843 9.33224 1.79102C9.23456 1.7236 9.11868 1.6875 9 1.6875C8.88132 1.6875 8.76544 1.7236 8.66777 1.79102C8.57009 1.85843 8.49523 1.95396 8.45312 2.06492L6.90426 5.96537C6.86367 6.06991 6.79423 6.16078 6.70401 6.22738C6.61378 6.29399 6.5065 6.33359 6.39464 6.34158L2.24171 6.61111C1.70486 6.64595 1.4892 7.33941 1.90704 7.68719L5.08709 10.334C5.17571 10.4087 5.24145 10.5069 5.27674 10.6173C5.31204 10.7277 5.31546 10.8458 5.2866 10.9581L4.33641 14.6959C4.175 15.3309 4.85036 15.8434 5.39432 15.4988L8.68985 13.4109C8.78254 13.3519 8.89013 13.3205 9 13.3205C9.10987 13.3205 9.21747 13.3519 9.31015 13.4109V13.4109Z" fill="#FFBF00" />
                                        </svg>
                                        <span style="font-size: 16px;">{{ $rating_details['average'] }} {{ __('Star Rating') }}</span>
                                    </p>
                                </li>
                                @if (auth('customer')->check() && $user->id != auth('customer')->id())
                                    <li class="list-group-item" >
                                        <button class="seller-dashboard__nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <span class="icon" style="font-size: 16px;">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 9.75V13.5" stroke="#767E94" stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M10.7018 3.74857L2.45399 17.9978C2.32201 18.2258 2.25242 18.4846 2.2522 18.748C2.25198 19.0115 2.32115 19.2703 2.45275 19.4986C2.58434 19.7268 2.77373 19.9163 3.00184 20.0481C3.22996 20.1799 3.48876 20.2493 3.7522 20.2493H20.2477C20.5112 20.2493 20.77 20.1799 20.9981 20.0481C21.2262 19.9163 21.4156 19.7268 21.5472 19.4986C21.6788 19.2703 21.748 19.0115 21.7478 18.748C21.7475 18.4846 21.6779 18.2258 21.546 17.9978L13.2982 3.74857C13.1664 3.52093 12.9771 3.33193 12.7493 3.20055C12.5214 3.06916 12.263 3 12 3C11.7369 3 11.4785 3.06916 11.2507 3.20055C11.0228 3.33193 10.8335 3.52093 10.7018 3.74857V3.74857Z"
                                                        stroke="#767E94" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12 18C12.6213 18 13.125 17.4963 13.125 16.875C13.125 16.2537 12.6213 15.75 12 15.75C11.3787 15.75 10.875 16.2537 10.875 16.875C10.875 17.4963 11.3787 18 12 18Z" fill="#767E94" />
                                                </svg>
                                            </span>
                                            <span style="font-size: 16px;">
                                                {{ __('Report this seller') }}
                                            </span>
                                        </button>
                                    </li>
                                @endif
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Report Seller') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('frontend.seller.report') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="form-label" for="reasonn">{{ __('reason') }}</label>
                                                        <textarea required name="reason" id="reasonn" rows="8" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-secondary"
                                                        data-bs-dismiss="modal">{{ __('close') }}</button>
                                                    <button type="submit" class="btn">{{ __('submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="color: #767eb0; font-size: 16px;">Ads</button>
                                </li>
                                @if ($user->id != auth('customer')->id())
                                    @if (auth('customer')->check())
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="color: #767eb0; font-size: 16px;">Write Review</button>
                                        </li>
                                    @else
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="color: #767eb0; font-size: 16px;">Write Review</button>
                                        </li>
                                    @endif
                                @endif
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false" style="color: #767eb0; font-size: 16px;">Seller Review</button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="ad-list__content row">
                                        @forelse ($ads as $ad)
                                        <x-frontend.single-ad :ad="$ad" :adfields="$ad->productCustomFields"
                                            className="col-md-4">
                                        </x-frontend.single-ad>
                                        @empty
                                        <x-not-found2 message="No ads found" />
                                        @endforelse
                                    </div>
                                    <div class="page-navigation mb-4">
                                        {{ $ads->links() }}
                                    </div>
                                </div>
                                @if ($user->id != auth('customer')->id())
                                    @if (!auth('customer')->check())
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            @include('frontend.seller.review')
                                        </div>
                                    @else
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            @include('frontend.seller.review2')
                                        </div>
                                    @endif
                                @endif
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    @include('frontend.seller.review-list')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- dashboard section end  -->
@endsection

@section('adlisting_style')

@livewireStyles
    <style>
        @media(max-width: 1199px) {
            .dashboard__navigation {
                top: 68% !important;
            }
        }

        @media (max-width: 360px) {
            .dashboard__navigation {
                border-radius: 12px !important;
            }
        }

        .dashboard-post2 {
            box-shadow: 0px 12px 48px rgba(0, 34, 51, 0.06) !important;
        }

        .dashboard-post__content {
            padding: 24px !important;
        }

        .dashboard__navigation-toggle-btn {
            top: 100px !important;
        }

        .dashboard-card--recent__activity-item {
            align-items: center !important;
        }

        .title h2 {
            font-weight: 700;
            font-size: 16px;
            line-height: 1.5;
            text-transform: capitalize;
            color: #dc3545;
            position: relative;
        }

        .title h2::after {
            content: '';
            display: block;
            position: absolute;
            top: 36px;
            width: 120px;
            height: 2px;
            z-index: 1000;
            background-color: #dc3545;
        }

        .main-bar {
            padding: 24px;
            background: #FFFFFF;
            border: 1px solid #EBEEF7;
            box-shadow: 0px 12px 48px rgba(0, 34, 51, 0.06);
            border-radius: 12px;
        }

        .border {
            background: #EBEEF7;
            height: 1px;
            margin: 12px 0px 20px;
        }

        .dashboard-post2 {
            border-radius: 12px;
            border: 1px solid #ebeef7;
            background-color: #fff;
        }

        .dashboard-post__nav2 {
            margin-right: 0;
            /* margin-bottom: 2px !important; */
            border-bottom: 1px solid #ebeef7;
        }

        @media (max-width: 767px) {
            .dashboard-post__nav2 {
                padding: 0 16px;
            }
        }

        .dashboard-post__item2 {
            margin-left: 32px;
        }

        @media (max-width: 767px) {
            .dashboard-post__item2 {
                margin-bottom: 16px;
                margin-right: 0;
                width: 100%;
            }
        }

        .dashboard-post__link2 {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 24px !important;
            border-radius: 0 !important;
            margin: 0 !important;
            border-bottom: 2px solid transparent !important;
            color: #636A80;
        }

        @media (max-width: 767px) {
            .dashboard-post__link2 {
                width: inherit;
            }
        }

        .dashboard-post__link2:nth-last-child(1) {
            margin-right: 0;
        }

        .dashboard-post__link2.active {
            background-color: transparent !important;
            border-bottom: 2px solid #dc3545 !important;
            color: #dc3545;
        }

        .tab-title {
            font-family: Nunito Sans;
            font-weight: 700;
            font-size: 16px;
            line-height: 24px;
            line-height: 110%;
            text-align: Left Vertical;
        }

        .fade:not(.show) {
            opacity: 0;
            display: none !important;
        }

    </style>
@endsection

@section('frontend_script')
@livewireScripts

@endsection
