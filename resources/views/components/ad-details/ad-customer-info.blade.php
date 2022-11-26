<div class="product-item__sidebar-item user-details">
    <div class="user p-2 rounded-1">
        <div class="d-flex">
            <a href="{{ route('frontend.seller.profile', $customer->username) }}">
                <div  style="position: relative">
                    @if ($customer->image)
                        <img src="{{ asset($customer->image) }}" class="img">
                        @if ($customer->certified_seller == 1 && $customer->certificite_validity < now())
                            @php
                                $certified = DB::table('get_certified_plans')->latest()->first();
                            @endphp
                            <img src="@if($certified->badge_image) {{asset($certified->badge_image)}} @else {{ asset('images/certified.jpg') }} @endif" style="width: 25px;height: 25px;border-radius: 50%;position: absolute;bottom: 0px; top: 35px; right: 10px;">
                        @endif
                    @else
                        <img src="{{ asset('images/default.png') }}" class="img"/>
                        @if ($customer->certified_seller == 1 && $customer->certificite_validity < now())
                            @php
                                $certified = DB::table('get_certified_plans')->latest()->first();
                            @endphp
                            <img src="@if($certified->badge_image) {{asset($certified->badge_image)}} @else {{ asset('images/certified.jpg') }} @endif" style="width: 25px;height: 25px;border-radius: 50%;position: absolute;bottom: 0px; top: 35px; right: 10px;">
                        @endif
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
            <h6 class="text--body-3" style="text-transform: none">@if($town) {{ucwords(strtolower($town->name ?? ''))}}, @endif{{ ucwords(strtolower($city->name ?? '')) }}</h6>
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