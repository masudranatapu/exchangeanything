<div class="product-item__sidebar-item product-price">
    @php
        $add = Modules\Ad\Entities\Ad::find($id);
    @endphp
    <h2 class="text--heading-2">
        {{ changeCurrency($price) }}
        @if ($add->negotiable == 1)
            <step style="font-size: 14px;
        font-weight: 300;">Negotiable</step>
        @endif
        <span style="font-size: 15px;">
            @if ($add->price_method == 2)
                <sub>Per Hour</sub>
            @elseif ($add->price_method == 3)
                <sub>Per Day</sub>
            @elseif ($add->price_method == 4)
                <sub>Per Week</sub>
            @elseif ($add->price_method == 5)
                <sub>Per Month</sub>
            @elseif ($add->price_method == 6)
                <sub>Per Year</sub>
            @endif
        </span>
    </h2>

    <form action="{{ route('frontend.add.wishlist') }}" method="POST">
        @csrf

        @if (auth('customer')->check())
            <input type="hidden" name="ad_id" value="{{ $id }}">
            <input type="hidden" name="customer_id" value="{{ auth('customer')->user()->id }}">
            <button class="btn--fav" type="submit">
                @if (isWishlisted($id))
                    <x-svg.heart-icon fill="#0088cc" stroke="#0088cc" stroke-width="0.5" />
                @else
                    <x-svg.heart-icon />
                @endif
            </button>
        @else
            <a href="{{ route('customer.login') }}" class="btn--fav login_required" type="button">
                <x-svg.heart-icon />
            </a>
        @endif
    </form>
</div>
