@extends('layouts.adminto')

@section('judulhalaman', 'Mata Kuliah')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Add Mata Kuliah</h4>

            <div class="p-2">
                <form action="{{ route('subject.store') }}" method="POST" class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Kurikulum</label>
                        <div class="col-md-10">
                            <input name="curriculum" type="text" id="simpleinput"
                                class="form-control @error('curriculum') is-invalid @enderror"
                                placeholder="Masukkan Kurikulum" value="{{ old('curriculum') }}">
                            @error('curriculum')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Mata Kuliah</label>
                        <div class="col-md-10">
                            <textarea name="subject" class="form-control @error('subject') is-invalid @enderror"
                                rows="5" id="editor">{{ old('subject') }}</textarea>
                            @error('subject')
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