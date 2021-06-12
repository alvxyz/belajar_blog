@extends('frontend.layouts.app')

@section('title', 'Berita | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="{{ asset('images/breadcrumb/berita2.jpg') }}" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Berita</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Berita</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Blog Section Start -->
    <div class="rs-inner-blog rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 order-last">
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
                        <div class="recent-posts mb-50">
                            <h3 class="widget-title">Recent Posts</h3>
                            <ul>
                                @foreach ($post_recent as $recent)
                                <li><a
                                        href="{{ route('berita.detail', ['slug' => $recent->slug]) }}">{{ $recent->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget-archives mb-50">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                                @foreach ($category as $category)
                                <li><a
                                        href="{{ route('category.post', ['id' => $category]) }}">{{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 pr-50">
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-lg-12 mb-70">
                            <div class="blog-item">
                                <div class="blog-img text-center">
                                    <a href="{{ route('berita.detail', ['slug' => $post->slug]) }}"><img
                                            src="{{ asset($post->featured) }}" alt="{{ $post->title }}"></a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title"><a
                                            href="{{ route('berita.detail', ['slug' => $post->slug]) }}">{!!
                                            $post->title !!}</a>
                                    </h3>
                                    <div class="blog-meta">
                                        <ul class="btm-cate">
                                            <li>
                                                <div class="blog-date">
                                                    <i class="fa fa-calendar"></i>
                                                    {{ $post->created_at->diffForHumans()}}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="author">
                                                    <i class="fa fa-user"></i> {{$post->users->name }}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="tag-line">
                                                    <i class="fa fa-book"></i>
                                                    <a
                                                        href="{{ route('category.post', ['id' => $post->category_id]) }}">{{ $post->category->name }}</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="blog-desc">
                                        {!! substr($post->content, 0, 200) !!}
                                    </div>
                                    <div class="blog-button">
                                        <a class="blog-btn"
                                            href="{{ route('berita.detail', ['slug' => $post->slug]) }}">Lanjutkan
                                            Membaca</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{ $posts->links() }}
            {{-- @include('admin.layouts.pagination', ['paginator' => $posts->appends(Request::except('page'))]) --}}
        </div>
    </div>
    <!-- Blog Section End -->

</div>

@endsection