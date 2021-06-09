@extends('frontend.layouts.app')

@section('title', 'Repositori | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset("images/tentangprodi/breadcrumbtentang.jpg") }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h4 class="text-white">Hasil Pencarian</h4>
            <h1 class="page-title">"{{ $query }}"</h1>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Popular Courses Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses style3 rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="widget-area">
                <form action="/repositori/search" method="GET">
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
                @foreach ($repositories as $repository)
                <div class="col-lg-12 mb-10">
                    <div class="card-repository">
                        <div class="selected">
                            <a href="{{ route('repositori.detail', ['id' => $repository->id]) }}">
                                <h6><i class="fa fa-file-text" aria-hidden="true"></i> {{ $repository->title }}</h6>
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Popular Courses Section End -->

</div>

@endsection