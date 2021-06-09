@extends('frontend.layouts.app')

@section('title', 'Dosen | Teknik Informatika POLNEP')

@section('content')

@include('frontend.layouts.navbar')

<div class="main-content">

    <!-- Counter Section Start -->
    <div id="rs-about mt-3" class="rs-about style3 pt-100 pb-100 md-pt-70">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-12 md-mb-30 text-center">
                    <img src="{{ asset($dosen->profile['avatar'] == '' ? 'images/default/default_picture.png' : $dosen->profile['avatar']) }}"
                        alt="Image Kosong" style="max-width:300px;  border-radius: 5px">
                </div>

                <div class="col-lg-8 col-md-12 md-mb-30">
                    <div class="sec-title2">
                        <h2 class="mb-30">{{ $dosen->name }}</h2>
                        <h5 class="mb-20 font-blue">Biografi</h5>
                        <p class="desc mb-25">{{ $dosen->lecturer['biography'] }}</p>

                        <h5 class="mb-20 font-blue">Riwayat Pendidikan</h5>
                        <ul>
                            {!! $dosen->lecturer['education'] !!}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mt-70">
                <div class="col-lg-12 col-md-12 md-mb-30">
                    <h5 class="mb-20 font-blue">Publikasi Pilihan</h5>
                    <!-- Faq Section Start -->
                    <div class="rs-faq-part style1 pb-70 md-pb-50">
                        <div class="col-lg-12 padding-0">
                            <div class="main-part">
                                <div class="faq-content">
                                    <div id="accordion" class="accordion">
                                        <div class="card">
                                            @foreach ($lecturer as $data)
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse"
                                                    href="#collapseOne">{{ $data->publication->link1}}</a>
                                            </div>
                                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <a type="button" class="readon-publikasi">Google
                                                        Scholar</a>
                                                    <a type=" button" class="readon-publikasi">Google
                                                        Scholar</a>
                                                    <a type=" button" class="readon-publikasi">Google
                                                        Scholar</a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" col-lg-8 col-md-12 md-mb-30">
                <h5 class="mb-20 font-blue">Minat Penelitian</h5>
                <p class="desc">{{ $dosen->lecturer['research'] }}</p>
            </div>

            <div class="col-lg-8 col-md-12 md-mb-30">
                <h5 class="mb-20 font-blue">Bidang Keahlian</h5>
                <p class="desc">{{ $dosen->lecturer['expertise'] }}</p>
            </div>


        </div>
    </div>
    <!-- Counter Section End -->

</div>

@endsection