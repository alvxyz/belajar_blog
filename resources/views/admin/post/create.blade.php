@extends('layouts.adminto')

@section('judulhalaman', 'Berita')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Add Post</h4>

            <div class="p-2">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data"
                    class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Judul</label>
                        <div class="col-md-10">
                            <input name="title" type="text" id="simpleinput"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul"
                                value="{{ old('title') }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Kategori</label>
                        <div class="col-md-10">
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror"
                                value="{{ old('category_id') }}">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="tag">Tag</label>
                        <div class="col-md-10">
                            <select class="multiple-input" name="tags[]" multiple="multiple">
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Konten</label>
                        <div class="col-md-10">
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                                rows="10" id="editor">{{ old('content') }}</textarea>
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
                            <input name="featured" type="file"
                                class="form-control @error('featured') is-invalid @enderror">
                            <small id="emailHelp" class="form-text text-muted">Masukkan Gambar dengan Resolusi Optimal
                                1240x699
                                px atau dengan Rasio 16:9</small>
                            @error('content')
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

@section('js')
<script>
    $(document).ready(function() {
        $('.multiple-input').select2();
    });
</script>
@endsection