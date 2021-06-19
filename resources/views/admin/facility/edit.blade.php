@extends('layouts.adminto')

@section('judulhalaman', 'Fasilitas')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Fasilitas</h4>

            <div class="p-2">
                <form action="{{ route('facility.update', ['id' => $facility->id]) }}" method="POST"
                    enctype="multipart/form-data" class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Nama Fasilitas</label>
                        <div class="col-md-10">
                            <input name="name" type="text" id="simpleinput"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Masukkan Nama Judul" value="{{ $facility->name }}">
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
                                rows="5" id="editor">{{ $facility->content }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Gambar</label>
                        <div class="col-md-10">
                            <input name="image" type="file" class="form-control @error('image') is-invalid @enderror">
                            <small id="emailHelp" class="form-text text-muted">Masukkan Gambar dengan Resolusi
                                1240x700px atau 16:9</small>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="col-md-2"></span>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- end row -->

@endsection