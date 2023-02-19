@php
    $area = DB::table('areas')
        ->where('id', $ad->area_id)
        ->first();
@endphp
<div class="product-item__ads-info">
    <h2 class="text--heading-2 title">{{ $ad->title }}</h2>
    <ul class="post-details">
        <li class="post-details__item">
            <span class="icon">
                <x-svg.location-icon />
            </span>
            <p class="text--body-3">
                @if ($area)
                    {{ $area->city_name }} ,
                @endif
                @if ($ad->town)
                    {{ $ad->town->name ?? '' }}
                @endif
            </p>
        </li>
        <li class="post-details__item">
            <span class="icon">
                <x-svg.clock-icon width="24" height="24" stroke="#767E94" />
            </span>
            <p class="text--body-3">{{ \Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}</p>
        </li>
        <li class="post-details__item">
            <span class="icon">
                <x-svg.eye-icon stroke="#767E94" />
            </span>
            <p class="text--body-3">{{ $ad->total_views }} {{ __('viewed') }}</p>
        </li>
        {{-- @if ($ad->featured == 1)
            <li class="post-details__item badge badge--warning">
                <span class="icon ">
                    <x-svg.check-icon width="16" height="16" stroke="#d32323" />
                </span>
                <p class="text--body-3">
                {{ __('featured') }}</p>
            </li>
        @endif --}}
    </ul>
</div>
