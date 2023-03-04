@if ($lists->count() > 0)
    <section class="section related-post pt-0" style="padding-top:0px !important">
        <div class="container">
            <div class="related-post__header">
                <h2 class="text--heading-1">{{ __('related_ads') }}</h2>
                @if ($lists->count() > 4)
                    <div class="slider-btn">
                        <button class="slider-btn--prev">
                            <x-svg.left-arrow-icon stroke="#0088cc" />
                        </button>
                        <button class="slider-btn--next">
                            <x-svg.right-arrow-icon stroke="#0088cc" />
                        </button>
                    </div>
                @endif
            </div>
            <div class="related-post__slider" id="relatedPostSlider">
                @foreach ($lists as $ad)
                    <x-frontend.single-ad :ad="$ad" className="related-post__slider-item" />
                @endforeach
            </div>
        </div>
    </section>
@endif
