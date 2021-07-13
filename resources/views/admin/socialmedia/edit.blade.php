@extends('layouts.adminto')

@section('judulhalaman', 'Sosial Media')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Sosial Media</h4>

            <div class="p-2">
                <form action="{{ route('socialmedia.update', ['id' => $socialmedia->id]) }}" method="POST"
                    class="form-horizontal" role="form">
                    @csrf

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Kolom</label>
                        <div class="col-md-10">
                            <select name="kolom" class="form-control @error('kolom') is-invalid @enderror"
                                value="{{ old('kolom') }}">
                                <option value="YouTube" {{ ($socialmedia->kolom == "YouTube") ? "selected" : "" }}>
                                    YouTube</option>
                                <option value="Facebook" {{ ($socialmedia->kolom == "Facebook") ? "selected" : "" }}>
                                    Facebook</option>
                                <option value="Instagram" {{ ($socialmedia->kolom == "Instagram") ? "selected" : "" }}>
                                    Instagram</option>
                                <option value="Twitter" {{ ($socialmedia->kolom == "Twitter") ? "selected" : "" }}>
                                    Twiteer</option>
                            </select>
                            @error('kolom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Nama Akun</label>
                        <div class="col-md-10">
                            <input name="title" type="text" id="simpleinput"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Masukkan Nama Akun" value="{{ $socialmedia->title }}">
                            <small id="emailHelp" class="form-text text-muted">Masukkan Nama Akun / Usernamenya</small>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Destinasi</label>
                        <div class="col-md-10">
                            <input name="destination" type="text" id="simpleinput"
                                class="form-control @error('destination') is-invalid @enderror"
                                placeholder="Masukkan Destinasi, contoh: https://www.instagram.com/_alvian.design/"
                                value="{{ $socialmedia->destination }}">
                            <small id="emailHelp" class="form-text text-muted">Masukkan Href dari konten
                                (Destinasinya)</small>
                            @error('destination')
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