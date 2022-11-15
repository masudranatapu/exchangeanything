<div class="seller-dashboard__navigation">
    <div class="dashboard__navigation-top">
        <div class="dashboard__user-proifle">
            <div class="dashboard__user-img">
                <img src="{{ $user->image_url }}" alt="user-photo" />
            </div>
            <div class="dashboard__user-info">
                <h2 class="name text-center">{{ $user->name }}</h2>
            </div>
        </div>
        <hr>
    </div>
    <div class="seller-dashboard__navigation-bottom">
        <ul class="dashboard__nav">
            @if ($user->phone)
                <li class="dashboard__nav-item">
                    <a href="#" class="seller-dashboard__nav-link">
                    </a>
                </li>
            @endif
            @if ($user->email)
                <li class="dashboard__nav-item">
                    <a href="mailto:{{ $user->email }}" class="seller-dashboard__nav-link">
                        <span class="icon">
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
                        {{ $user->email }}
                    </a>
                </li>
            @endif
            @if ($user->website)
                <li class="dashboard__nav-item">
                    <a href="#" class="seller-dashboard__nav-link">
                        <span class="icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                    stroke="#dc3545" stroke-width="1.6" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M4.64868 17.1932L5.74348 16.5323C5.85345 16.4659 5.94453 16.3724 6.00799 16.2607C6.07144 16.149 6.10514 16.0229 6.10586 15.8944L6.12488 12.5073C6.12567 12.3658 6.16649 12.2274 6.24261 12.1081L8.10285 9.19271C8.15783 9.10654 8.22985 9.03251 8.31448 8.97519C8.39911 8.91786 8.49456 8.87844 8.59498 8.85934C8.6954 8.84024 8.79866 8.84187 8.89843 8.86413C8.99819 8.88639 9.09236 8.92881 9.17513 8.98878L11.0179 10.3238C11.1739 10.4369 11.3676 10.4856 11.5585 10.4597L14.5098 10.06C14.6909 10.0355 14.8567 9.94576 14.9763 9.80762L17.0535 7.40755C17.1796 7.26184 17.2448 7.07319 17.2355 6.88072L17.126 4.60227"
                                    stroke="#dc3545" stroke-width="1.6" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M17.5376 19.0953L16.5315 18.0872C16.4374 17.9929 16.3198 17.9254 16.191 17.8915L14.1793 17.3636C14.0007 17.3168 13.8457 17.2057 13.7439 17.0517C13.6421 16.8977 13.6007 16.7116 13.6276 16.5289L13.8512 15.0105C13.8701 14.8824 13.9218 14.7613 14.0014 14.6591C14.081 14.5568 14.1857 14.477 14.3053 14.4272L17.1601 13.2407C17.2919 13.1859 17.4367 13.1698 17.5774 13.1945C17.718 13.2191 17.8487 13.2834 17.9541 13.3798L20.288 15.5143"
                                    stroke="#dc3545" stroke-width="1.6" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </span>
                        <span class="website">{{ $user->website }}</span> <svg class="go-to-icon" width="18"
                            height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.1875 7.03125L15.1869 2.81306L10.9688 2.8125" stroke="#464D61"
                                stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.123 7.87701L15.1855 2.81451" stroke="#464D61" stroke-width="1.3"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12.9375 10.125V14.625C12.9375 14.7742 12.8782 14.9173 12.7727 15.0227C12.6673 15.1282 12.5242 15.1875 12.375 15.1875H3.375C3.22582 15.1875 3.08274 15.1282 2.97725 15.0227C2.87176 14.9173 2.8125 14.7742 2.8125 14.625V5.625C2.8125 5.47582 2.87176 5.33274 2.97725 5.22725C3.08274 5.12176 3.22582 5.0625 3.375 5.0625H7.875"
                                stroke="#464D61" stroke-width="1.3" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a>
                </li>
            @endif

        </ul>
    </div>
    @if ($user->bio)
        <div class="seller-info">
            <h4>{{ __('bio') }}</h2>
                <p>{{ $user->bio }}</p>
                <hr>
        </div>
    @endif
    @if (auth('customer')->check() && $user->id != auth('customer')->id())
        <hr>
        <div class="dashboard__navigation-report">
            <div class="report">
                <button class="seller-dashboard__nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span class="icon">
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
                    {{ __('Report Seller') }}
                </button>
            </div>
        </div>
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


</div>

<style>
    .seller-dashboard__navigation {
        background: #FFFFFF;
        border: 1px solid #EBEEF7;
        box-shadow: 0px 12px 48px rgba(0, 34, 51, 0.06);
        border-radius: 12px;
        padding: 0px 0px;
    }

    .seller-dashboard__navigation .dashboard__user-info .name {
        font-weight: 600;
        font-size: 22px;
        line-height: 1.4;
        color: #191F33;
        margin-bottom: 10px;
    }

    .seller-dashboard__navigation .dashboard__user-info .rating {
        justify-content: center;
    }

    .seller-dashboard__navigation .dashboard__user-info .rating span {
        font-weight: 600;
        font-size: 14px;
        line-height: 1.43;
        color: #191F33;
        margin-top: 1px;
        margin-left: 2px;
    }

    .seller-dashboard__navigation .dashboard__navigation-top {
        padding: 0px 32px;
        padding-bottom: 0px;
        border-bottom: none;
    }

    hr {
        background-color: #DADDE6;
        height: 1px;
        margin: 24px 0px;
    }

    .dashboard__user-proifle {
        flex-direction: column;
        gap: 24px;
    }

    .rating {
        display: flex;
        align-items: center;
        font-weight: 600;
        font-size: 14px;
        line-height: 1.43;
        color: #191F33;
    }

    .dashboard__user-proifle .dashboard__user-img {
        width: 188px;
        height: 188px;
    }

    .dashboard__navigation_social-mdeia {
        padding: 0px 32px;
        text-align: center;
    }

    .dashboard__navigation_social-mdeia p {
        margin-bottom: 10px;
        font-size: 14px;
        line-height: 1.43;
        color: #767E94;
    }

    .seller-dashboard__navigation-bottom {
        padding: 0px 32px;
    }

    .seller-dashboard__navigation-bottom p {
        font-weight: 600;
        font-size: 12px;
        line-height: 1.33;
        color: #939AAD;
        margin-bottom: 8px;
    }

    .seller-dashboard__navigation .seller-dashboard__nav-link {
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #464D61;
        margin-bottom: 16px;
        display: flex;
    }

    .seller-dashboard__navigation .seller-dashboard__nav-link span {
        display: block;
    }

    .seller-dashboard__navigation .seller-dashboard__nav-link span.icon {
        margin-right: 12px;
        margin-left: -4px;
    }

    .seller-dashboard__navigation .seller-dashboard__nav-link .website {
        margin-right: 6px;
    }

    .seller-dashboard__navigation .seller-dashboard__nav-link .go-to-icon {
        margin-top: 2px;
    }

    .seller-info {
        padding: 0px 32px;
    }

    .seller-info h4 {
        font-weight: 600;
        font-size: 12px;
        line-height: 1.33;
        color: #939AAD;
        margin-bottom: 8px;
    }

    .seller-info p {
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: #464D61;
    }

    .dashboard__navigation-report hr {
        margin: 24px 32px;
    }

    .dashboard__navigation_social-mdeia ul {
        margin: 0px auto;
        column-count: 4;
    }

    .dashboard__navigation_social-mdeia li {
        display: inline-block;
        margin: 8px 4px;
    }
</style>
