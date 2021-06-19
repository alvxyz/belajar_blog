@extends('frontend.layouts.app')

@section('title', 'Pencarian | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{ asset('images/breadcrumb/berita2.jpg') }}" alt="Breadcrumbs Image">
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
                <form action="/search" method="GET">
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
                @if($posts->count() > 0)
                @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                    <div class="courses-item">
                        <div class="img-part">
                            <img src="{{ asset($post->featured) }}" alt=""
                                style="max-height: 210px; object-fit:cover; !important" class="img-fluid">
                        </div>
                        <div class="content-part">
                            <h3 class="title"><a href="{{ route('berita.detail', ['slug' => $post->slug]) }}">{!!
                                    substr($post->title, 0 , 100) !!}</a>
                            </h3>
                            <ul class="meta-part">
                                <li>
                                    <i class="fa fa-calendar-check-o"></i>
                                    {{ $post->created_at->diffForHumans()}}
                                </li>
                                <li>
                                    <i class="fa fa-user-o"></i> {{$post->users->name }}
                                </li>
                                <li>
                                    <i class="fa fa-book"></i>
                                    <a
                                        href="{{ route('category.post', ['id' => $post->category_id]) }}">{{ $post->category->name }}</a>
                                </li>

                            </ul>
                            <div class="blog-desc">
                                {!! substr($post->content, 0, 150) !!}
                            </div>
                            <div class="bottom-part">
                                <div class="btn-part">
                                    <a href="{{ route('berita.detail', ['slug' => $post->slug]) }}">Lanjutkan
                                        Membaca<i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12 text-center mt-50">
                    <img src="{{ asset('images/search/404.png') }}" alt="">
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Popular Courses Section End -->

</div>

@endsection