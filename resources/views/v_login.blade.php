<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/dist/assets/css/pages/auth.css') }}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('mazer/dist/assets/images/logo/logo.png') }}"
                                alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class=" form-group position-relative has-icon-left mb-4">
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus class="form-control form-control-xl @error('email')
                                is-invalid @enderror" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password"
                                class="form-control form-control-xl @error('password') is-invalid @enderror"
                                placeholder="Password" id="password" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                        <a href="/register" class="btn btn-info btn-block btn-lg shadow-lg mt-3">Register</a>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>