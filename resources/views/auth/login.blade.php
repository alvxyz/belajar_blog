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


<body class="authentication-bg" style="background-image: url({{ asset('images/login/login3.jpg') }})">

    <div class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-6"></div>


                <div class="col-md-6 col-lg-6 col-xl-5 card">
                    <div class="card-body p-4">
                        <div class="text">
                            <a href="" class="">
                                {{-- <img src="{{ asset('images/logo/logohitamhi.png') }}" alt="" height="40"
                                class="logo-light mx-auto"> --}}
                                <img src="{{ asset('images/logo/logohitamhi.png') }}" alt="" height="40"
                                    class="logo-dark mx-auto">
                            </a>
                            <p class="text mt-2 mb-4">Halaman Admin Website TI POLNEP</p>
                        </div>
                        <div class="text mb-4">
                            <h4 class="text-uppercase mt-0">Masuk</h4>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="emailaddress">{{ __('E-mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Enter your email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">{{ __('Password') }}</label>
                                <input cid="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Enter your password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit">{{ __('Login') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
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