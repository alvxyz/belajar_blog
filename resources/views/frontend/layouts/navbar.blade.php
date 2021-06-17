<!--Full width header Start-->
<div class="full-width-header header-style2">
    <!--Header Start-->
    <header id="rs-header" class="rs-header">

        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-4">
                        <div class="logo-cat-wrap">
                            <div class="logo-part">
                                <a class="dark-logo" href="/">
                                    <img src={{ asset("educavo/assets/images/logohitamhi.png") }} alt="">
                                </a>
                                <a class="light-logo" href="/">
                                    <img src={{ asset("educavo/assets/images/logoputihhi.png") }} alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 text-center">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <div class="mobile-menu">
                                    <a class="rs-menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>
                                <nav class="rs-menu">
                                    <ul class="nav-menu">
                                        <li class="menu-item {{ set_active('beranda') }}">
                                            <a href="/">Beranda</a>
                                        </li>

                                        <li
                                            class="rs-mega-menu mega-rs menu-item-has-children {{ set_active(['tentang', 'visidanmisi', 'dosen', 'dosen.detail', 'partner', 'partner.detail', 'akreditasi', 'fasilitas', 'fasilitas.detail', 'struktur', 'profillulusan']) }}">
                                            <a href="#">Profil <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            <ul class="mega-menu">
                                                <li class="mega-menu-container">
                                                    <div class="mega-menu-innner">
                                                        <div class="single-megamenu">
                                                            <ul class="sub-menu">
                                                                <li><a href="{{ route('tentang') }}">Tentang Program
                                                                        Studi</a> </li>
                                                                <li><a href="{{ route('visidanmisi') }}">Visi dan
                                                                        Misi</a> </li>
                                                                <li><a href="{{ route('dosen') }}">Dosen</a> </li>

                                                            </ul>
                                                        </div>
                                                        <div class="single-megamenu">
                                                            <ul class="sub-menu last-sub-menu">
                                                                <li><a href="{{ route('akreditasi') }}">Akreditasi</a>
                                                                </li>
                                                                <li><a href="{{ route('fasilitas') }}">Fasilitas</a>
                                                                </li>
                                                                <li><a href="{{ route('struktur') }}">Struktur
                                                                        Organisasi</a> </li>

                                                            </ul>
                                                        </div>
                                                        <div class="single-megamenu">
                                                            <ul class="sub-menu last-sub-menu">
                                                                <li><a href="{{ route('partner') }}">Kerja Sama</a>
                                                                </li>
                                                                <li><a href="{{ route('profillulusan') }}">Profil
                                                                        Lulusan</a> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul> <!-- //.mega-menu -->
                                        </li>

                                        <li class="menu-item-has-children {{ set_active(['karya', 'karya.detail']) }}">
                                            <a href="#">Mahasiswa <i class="fa fa-caret-down"
                                                    aria-hidden="true"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('karya') }}">Karya Terbaik</a>
                                                <li><a href="{{ route('kalender') }}">Kalender
                                                        Akademik</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children {{ set_active(['capaian', 'kompetensi']) }}">
                                            <a href="#">Kurikulum <i class="fa fa-caret-down"
                                                    aria-hidden="true"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('capaian') }}">Capaian Pembelajaran</a>
                                                <li><a href="{{ route('kompetensi') }}">Kompetensi Lulusan</a>
                                            </ul>
                                        </li>

                                        <li class="menu-item {{ set_active(['berita', 'berita.detail']) }}">
                                            <a href="{{ route('berita') }}">Berita</a>
                                        </li>

                                        <li
                                            class="menu-item {{ set_active(['agenda', 'agenda.detail', 'agenda.cari.work']) }}">
                                            <a href="{{ route('agenda') }}">Agenda</a>
                                        </li>

                                        <li
                                            class="menu-item {{ set_active(['repositori', 'repositori.detail', 'category.post']) }}">
                                            <a href="{{ route('repositori') }}">Repositori</a>
                                        </li>
                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->
    </header>
    <!--Header End-->
</div>
<!--Full width header End-->