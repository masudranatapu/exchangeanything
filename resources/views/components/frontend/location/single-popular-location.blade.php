{{--
<div class="location-card">
    <a href="{{ route('frontend.adlist.search',['city'=>$city->name]) }}" class="location-card__img-wrapper">
        <img class="rounded" src="{{ $city->image }}" alt="location">
    </a>
    <div class="location-card__info">
        <h2 class="location-card__loc-title text--body-2-600">{{ $city->name }}
        <div class="location-card__view">
            <span class="first view-number"> {{ $city->ad_count }} </span>
            <a href="{{ route('frontend.adlist.search',['city'=>$city->name]) }}" class="second view-btn">
                {{ __('view_ads') }}
                <span class="icon">
                    <x-svg.right-arrow-icon stroke="#0088cc"/>
                </span>
            </a>
        </div>
    </h2></div>
</div>
--}}

<div class="location_card text-center">
    {{-- <div class="country_flag mb-4">
         <a href="{{ route('frontend.adlist.search',['city'=>$city->name]) }}">
            <img class="rounded" src="{{ $city->image }}" alt="location">
        </a>
     </div> --}}
    @php
        $totalads = Modules\Ad\Entities\Ad::where('town_id', $city->id)->get();
    @endphp
    <div class="country_name">
        <h3>{{ $city->name }} <span> ({{ $totalads->count() }}) </span></h3>
        <a href="{{ route('frontend.adlist.search', ['town' => $city->name]) }}">
            {{ __('view_ads') }}
        </a>
    </div>
</div>
