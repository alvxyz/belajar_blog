@extends('frontend.layouts.app')

@section('title', 'Kompetensi Lulusan Studi | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/kurikulum2.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Kompetensi Lulusan</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Kompetensi Lulusan</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Blog Section Start -->
    <div class="rs-inner-blog rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="pt-10">
                <div class="blog-full">
                    <h2 class="text">Kompetensi Lulusan</h2>
                    @foreach ($competence1 as $competence)
                    <p>{!! $competence->content !!}</p>
                    @endforeach
                </div>

                @if ($competence->count() > 1)
                <div class="rs-faq-part pt-100 md-pt-70 md-pb-70">
                    <div class="isi">
                        <div class="content-part mb-50 md-mb-30">
                            <div class="title mb-30 md-mb-15">
                                <h3 class="text">Riwayat Kompetensi Lulusan</h3>
                            </div>
                            <div id="accordion" class="accordion">
                                @foreach ($competence2 as $competence)
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse"
                                            href="#{{Str::slug($competence->period)}}">{{ $competence->period }}</a>
                                    </div>
                                    <div id="{{Str::slug($competence->period)}}" class="collapse"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            {{-- <h3>Akreditasi</h3> --}}
                                            <p>{!! $competence->content !!}</p>
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