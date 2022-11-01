@extends('layouts.frontend.layout_one')

@section('title', __('about'))

@section('frontend_style')
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/select2-bootstrap-5-theme.css" />
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/slick.css" />
    @if (auth('customer')->check() && isset(session('user_plan')->ad_limit) && session('user_plan')->ad_limit < $settings->free_ad_limit)
        <style>
            .header--one {
                top: 50px !important;
            }
            .header--fixed {
                top: 0 !important;
            }
        </style>
    @endif
@endsection

@section('content')
    <!-- Banner section start  -->
    <div class="banner banner--three" style="background:url('{{ asset('ads/adsbackground.jpg') }}') center center/cover no-repeat;">
        <div class="container">
            {{--<span class="banner__tag text--body-2-600">{{ __('over') }} {{ $totalAds }} {{ __('live_ads') }}</span>
            <div class="banner__title text--display-2 animate__animated animate__bounceInDown">
                {{ $cms->index3_title }}
            </div>--}}
            <!-- Search Box -->
            <x-frontend.adlist-search class="adlist-search" :categories="$categories" :towns="$towns" :dark="true" :total-ads="$total_ads" :marginTop="124" />
        </div>
    </div>
    <!-- Banner section end   -->

    <!-- about-us section start  -->
    <section class="section about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 order-xl-0 order-2">
                    <h2 class="about-us__title text--heading-1 text-center" >{{ $cms->about_heading ?? 'No About Heading found.' }}</h2>
                    <p class="text--body-3 about-us__brief">
                        {!! $cms->about_body ?? 'No About Us found.' !!}
                    </p>
                </div>

                <!-- <div class="col-xl-6 order-xl-0 order-1">
                    <div class="about-us__img-wrapper">
                        <img src="{{ $cms->about_background_path }}" alt="about" class="img-fluid" />
                        <a href="https://youtu.be/vPhg6sc1Mk4" class="icon yplayer" data-autoplay="true" data-vbtype="video">
                            <x-svg.play-icon />
                        </a>
                    </div>
                </div> -->

            </div>
        </div>
    </section>
    <!-- about-us section end  -->

    <!--  work section start  -->
    <x-others.how-it-work/>
    <!--  work section end  -->

    @if ($testimonial_enable)
        <!-- testimonial section start  -->
       {{-- <section class="testimonial section">
            <div class="container">
                <h2 class="text--heading-1 section__title"
                data-aos="fade-up"
                data-aos-offset="0"
                data-aos-delay="30"
                data-aos-duration="700"
                data-aos-easing="ease-in-out"
                data-aos-mirror="true"
                data-aos-once="false"
                data-aos-anchor-placement="top-center">{{ __('what_people_says') }}</h2>

                <div class="testimonial-slider row">
                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial-slider__item">
                            <div class="testimonial-card">
                                <ul class="testimonial-card__user-rating">
                                    @for($i = 0; $i < $testimonial->stars; $i++)
                                        <li class="testimonial-card__user-rating__icon">
                                            <x-svg.star-icon />
                                        </li>
                                    @endfor
                                </ul>
                                <p class="testimonial-card__user-brief text--body-2">
                                    {{ $testimonial->description }}
                                </p>
                                <div class="testimonial-card__user-info">
                                    <div class="user-img">
                                        <img src="{{ $testimonial->image_url }}" alt="user-img" />
                                    </div>
                                    <div>
                                        <h2 class="text--body-3 user-name"> {{ $testimonial->name }}</h2>
                                        <span class="designation text--body-4"> {{ $testimonial->position }} </span>
                                    </div>
                                </div>
                                <div class="testimonial-card__quotes-icon">
                                    <x-svg.quote-icon/>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> --}}
        <!-- testimonial section end  -->
    @endif
    <!-- suppor-brand section start  -->
    {{--<section class="section support-brand pt-0">
        <div class="container">
            <h2 class="section__title text--body-2-600">{{ __('supported_by') }}</h2>

            <div class="support-brand__slider">
                <div class="support-brand__slider-item">
                    <img src="{{ asset('frontend/images/brand/img-01.png') }}" alt="brand-icon" class="img-fluid" />
                </div>
                <div class="support-brand__slider-item">
                    <img src="{{ asset('frontend') }}/images/brand/img-02.png" alt="brand-icon" class="img-fluid" />
                </div>
                <div class="support-brand__slider-item">
                    <img src="{{ asset('frontend') }}/images/brand/img-03.png" alt="brand-icon" class="img-fluid" />
                </div>
                <div class="support-brand__slider-item">
                    <img src="{{ asset('frontend') }}/images/brand/img-04.png" alt="brand-icon" class="img-fluid" />
                </div>
                <div class="support-brand__slider-item">
                    <img src="{{ asset('frontend') }}/images/brand/img-05.png" alt="brand-icon" class="img-fluid" />
                </div>
                <div class="support-brand__slider-item">
                    <img src="{{ asset('frontend') }}/images/brand/img-06.png" alt="brand-icon" class="img-fluid" />
                </div>
                <div class="support-brand__slider-item">
                    <img src="{{ asset('frontend') }}/images/brand/img-01.png" alt="brand-icon" class="img-fluid" />
                </div>
                <div class="support-brand__slider-item">
                    <img src="{{ asset('frontend') }}/images/brand/img-02.png" alt="brand-icon" class="img-fluid" />
                </div>
                <div class="support-brand__slider-item">
                    <img src="{{ asset('frontend') }}/images/brand/img-03.png" alt="brand-icon" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>--}}
    <!-- suppor-brand section end  -->
@endsection

@section('adlisting_style')
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/slick.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/js/plugins/css/venobox.min.css" />
@endsection

@section('frontend_script')
    <script src="{{ asset('frontend') }}/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/venobox.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins/select2.min.js"></script>
    <script>
        function adFilterFunction(slug) {
            $('#adFilterInput').val(slug);
            $('#adFilterForm').submit();
        }
        $(document).ready(function() {
            // ===== Select2 ===== \\
            $('#country').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ?
                    $(this).data('width') : $(this).hasClass('w-100') ?
                    '100%' : 'style',
                placeholder: 'By Country',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
            
            // ===== Select2 ===== \\
            $('#town').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ?
                    $(this).data('width') : $(this).hasClass('w-100') ?
                    '100%' : 'style',
                placeholder: 'By Region',
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
        });
    </script>
@endsection