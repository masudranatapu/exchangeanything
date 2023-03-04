<div>
    <div class="product-item__gallery">
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
            {{-- <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="lightgallery">
                    <a href="{{ asset($thumbnail) }}" data-lg-size="1600-2400">
                        <img  src="{{ asset($thumbnail) }}" />
                    </a>
                </div>
            </div>

            @foreach ($galleries as $gallery)
                <div class="swiper-slide">
                    <div class="lightgallery">
                        <a href="{{ asset($gallery->image_url) }}" data-lg-size="1600-2400">
                            <img  src="{{ asset($gallery->image_url) }}" />
                        </a>
                    </div>
                </div>
            @endforeach

        </div> --}}


            <div class="swiper-wrapper" id="lightgallery">
                <!-- <div class="swiper-slide"> -->
                <a href="{{ asset($thumbnail) }}" class="swiper-slide">
                    <img src="{{ asset($thumbnail) }}" alt="product-img" />
                </a>
                <!-- </div> -->
                @foreach ($galleries as $gallery)
                    <!-- <div class="swiper-slide"> -->
                    <a href="{{ asset($gallery->image_url) }}" class="swiper-slide">
                        <img src="{{ asset($gallery->image_url) }}" alt="product-img" />
                    </a>
                    <!-- </div> -->
                @endforeach
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- <div class="view">
            <a class="icon" href="{{ route('frontend.ad.gallery.details', $slug) }}">
                <x-svg.full-screen-icon />
            </a>
        </div> -->
        </div>
        <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ $thumbnail }}" alt="product-img" />
                </div>
                @foreach ($galleries as $gallery)
                    <div class="swiper-slide">
                        <img src="{{ asset($gallery->image_url) }}" alt="product-img" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
