@extends('layouts.adminto')

@section('judulhalaman', 'Profile')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Detail Profile</h4>

            <div class="p-2">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset($user->profile['avatar']) }}" width="250px" alt=" Belum Ada Gambar">
                    </div>
                    <div class="col-8">
                        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                <div class="col-md-10">
                                    <input name="name" type="text" id="simpleinput" class="form-control"
                                        value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Email</label>
                                <div class="col-md-10">
                                    <input name="email" type="text" id="simpleinput" class="form-control"
                                        value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Password</label>
                                <div class="col-md-10">
                                    <input name="password" type="password" id="simpleinput"
                                        class="form-control form-password @error('password') is-invalid @enderror"
                                        value="">
                                    <input type="checkbox" class="form-checkbox mt-2"> Show password
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">About</label>
                                <div class="col-md-10">
                                    <textarea name="about" type="text" id="simpleinput" class="form-control" rows="4"
                                        cols="50">{{ $user->profile['about'] }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label" for="simpleinput">Photo Profile</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="avatar" id="avatar">
                                    <small id="emailHelp" class="form-text text-muted">Masukkan Gambar dengan Rasio 1:1
                                        (Square)</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <span class="col-md-2"></span>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
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

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('.multiple-input').select2();		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.form-password').attr('type','text');
			}else{
				$('.form-password').attr('type','password');
			}
		});
	});
</script>
@endsection