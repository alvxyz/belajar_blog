@extends('frontend.layouts.app')

@section('title', 'Mata Kuliah | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/panduan.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Mata Kuliah</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Mata Kuliah</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->



    <!-- Blog Section Start -->
    <div class="rs-inner-blog rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="pt-10">
                <div class="rs-faq-part md-pt-70 md-pb-70">
                    <div class="isi">
                        <div class="content-part mb-50 md-mb-30">
                            <div class="title mb-40 md-mb-15">
                                <h3 class="text">Mata Kuliah</h3>
                                <p>Kurikulum Program Studi Teknik Informatika dirancang untuk dapat diselesaikan dalam
                                    waktu 6 semester (tiga tahun). Yang terdiri dari 2 kurikulum yaitu:</p>
                            </div>
                            <div id="accordion" class="accordion">
                                @foreach ($subjects as $subject)
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse"
                                            href="#{{Str::slug($subject->curriculum)}}">{{ $subject->curriculum }}</a>
                                    </div>
                                    <div id="{{Str::slug($subject->curriculum)}}" class="collapse"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>{!! $subject->subject !!}</p>
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