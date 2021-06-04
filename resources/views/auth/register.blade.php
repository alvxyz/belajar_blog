<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log in | Teknik Informatika Polnep</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('adminto/assets/css/bootstrap.min.css') }}" id="bootstrap-stylesheet" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('adminto/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('adminto/assets/css/app.min.css') }}" id="app-stylesheet" rel="stylesheet" type="text/css" />

</head>


<body class="authentication-bg">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center">
                        <a href="" class="logo">
                            <img src="{{ asset('images/logo/logohitamhi.png') }}" alt="" height="40"
                                class="logo-light mx-auto">
                            <img src="{{ asset('images/logo/logohitamhi.png') }}" alt="" height="40"
                                class="logo-dark mx-auto">
                        </a>
                        <p class="text-muted mt-2 mb-4">Halaman Admin Dashboard</p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Sign Up</h4>
                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Enter Your Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Enter Your Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Enter your password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Enter Confirm password">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block"
                                        type="submit">{{ __('Register') }}</button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="">Already have an account? <a href="{{ route('login') }}"
                                    class="text-dark ml-1"><b>Login</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <!-- Vendor js -->
    <script src="{{ asset('adminto/assets/js/vendor.min.js') }}"></script>


    <!-- App js -->
    <script src="{{ asset('adminto/assets/js/app.min.js') }}"></script>

</body>

</html>