@extends('layouts.adminto')

@section('judulhalaman', 'Manajemen User')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Add User</h4>

            <div class="p-2">
                <form action="{{ route('user.store') }}" method="POST" class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Nama</label>
                        <div class="col-md-10">
                            <input name="name" type="text" id="simpleinput"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan Nama Pengguna">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Email</label>
                        <div class="col-md-10">
                            <input name="email" type="email" id="simpleinput"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan Email Pengguna">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="tag">Role</label>
                        <div class="col-md-10">
                            <select class="multiple-input" name="roles[]">
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <small id="emailHelp" class="form-text text-muted">Password Default sama dengan alamat
                                email</small>
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

@section('js')
<script>
    $(document).ready(function() {
        $('.multiple-input').select2();
    });
</script>
@endsection