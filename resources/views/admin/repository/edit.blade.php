@extends('layouts.adminto')

@section('judulhalaman', 'Repository')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Repository <strong>{{ $repository->title }}</strong></h4>

            <div class="p-2">
                <form action="{{ route('repository.update', ['id' => $repository->id]) }}" method="POST"
                    class="form-horizontal" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Nama File</label>
                        <div class="col-md-10">
                            <input name="title" type="text" id="simpleinput"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Insert Category Name" value="{{ $repository->title }}" required>

                            @error('title')
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
                                class="form-control @error('name') is-invalid @enderror">

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
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div> <!-- end row -->

@endsection