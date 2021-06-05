@extends('layouts.adminto')

@section('judulhalaman', 'User')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">List User</h4>
                    <p>Daftar user yang telah tersimpan</p>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('user.create') }}" type="button" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i> Add
                        User</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($users as $user)
                    <?php $no++ ?>
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-info"><i
                                    class="mdi mdi-pencil"></i> Edit</a>
                            <a href="#" data-id="{{ $user->id }}" class="btn btn-sm btn-danger swal-confirm">
                                <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST"
                                    id="delete{{ $user->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="mdi mdi-delete"></i> Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

@endsection

@section('js')
<script>
    $(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;
        Swal.fire({
            title: 'Apakah Anda Yakin? ',
            text: 'Data yang telah dihapus tidak akan bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, lanjutkan!',
            cancelButtonText: 'Tidak, tetap simpan data'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Dihapus!',
                'Data Anda telah terhapus',
                'success'
                )
                $(`#delete${id}`).submit();
                
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                'Dibatalkan',
                'Data Anda Tetap Tersimpan',
                'error'
                )
            }
        })

    });
</script>
@endsection