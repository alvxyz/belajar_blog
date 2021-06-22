@extends('frontend.layouts.app')

@section('title', 'Visi dan Misi | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/tentang2.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Visi dan Misi</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Visi dan Misi</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->



    <!-- Blog Section Start -->
    <div class="rs-inner-blog rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="pt-10">
                <div class="blog-full">
                    <h3 class="text-center">Visi</h3>
                    @foreach ($visionandmissions as $visionandmission)
                    <p>{!! $visionandmission->vision !!}</p>
                    @endforeach

                    <h3 class="text-center pt-30">Misi</h3>
                    @foreach ($visionandmissions as $visionandmission)
                    <p>{!! $visionandmission->mission !!}</p>
                    @endforeach
                </div>

                @if ($visionandmission->count() > 1)
                <div class="rs-faq-part pt-100 md-pt-70 md-pb-70">
                    <div class="isi">
                        <div class="content-part mb-50 md-mb-30">
                            <div class="title mb-40 md-mb-15">
                                <h3 class="text">Riwayat Visi dan Misi</h3>
                            </div>
                            <div id="accordion" class="accordion">
                                @foreach ($visionandmission2 as $visionandmission)
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse"
                                            href="#{{Str::slug($visionandmission->period)}}">{{ $visionandmission->period }}</a>
                                    </div>
                                    <div id="{{Str::slug($visionandmission->period)}}" class="collapse"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <h3>Visi</h3>
                                            <p>{!! $visionandmission->vision !!}</p>
                                            <h3>Misi</h3>
                                            <p>{!! $visionandmission->mission !!}</p>
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