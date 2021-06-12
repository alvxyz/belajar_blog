@extends('frontend.layouts.app')

@section('title', 'Tentang Program Studi | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/tentang2.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Tentang Program Studi</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Tentang Program Studi</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Counter Section Start -->
    <div id="rs-about" class="rs-about style3 pt-100 pb-100 md-pt-70">
        <div class="container">
            <div class="fototentang">
                <img src={{ asset("images/tentangprodi/contoh1.jpg") }} alt="">

                <h3 class="mt-50">Tentang Prodi D3 Teknik Informatika Polnep</h3>
                <p>Seiring dengan kemajuan dan perkembangan Teknologi Informasi dan Komunikasi (TIK) di Indonesia pada
                    umumnya dan Kalimantan Barat pada khususnya, serta dalam menghadapi ASEAN Free Trade Area (AFTA),
                    tentunya memerlukan Sumber Daya Manusia yang mempunyai kompetensi sesuai dengan bidangnya
                    masing-masing.
                    <br>
                    <br>
                    Pendidikan merupakan salah satu solusi yang diperlukan untuk mencetak SDM yang handal dan
                    berkompeten didukung dengan perilaku yang bijak dan santun serta berkualitas.
                    <br>
                    <br>
                    Untuk memenuhi permintaan dan kebutuhan masyarakat terhadap perkembangan Teknologi Informasi dan
                    Komunikasi, maka berbekal pengalaman Kerjasama dengan Departemen Pendidikan Nasional dalam
                    melaksanakan pendidikan Pro-gram Beasiswa Unggulan Diploma/Training Teknisi Jardiknas di Politeknik
                    Negeri Pontianak dengan nama pendidikan program Diploma Tiga (D-3) Teknik Informatika, yang telah
                    menghasilkan lulusan siap pakai terutama untuk memelihara dan mengembangkan JARDIKNAS di Indonesia
                    pada umumnya dan Kalimantan Barat pada khususnya.
                </p>
            </div>

            <div class="tujuan">

                <h3 class="mt-50">Tujuan Program Studi Teknik Informatika</h3>
                <p>Seiring dengan kemajuan dan perkembangan Teknologi Informasi dan Komunikasi (TIK) di Indonesia pada
                    umumnya dan Kalimantan Barat pada khususnya, serta dalam menghadapi ASEAN Free Trade Area (AFTA),
                    tentunya memerlukan Sumber Daya Manusia yang mempunyai kompetensi sesuai dengan bidangnya
                    masing-masing.
                    <br>
                    <br>
                    Pendidikan merupakan salah satu solusi yang diperlukan untuk mencetak SDM yang handal dan
                    berkompeten didukung dengan perilaku yang bijak dan santun serta berkualitas.
                    <br>
                    <br>
                    Untuk memenuhi permintaan dan kebutuhan masyarakat terhadap perkembangan Teknologi Informasi dan
                    Komunikasi, maka berbekal pengalaman Kerjasama dengan Departemen Pendidikan Nasional dalam
                    melaksanakan pendidikan Pro-gram Beasiswa Unggulan Diploma/Training Teknisi Jardiknas di Politeknik
                    Negeri Pontianak dengan nama pendidikan program Diploma Tiga (D-3) Teknik Informatika, yang telah
                    menghasilkan lulusan siap pakai terutama untuk memelihara dan mengembangkan JARDIKNAS di Indonesia
                    pada umumnya dan Kalimantan Barat pada khususnya.
                </p>
            </div>
        </div>
    </div>
    <!-- Counter Section End -->

</div>

@endsection