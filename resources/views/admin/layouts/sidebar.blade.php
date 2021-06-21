<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset(Auth::user()->profile->avatar == '' ? 'images/default/default_picture.png' : Auth::user()->profile->avatar) }}"
                alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
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
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <label class="text-muted">@if(!empty(Auth::user()->getRoleNames()))
                @foreach(Auth::user()->getRoleNames() as $v)
                <span class="badge badge-pill badge-primary">{{ $v }}</span>
                @endforeach
                @endif</label>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Daftar Menu</li>

                @hasanyrole('admin|operator')
                <li>
                    <a href="{{ route('home') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('slider.admin') }}">
                        <i class="mdi mdi-view-carousel"></i>
                        <span> Slider </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-post"></i>
                        <span> Berita </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('categories') }}">Kategori Berita</a></li>
                        <li><a href="{{ route('tags') }}">Tag Berita</a></li>
                        <li><a href="{{ route('posts') }}">List Berita</a></li>
                        <li><a href="{{ route('post.trashed') }}">Trash Berita</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('agenda.admin') }}">
                        <i class="mdi mdi-calendar-check"></i>
                        <span> Agenda </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('repository') }}">
                        <i class="mdi mdi-source-repository"></i>
                        <span> Repositori </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-post"></i>
                        <span> Karya Terbaik </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('categorycreation.admin') }}">Kategori Karya</a></li>
                        <li><a href="{{ route('creation.admin') }}">List Karya</a></li>
                    </ul>
                </li>

                @endhasanyrole()

                @hasanyrole('admin')

                <li>
                    <a href="{{ route('users') }}">
                        <i class="mdi mdi-account"></i>
                        <span> Manajemen User </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('abouts') }}">
                        <i class="mdi mdi-library"></i>
                        <span> Tentang Prodi </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('partner.admin') }}">
                        <i class="mdi mdi-handshake"></i>
                        <span> Kerja Sama </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('testimonial.admin') }}">
                        <i class="mdi mdi-message-processing"></i>
                        <span> Testimoni </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('visionandmissions') }}">
                        <i class="mdi mdi-text-box"></i>
                        <span> Visi dan Misi </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('accreditations') }}">
                        <i class="mdi mdi-star-circle"></i>
                        <span> Akreditasi </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('structures') }}">
                        <i class="mdi mdi-chemical-weapon"></i>
                        <span> Struktur Organisasi </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('facility.admin') }}">
                        <i class="mdi mdi-laptop-chromebook"></i>
                        <span> Fasilitas </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('graduateprofiles') }}">
                        <i class="mdi mdi-file-certificate"></i>
                        <span> Profil Lulusan </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('achievements') }}">
                        <i class="mdi mdi-vector-point"></i>
                        <span> Capaian Pembelajaran </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('competences') }}">
                        <i class="mdi mdi-check-decagram"></i>
                        <span> Kompetensi Lulusan </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('subjects') }}">
                        <i class="mdi mdi-book"></i>
                        <span> Mata Kuliah </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('calendars') }}">
                        <i class="mdi mdi-calendar-month"></i>
                        <span> Kalender Akademik </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('guides') }}">
                        <i class="mdi mdi-help-circle"></i>
                        <span> Panduan </span>
                    </a>
                </li>

                @endhasanyrole()

                @hasanyrole('dosen')
                <li>
                    <a href="{{ route('profile') }}">
                        <i class="mdi mdi-account"></i>
                        <span> Profile </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('lecturer.edit_from_dosen')}}">
                        <i class="mdi mdi-book-account"></i>
                        <span> Detail Dosen </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('publications')}}">
                        <i class="mdi mdi-newspaper"></i>
                        <span> Publikasi </span>
                    </a>
                </li>

                @endhasanyrole()



            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>