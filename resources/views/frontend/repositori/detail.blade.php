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
                    {{-- <div class="row mb-5">
                        <embed src="{{ url($repositories->file) }}" type="">
                </div> --}}
                <div class="row">
                    <div class="col-6">
                        <h6>{{ $repositories->title }}</h6>
                    </div>
                    <div class="col-6 text-right">
                        <a type="button" href="{{ route('repositori.download', ['id' => $repositories->id]) }}"
                            class="btn btn-primary"><i class="fa fa-arrow-circle-down"></i>
                            Download</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Popular Courses Section End -->

</div>

@endsection