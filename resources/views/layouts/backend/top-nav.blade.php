<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>

    @include('layouts.backend.partials.styles')
    <link rel="stylesheet" href="{{asset('massage/toastr/toastr.css')}}">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav {{ $settings->dark_mode ? 'dark-mode' : '' }}">
    @php
        $user = Auth::user();
    @endphp
    <div class="wrapper">
        <!-- Navbar -->
        <nav id="nav"
            class="main-header navbar navbar-expand-md {{ $settings->dark_mode ? 'navbar-dark navbar-dark' : 'navbar-white navbar-light' }}"
            style="background-color:{{ $settings->dark_mode ? '' : $settings->nav_color }}">
            <div class="container">
                <a href="{{ route('home') }}" class="brand_logo">
                    <img src="{{ $settings->logo_image_url }}" alt="Logo" class="">
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a id="nav_collapse" class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item">
                            <a title="{{ __('visit_website') }}" class="nav-link"
                                href="{{ route('frontend.index') }}" target="_blank"
                                class="btn btn-primary mt-4 mx-3 text-white">
                                <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                    <polyline points="15 3 21 3 21 9"></polyline>
                                    <line x1="10" y1="14" x2="21" y2="3"></line>
                                </svg>
                            </a>
                        </li>
                       {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('app.optimize-clear') }}"
                                class="btn btn-primary mt-4 mx-3 text-white">{{ __('clear_cache') }}</a>
                        </li>--}}
                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    @include('layouts.backend.partials.top-right-nav')
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.backend.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    @yield('breadcrumbs')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    @include('layouts.backend.partials.top-bar')
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('layouts.backend.partials.footer')

    </div>
    <!-- ./wrapper -->

    @include('layouts.backend.partials.scripts')
    <script src="{{asset('massage/toastr/toastr.js')}}"></script>
    {!! Toastr::message() !!}
    <script>
        @if($errors->any())
            @foreach($errors->all() as $error)
                toastr.error('{{ $error }}','Error',{
                    closeButton:true,
                    progressBar:true,
                });
            @endforeach
        @endif
    </script>
</body>

</html>
