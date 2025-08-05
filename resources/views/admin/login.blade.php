<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaxPilot:: Admin Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/adminlte.min.css') }}">

    <!-- Custom CSS -->
<!-- Custom CSS -->
<style>
    body {
        background-color: #f4f6f9;
        color: #343a40;
        font-family: 'Source Sans Pro', sans-serif;
    }

    .login-box {
        width: 400px;
        margin: 5% auto;
    }

    .card {
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 123, 255, 0.1);
    }

    .card-header {
        background-color: transparent;
        border-bottom: 1px solid #dee2e6;
    }

    .card-header a {
        color: #007bff;
        font-weight: bold;
    }

    .login-box-msg {
        color: #6c757d;
    }

    .form-control {
        background-color: #fff;
        border: 1px solid #ced4da;
        color: #495057;
    }

    .form-control:focus {
        background-color: #fff;
        color: #495057;
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .input-group-text {
        background-color: #fff;
        border: 1px solid #ced4da;
        color: #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    a {
        color: #007bff;
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
                <a href="#" class="h3">TaxPilot Admin Panel</a>
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
