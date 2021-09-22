<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin Panel | Teknik Informatika POLNEP</title>
    @toastr_css
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('adminto/assets/images/favicon.ico') }}">



    <!-- third party css -->
    <link href="{{ asset('adminto/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('adminto/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('adminto/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('adminto/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}" rel="stylesheet" />

    {{-- Sweet allert --}}
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}" type="text/css">

    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('adminto/assets/css/bootstrap.min.css') }}" id="bootstrap-stylesheet" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('adminto/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('adminto/assets/css/app.min.css') }}" id="app-stylesheet" rel="stylesheet" type="text/css" />

    @FilemanagerScript

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset(Auth::user()->profile->avatar == '' ? 'images/default/default_picture.png' : Auth::user()->profile->avatar) }}"
                            alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="
                            event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ route('home') }}" class="logo logo-dark text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('educavo/assets/images/logobiru-baru.png') }}" alt="" height="26">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo/logo-sm.png') }}" alt="" height="24">
                    </span>
                </a>
                <a href="{{ route('home') }}" class="logo logo-light text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('adminto/assets/images/logo-light.png') }}" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('adminto/assets/images/logo-sm.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">@yield('judulhalaman', 'Halaman Admin')</h4>
                </li>

            </ul>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            &copy; Website Teknik Informatika POLNEP created by <a
                                href="https://www.instagram.com/_alvian.design/" target="blank">Alvian Teddy Cahya
                                Putra</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <!-- Vendor js -->
    <script src="{{ asset('adminto/assets/js/vendor.min.js') }}"></script>

    <!-- knob plugin -->
    <script src="{{ asset('adminto/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('adminto/assets/libs/morris-js/morris.min.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/raphael/raphael.min.js') }}"></script>

    <!-- Dashboard init js-->
    <script src="{{ asset('adminto/assets/js/pages/dashboard.init.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('adminto/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('adminto/assets/libs/datatables/dataTables.select.min.js') }}"></script>

    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('adminto/assets/js/pages/datatables.init.js') }}"></script>

    <!-- App js -->
    <script src="{{asset('adminto/assets/js/app.min.js') }}"></script>

    {{-- Sweet Allert --}}
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    {{-- Select 2 JS --}}
    <script src="{{ asset('js/select2.min.js') }}"></script>



    @yield('js')


    <script src="{{asset('ckeditor4full/ckeditor.js')}}"></script>

    <script>
        window.onload = function () {
            CKEDITOR.replace('editor', {
                filebrowserBrowseUrl: filemanager.ckBrowseUrl,
            });

            CKEDITOR.replace('editor2', {
                filebrowserBrowseUrl: filemanager.ckBrowseUrl,
            });
        }
    </script>

</body>

@toastr_js
@toastr_render

</html>