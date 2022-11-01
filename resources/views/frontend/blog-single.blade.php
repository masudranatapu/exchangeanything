@extends('layouts.frontend.layout_one')

@section('title')
    {{ $blog->title }}
@endsection

@section('meta')
    <meta name="title" content="{{ $blog->title }}">
    <meta name="description" content="{{ $blog->short_description }}">
    <meta name="keywords" content="{{ $settings->seo_meta_keywords }}">

    <meta property="og:image" content="{{ $blog->image }}"/>
    <meta property="og:site_name" content="{{ $settings->name }}">
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:url" content="{{ route('frontend.single.blog', $blog->slug) }}">
    <meta property="og:type" content="article">
    <meta property="og:description" content="{{ $blog->short_description }}">

    <meta name=twitter:card content=summary_large_image />
    <meta name=twitter:site content="{{ $settings->name }}" />
    <meta name=twitter:creator content="{{ $blog->author->name }}" />
    <meta name=twitter:url content="{{ route('frontend.single.blog', $blog->slug) }}" />
    <meta name=twitter:title content="{{ $blog->title }}" />
    <meta name=twitter:description content="{{ $blog->short_description }}" />
    <meta name=twitter:image content="{{ $blog->image }}" />
@endsection

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
            <x-frontend.adlist-search class="adlist-search" :categories="$categories" :towns="$towns" :dark="true" :total-ads="$total_ads" :marginTop="124" />
        </div>
    </div>
    <!-- Banner section end   -->
    <section class="section single-blog">
        <div class="container">
            <div class="row single-blog__content">
                <div class="col-lg-8">
                    <div class="single-blog__blog-content">
                        <div class="single-blog__lg-img-wrapper">
                            <img src="{{ $blog->image_url  }}" alt="blog-img" class="img-fluid">
                        </div>
                        <ul class="single-blog__info">
                            <li class="single-blog__info-item">
                                <span class="icon">
                                    <i class="{{ $blog->category->icon }}" style="color: #06D7A0"></i>
                                </span>
                                <p class="text--body-3">{{ $blog->category->name }}</p>
                            </li>
                            <li class="single-blog__info-item">
                                <span class="icon">
                                    <x-svg.user-icon width="24" height="24" />
                                </span>
                                <p class="text--body-3">{{ $blog->author->name }}</p>
                            </li>
                            {{--
                            <li class="single-blog__info-item">
                                <span class="icon">
                                    <x-svg.message-icon />
                                </span>
                                 <p class="text--body-3" id="comment_count"> {{ $blog->comments_count }} {{ __('comments') }}</p> 
                            </li>
                            --}}
                        </ul>
                        <h2 class="text--heading-2 single-blog__title">
                            {{ $blog->title }}
                        </h2>
                        <div class="single-blog__author-info">
                            <div class="author-img">
                                <div class="img">
                                    <img src="{{ asset($blog->author->image) }}" alt="author-img">
                                </div>
                                <h2 class="name text--body-3-600">{{ $blog->author->name }}</h2>
                            </div>
                            <ul class="author-social">
                                <li class="author-social__item">
                                    <a href="{{ socialMediaShareLinks(url()->current(),'whatsapp') }}" class="social-link social-link--wa  author-social__link">
                                        <x-svg.whatsapp-icon />
                                    </a>
                                </li>
                                <li class="author-social__item">
                                    <a href="{{ socialMediaShareLinks(url()->current(),'facebook') }}" class="social-link social-link--fb  author-social__link">
                                        <x-svg.facebook-icon fill="#fff"/>
                                    </a>
                                </li>
                                <li class="author-social__item">
                                    <a href="{{ socialMediaShareLinks(url()->current(),'twitter') }}" class="social-link social-link--tw  author-social__link">
                                        <x-svg.twitter-icon fill="#fff" />
                                    </a>
                                </li>
                                <li class="author-social__item">
                                    <a href="{{ socialMediaShareLinks(url()->current(),'linkedin') }}" class="social-link social-link--in  author-social__link">
                                        <x-svg.linkedin-icon />
                                    </a>
                                </li>
                                <li class="author-social__item">
                                    <a href="{{ socialMediaShareLinks(url()->current(),'gmail') }}" class="social-link social-link--p  author-social__link">
                                        <x-svg.envelope-icon stroke="#fff" />
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <p class="single-blog__content-text text--body-3">
                            {!! $blog->description !!}
                        </p>

                    </div>
            {{--  
                    <div>
                        <!-- Comment Box  -->
                        <div class="single-blog__comment-box">
                            <h2 class="text--body-1-600 title">{{ __('leave_comments') }}</h2>
                            <form action="{{ route('frontend.comments.create') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$blog->id}}" name="post_id">
                                <div class="input-field__group">
                                    <div class="input-field">
                                        <x-forms.label name="full_name" for="name" />
                                        <input type="text" id="name" name="name" autocomplete="off" class="@error('name') is-invalid border-danger @enderror" placeholder="{{ __('full_name') }}" />
                                        @error('name') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="input-field">
                                        <x-forms.label name="email" for="email" />
                                        <input type="email" name="email" autocomplete="off" class=" @error('email') is-invalid border-danger @enderror" placeholder="{{ __('email_address') }}" id="email" />
                                        @error('email') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="input-field--textarea">
                                    <x-forms.label name="comments" for="comments" />
                                    <textarea name="body" autocomplete="off" class=" @error('body') is-invalid border-danger @enderror" placeholder="{{ __('whats_your_thought') }}..." id="comments"></textarea>
                                    @error('body') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                <button  type="submit" class="btn">{{ __('comment') }}</button>
                            </form>
                        </div>

                        <!-- User comments -->
                        <div class="single-blog__user-comments">
                            @if ($comments->count() > 0)
                                <h2 class="text--body-1 title">{{ __('comments') }}</h2>
                                <div class="user-comments">
                                    <div class="comments-area-content">
                                        @foreach ($comments as $comment)
                                            <div class="user-comments">
                                                <div class="comments-area-content">
                                                    <div class="user-comments__item">
                                                        <div class="user-img">
                                                            <img src="{{ asset('backend/image/default.png') }}" alt="user-img">
                                                        </div>
                                                        <div class="user-info">
                                                            <h2 class="user-name text--body-4-600">{{ $comment->name }} <span class="date">{{ $comment->created_at->diffForHumans() }}</span></h2>
                                                            <p class="user-comments__text text--body-3">
                                                                {{ $comment->body }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $reviewcomments = App\Models\BlogComment::where('comment_id', $comment->id)->where('status', 1)->get();
                                                    @endphp
                                                    @if($reviewcomments->count() > 0)
                                                        @foreach($reviewcomments as $reviewcomment)
                                                            <div class="user-comments__item" style="margin-left: 50px;">
                                                                <div class="user-img">
                                                                    <img src="{{ asset('backend/image/default.png') }}" alt="user-img">
                                                                </div>
                                                                <div class="user-info">
                                                                    <h2 class="user-name text--body-4-600">{{ $reviewcomment->name }} <span class="date">{{ $reviewcomment->created_at->diffForHumans() }}</span></h2>
                                                                    <p class="user-comments__text text--body-3">
                                                                        {{ $reviewcomment->body }}
                                                                    </p>
                                                                    <h2 class="user-name text--body-4-600">Admin Reply</h2>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="text-center">{{ __('no_more_comments_found') }}</div>
                            @endif
                        </div>
                    </div>
            --}}
                </div>
                <div class="col-lg-4">
                    <div class="blog__sidebar ">

                        <span class="toggle-icon">
                            <x-svg.toggle-icon />
                        </span>
                        <form action="{{ route('frontend.blog') }}" method="GET" id="searchForm">
                            <input id="categoryWiseSorting" name="category" type="hidden" value="">
                        </form>
                        <div class="blog__sidebar-wrapper">
                            <!-- Category -->
                            <div class="blog__sidebar-category blog__sidebar-item">
                                <h2 class="text--body-2-600 item-title">{{ __('top_category') }}</h2>
                                <div class="category">
                                    @forelse ($categories as $category)
                                        <div class="category-item">
                                            {{--<a href="{{ route('frontend.blog',['category'=>$category->slug]) }}">
                                                <img style="width: 168px;" src="{{ $category->image_url }}" alt="category-img">
                                                <h2 class="text--body-3">{{ $category->name }}</h2>
                                            </a> --}}
                                            <ul>
                                                <li>
                                                    <a href="{{route('frontend.blog',['category'=>$category->slug]) }}">{{ $category->name }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @empty
                                        <x-no-data-found/>
                                    @endforelse
                                </div>
                            </div>
                            <!-- Recent Post -->
                            <div class="blog__sidebar-post blog__sidebar-item">
                                <h2 class="text--body-2-600 item-title">{{ __('recent_post') }}</h2>
                                <div class="post">
                                    @foreach ($recentPost as $post)
                                    <div class="post-item">
                                        <a href="{{ route('frontend.single.blog', $post->slug) }}" class="post-img">
                                            <img src="{{ asset($post->image) }}" alt="post-img">
                                        </a>
                                        <div class="post-info">
                                            <a href="{{ route('frontend.single.blog', $post->slug) }}" class="text--body-3"> {{ $post->title }} </a>
                                            <div class="post-review">
                                                <span class="date"> {{ $post->created_at->format('M d, Y') }} </span>
                                                <!-- <span class="dot"></span> -->
                                                {{-- <span class="comments"> {{ $post->comments_count }}  {{ __('comments') }} </span> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('adlisting_style')

@livewireStyles
    <link rel="stylesheet" href="{{ asset('frontend/css') }}/venobox.min.css" />
@endsection

@section('frontend_script')
    @livewireScripts
    <script src="{{ asset('frontend') }}/js/plugins/venobox.min.js"></script>
    <script>
        function countComments(postId) {
            setTimeout(function () {
                $.ajax({
                    type:'GET',
                    url:'/blog/comments/count/'+postId,
                    success:function(data) {
                        $("#comment_count").html(data+' Comments');
                    }
                });
            }, 2000);
        }
        function sorting(categorySlug) {
            $('#categoryWiseSorting').val(categorySlug)
            $('#searchForm').submit()
        }
    </script>
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