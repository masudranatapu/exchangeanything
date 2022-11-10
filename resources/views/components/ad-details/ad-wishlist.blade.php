<div class="product-item__sidebar-item product-price">
    @php
        $add = Modules\Ad\Entities\Ad::find($id);
    @endphp
    <h2 class="text--heading-2">{{ changeCurrency($price) }} @if ($add->negotiable == 1)
            <step style="font-size: 14px;
        font-weight: 300;">Negotiable</step>
        @endif
    </h2>

    @csrf

    @if (auth('customer')->check())
        <form action="{{ route('frontend.add.wishlist') }}" method="POST">
            <input type="hidden" name="ad_id" value="{{ $id }}">
            <input type="hidden" name="customer_id" value="{{ auth('customer')->user()->id }}">
            <button class="btn--fav" type="submit">
                @if (isWishlisted($id))
                    <x-svg.heart-icon fill="#0088cc" stroke="#0088cc" stroke-width="0.5" />
                @else
                    <x-svg.heart-icon />
                @endif
            </button>
        </form>
    @else
        <a href="{{ route('customer.login') }}" class="btn--fav login_required">
            <x-svg.heart-icon />
        </a>
    @endif
</div>
