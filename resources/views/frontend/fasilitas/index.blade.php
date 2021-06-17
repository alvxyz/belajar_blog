@extends('frontend.layouts.app')

@section('title', 'Fasilitas | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/tentang2.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Fasilitas</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Fasilitas</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Counter Section Start -->
    <div id="rs-about" class="rs-about style3 pt-100 pb-100 md-pt-70">
        <div class="container">

            {{-- <div class="row align-self-center">
                <div class="col">
                    <p class="text-center">Demi mendukung kegiatan akademik yang berkualitas, Program Studi Teknik
                        Informatika Politeknik Negeri
                        Pontianak memiliki Dosen yang berpengalaman dan ahli dibidangnya, berikut data Dosen Program
                        Studi
                        Teknik Informatika Politeknik Negeri Pontianak :</p>
                </div>
            </div> --}}

            @foreach ($facilities as $facility)
            <div class="row mt-100">
                <div class="col-lg-6 col-md-12 md-mb-30 text-center">
                    <img src="{{ asset($facility->image == '' ? 'images/default/default_picture.png' : $facility->image) }}"
                        alt="Image Kosong" style="max-width:400px;  border-radius: 3px">
                </div>
                <div class="col-lg-6 col-md-12 md-mb-30">
                    <div class="sec-title2">
                        <h2 class="mb-20">{{ $facility->name }}</h2>
                        <p class="desc mb-25">{!! substr($facility->content, 0, 200) !!}</p>
                        <a href="{{ route('fasilitas.detail', ['slug' => $facility->slug]) }}" class="text-bold">Lihat
                            Selengkapnya
                            <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="jarak mt-100"></div>

            {{ $facilities->links() }}

        </div>
    </div>
    <!-- Counter Section End -->

</div>

@endsection