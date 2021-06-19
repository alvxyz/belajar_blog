@extends('frontend.layouts.app')

@section('title', 'Panduan dan Dokumentasi | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/panduan.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Panduan dan Dokumentasi</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Panduan dan Dokumentasi</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->



    <!-- Blog Section Start -->
    <div class="rs-inner-blog rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="pt-10">
                {{-- <div class="blog-full">
                    <h3 class="text-center">Visi</h3>
                    @foreach ($guides as $guide)
                    <p>{!! $guide->vision !!}</p>
                    @endforeach

                    <h3 class="text-center pt-30">Misi</h3>
                    @foreach ($guides as $guide)
                    <p>{!! $guide->mission !!}</p>
                    @endforeach
                </div> --}}
                <div class="rs-faq-part md-pt-70 md-pb-70">
                    <div class="container">
                        <div class="content-part mb-50 md-mb-30">
                            <div class="title mb-40 md-mb-15">
                                <h3 class="text">Kumpulan Panduan dan Dokumentasi</h3>
                            </div>
                            <div id="accordion" class="accordion">
                                @foreach ($guides as $guide)
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse"
                                            href="#{{Str::slug($guide->title)}}">{{ $guide->title }}</a>
                                    </div>
                                    <div id="{{Str::slug($guide->title)}}" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>{!! $guide->content !!}</p>
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