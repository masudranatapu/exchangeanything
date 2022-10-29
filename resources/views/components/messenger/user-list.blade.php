<a href="{{ route('frontend.message', $user->username) }}" class="user user--profile {{request()->route('username') == $user->username ? 'active' : '' }}">
    <div class="user-info">
        <div class="img">
            <img src="{{ asset($user->image) }}" alt="user-photo">
        </div>
        @php
            $msg_status =  App\Models\Messenger::where(['from_id'=>$user->id,'to_id'=>Auth::user()->id,'status'=>0])->first();
        @endphp
        <div class="name">
            <h2 class="text--body-4-600">{{ $user->username }} @if($msg_status) * @endif</h2>
        </div>
    </div>
</a>
