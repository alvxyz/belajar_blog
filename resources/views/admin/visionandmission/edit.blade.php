@extends('layouts.adminto')

@section('judulhalaman', 'Visi dan Misi')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Visi dan Misi</h4>

            <div class="p-2">
                <form action="{{ route('visionandmission.update', ['id' => $visionandmission->id]) }}" method="POST"
                    class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Periode</label>
                        <div class="col-md-10">
                            <input name="period" type="text" id="simpleinput"
                                class="form-control @error('period') is-invalid @enderror"
                                placeholder="Masukkan Periode Visi dan Misi, contoh: Visi Misi Tahun 2021"
                                value="{{ $visionandmission->period }}">
                            @error('period')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Visi</label>
                        <div class="col-md-10">
                            <textarea name="vision" class="form-control @error('vision') is-invalid @enderror" rows="5"
                                id="editor">{{ $visionandmission->vision }}</textarea>
                            @error('vision')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Misi</label>
                        <div class="col-md-10">
                            <textarea name="mission" class="form-control @error('mission') is-invalid @enderror"
                                rows="5" id="editor2">{{ $visionandmission->mission }}</textarea>
                            @error('mission')
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