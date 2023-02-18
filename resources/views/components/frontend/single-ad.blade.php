<div class="{{ $className }}">
    @php
        $area = DB::table('areas')->where('id', $ad->area_id)->first();
    @endphp
    <div class="card_product">
            @if($ad->featured)
            <div class="featured_tag">
                <span>Featured</span>
            </div>
            @endif
        <div class="card_img">
            <a href="{{ route('frontend.addetails', $ad->slug) }}" class="cards__img-wrapper">
                @if ($ad->thumbnail)
                    <img src="{{ asset($ad->thumbnail) }}" alt="{{$ad->title}}" class="img-fluid" />
                @else
                    <img src="{{ asset('backend/image/default-ad.png') }}" alt="card-img" class="img-fluid" />
                @endif
            </a>
        </div>
        <div class="card_content">
            <h6>
                <span class="icon">
                    <i class="{{ $ad->category->icon ?? '' }}" style="font-size: 15px"></i>
                </span>
                {{ $ad->category->name ?? '' }}
            </h6>
            <h3>
                <a href="{{ route('frontend.addetails', $ad->slug) }}" class="text--body-3-600 cards__caption-title">
                    {{ \Illuminate\Support\Str::limit($ad->title, 23, $end = '...') }}
                </a>
            </h3>
            <div class="cards__info-bottom">
                <h5 class="cards__location text--body-4">
                    <span class="icon">
                        <x-svg.location-icon width="20" height="20" stroke="#0088cc" />
                    </span>
                    @if($ad->town)
                        {{$ad->town->name ?? ''}}
                    @endif
                </h5>
                <span class="cards__price-title">
                    For Exchange
                    @if ($ad->price_method == 2)
                        <sub>Per Hour</sub>
                    @elseif ($ad->price_method == 3)
                        <sub>Per Day</sub>
                    @elseif ($ad->price_method == 4)
                        <sub>Per Week</sub>
                    @elseif ($ad->price_method == 5)
                        <sub>Per Month</sub>
                    @elseif ($ad->price_method == 6)
                        <sub>Per Year</sub>
                    @endif
                </span>
            </div>
        </div>
    </div>
</div>
