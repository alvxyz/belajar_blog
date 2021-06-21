@extends('frontend.layouts.app')

@section('title', 'Akreditasi | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/tentang2.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Akreditasi</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Akreditasi</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->



    <!-- Blog Section Start -->
    <div class="rs-inner-blog rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="pt-10">
                <div class="blog-full text-center">
                    <h3 class="text-center">Akreditasi</h3>
                    @foreach ($accreditation1 as $accreditation)
                    <p>{!! $accreditation->accreditation !!}</p>
                    @endforeach
                </div>
                <div class="rs-faq-part pt-100 md-pt-70 md-pb-70">
                    <div class="isi">
                        <div class="content-part mb-50 md-mb-30">
                            <div class="title mb-30 md-mb-15">
                                <h3 class="text">Riwayat Akreditasi</h3>
                            </div>
                            <div id="accordion" class="accordion">
                                @foreach ($accreditation2 as $accreditation)
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse"
                                            href="#{{Str::slug($accreditation->period)}}">{{ $accreditation->period }}</a>
                                    </div>
                                    <div id="{{Str::slug($accreditation->period)}}" class="collapse"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            {{-- <h3>Akreditasi</h3> --}}
                                            <p>{!! $accreditation->accreditation !!}</p>
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