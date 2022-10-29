@if (isset($language_enable))
    <li class="nav-item dropdown show">
        <a class="nav-link text-{{ homePageThemes() == 1 ? 'dark' : 'light' }}" data-toggle="dropdown"
            href="javascript:void(0)" aria-expanded="true" id="language_switch_button">
            <i class="flag-icon @if(currentLanguage()) {{ currentLanguage()->icon }} @endif"></i>
            <span class="text-uppercase"> @if(currentLanguage()) {{ currentLanguage()->name }} @endif</span>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right show" style="display:none;left: inherit; right: 0px;"
            id="switch_dropdown">
            @foreach ($languages as $lang)
                <a class="dropdown-item @if(currentLanguage() && currentLanguage()->code == $lang->code) active @endif "
                    href="{{ route('changeLanguage', $lang->code) }}">
                    <i class="flag-icon {{ $lang->icon }}"></i>
                    {{ $lang->name }}
                </a>
            @endforeach
        </div>
    </li>
@endif
