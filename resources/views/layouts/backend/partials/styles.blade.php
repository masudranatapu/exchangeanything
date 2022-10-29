    <!-- FavIcons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($settings->favicon_image) }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('css/google-font.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/zakirsoft.css') }}">

    <style>
        a.page-link.page-navigation__link {
            line-height: 1.7;
        }
    </style>

    <!-- Custom Link -->
    @yield('style')

    {!! $settings->header_css !!}
    {!! $settings->header_script !!}

    @stack('component_backend_links')

    @if ($settings->dark_mode)
    <style>
        .select2-container--bootstrap4 .select2-selection {
            color: #dee2e6;
            background: #343a40;
        }

        .plan-card__package {
            color: #343a40;
        }

        .btn.btn-icon {
            color: #fff;
        }

        .ck {
            color: #000;
        }
    </style>
    @endif
