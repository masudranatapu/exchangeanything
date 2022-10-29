<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ __('log_in') }} - {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box admin_login_card">
        <div class="card">
            <div class="login-logo pt-3">
                <a href="{{ route('admin.login') }}"><img height="130" style="width: 141px" src="{{ $settings->logo_image_url }}" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ __('sign_in_to_start_your_session') }}</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email') <span class="invalid-feedback"
                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password') <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong></span> @enderror
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <x-forms.label name="remember_me" for="remember" />
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="registration-form__forget-pass text--body-4">
                                <a href="{{ route('admin.forgot.password') }}">{{ __('forgot_password') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 admin_login_btn">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('sign_in') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
