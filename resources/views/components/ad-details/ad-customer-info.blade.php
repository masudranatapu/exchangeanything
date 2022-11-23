<div class="product-item__sidebar-item user-details">
    <div class="user p-2 rounded-1">
        <div class="d-flex">
            <a href="{{ route('frontend.seller.profile', $customer->username) }}">
                <div class="img">
                    @if ($customer->image)
                    <img src="{{ asset($customer->image) }}" alt="">
                    @else
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/1024px-User-avatar.svg.png"
                    alt="user-photo" />
                    @endif
                </div>
            </a>
            <div class="content">
                <h2 class="text--body-3-600 m-0">
                    <span class="text--body-4">{{ __('added_by') }}:</span>
                    <a href="{{ route('frontend.seller.profile', $customer->username) }}">
                        {{ $customer->username }}
                    </a>
                </h2>
                 <a href="{{ route('frontend.seller.profile', $customer->username) }}" class="text-info">Visit Shop</a>
            </div>
        </div>
    </div>
    <ul class="contact">
        <!-- <li class="contact-item">
            <span class="icon">
                <x-svg.envelope-icon />
            </span>
            <h6 class="text--body-3">{{ $customer->email }}</h6>
        </li> -->
        <li class="contact-item">
            <span class="icon">
                <x-svg.address-icon />
            </span>
            <h6 class="text--body-3" style="text-transform: none">@if($town) {{ucwords(strtolower($town->name))}}, @endif{{ ucwords(strtolower($city->name)) }}</h6>
        </li>
        @if($customer->created_at)
        <li class="contact-item">
            <span> Member Since : </span>
            <h6 class="text--body-3">{{ $customer->created_at->format('d F, Y') }}</h6>
        </li>
        @endif
        @if (!is_null($link))
        <li class="contact-item">
            <span class="icon">
                <x-svg.globe-icon />
            </span>
            <a target="_blank" href="{{ $link }}" class="text--body-3">
                {{ $link }}
                <span class="icon">
                    <x-svg.target-blank-icon />
                </span>
            </a>
        </li>
        @endif
    </ul>
</div>