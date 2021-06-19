@extends('layouts.adminto')

@section('judulhalaman', 'Kompetensi Lulusan')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Add Kompetensi Lulusan</h4>

            <div class="p-2">
                <form action="{{ route('competence.store') }}" method="POST" class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Periode</label>
                        <div class="col-md-10">
                            <input name="period" type="text" id="simpleinput"
                                class="form-control @error('period') is-invalid @enderror"
                                placeholder="Masukkan Periode Kompetensi, contoh: Kompetensi Tahun 2021"
                                value="{{ old('title') }}">
                            <small id="emailHelp" class="form-text text-muted">Masukkan Gabungan Teks dan Angka
                            </small>
                            @error('period')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Kompetensi Lulusan</label>
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