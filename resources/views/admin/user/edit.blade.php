@extends('layouts.adminto')

@section('judulhalaman', 'User')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit User</h4>

            <div class="p-2">
                <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" class="form-horizontal"
                    role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                        <div class="col-md-10">
                            <input name="name" type="text" id="simpleinput"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">

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
                                class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Password</label>
                        <div class="col-md-10">
                            <input name="password" type="password" id="simpleinput"
                                class="form-control form-password @error('password') is-invalid @enderror" value="">
                            <input type="checkbox" class="form-checkbox mt-2"> Show password
                            @error('password')
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

@section('js')
<script type="text/javascript">
    $(document).ready(function(){		
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