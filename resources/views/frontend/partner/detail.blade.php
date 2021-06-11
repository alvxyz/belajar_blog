@extends('frontend.layouts.app')

@section('title', 'Kerja Sama | Teknik Informatika POLNEP')

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
                        <a class="image-popup" href="{{ asset($partner->image) }}"><img
                                src="{{ asset($partner->image) }}" alt=""></a>
                    </div>
                    <div class="blog-full">
                        <div class="blog-desc">
                            <h2> {{ $partner->name }} </h2>
                            <p>
                                {!! $partner->content !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Main content End -->
</div>

@endsection