@extends('layouts.adminto')

@section('judulhalaman', 'Akreditasi')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Akreditasi</h4>

            <div class="p-2">
                <form action="{{ route('accreditation.update', ['id' => $accreditation->id]) }}" method="POST"
                    class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Periode</label>
                        <div class="col-md-10">
                            <input name="period" type="text" id="simpleinput"
                                class="form-control @error('period') is-invalid @enderror"
                                placeholder="Masukkan Periode Akreditasi, contoh: Akreditasi Tahun 2021"
                                value="{{ $accreditation->period }}">
                            @error('period')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Akreditasi</label>
                        <div class="col-md-10">
                            <textarea name="accreditation"
                                class="form-control @error('accreditation') is-invalid @enderror" rows="5"
                                id="editor">{{ $accreditation->accreditation }}</textarea>
                            @error('accreditation')
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