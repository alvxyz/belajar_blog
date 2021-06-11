@extends('frontend.layouts.app')

@section('title', 'Detail Repositori | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">

    <!-- Popular Courses Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses style3 rs-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-10">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <h2>{{ $repositories->title }}</h2>
                        </div>
                        <div class="col-lg-6 col-md-12 btn-download text-right">
                            <a type="button" href="{{ route('repositori.download', ['id' => $repositories->id]) }}"
                                class="btn-alvian"><i class="fa fa-arrow-circle-down"></i>
                                Download</a>
                        </div>
                    </div>

                    <div class="isi mt-3">
                        <p>{{ $repositories->content }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Popular Courses Section End -->

</div>

@endsection