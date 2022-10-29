<div>
    <!-- Comment Box  -->
    <div class="single-blog__comment-box">
        <h2 class="text--body-1-600 title">{{ __('leave_comments') }}</h2>
        <form action="{{ route('frontend.comments.create') }}" method="POST">
            @csrf
            <input type="hidden" value="{{$post_id}}" name="post_id">
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
        <h2 class="text--body-1 title">{{ __('comments') }}</h2>
        @if ($comments->count() > 0)
            <div class="user-comments">
                @if ($total != 0)
                    <div class="comments-area-content">
                        @foreach ($comments as $comment)
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
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            <div class="text-center">{{ __('no_more_comments_found') }}</div>
        @endif
    </div>
</div>