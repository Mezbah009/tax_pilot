<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Musa & Associates :: Admin Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/adminlte.min.css') }}">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .login-box {
            width: 400px;
            margin: 5% auto;
        }

        .card {
            background-color: #1c1c1c;
            border: 1px solid #333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid #333;
        }

        .card-header a {
            color: #B69D74;
            font-weight: bold;
        }

        .login-box-msg {
            color: #aaa;
        }

        .form-control {
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: #fff;
        }

        .form-control:focus {
            background-color: #2a2a2a;
            color: #fff;
            border-color: #B69D74;
            box-shadow: none;
        }

        .input-group-text {
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: #B69D74;
        }

        .btn-primary {
            background-color: #B69D74;
            border-color: #B69D74;
        }

        .btn-primary:hover {
            background-color: #B69D74;
            border-color: #B69D74;
        }

        .invalid-feedback {
            color: #ff6b6b;
            font-size: 0.875rem;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        a {
            color: #B69D74;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        @include('admin.message')
        <div class="card card-outline card-primary">

            <div class="card-header text-center">
                <a href="#" class="h3">Musa & Associates Admin Panel</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('admin.authenticate') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1 mt-3 text-center">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/adminlte.min.js') }}"></script>
</body>

</html>
