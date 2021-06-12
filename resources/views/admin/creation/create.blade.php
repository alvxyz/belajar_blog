@extends('layouts.adminto')

@section('judulhalaman', 'Karya')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Add Karya</h4>

            <div class="p-2">
                <form action="{{ route('creation.store') }}" method="POST" enctype="multipart/form-data"
                    class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Judul Karya</label>
                        <div class="col-md-10">
                            <input name="title" type="text" id="simpleinput"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Masukkan Nama Karya" value="{{ old('title') }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Kategori Karya</label>
                        <div class="col-md-10">
                            <select name="category_creation_id"
                                class="form-control @error('category_creation_id') is-invalid @enderror"
                                value="{{ old('category_creation_id') }}">
                                <option value="">Pilih Kategori Karya</option>
                                @foreach ($category_creations as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_creation_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Pembuat Karya</label>
                        <div class="col-md-10">
                            <input name="creator"
                                class="form-control @error('creator') is-invalid @enderror">{{ old('creator') }}
                            @error('creator')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Gelar / Posisi</label>
                        <div class="col-md-10">
                            <input name="position"
                                class="form-control @error('position') is-invalid @enderror">{{ old('position') }}
                            @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Content</label>
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
                        <label class="col-md-2 col-form-label" for="simpleinput">Gambar</label>
                        <div class="col-md-10">
                            <input name="image" type="file" class="form-control @error('image') is-invalid @enderror">
                            <small id="emailHelp" class="form-text text-muted">Masukkan Gambar dengan Rasio 16:9</small>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Link Video</label>
                        <div class="col-md-10">
                            <input name="video" type="url"
                                class="form-control @error('video') is-invalid @enderror">{{ old('video') }}
                            @error('video')
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