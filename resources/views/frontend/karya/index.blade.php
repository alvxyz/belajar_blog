@extends('frontend.layouts.app')

@section('title', 'Karya | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{ asset('images/breadcrumb/mahasiswa3.jpg') }}" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Karya</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Karya</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->



    <!-- Popular Courses Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses style1 rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="gridFilter text-center mb-50">
                <button class="active" data-filter="*">SEMUA</button>
                @foreach ($categorycreations as $category)
                <button data-filter=".{{Str::slug($category->name)}}">{{ Str::upper($category->name)}}</button>
                @endforeach
                {{-- <button data-filter=".filter2">BUSINESS</button>
                <button data-filter=".filter3">HUMANITIES</button>
                <button data-filter=".filter4">DIPLOMA</button> --}}
            </div>
            <div class="row grid">
                @foreach ($creations as $creation)
                <div class="col-lg-4 col-md-6 grid-item {{ Str::slug($creation->category_creation->name)}}">
                    <div class="courses-item mb-30">
                        <div class="img-part">
                            <a href="{{ route('karya.detail', ['slug' => $creation->slug]) }}"><img
                                    src="{{ asset($creation->image) }}" alt=""
                                    style="max-height: 250px; object-fit:cover; !important" class="img-fluid"> </a>
                        </div>
                        <div class="content-part">
                            <ul class="meta-part">
                                <li class="user"><i class="fa fa-user mr-2"></i> {{ $creation->creator }}</li>
                            </ul>
                            <h3 class="title">
                                <a href="{{ route('karya.detail', ['slug' => $creation->slug]) }}">{!!
                                    $creation->title !!}</a>
                            </h3>
                            <div class="desc"> {!! substr($creation->content, 0, 200) !!}</div>
                            <div class="bottom-part">
                                <div class="info-meta">
                                    <ul>
                                        <li><i class="fa fa-book mr-2"></i> {{ $creation->category_creation->name }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-part">
                                    <a href="{{ route('karya.detail', ['slug' => $creation->slug]) }}"><i
                                            class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{ $creations->links() }}
        </div>
    </div>
    <!-- Popular Courses Section End -->

</div>

@endsection