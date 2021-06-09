@extends('layouts.adminto')

@section('judulhalaman', 'lecturer')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">Data Dosen</h4>
                    <p>Daftar Data Dosen yang telah tersimpan</p>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('lecturer.create') }}" type="button" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i> Add
                        Data Dosen</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Biografi</th>
                        <th>Pendidikan 1</th>
                        <th>Pendidikan 2</th>
                        <th>Pendidikan 3</th>
                        <th>Pendidikan 4</th>
                        <th>Pulikasi 1</th>
                        <th>Pulikasi 2</th>
                        <th>Pulikasi 3</th>
                        <th>Pulikasi 4</th>
                        <th>Minat Penelitian</th>
                        <th>Bidang Keahlian</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($lecturers as $lecturer)
                    <?php $no++ ?>
                    <tr>
                        <td>{{ $no}}</td>
                        <td>{{ $lecturer->tag }}</td>
                        <td>
                            <a href="{{ route('lecturer.edit', ['id' => $lecturer->id]) }}"
                                class="btn btn-sm btn-info"><i class="mdi mdi-pencil"></i> Edit</a>
                            <a href="#" data-id="{{ $lecturer->id }}" class="btn btn-sm btn-danger swal-confirm">
                                <form action="{{ route('lecturer.delete', ['id' => $lecturer->id]) }}" method="POST"
                                    id="delete{{ $lecturer->id }}">
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