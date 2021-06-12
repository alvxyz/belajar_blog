@extends('frontend.layouts.app')

@section('title', 'Visi dan Misi | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src={{ asset('images/breadcrumb/tentang2.jpg') }} alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">Visi dan Misi</h1>
            <ul>
                <li>
                    <a class="active blue-color" href="/">Beranda</a>
                </li>
                <li>Visi dan Misi</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Counter Section Start -->
    <div id="rs-about" class="rs-about style3 pt-100 pb-100 md-pt-70">
        <div class="container">

            <div class="search-widget mb-50">
                <div class="search-wrap">
                    <input type="search" placeholder="Searching..." name="s" class="search-input" value="">
                    <button type="submit" value="Search"><i class=" flaticon-search"></i></button>
                </div>
            </div>

            <div class="fototentang">
                <img src={{ asset("images/tentangprodi/contoh1.jpg") }} alt="">

                <h3 class="mt-50">Tentang Prodi D3 Teknik Informatika Polnep</h3>
                <p>Consequat do voluptate sunt id irure. Laboris sunt aute ad nostrud sint culpa ullamco aute occaecat.
                    Commodo proident ipsum magna consequat tempor et. Voluptate sit qui consectetur duis occaecat
                    commodo anim nulla eiusmod nostrud mollit et. Minim duis in cillum deserunt sint velit officia magna
                    quis cupidatat nostrud ut. Excepteur eu adipisicing fugiat adipisicing nostrud est esse in aliquip
                    nostrud proident enim sunt. Adipisicing incididunt velit et eiusmod enim deserunt mollit. Minim
                    irure sint deserunt culpa esse reprehenderit culpa ullamco dolor. Et consequat veniam nulla eiusmod
                    elit est irure. Minim irure sint deserunt culpa esse reprehenderit culpa ullamco dolor. Et consequat
                    veniam nulla eiusmod elit est irure. Minim irure sint deserunt culpa esse reprehenderit culpa
                    ullamco dolor. Et consequat veniam nulla eiusmod elit est irure. </p>
            </div>


        </div>
    </div>
    <!-- Counter Section End -->

</div>

@endsection