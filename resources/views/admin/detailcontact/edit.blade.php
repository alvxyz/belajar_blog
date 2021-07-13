@extends('layouts.adminto')

@section('judulhalaman', 'Detail Footer')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Detail Footer</h4>

            <div class="p-2">
                <form action="{{ route('detailcontact.update', ['id' => $detailcontact->id]) }}" method="POST"
                    class="form-horizontal" role="form">
                    @csrf

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Kolom</label>
                        <div class="col-md-10">
                            <select name="kolom" class="form-control @error('kolom') is-invalid @enderror"
                                value="{{ old('kolom') }}">
                                <option value="Alamat" {{ ($detailcontact->kolom == "Alamat") ? "selected" : "" }}>
                                    Alamat
                                </option>
                                <option value="NomerTelpon"
                                    {{ ($detailcontact->kolom == "NomerTelpon") ? "selected" : "" }}>
                                    Nomer Telepon</option>
                                <option value="Email" {{ ($detailcontact->kolom == "Email") ? "selected" : "" }}>Email
                                </option>
                                <option value="LinkTerkait"
                                    {{ ($detailcontact->kolom == "LinkTerkait") ? "selected" : "" }}>Link Terkait
                                </option>
                                <option value="Lainnya" {{ ($detailcontact->kolom == "Lainnya") ? "selected" : "" }}>
                                    Lainnya</option>
                            </select>
                            @error('kolom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Judul</label>
                        <div class="col-md-10">
                            <input name="title" type="text" id="simpleinput"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Kalimat"
                                value="{{ $detailcontact->title }}">
                            <small id="emailHelp" class="form-text text-muted">Masukkan Alamat, No Handphone, dan Email
                                sesuai urutan 1-3 di data</small>
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
                                placeholder="Masukkan Destinasi, contoh: https://goo.gl/maps/4u3MVWwyyECD8FG8A"
                                value="{{ $detailcontact->destination }}">
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