@extends('frontend.layouts.app')

@section('title', 'Profil Lulusan | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/tentang2.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Profil Lulusan</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Profil Lulusan</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->


    <!-- Blog Section Start -->
    <div class="rs-inner-blog rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="pt-10">
                <div class="blog-full">
                    <h2 class="text">Profil Lulusan</h2>
                    @foreach ($graduateprofile1 as $graduateprofile)
                    <p>{!! $graduateprofile->content !!}</p>
                    @endforeach
                </div>
                <div class="rs-faq-part pt-100 md-pt-70 md-pb-70">
                    <div class="container">
                        <div class="content-part mb-50 md-mb-30">
                            <div class="title mb-40 md-mb-15">
                                <h3 class="text">Riwayat Profil Lulusan</h3>
                            </div>
                            <div id="accordion" class="accordion">
                                @foreach ($graduateprofile2 as $graduateprofile)
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse"
                                            href="#{{Str::slug($graduateprofile->period)}}">{{ $graduateprofile->period }}</a>
                                    </div>
                                    <div id="{{Str::slug($graduateprofile->period)}}" class="collapse"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            {{-- <h3>Profil Lulusan</h3> --}}
                                            <p>{!! $graduateprofile->content !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection