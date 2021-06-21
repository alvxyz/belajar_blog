@extends('layouts.adminto')

@section('content')

<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card-box">

            <h4 class="header-title mt-0 mb-4">Total Berita</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1 float-left" dir="ltr">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#70B6DF "
                        data-bgColor="#B2E3FF" value="{{ count($posts) }}" data-skin="tron" data-angleOffset="180"
                        data-readOnly=true data-thickness=".15" />
                </div>

                <div class="widget-detail-1 text-right">
                    <h2 class="font-weight-normal pt-2 mb-1"> {{ count($posts) }} </h2>
                    <p class="text-muted mb-1">Total Berita</p>
                </div>
            </div>
        </div>

    </div><!-- end col -->

    <div class="col-xl-4 col-md-6">
        <div class="card-box">

            <h4 class="header-title mt-0 mb-4">Total Agenda</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1 float-left" dir="ltr">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#A1E457 "
                        data-bgColor="#DBFFB2" value="{{ count($agendas) }}" data-skin="tron" data-angleOffset="180"
                        data-readOnly=true data-thickness=".15" />
                </div>

                <div class="widget-detail-1 text-right">
                    <h2 class="font-weight-normal pt-2 mb-1"> {{ count($agendas) }} </h2>
                    <p class="text-muted mb-1">Total Agenda</p>
                </div>
            </div>
        </div>

    </div><!-- end col -->
    <div class="col-xl-4 col-md-6">
        <div class="card-box">

            <h4 class="header-title mt-0 mb-4">Total Repositori</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1 float-left" dir="ltr">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#E4A151 "
                        data-bgColor="#FFD49F" value="{{ count($repositories) }}" data-skin="tron"
                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                </div>

                <div class="widget-detail-1 text-right">
                    <h2 class="font-weight-normal pt-2 mb-1"> {{ count($repositories) }} </h2>
                    <p class="text-muted mb-1">Total Repositori</p>
                </div>
            </div>
        </div>

    </div><!-- end col -->

    <div class="col-xl-4 col-md-6">
        <div class="card-box">

            <h4 class="header-title mt-0 mb-4">Total Karya Terbaik</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1 float-left" dir="ltr">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#F9B9B9" value="{{ count($creations) }}" data-skin="tron" data-angleOffset="180"
                        data-readOnly=true data-thickness=".15" />
                </div>

                <div class="widget-detail-1 text-right">
                    <h2 class="font-weight-normal pt-2 mb-1"> {{ count($creations) }} </h2>
                    <p class=" text-muted mb-1">Total Karya Terbaik</p>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-4 col-md-6">
        <div class="card-box">

            <h4 class="header-title mt-0 mb-4">Total Slider</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1 float-left" dir="ltr">
                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                        data-bgColor="#F9B9B9" value="{{ count($sliders) }}" data-skin="tron" data-angleOffset="180"
                        data-readOnly=true data-thickness=".15" />
                </div>

                <div class="widget-detail-1 text-right">
                    <h2 class="font-weight-normal pt-2 mb-1"> {{ count($sliders) }} </h2>
                    <p class=" text-muted mb-1">Total Slider</p>
                </div>
            </div>
        </div>
    </div><!-- end col -->

</div>


@endsection