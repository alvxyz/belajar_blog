<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="apple-touch-icon" href={{ asset('educavo/apple-touch-icon.png') }}>
    <link rel="shortcut icon" type="image/x-icon" href={{ asset("educavo/assets/images/fav-orange.png") }}>
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/css/bootstrap.min.css") }}>
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/css/font-awesome.min.css") }}>
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/css/animate.css") }}>
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/css/owl.carousel.css") }}>
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/css/slick.css") }}>
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/css/off-canvas.css") }}>
    <!-- linea-font css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/fonts/linea-fonts.css") }}>
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/fonts/flaticon.css") }}>
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/css/magnific-popup.css") }}>
    <!-- Main Menu css -->
    <link rel="stylesheet" href={{ asset("educavo/assets/css/rsmenu-main.css") }}>
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/css/rs-spacing.css" ) }}>
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/style.css") }}>
    <!-- This stylesheet dynamically changed from style.less -->
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href={{ asset("educavo/assets/css/responsive.css" ) }}>

    @yield('css')

</head>

<body class="defult-home">

    <!--Preloader area start here-->
    <div id="loader" class="loader blue-color">
        <div class="loader-container">
            <div class='loader-icon'>
                <img src={{ asset("educavo/assets/images/pre-logo1.png") }} alt="">
            </div>
        </div>
    </div>
    <!--Preloader area End here-->

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('frontend.layouts.footer')


    <!-- start scrollUp  -->
    <div id="scrollUp">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- End scrollUp  -->


    {{-- JavaScript --}}
    <!-- modernizr js -->
    <script src={{ asset("educavo/assets/js/modernizr-2.8.3.min.js") }}></script>
    <!-- jquery latest version -->
    <script src={{ asset("educavo/assets/js/jquery.min.js") }}> </script>
    <!-- Bootstrap v4.4.1 js -->
    <script src={{ asset("educavo/assets/js/bootstrap.min.js") }}></script>
    <!-- Menu js -->
    <script src={{ asset("educavo/assets/js/rsmenu-main.js") }}></script>
    <!-- op nav js -->
    <script src={{ asset("educavo/assets/js/jquery.nav.js") }}></script>
    <!-- owl.carousel js -->
    <script src={{ asset("educavo/assets/js/owl.carousel.min.js") }}></script>
    <!-- Slick js -->
    <script src={{ asset("educavo/assets/js/slick.min.js") }}></script>
    <!-- isotope.pkgd.min js -->
    <script src={{ asset("educavo/assets/js/isotope.pkgd.min.js") }}></script>
    <!-- imagesloaded.pkgd.min js -->
    <script src={{ asset("educavo/assets/js/imagesloaded.pkgd.min.js") }}></script>
    <!-- wow js -->
    <script src={{ asset("educavo/assets/js/wow.min.js") }}></script>
    <!-- Skill bar js -->
    <script src={{ asset("educavo/assets/js/skill.bars.jquery.js") }}></script>
    <script src={{ asset("educavo/assets/js/jquery.counterup.min.js") }}></script>
    <!-- counter top js -->
    <script src={{ asset("educavo/assets/js/waypoints.min.js") }}></script>
    <!-- video js -->
    <script src={{ asset("educavo/assets/js/jquery.mb.YTPlayer.min.js") }}></script>
    <!-- magnific popup js -->
    <script src={{ asset("educavo/assets/js/jquery.magnific-popup.min.js") }}></script>
    {{-- tilt JS --}}
    <script src="{{ asset('educavo/assets/js/tilt.jquery.min.js') }}"></script>
    <!-- plugins js -->
    <script src={{ asset("educavo/assets/js/plugins.js") }}></script>
    <!-- contact form js -->
    <script src={{ asset("educavo/assets/js/contact.form.js") }}></script>
    <!-- main js -->
    <script src={{ asset("educavo/assets/js/main.js") }}></script>


</body>

</html>