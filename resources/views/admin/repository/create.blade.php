@extends('layouts.adminto')

@section('judulhalaman', 'Repositori')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Add Repositori</h4>

            <div class="p-2">
                <form action="{{ route('repository.store') }}" method="POST" class="form-horizontal" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Nama File</label>
                        <div class="col-md-10">
                            <input name="title" type="text" id="simpleinput"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan Nama File" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Konten</label>
                        <div class="col-md-10">
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                                rows="5" id="editor">{{ old('content') }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">File</label>
                        <div class="col-md-10">
                            <input name="file" type="file" id="simpleinput"
                                class="form-control @error('file') is-invalid @enderror" placeholder="Insert file name"
                                required>
                            <small id="emailHelp" class="form-text text-muted">Masukkan File dengan Format PDF</small>

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