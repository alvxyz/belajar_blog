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
            <div class="slider-content slide1" style="background: url({{ asset("images/beranda/1.jpg") }})">
                <div class="container">
                    <div class="sl-sub-title white-color wow bounceInLeft" data-wow-delay="300ms"
                        data-wow-duration="2000ms">Pendaftaran Mahasiswa Baru 2021</div>
                    <h1 class="sl-title white-color wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">
                        Program Studi Teknik Informatika POLNEP</h1>
                    <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                        <a class="readon2 banner-style" href="#">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="slider-content slide1" style="background: url({{ asset("images/beranda/1.jpg") }})">
                <div class="container">
                    <div class="sl-sub-title white-color wow bounceInLeft" data-wow-delay="300ms"
                        data-wow-duration="2000ms">2</div>
                    <h1 class="sl-title white-color wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">
                        Educavo University</h1>
                    <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                        <a class="readon2 banner-style" href="#">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="slider-content slide2" style="background: url({{ asset("images/beranda/1.jpg") }})">
                <div class="container">
                    <div class="sl-sub-title white-color wow bounceInLeft" data-wow-delay="300ms"
                        data-wow-duration="2000ms">3</div>
                    <h1 class="sl-title white-color wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">
                        Educavo University</h1>
                    <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                        <a class="readon2 banner-style" href="#">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Section End -->

    <div class="gray-bg">
        <!-- Blog Section Start -->
        <div id="rs-blog" class="rs-blog style2 pt-94 pb-100 md-pt-64 md-pb-70">
            <div class="container">
                <div class="sec-title mb-60 text-center">
                    <div class="sub-title primary">News Update </div>
                    <h2 class="title mb-0">Latest News & Events</h2>
                </div>
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                    data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                    data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                    data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
                    data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false"
                    data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
                    data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
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
                            <img src={{ asset("educavo/assets/images/blog/style2/2.jpg") }} alt="">
                        </div>
                        <div class="blog-content new-style">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user-o"></i> Admin</li>
                                <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                            </ul>
                            <h3 class="title"><a href="blog-single.html">High School Program Starting Soon 2021</a></h3>
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
                            <img src={{ asset("educavo/assets/images/blog/style2/3.jpg") }} alt="">
                        </div>
                        <div class="blog-content new-style">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user-o"></i> Admin</li>
                                <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                            </ul>
                            <h3 class="title"><a href="blog-single.html">Modern School The Lovely Valley Team Work</a>
                            </h3>
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
                            <img src={{ asset("educavo/assets/images/blog/style2/2.jpg") }} alt="">
                        </div>
                        <div class="blog-content new-style">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user-o"></i> Admin</li>
                                <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                            </ul>
                            <h3 class="title"><a href="blog-single.html">While The Lovely Valley Team Work</a></h3>
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
        <!-- Blog Section End -->
    </div>
</div>


@endsection