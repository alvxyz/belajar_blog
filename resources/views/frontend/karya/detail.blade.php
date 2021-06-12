@extends('frontend.layouts.app')

@section('title', 'Karya | Teknik Informatika POLNEP')

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
                        <a class="image-popup" href="{{ asset($creation->image) }}"><img
                                src="{{ asset($creation->image) }}" alt=""></a>
                    </div>
                    <div class="blog-full">
                        <ul class="single-post-meta">
                            <li class="mr-3">
                                <span class="p-date"><i class="fa fa-user" aria-hidden="true"></i>
                                    {{$creation->creator}}</span>
                            </li>
                            <li>
                                <span class="p-date"> <i class="fa fa-book"></i>
                                    {{ $creation->category_creation->name }}</span>
                            </li>
                        </ul>
                        <div class="blog-desc">
                            <h3> {{ $creation->title }} </h3>
                            <p>
                                {!! $creation->content !!}
                            </p>
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