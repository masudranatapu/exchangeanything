{{--<div class="user-info">
    <div class="img">
        <img src="{{ $user->image_url }}" alt="user-img">
    </div>
    <div class="info">
        <h2 class="text--body-3-600">{{ $user->username}}</h2>
        <p class="status text--body-4">
            @if (Cache::has('isOnline' . $user->id))
                <span class="icon"></span> {{ __('online') }}
            @else
                <span class="offline"></span> {{ __('offline') }}
            @endif
        </p>
    </div>
</div>
--}}

<div class="row g-3">
    <div class="col-lg-5">
        <div class="user_info d-flex">
            <div class="img">
                <img src="{{ $user->image_url }}" alt="user-img" class="rounded-circle border" style="width:40px;">
            </div>
            <div class="user_name">
                <h3>{{ $user->username}}</h3>
                <p>
                    @if (Cache::has('isOnline' . $user->id))
                        <span class="icon">{{ __('online') }}</span> 
                    @else
                        <span class="offline">{{ __('offline') }}</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
    @php
        $user_message = App\Models\Messenger::where('from_id',$user->id)->where('to_id',Auth::user()->id)->orderBy('id','desc')->first();
        
        if(empty($user_message)){
            $user_message = App\Models\Messenger::where('from_id',Auth::user()->id)->where('to_id',$user->id)->orderBy('id','desc')->first();
        }
        $ad = Modules\Ad\Entities\Ad::find($user_message->ad_id);
    @endphp
    @if($ad)
    <div class="col-lg-7">
       <div class="select_pro_info float-lg-end">
           <div class="d-flex position-relative">
              <img src="{{ asset($ad->thumbnail) }}" class="rounded me-2" style="width:60px; height: 60px;" alt="image">
              <div class="pro_details">
                    <h2><a href="#">{{$ad->title}}</a></h2>
                    <span>{{ changeCurrency($ad->price) }}</span>
              </div>
          </div>
       </div>
    </div>
    @endif
</div>



