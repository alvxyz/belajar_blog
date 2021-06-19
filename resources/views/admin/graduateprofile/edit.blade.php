@extends('layouts.adminto')

@section('judulhalaman', 'Profil Lulusan')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Profil Lulusan</h4>

            <div class="p-2">
                <form action="{{ route('graduateprofile.update', ['id' => $graduateprofile->id]) }}" method="POST"
                    class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Periode</label>
                        <div class="col-md-10">
                            <input name="period" type="text" id="simpleinput"
                                class="form-control @error('period') is-invalid @enderror"
                                placeholder="Masukkan Periode Profil Lulusan, contoh: Profil Lulusan Tahun 2021"
                                value="{{ $graduateprofile->period }}">
                            <small id="emailHelp" class="form-text text-muted">Masukkan Gabungan Teks dan Angka (Profil
                                Lulusan Tahun 2021)</small>
                            @error('period')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Profil Lulusan</label>
                        <div class="col-md-10">
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                                rows="5" id="editor">{{ $graduateprofile->content }}</textarea>
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
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- end row -->

@endsection