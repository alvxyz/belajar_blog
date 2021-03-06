@extends('layouts.adminto')

@section('judulhalaman', 'Rencana Pemebelajaran Semseter')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Add Rencana Pemebelajaran Semseter</h4>

            <div class="p-2">
                <form action="{{ route('lessonplan.store') }}" method="POST" class="form-horizontal" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Judul</label>
                        <div class="col-md-10">
                            <input name="curriculum" type="text" id="simpleinput"
                                class="form-control @error('curriculum') is-invalid @enderror"
                                placeholder="Masukkan Judul" required>
                            <small id="emailHelp" class="form-text text-muted">Contoh: Pemrograman Web | TIF42514 / 3
                                SKS</small>
                            @error('curriculum')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">File RPS</label>
                        <div class="col-md-10">
                            <input name="file" type="file" id="simpleinput"
                                class="form-control @error('file') is-invalid @enderror" placeholder="Masukkan File"
                                required>
                            <small id="emailHelp" class="form-text text-muted">Masukkan File dengan Format PDF,
                                Doc, Xls</small>

                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="col-md-2"></span>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary">Input Data</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div> <!-- end row -->

@endsection