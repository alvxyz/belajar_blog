@extends('frontend.layouts.app')

@section('title', 'Dosen | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset("images/tentangprodi/breadcrumbtentang.jpg") }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Dosen</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Dosen</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Counter Section Start -->
    <div id="rs-about" class="rs-about style3 pt-100 pb-100 md-pt-70">
        <div class="container">

            <div class="row align-self-center">
                <div class="col">
                    <p class="text-center">Demi mendukung kegiatan akademik yang berkualitas, Program Studi Teknik
                        Informatika Politeknik Negeri
                        Pontianak memiliki Dosen yang berpengalaman dan ahli dibidangnya, berikut data Dosen Program
                        Studi
                        Teknik Informatika Politeknik Negeri Pontianak :</p>
                </div>
            </div>

            @foreach ($dosen as $data_dosen)
            <div class="row mt-5">
                <div class="col-lg-6 col-md-12 md-mb-30 text-center">
                    <img src="{{ asset($data_dosen->profile['avatar'] == '' ? 'images/default/default_picture.png' : $data_dosen->profile['avatar']) }}"
                        alt="Image Kosong" style="max-width:300px;  border-radius: 5px">
                </div>
                <div class="col-lg-6 col-md-12 md-mb-30">
                    <div class="sec-title2">
                        <h2 class="mb-20">{{ $data_dosen->name }}</h2>
                        <p class="desc mb-25">{{ $data_dosen->lecturer['biography'] }}</p>
                        <a href="{{ route('dosen.detail', ['id' => $data_dosen->id]) }}" class="text-bold">Lihat
                            Selengkapnya
                            <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="jarak mt-100"></div>

            {{ $dosen->links() }}

        </div>
    </div>
    <!-- Counter Section End -->

</div>

@endsection