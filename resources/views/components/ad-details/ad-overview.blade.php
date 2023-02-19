<div>
    <h2 class="text--body-1">{{ __('overview') }}</h2>
    <ul class="overview-details">
        @if ($ad->condition)
            <li class="overview-details__item">
                <span class="text--body-3 title">{{ __('condition') }}:</span>
                <span class="text--body-3 info">{{ $ad->condition }}</span>
            </li>
        @endif
        {{-- @if ($ad->brand)
            <li class="overview-details__item">
                <span class="text--body-3 title">{{ __('brand') }}:</span>
                <span class="text--body-3 info">{{ $ad->brand->name ?? '' }}</span>
            </li>
        @endif --}}
        {{-- @if ($ad->brand_name)
            <li class="overview-details__item">
                <span class="text--body-3 title">{{ __('Brand Name') }}:</span>
                <span class="text--body-3 info">{{ $ad->brand_name ?? '' }}</span>
            </li>
        @endif --}}
        {{-- @if ($ad->model)
            <li class="overview-details__item">
                <span class="text--body-3 title">{{ __('model') }}:</span>
                <span class="text--body-3 info">{{ $ad->model }}</span>
            </li>
        @endif --}}
        {{-- @if ($ad->authenticity)
            <li class="overview-details__item">
                <span class="text--body-3 title">{{ __('authenticity') }}:</span>
                <span class="text--body-3 info">{{ $ad->authenticity ? 'Orginal' : 'Refurbished' }}</span>
            </li>
        @endif --}}
    </ul>
</div>
