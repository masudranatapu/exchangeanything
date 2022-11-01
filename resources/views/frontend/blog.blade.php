@extends('layouts.frontend.layout_one')

@section('title', __('blog_posts'))

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
    
    <!-- Blog-list section start  -->
    <section class="blog-list section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog__sidebar">
                        <span class="toggle-icon">
                            <x-svg.toggle-icon />
                        </span>
                        <div class="blog__sidebar-wrapper">
                            <form action="{{ route('frontend.blog') }}" method="GET" id="searchForm">
                                <!--  Search-->
                                <div class="blog__sidebar-search blog__sidebar-item">
                                    <h2 class="text--body-2-600 item-title">{{ __('search') }}</h2>
                                    <div class="input-field">
                                        <input type="text" placeholder="{{ __('search') }}" name="keyword" value="{{ request('keyword') }}" />
                                        <span class="icon">
                                            <x-svg.search-icon />
                                        </span>
                                    </div>
                                </div>
                                <!-- Category -->
                                <div class="blog__sidebar-category blog__sidebar-item">
                                    <h2 class="text--body-2-600 item-title">{{ __('top_category') }}</h2>
                                    <div class="category">
                                        @foreach ($topCategories as $category)
                                            <div class="category-item">
                                                {{--<img style="width: 162px;" src="{{ $category->image_url }}" alt="category-img" />--}}
                                                <ul>
                                                    <li>
                                                        <a href="{{route('frontend.blog',['category'=>$category->slug]) }}">{{ $category->name }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <input id="categoryWiseSorting" name="category" type="hidden" value="{{ request('category','') }}">
                            </form>

                            <!-- Recent Post -->
                            <div class="blog__sidebar-post blog__sidebar-item">
                                <h2 class="text--body-2-600 item-title">{{ __('recent_post') }}</h2>
                                <div class="post">
                                    @foreach ($recentBlogs as $post)
                                    <div class="post-item">
                                        <a href="{{ route('frontend.single.blog', $post->slug) }}" class="post-img">
                                            <img src="{{ $post->image_url }}" alt="post-img" />
                                        </a>
                                        <div class="post-info">
                                            <a href="{{ route('frontend.single.blog', $post->slug) }}" class="text--body-3">{{ $post->title }}</a>
                                            <div class="post-review">
                                                <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
                                               <!--  <span class="dot"></span> -->
                                                {{-- <span class="comments">{{ $post->comments_count }} {{ __('comments') }}</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @if($blogs->count()>0)
                        <div class="blog-list__wrapper">
                            @foreach ($blogs as $post)
                            <div class="blog-list__wrapper-item">
                                <div class="blog-card">
                                    <div class="blog-card__left">
                                        <div class="blog-card__img-wrapper">
                                            <a href="{{ route('frontend.single.blog', $post->slug) }}" alt="blog-img"    class="blog-card__img-wrapper">
                                                <img src="{{ $post->image_url }}"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog-card__right">
                                        <ul class="blog-card__blog-info">
                                            <li class="blog-card__blog-info-item">
                                                <span class="icon">
                                                    <x-svg.user-icon />
                                                </span>
                                                <h5 class="text--body-4 blog-card__username">{{ $post->author->name }}</h5>
                                            </li>
                                            <li class="blog-card__blog-info-item">
                                                {{--<span class="icon">
                                                    <x-svg.message-icon />
                                                </span>
                                                 <h5 class="text--body-4 blog-card__coment-num">{{ $post->comments_count }} {{ __('comments') }}</h5> --}}
                                            </li>
                                        </ul>
                                        <a href="{{ route('frontend.single.blog', $post->slug) }}" class="blog-card__blog-caption text--body-2">
                                            {{ Str::limit($post->title,48, '...') }}
                                        </a>
                                        <p class="blog-card__description text--body-4">
                                            {{ Str::limit($post->short_description,180, '...') }}
                                        </p>

                                        <a href="{{ route('frontend.single.blog', $post->slug) }}" class="blog-card__readmore">
                                            {{ __('read_more') }}
                                            <span class="icon">
                                                <x-svg.right-arrow-icon />
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                    <div class="blog-list__wrapper">
                        <x-not-found2 message="No posts found"/>
                    </div>
                    @endif
                    <div class="page-navigation">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog-list section end  -->
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
