@extends('layouts.adminto')

@section('judulhalaman', 'Dosen')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Detail Data Dosen</h4>

            <div class="p-2">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('lecturer.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Biografi</label>
                                <div class="col-md-10">
                                    <textarea name="biography" type="text" id="simpleinput" class="form-control"
                                        value="" placeholder="Data Biografi" cols="10"
                                        rows="10">{{ $user->lecturer['biography'] }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Riwayat Pendidikan</label>
                                <div class="col-md-10">
                                    <textarea name="education" class="form-control" rows="5" id="editor"
                                        placeholder="Riwayat Pendidikan">{{ $user->lecturer['education'] }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Minat Penelitian</label>
                                <div class="col-md-10">
                                    <input name="research" type="text" id="simpleinput" class="form-control"
                                        value="{{ $user->lecturer['research'] }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Bidang Keahlian</label>
                                <div class="col-md-10">
                                    <input name="expertise" type="text" id="simpleinput" class="form-control"
                                        value="{{ $user->lecturer['expertise'] }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="col-md-2"></span>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary">Update Data Dosen</button>
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