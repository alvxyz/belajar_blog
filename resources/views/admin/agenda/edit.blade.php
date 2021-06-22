@extends('layouts.adminto')

@section('judulhalaman', 'Agenda')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Agenda</h4>

            <div class="p-2">
                <form action="{{ route('agenda.update', ['id' => $agenda->id]) }}" method="POST"
                    enctype="multipart/form-data" class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Judul Agenda</label>
                        <div class="col-md-10">
                            <input name="title" type="text" id="simpleinput"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Masukkan Nama Agenda" value="{{ $agenda->title }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Tempat</label>
                        <div class="col-md-10">
                            <input name="place" type="text" id="simpleinput"
                                class="form-control @error('place') is-invalid @enderror"
                                placeholder="Masukkan Nama Tempat" value="{{ $agenda->place }}">
                            @error('place')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Penyelenggara</label>
                        <div class="col-md-10">
                            <input name="organizer" type="text" id="simpleinput"
                                class="form-control @error('organizer') is-invalid @enderror"
                                placeholder="Masukkan Nama Penyelenggara" value="{{ $agenda->organizer }}">
                            @error('organizer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Tanggal Mulai</label>
                        <div class="col-md-10">
                            <input name="date_start" type="date" id="simpleinput"
                                class="form-control @error('date_start') is-invalid @enderror"
                                value="{{ $agenda->date_start }}">
                            @error('date_start')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Tanggal Selesai</label>
                        <div class="col-md-10">
                            <input name="date_end" type="date" id="simpleinput"
                                class="form-control @error('date_end') is-invalid @enderror"
                                value="{{ $agenda->date_end }}">
                            <small id="emailHelp" class="form-text text-muted">Kosongkan Jika Agenda Hanya Berlangsung 1
                                Hari</small>
                            @error('date_end')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Waktu Mulai</label>
                        <div class="col-md-10">
                            <input name="time_start" type="time" id="simpleinput"
                                class="form-control @error('time_start') is-invalid @enderror"
                                value="{{ $agenda->time_start }}">
                            @error('time_start')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Waktu Selesai</label>
                        <div class="col-md-10">
                            <input name="time_end" type="time" id="simpleinput"
                                class="form-control @error('time_end') is-invalid @enderror"
                                value="{{ $agenda->time_end }}">
                            @error('time_end')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Konten</label>
                        <div class="col-md-10">
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                                rows="5" id="editor">{{  $agenda->content }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Link Pendaftaran</label>
                        <div class="col-md-10">
                            <input name="link" type="url" id="simpleinput"
                                class="form-control @error('link') is-invalid @enderror"
                                placeholder="Masukkan URL Link Pendaftarn" value="{{ old('title') }}"
                                value="{{ $agenda->link }}">
                            <small id="emailHelp" class="form-text text-muted">Kosongkan Jika Agenda Tidak Memiliki Link
                                Pendaftaran</small>
                            @error('link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Gambar</label>
                        <div class="col-md-10">
                            <input name="image" type="file" class="form-control @error('image') is-invalid @enderror">
                            <small id="emailHelp" class="form-text text-muted">Masukkan Gambar dengan Resolusi Optimal
                                1240x699
                                px atau dengan Rasio 16:9</small>
                            @error('image')
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