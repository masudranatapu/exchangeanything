<section class="section related-post pt-0">
    <div class="container px-0">
        <div class="related-post__header">
            <h2 class="text--heading-1">{{ __('related_ads') }}</h2>
            @if ($lists->count() > 4)
            <div class="slider-btn">
                <button class="slider-btn--prev">
                    <x-svg.left-arrow-icon stroke="#bb9645" />
                </button>
                <button class="slider-btn--next">
                    <x-svg.right-arrow-icon stroke="#bb9645" />
                </button>
            </div>
            @endif
        </div>
        <div class="related-post__slider" id="relatedPostSlider">
            @foreach ($lists as $ad)
            <x-frontend.single-ad :ad="$ad" className="related-post__slider-item"/>
            @endforeach
        </div>
    </div>
</section>
