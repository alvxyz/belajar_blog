@extends('frontend.layouts.app')

@section('title', 'Agenda | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{ asset('images/breadcrumb/agenda2.jpg') }}" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Agenda</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Agenda</li>
            </ul>
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
                @foreach ($agendas as $agenda_data)
                <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                    <div class="courses-item">
                        <div class="img-part">
                            <img src="{{ asset($agenda_data->image) }}" alt=""
                                style="max-height: 210px; object-fit:cover; !important" class="img-fluid">
                        </div>
                        <div class="content-part">
                            <h3 class="title"><a href="{{ route('agenda.detail', ['slug' => $agenda_data->slug]) }}">{!!
                                    substr($agenda_data->title, 0 , 100) !!}</a>
                            </h3>
                            <ul class="meta-part">
                                <li>
                                    <i class="fa fa-map-marker mr-7" aria-hidden="true"></i>
                                    {{$agenda_data->place}}
                                </li>
                            </ul>
                            <div class="blog-desc">
                                {!! substr($agenda_data->content, 0, 150) !!}
                            </div>
                            <div class="bottom-part">
                                <div class="info-meta">
                                    <i class="fa fa-calendar-check-o mr-7"></i>
                                    {{ Carbon\Carbon::parse($agenda_data->date)->isoFormat('Do MMMM YYYY') }}
                                </div>
                                <div class="btn-part">
                                    <a href="{{ route('agenda.detail', ['slug' => $agenda_data->slug]) }}">Lihat
                                        Agenda<i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $agendas->links() }}
        </div>
    </div>
    <!-- Popular Courses Section End -->

</div>

@endsection