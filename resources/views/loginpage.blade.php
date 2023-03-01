<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cubeytech | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('assets/css/css.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body style="background-color: #e9ecef">

    @if (session()->has('ERROR'))
        <p class="alert alert-danger">{{ session()->get('ERROR') }}</p>
    @endif
    @if (session()->has('SUCCESS'))
        <p class="alert alert-success">{{ session()->get('SUCCESS') }}</p>
    @endif


    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="row" style="width: 750px">
                <div class="col-md-6 leftside rounded">
                    <div class="p-3">
                        <img src="{{ asset('image/Final Logo.svg') }}" height="100px" width="200px">
                    </div>
                    <div class="p-3 d-none d-sm-block">
                        <h1>Emoloyee</h1>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1>Management</h1>
                            </div>
                            <div>
                                <img src="{{ asset('image/teardrop-flower 1.png') }}" height="60px" width="70px">
                            </div>
                        </div>
                        <h1>Portal</h1>
                    </div>
                    <div class="p-3 d-block d-sm-none">
                        <h3>Emoloyee</h3>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3>Management</h3>
                            </div>
                            <div>
                                <img src="{{ asset('image/teardrop-flower 1.png') }}" height="30px" width="40px">
                            </div>
                        </div>
                        <h3>Portal</h3>
                    </div>
                    <div class="px-4 d-none d-sm-block">
                        <img src="{{ asset('image/ribbed-sphere 1.svg') }}" height="100px" width="250px">
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="card p-3 p-sm-5 m-0">
                        <div class="card-title pt-0 mt-3 pt-sm-5 mt-sm-5">
                            <h3>Login</h3>
                        </div>
                        <div class="card-body p-0 pt-4">
                            <form action="{{ route('log_sub') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        value="{{ old('password') }}">
                                </div>
                                @error('password')
                                    <p style="color: red;font-size:13px">{{ $message }}</p>
                                @enderror
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
