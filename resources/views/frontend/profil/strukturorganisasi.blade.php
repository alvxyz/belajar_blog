@extends('frontend.layouts.app')

@section('title', 'Struktur Organisasi | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/tentang2.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Struktur Organisasi</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Struktur Organisasi</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Blog Section Start -->
    <div class="rs-inner-blog rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="pt-10">
                <div class="blog-full">
                    <h2 class="text">Struktur Organisasi Program Studi Teknik Informatika</h2>
                    @foreach ($structure1 as $structure)
                    <a class="image-popup" href="{{ asset($structure->image) }}"><img
                            src="{{ asset($structure->image) }}" alt=""></a>
                    @endforeach
                </div>

                @if ($structure->count() > 1)
                <div class="rs-faq-part pt-100 md-pt-70 md-pb-70">
                    <div class="isi">
                        <div class="content-part mb-50 md-mb-30">
                            <div class="title mb-40 md-mb-15">
                                <h3 class="text">Riwayat Struktur Organisasi</h3>
                            </div>
                            <div id="accordion" class="accordion">
                                @foreach ($structure2 as $structure)
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse"
                                            href="#{{Str::slug($structure->period)}}">{{ $structure->period }}</a>
                                    </div>
                                    <div id="{{Str::slug($structure->period)}}" class="collapse"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <a class="image-popup" href="{{ asset($structure->image) }}"><img
                                                    src="{{ asset($structure->image) }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>

</div>

@endsection