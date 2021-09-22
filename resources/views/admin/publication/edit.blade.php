@extends('layouts.adminto')

@section('judulhalaman', 'Publikasi')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Data Publikasi</h4>

            <div class="p-2">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('publication.update', ['id' => $publication->id])}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Judul</label>
                                <div class="col-md-10">
                                    <input name="title" type="text" id="simpleinput" class="form-control"
                                        value="{{ $publication->title }}" placeholder="Masukkan Judul Publikasi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Link Google Scholar</label>
                                <div class="col-md-10">
                                    <input name="link1" type="url" id="simpleinput"
                                        class="form-control @error('link1') is-invalid @enderror"
                                        value="{{ $publication->link1 }}">
                                    <small id=" emailHelp" class="form-text text-muted">Jika data tidak ada, dapat
                                        dikosongkan</small>

                                    @error('link1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Link Scopus</label>
                                <div class="col-md-10">
                                    <input name="link2" type="url" id="simpleinput" class="form-control"
                                        value="{{ $publication->link2 }}">
                                    <small id=" emailHelp" class="form-text text-muted">Jika data tidak ada, dapat
                                        dikosongkan</small>

                                    @error('link2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Link SINTA</label>
                                <div class="col-md-10">
                                    <input name="link3" type="url" id="simpleinput" class="form-control"
                                        value="{{ $publication->link3 }}">
                                    <small id=" emailHelp" class="form-text text-muted">Jika data tidak ada, dapat
                                        dikosongkan</small>

                                    @error('link3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Link Lainnya</label>
                                <div class="col-md-10">
                                    <input name="link4" type="url" id="simpleinput"
                                        class="form-control @error('link4') is-invalid @enderror"
                                        value="{{ $publication->link4 }}">
                                    <small id=" emailHelp" class="form-text text-muted">Jika data tidak ada, dapat
                                        dikosongkan</small>

                                    @error('link4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="col-md-2"></span>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary">Update Data Publikasi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- end row -->

@endsection