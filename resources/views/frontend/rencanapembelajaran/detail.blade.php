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

                    {{-- <div class="row">
                        <iframe
                            src="http://docs.google.com/gview?embedded=true&url={{ asset($lessonplans->file)}}&embedded=true"
                    style="width:600px; height:500px;" frameborder="0">
                    </iframe>
                </div>
                <div class="row">
                    <iframe
                        src="https://drive.google.com/viewerng/viewer?url=http://docs.google.com/fileview?id=0B5ImRpiNhCfGZDVhMGEyYmUtZTdmMy00YWEyLWEyMTQtN2E2YzM3MDg3MTZh&hl=en&pid=explorer&efh=false&a=v&chrome=false&embedded=true"
                        frameborder="0"></iframe>
                </div>
                <div class="row">
                    <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{ asset($lessonplans->file)}}'
                        width='px' height='px' frameborder='0'>
                    </iframe>
                </div> --}}

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <h2>{{ $lessonplan->curriculum }}</h2>
                    </div>
                    <div class="col-lg-6 col-md-12 btn-download text-right">
                        <a type="button" href="{{ route('rencanapembelajaran.download', ['id' => $lessonplan->id]) }}"
                            class="btn-alvian"><i class="fa fa-arrow-circle-down"></i>
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