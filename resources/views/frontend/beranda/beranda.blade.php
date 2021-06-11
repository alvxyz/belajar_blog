@extends('frontend.layouts.app')

@section('title', 'Beranda | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Slider Section Start -->
    <div class="rs-slider style1">
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0" data-autoplay="true"
            data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
            data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
            data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1"
            data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
            data-ipad-device-nav2="true" data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="true"
            data-md-device-dots="false">
            @foreach ($sliders as $slider)
            <div class="slider-content slide1 slider-alvian"
                style="background: linear-gradient(358.57deg, rgba(39, 60, 102, 0.8) 3.32%, rgba(196, 196, 196, 0) 157.54%), url({{ asset($slider->image) }}); object-fit:cover !important">
                <div class="container">
                    <div class="sl-sub-title white-color wow bounceInLeft" data-wow-delay="300ms"
                        data-wow-duration="2000ms">{{ $slider->sub_title }}</div>
                    <h1 class="sl-title white-color wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">
                        {{ $slider->title }}</h1>
                    <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                        <a class="readon2 banner-style"
                            href="{{ route('slider.detail', ['slug' => $slider->slug]) }}">Jelajahi Lebih Lanjut</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Slider Section End -->


    {{-- Section Tentang --}}
    <div class="rs-about style9 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 md-mb-40">
                    <div class="img-part js-tilt">
                        <img src="{{ asset('images/beranda/Tentang.png') }}" alt="images">
                    </div>
                </div>
                <div class="col-lg-6 pl-100 md-pl-15 col-md-12">
                    <div class="content">
                        <div class="sub-title mb-20">
                            Tentang Kami
                        </div>
                        <h2 class="sl-title mb-40 md-mb-20">Program Studi Teknik Informatika Terbaik di Pontianak</h2>
                        <p class="desc mb-50">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, eius to mod tempor incidi dunt ut
                            labore et dolore magna aliqua. Ut enims ad minim veniam.Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, eius to mod tempor incidi dunt ut labore et dolore magna
                            aliqua. Ut enims ad minim veniam.Lorem sum dolor sit amet.
                        </p>
                    </div>
                    <div class="btn-part">
                        <a class="readon blue-btn" href="#">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Akhir Section Tentang --}}

    <!-- Blog Section Start -->
    <div id="rs-blog" class="rs-blog style2 pt-94 pb-100 md-pt-64 md-pb-70 gray-bg">
        <div class="container">
            <div class="sec-title mb-60 text-center">
                <div class="sub-title primary">Pembaruan</div>
                <h2 class="title mb-0">Berita Terbaru</h2>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
                data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
                data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
                data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3"
                data-md-device-nav="false" data-md-device-dots="false">
                @foreach ($posts as $post)
                <div class="blog-item">
                    <div class="image-part">
                        <a href="{{ route('berita.detail', ['slug' => $post->slug]) }}"><img
                                src="{{ asset($post->featured) }}" alt="{{ $post->title }}"
                                style="max-height: 250px; object-fit:cover; !important" class="img-fluid"></a>
                    </div>
                    <div class="blog-content new-style">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user"></i> {{$post->users->name }}</li>
                            <li><i class="fa fa-calendar"></i>
                                {{ $post->created_at->diffForHumans()}}</li>
                        </ul>
                        <h3 class="title"><a href="{{ route('berita.detail', ['slug' => $post->slug]) }}">{!!
                                $post->title !!}</a></h3>
                        <div class="desc"> {!! substr($post->content, 0, 200) !!}</div>
                        <ul class="blog-bottom">
                            <li class="btn-part"><a class="readon-arrow"
                                    href="{{ route('berita.detail', ['slug' => $post->slug]) }}">Selengkapnya</a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Section End -->

    {{-- Statistik Pengunjung --}}
    <div class="rs-about style9 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 pl-100 md-pl-15 col-md-12">
                    <div class="content">
                        <div class="sub-title mb-20">
                            About Us
                        </div>
                        <h2 class="sl-title mb-40 md-mb-20">We are leading discovery and innovation since 1905</h2>
                        <p class="desc mb-50">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, eius to mod tempor incidi dunt ut
                            labore et dolore magna aliqua. Ut enims ad minim veniam.Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit, eius to mod tempor incidi dunt ut labore et dolore magna
                            aliqua. Ut enims ad minim veniam.Lorem sum dolor sit amet.
                        </p>
                    </div>
                    <div class="btn-part">
                        <a class="readon blue-btn" href="#">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Akhir Statistik Pengunjung --}}

    {{-- Agenda --}}
    <div class="rs-latest-events style1 bg-wrap pt-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pr-65 pt-24 md-pt-0 md-pr-15 md-mb-30">
                    <div class="sec-title mb-42">
                        <div class="sub-title primary">Agenda Terbaru</div>
                        <h2 class="title mb-0">Agenda Prodi</h2>
                        <h2 class="title mb-0">Teknik Informatika</h2>
                    </div>
                    <div class="single-img wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                        <img src="{{ asset('images/beranda/event.png') }}" alt="Event Image">
                    </div>
                </div>
                <div class="col-lg-6 lg-pl-0">
                    <div class="event-wrap">
                        @foreach ($agendas as $agenda)
                        <div class="events-short mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                            <div class="date-part bgc1">
                                <span class="month">{{ Carbon\Carbon::parse($agenda->date)->isoFormat('MMMM') }}</span>
                                <div class="date">
                                    {{ Carbon\Carbon::parse($agenda->date)->isoFormat('Do') }}</div>
                            </div>
                            <div class="content-part">
                                <div class="categorie">
                                    {{$agenda->place}}
                                </div>
                                <h4 class="title mb-0"><a
                                        href="{{ route('agenda.detail', ['slug' => $agenda->slug]) }}">{!!
                                        substr($agenda->title, 0 , 50) !!}</a></h4>
                            </div>
                        </div>
                        @endforeach
                        <div class="btn-part mt-55 md-mt-25 wow fadeInUp" data-wow-delay="600ms"
                            data-wow-duration="2000ms">
                            <a href="{{ route('agenda') }}">Lihat Semua Agenda ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Akhir Agenda --}}

    <!-- Partner Start -->
    <div class="rs-partner pt-100 pb-100 md-pt-70 md-pb-70 gray-bg">
        <div class="container">
            <div class="sec-title mb-60 text-center">
                <div class="sub-title primary">Daftar</div>
                <h2 class="title mb-0">Kerja Sama</h2>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
                data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="3"
                data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2"
                data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="5"
                data-md-device-nav="false" data-md-device-dots="false">
                @foreach ($partners as $partner)
                <div class="partner-item">
                    <a href="{{ route('partner.detail', ['slug' => $partner->slug]) }}"><img src="{{ $partner->image }}"
                            alt=""></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Partner End -->

    {{-- Testimoni --}}
    <div class="rs-testimonial style3 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title mb-60 md-mb-30">
                <div class="rs-testimonial style3">
                    <div class="container">
                        <div class="sec-title mb-60 text-center md-mb-30">
                            <div class="sub-title primary">Testimoni</div>
                            <h2 class="title mb-0">Apa Yang Mereka Katakan</h2>
                        </div>
                        <div class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30"
                            data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000"
                            data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false"
                            data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false"
                            data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false"
                            data-ipad-device-dots="false" data-ipad-device2="1" data-ipad-device-nav2="false"
                            data-ipad-device-dots2="false" data-md-device="2" data-md-device-nav="false"
                            data-md-device-dots="true">
                            <div class="testi-item">
                                <div class="row y-middle no-gutter">
                                    <div class="col-md-4">
                                        <div class="user-info">
                                            <img src="{{ asset('images/beranda/astrid.png') }}" alt="">
                                            <h4 class="name">Saiko Najran</h4>
                                            <span class="designation">Student</span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="desc">The charms of pleasure of the moment so blinded by desire that
                                            they cannot foresee the pain and trouble that are bound ensue and equal
                                            blame belongs to those who fail in their duty.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="testi-item">
                                <div class="row y-middle no-gutter">
                                    <div class="col-md-4">
                                        <div class="user-info">
                                            <img src="{{ asset('images/beranda/astrid.png') }}" alt="">
                                            <h4 class="name">Saiko Najran</h4>
                                            <span class="designation">Student</span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="desc">The charms of pleasure of the moment so blinded by desire that
                                            they cannot foresee the pain and trouble that are bound ensue and equal
                                            blame belongs to those who fail in their duty.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="testi-item">
                                <div class="row y-middle no-gutter">
                                    <div class="col-md-4">
                                        <div class="user-info">
                                            <img src="{{ asset('images/beranda/astrid.png') }}" alt="">
                                            <h4 class="name">Saiko Najran</h4>
                                            <span class="designation">Student</span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="desc">The charms of pleasure of the moment so blinded by desire that
                                            they cannot foresee the pain and trouble that are bound ensue and equal
                                            blame belongs to those who fail in their duty.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="testi-item">
                                <div class="row y-middle no-gutter">
                                    <div class="col-md-4">
                                        <div class="user-info">
                                            <img src="{{ asset('images/beranda/astrid.png') }}" alt="">
                                            <h4 class="name">Saiko Najran</h4>
                                            <span class="designation">Student</span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="desc">The charms of pleasure of the moment so blinded by desire that
                                            they cannot foresee the pain and trouble that are bound ensue and equal
                                            blame belongs to those who fail in their duty.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Akhir Testimoni --}}

    {{-- Karya Terbaik --}}
    <div id="rs-blog" class="rs-blog style2 pt-94 pb-100 md-pt-64 md-pb-70 gray-bg">
        <div class="container">
            <div class="sec-title mb-60 text-center">
                <div class="sub-title primary">Kumpulan</div>
                <h2 class="title mb-0">Tugas Akhir Terbaik Mahasiswa</h2>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true"
                data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
                data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2"
                data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
                data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3"
                data-md-device-nav="false" data-md-device-dots="false">
                <div class="blog-item">
                    <div class="image-part">
                        <img src={{ asset("educavo/assets/images/blog/style2/1.jpg") }} alt="">
                    </div>
                    <div class="blog-content new-style">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                        </ul>
                        <h3 class="title"><a href="blog-single.html">University While The Lovely Valley Team
                                Work</a></h3>
                        <div class="desc">the acquisition of knowledge, skills, values befs, and habits. Educational
                            methods include teach ing, training, storytelling</div>
                        <ul class="blog-bottom">
                            <li class="cmnt-part"><a href="#">(12) Comments</a></li>
                            <li class="btn-part"><a class="readon-arrow" href="#">Read More</a></li>
                        </ul>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-part">
                        <img src={{ asset("educavo/assets/images/blog/style2/1.jpg") }} alt="">
                    </div>
                    <div class="blog-content new-style">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                        </ul>
                        <h3 class="title"><a href="blog-single.html">University While The Lovely Valley Team
                                Work</a></h3>
                        <div class="desc">the acquisition of knowledge, skills, values befs, and habits. Educational
                            methods include teach ing, training, storytelling</div>
                        <ul class="blog-bottom">
                            <li class="cmnt-part"><a href="#">(12) Comments</a></li>
                            <li class="btn-part"><a class="readon-arrow" href="#">Read More</a></li>
                        </ul>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-part">
                        <img src={{ asset("educavo/assets/images/blog/style2/1.jpg") }} alt="">
                    </div>
                    <div class="blog-content new-style">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                        </ul>
                        <h3 class="title"><a href="blog-single.html">University While The Lovely Valley Team
                                Work</a></h3>
                        <div class="desc">the acquisition of knowledge, skills, values befs, and habits. Educational
                            methods include teach ing, training, storytelling</div>
                        <ul class="blog-bottom">
                            <li class="cmnt-part"><a href="#">(12) Comments</a></li>
                            <li class="btn-part"><a class="readon-arrow" href="#">Read More</a></li>
                        </ul>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-part">
                        <img src={{ asset("educavo/assets/images/blog/style2/1.jpg") }} alt="">
                    </div>
                    <div class="blog-content new-style">
                        <ul class="blog-meta">
                            <li><i class="fa fa-user-o"></i> Admin</li>
                            <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                        </ul>
                        <h3 class="title"><a href="blog-single.html">University While The Lovely Valley Team
                                Work</a></h3>
                        <div class="desc">the acquisition of knowledge, skills, values befs, and habits. Educational
                            methods include teach ing, training, storytelling</div>
                        <ul class="blog-bottom">
                            <li class="cmnt-part"><a href="#">(12) Comments</a></li>
                            <li class="btn-part"><a class="readon-arrow" href="#">Read More</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
    {{-- Akhir Karya Terbaik --}}

</div>


@endsection