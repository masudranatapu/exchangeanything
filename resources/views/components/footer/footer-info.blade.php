<div class="col-xl-3 col-lg-6">
    <div class="footer__brand-logo">
        @if ($logotype === 'dark')
        <img style="
            
            width: 222px;" src="{{ $settings->logo2_image_url }}" alt="logo-brand" />
        @else
        <img style="
            
            width: 222px;" src="{{ $settings->logo_image_url }}" alt="logo-brand" />
        @endif
    </div>
@php 
$cms = App\Models\Cms::first();




@endphp
    <!-- <div class="footer__loc-info">
        <p class="text--body-3 phone">
            {{ __('phone') }}: {{ $settings->phone }}
        </p>
        <p class="text--body-3 email text-lowercase">
            {{ __('mail') }}: {{ $settings->email }}
        </p>
    </div> -->

    {{-- <div class="footer__loc-info">
                        <p class="text--body-3 email text-lowercase">
                        {!! Illuminate\Support\Str::limit($cms->about_body, 100) !!} <a target="_blank" href="{{route('frontend.about')}}" style="color:#06D7A0">Read More ></a>
                        </p>
                    </div> --}}
</div>
