@extends('frontend.layouts.app')

@section('title', 'Rencana Pembelajaran Semester | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{ asset('images/breadcrumb/kurikulum2.jpg') }}" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="text-white page-title">Rencana Pembelajaran Semester</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Rencana Pembelajaran Semester</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Popular Courses Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses style3 rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="widget-area">
                <form action="/rencanapembelajaran/cari" method="GET">
                    <div class="search-widget mb-50">
                        <div class="search-wrap">
                            <input type="text" placeholder="Pencarian..." name="query" id="query"
                                class="form-control pencarian" value="">
                            <button type="submit"><i class=" flaticon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                @foreach ($lessonplans as $lessonplan)
                <div class="col-lg-12 mb-10">
                    <div class="card-repository">
                        <a href="{{ route('rencanapembelajaran.detail', ['slug' => $lessonplan->slug]) }}">
                            <span class="font-h6"><i class="fa fa-file-text mr-40" aria-hidden="true"></i>
                                {{ $lessonplan->curriculum }}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="jarak mt-100"></div>
            {{ $lessonplans->links() }}
        </div>
    </div>
    <!-- Popular Courses Section End -->

</div>

@endsection