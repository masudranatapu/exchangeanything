<div class="user-message__content ">
    <div class="img">
        @if ($message->from_id == auth('customer')->id())
            <img src="{{ auth('customer')->user()->image_url }}" alt="user-photo">
        @else
            <img src="{{ $user->image_url }}" alt="user-photo">
        @endif
    </div>
    <div class="user-message__content-info">
        <h5 class="user-name text--body-4-600">
            @if ($message->from_id == auth('customer')->id())
                {{ auth('customer')->user()->username }}
            @else
                {{ $user->username }}
            @endif
            <span class="dot"></span>
            <span class="date">{{ date('h:i a', strtotime($message->created_at)) }}</span>
        </h5>
        <div class="user-message">
            <p>
                {!! $message->body !!}
            </p>
        </div>
    </div>
</div>


