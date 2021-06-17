@extends('frontend.layouts.app')

@section('title', 'Berita | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Main content Start -->
    <div class="main-content">

        <!-- Blog Section Start -->
        <div class="rs-inner-blog rs-color pt-50 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="blog-deatails">
                    <div class="bs-img text-center">
                        <a class="image-popup" href="{{ asset($post->featured) }}"><img
                                src="{{ asset($post->featured) }}" alt=""></a>
                    </div>
                    <div class="blog-full">
                        <ul class="single-post-meta">
                            <li>
                                <span class="p-date"> <i
                                        class="fa fa-calendar"></i>{{ $post->created_at->diffForHumans() }}</span>
                            </li>
                            <li>
                                <span class="p-date"> <i class="fa fa-user"></i> {{ $post->users->name }}</span>
                            </li>
                            <li class="Post-cate">
                                <div class="tag-line">
                                    <i class="fa fa-book"></i>
                                    <a
                                        href="{{ route('category.post', ['id' => $post->category_id]) }}">{{ $post->category->name }}</a>
                                </div>
                            </li>
                        </ul>
                        <div class="blog-desc">
                            <h3> {{ $post->title }} </h3>
                            {!! $post->content !!}
                        </div>

                    </div>
                </div>
                <div class="ps-navigation">
                    <div class="row">
                        <div class="col-6 text-left">
                            <ul>
                                @if($prev_post)
                                <li><a href="{{ route('berita.detail', ['slug' => $prev_post->slug]) }}"><span
                                            class="next-link"><i class="flaticon-left-arrow"></i> Berita
                                            Sebelumnya</span></a>
                                </li>
                                <li><a href="{{ route('berita.detail', ['slug' => $prev_post->slug]) }}"><span
                                            class="link-text">{{ $prev_post->title }}</span></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-6 text-right">
                            <ul>
                                @if($next_post)
                                <li><a href="{{ route('berita.detail', ['slug' => $next_post->slug]) }}"><span
                                            class="next-link">Berita Selanjutnya <i
                                                class="flaticon-right-arrow"></i></span></a>
                                </li>
                                <li><a href="{{ route('berita.detail', ['slug' => $next_post->slug]) }}"><span
                                            class="link-text">{{ $next_post->title }}</span></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="disqus_thread" class="pt-70"></div>
                <script>
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                    
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://teknik-informatika-politeknik-negeri-pontianak.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                        powered by
                        Disqus.</a></noscript>
            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Main content End -->
</div>

@endsection