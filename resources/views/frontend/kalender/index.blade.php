@extends('frontend.layouts.app')

@section('title', 'Kalender Akademik | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/mahasiswa3.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Kalender Akademik</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Kalender Akademik</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Blog Section Start -->
    <div class="rs-inner-blog rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="pt-10">
                <div class="blog-full">
                    <h2 class="text">Kalender Akademik Program Studi Teknik Informatika</h2>
                    @foreach ($calendar1 as $calendar)
                    <div class="row mb-100">
                        <iframe
                            src="http://docs.google.com/gview?embedded=true&url={{ asset($calendar->file)}}&embedded=true"
                            style="width:100%; height:700px;" frameborder="0">
                        </iframe>
                    </div>
                    {{-- <a class="image-popup" href="{{ asset($calendar->image) }}"><img
                        src="{{ asset($calendar->image) }}" alt=""></a> --}}
                    <div class="btn-download mt-5">
                        <a type="button" href="{{ route('kalender.download', ['id' => $calendar->id]) }}"
                            class="btn-alvian"><i class="fa fa-arrow-circle-down"></i>
                            Download</a>
                    </div>
                    @endforeach
                </div>

                @if ($calendar->count() > 1) <div class="rs-faq-part pt-100 md-pt-70 md-pb-70">
                    <div class="isi">
                        <div class="content-part mb-50 md-mb-30">
                            <div class="title mb-40 md-mb-15">
                                <h3 class="text">Riwayat Kalender Akademik</h3>
                            </div>
                            <div id="accordion" class="accordion">
                                @foreach ($calendar2 as $calendar)
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse"
                                            href="#{{Str::slug($calendar->period)}}">{{ $calendar->period }}</a>
                                    </div>
                                    <div id="{{Str::slug($calendar->period)}}" class="collapse"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row mb-100">
                                                <iframe
                                                    src="http://docs.google.com/gview?embedded=true&url={{ asset($calendar->file)}}&embedded=true"
                                                    style="width:100%; height:700px;" frameborder="0">
                                                </iframe>
                                            </div>
                                            {{-- <a class="image-popup" href="{{ asset($calendar->image) }}"><img
                                                src="{{ asset($calendar->image) }}" alt=""></a> --}}
                                            <div class="btn-download mt-3">
                                                <a type="button"
                                                    href="{{ route('kalender.download', ['id' => $calendar->id]) }}"
                                                    class="btn-alvian"><i class="fa fa-arrow-circle-down"></i>
                                                    Download</a>
                                            </div>
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