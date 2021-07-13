<!-- Footer Start -->
<footer id="rs-footer" class="rs-footer"
    style="background-image: radial-gradient(circle at 80% 100%,#21A7D0,#273C66) !important">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <div class="footer-logo mb-20 mr-50">
                        <a href="/"><img style="min-height: 50px; max-width:233px !important"
                                src={{ asset("educavo/assets/images/logoputihhi.png") }} alt=""></a>
                    </div>
                </div>


                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget mb-50">
                    <h4 class="widget-title">Alamat</h4>
                    @php
                    $alamat = App\DetailContact::select('title', 'destination')->where('kolom',
                    'Alamat')->latest()->get();
                    $nomertelpon = App\DetailContact::select('title', 'destination')->where('kolom',
                    'NomerTelpon')->latest()->get();
                    $email = App\DetailContact::select('title', 'destination')->where('kolom',
                    'Email')->latest()->get();

                    $linkterkaits = App\DetailContact::select('title', 'destination')->where('kolom',
                    'LinkTerkait')->latest()->take(6)->get();

                    $lainnyas = App\DetailContact::select('title', 'destination')->where('kolom',
                    'Lainnya')->latest()->take(6)->get();

                    $youtube = App\SocialMedia::select('title', 'destination')->where('kolom',
                    'YouTube')->latest()->take(1)->get();
                    $facebook = App\SocialMedia::select('title', 'destination')->where('kolom',
                    'Facebook')->latest()->take(1)->get();
                    $instagram = App\SocialMedia::select('title', 'destination')->where('kolom',
                    'Instagram')->latest()->take(1)->get();
                    $twiteer = App\SocialMedia::select('title', 'destination')->where('kolom',
                    'Twiteer')->latest()->take(1)->get();
                    @endphp

                    <ul class="address-widget">
                        @foreach ($alamat as $dataalamat)
                        <li>
                            <i class="flaticon-location"></i>
                            <div class="desc"> <a href="{{ $dataalamat->destination }}"
                                    target="blank">{{ $dataalamat->title }}</a>
                            </div>
                        </li>
                        @endforeach
                        @foreach ($nomertelpon as $datatelpon)
                        <li>
                            <i class="flaticon-call"></i>
                            <div class="desc">
                                <a href="tel:{{ $datatelpon->destination }}">{{ $datatelpon->title }}</a>
                            </div>
                        </li>
                        @endforeach

                        @foreach ($email as $dataemail)
                        <li>
                            <i class="flaticon-email"></i>
                            <div class="desc">
                                <a href="mailto:{{ $dataemail->destination }}">{{ $dataemail->title }}</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <h4 class="widget-title">Link Terkait</h4>
                    <ul class="site-map">
                        @foreach ($linkterkaits as $linkterkait)
                        <li><a href="{{ $linkterkait->destination }}" target="blank">{{ $linkterkait->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                    <h4 class="widget-title">Lainnya</h4>
                    <ul class="site-map">
                        <li><a href="{{ route('panduan') }}" target="blank">Panduan</a></li>
                        @foreach ($lainnyas as $lainnya)
                        <li><a href="{{ $lainnya->destination }}" target="blank">{{ $lainnya->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-8 md-mb-20">
                    <div class="copyright md-text-left">
                        <p>&copy; 2009-2021 Teknik Informatika POLNEP | Dibangun oleh Ahmad R dan dikembangkan oleh<a
                                style="color: white !important" href="https://www.instagram.com/_alvian.design/"> Alvian
                                Putra</a></p>
                    </div>
                </div>
                <div class="col-lg-4 text-right md-text-left">
                    <ul class="footer-social">
                        @if($youtube->count() > 0)
                        @foreach ($youtube as $datayoutube)
                        <li><a href="{{ $datayoutube->destination }}" target="blank"><i
                                    class="fa fa-youtube-play"></i></a>
                        </li>
                        @endforeach
                        @endif

                        @if($facebook->count() > 0)
                        @foreach ($facebook as $datafacebook)
                        <li><a href="{{ $datafacebook->destination }}"><i class="fa fa-facebook"></i></a></li>
                        @endforeach
                        @endif

                        @if($instagram->count() > 0)
                        @foreach ($instagram as $datainstagram)
                        <li><a href="{{ $datainstagram->destination }}"><i class="fa fa-instagram"></i></a></li>
                        @endforeach
                        @endif

                        @if($twiteer->count() > 0)
                        @foreach ($twiteer as $datatwiteer)
                        <li><a href="{{ $datatwiteer->destination }}}"><i class="fa fa-twitter"></i></a></li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->