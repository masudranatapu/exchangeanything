@php
    $user_message = App\Models\Messenger::where('from_id',$user->id)->where('to_id',Auth::user()->id)->orderBy('id','desc')->first();
    
    if(empty($user_message)){
        $user_message = App\Models\Messenger::where('from_id',Auth::user()->id)->where('to_id',$user->id)->orderBy('id','desc')->first();
    }
@endphp
<form action="{{ route('frontend.message.store',$user->username) }}" method="POST" id="messageForm">
    @csrf
    <div class="input-message--text">
        <input type="hidden" value="{{$user_message->ad_id}}" name="ad_id">
        <textarea placeholder="{{ __('type_your_message') }}..." name="body" style="padding-bottom: 10px;" id="messageBody"></textarea>
        <button class="icon" type="submit" id="sendMessage">
            <x-svg.send-icon />
        </button>
    </div>
    @error('body')
        <span class="invalid-feedback" style="display: block;padding-left:20px;padding-bottom:10px;">{{ $message  }}</span>
    @enderror
</form>

<script>
    const messageSendbutton = document.getElementById('sendMessage');
    const messageBody = document.getElementById('messageBody');
    messageSendbutton.addEventListener('click', function(e){
        e.preventDefault();
        if(messageBody.value == ''){
            alert('Message body required')
            return;
        }else{
            document.getElementById('messageForm').submit();
        }
    })
</script>
