<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('adminto/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"
                    aria-expanded="false">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Administrator</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Daftar Menu</li>

                <li>
                    <a href="{{ route('home') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('categories') }}">
                        <i class="mdi mdi-page-next"></i>
                        <span> Category </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tags') }}">
                        <i class="mdi mdi-code-tags"></i>
                        <span> Tag </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-post"></i>
                        <span> Berita </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('posts') }}">List Berita</a></li>
                        <li><a href="{{ route('post.trashed') }}">Trash Berita</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('users') }}">
                        <i class="mdi mdi-account"></i>
                        <span> User </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>