@extends('frontend.layouts.app')

@section('title', 'Agenda | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/Agenda.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h4 class="text-white">Hasil Pencarian</h4>
            <h1 class="page-title">"{{ $data }}"</h1>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Popular Courses Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses style3 rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="widget-area">
                <form action="{{ route('agenda.cari.work') }}" method="GET">
                    <div class="search-widget mb-50">
                        <div class="search-wrap">
                            <input type="text" placeholder="Pencarian..." name="data" id="data"
                                class="form-control pencarian" value="">
                            <button type="submit"><i class=" flaticon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                @foreach ($agendas as $agenda)
                <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                    <div class="courses-item">
                        <div class="img-part">
                            <img src="{{ asset($agenda->image) }}" alt=""
                                style="max-height: 210px; object-fit:cover; !important" class="img-fluid">
                        </div>
                        <div class="content-part">
                            <h3 class="title"><a href="{{ route('agenda.detail', ['slug' => $agenda->slug]) }}">{!!
                                    substr($agenda->title, 0 , 100) !!}</a>
                            </h3>
                            <ul class="meta-part">
                                <li>
                                    <i class="fa fa-map-marker mr-7" aria-hidden="true"></i>
                                    {{$agenda->place}}
                                </li>
                            </ul>
                            <div class="blog-desc">
                                {!! substr($agenda->content, 0, 150) !!}
                            </div>
                            <div class="bottom-part">
                                <div class="info-meta">
                                    <i class="fa fa-calendar-check-o mr-7"></i> {{ $agenda->date }}
                                </div>
                                <div class="btn-part">
                                    <a href="{{ route('agenda.detail', ['slug' => $agenda->slug]) }}">Lihat
                                        Agenda<i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
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