@php
$user = auth()->user();
@endphp

@if (userCan('setting.update'))
{{--<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="fas fa-plus"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <span class="dropdown-item dropdown-header">{{ __('quick_actions') }}</span>
            <div class="dropdown-divider"></div>
            <div class="row row-paddingless" style="padding-left: 15px; padding-right: 15px;">
                <div class="col-6 p-0 border-bottom border-right">
                    <a href="{{ route('module.ad.create') }}" class="d-block text-center py-3 bg-hover-light"> <i
                            class="fas fa-ad"></i>
                        <span class="w-100 d-block text-muted">{{ __('add_ad') }}</span>
                    </a>
                </div>
                <div class="col-6 p-0 border-bottom border-right">
                    <a href="{{ route('user.create') }}" class="d-block text-center py-3 bg-hover-light"> <i
                            class="fas fa-users"></i>
                        <span class="w-100 d-block text-muted">{{ __('add_user') }}</span>
                    </a>
                </div>
            </div>
            <div class="row row-paddingless" style="padding-left: 15px; padding-right: 15px;">
                <div class="col-6 p-0 border-bottom border-right">
                    <a href="{{ route('module.category.create') }}" class="d-block text-center py-3 bg-hover-light">
                        <i class="fas fa-tags"></i>
                        <span class="w-100 d-block text-muted">{{ __('add_category') }}</span>
                    </a>
                </div>
                @if ($appearance_enable)
                    <div class="col-6 p-0 border-bottom border-right">
                        <a href="{{ route('module.themes.index') }}" class="d-block text-center py-3 bg-hover-light">
                            <i class="fas fa-adjust"></i>
                            <span class="w-100 d-block text-muted">{{ __('change_skin') }}</span>
                        </a>
                    </div>
                @endif
                <div class="col-12 p-0 border-bottom border-right">
                    <a href="{{ route('setting', 'website') }}" class="d-block text-center py-3 bg-hover-light"> <i
                            class="fas fa-cog"></i>
                        <span class="w-100 d-block text-muted">{{ __('settings') }}</span>
                    </a>
                </div>
            </div>
            <div class="dropdown-divider"></div>
        </div>
    </li>--}}
    <!-- @if ($language_enable)
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                {{-- @if (!session('lang') || session('lang') == 'default')
                    <i class="flag-icon flag-icon-gb"></i>
                @else
                    @foreach ($languages as $lang)
                        @if (session('lang') == $lang->code)
                            <i class="flag-icon {{ $lang->icon }}"></i>
                        @endif
                    @endforeach
                @endif --}}
                <span class="text-uppercase">@if(currentLanguage()) urrentLanguage()->code @endif</span>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="left: inherit; right: 0px;">
                @foreach ($languages as $lang)
                    <a class="dropdown-item @if(currentLanguage() && currentLanguage()->code == $lang->code) active @endif"
                        href="{{ route('changeLanguage', $lang->code) }}">
                        {{ $lang->name }}
                    </a>
                @endforeach
            </div>
        </li>
    @endif -->
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>

    @if ($appearance_enable)
        <li class="nav-item">
            <form action="{{ route('setting', 'dark_mode') }}" method="post" id="mode_form">
                @csrf
                @method("PUT")
                @if ($settings->dark_mode)
                    <input type="hidden" name="dark_mode" value="0">
                @else
                    <input type="hidden" name="dark_mode" value="1">
                @endif
            </form>
            <a onclick="$('#mode_form').submit()" class="nav-link" href="#" role="button">
                @if ($settings->dark_mode)
                    <x-svg.sun-icon />
                @else
                    <x-svg.moon-icon />
                @endif
            </a>
        </li>
    @endif
@endif

<li class="nav-item dropdown user-menu">
    <a href="{{ route('profile') }}" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <img src="{{ $user->image_url }}" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline">{{ $user->name }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right rounded border-0" style="left: inherit; right: 0px;">
        <!-- User image -->
        <li class="user-header bg-primary rounded-top">
            <img src="{{ $user->image_url }}" class="user-image img-circle elevation-2" alt="User Image">
            <p>
                {{ $user->name }} -
                @foreach ($user->getRoleNames() as $role)
                    (<span>{{ ucwords($role) }}</span>)
                @endforeach
                <small>{{ __('member_since') }} {{ $user->created_at->format('M d, Y') }}</small>
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer border-bottom d-flex">
            <a href="{{ route('profile') }}" class="btn btn-default">{{ __('profile') }}</a>
            <a href="javascript:void(0)"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                class="btn btn-default ml-auto">{{ __('sign_out') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none invisible">
                @csrf
            </form>
        </li>
    </ul>
</li>
