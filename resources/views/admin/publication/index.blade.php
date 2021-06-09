@extends('layouts.adminto')

@section('judulhalaman', 'Publikasi')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">List Publikasi</h4>
                    <p>Daftar publikasi yang telah tersimpan</p>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('publication.create') }}" type="button" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i> Add
                        Publikasi</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Judul</th>
                        <th>Link Google Scholar</th>
                        <th>Link Scopus</th>
                        <th>Link Sinta</th>
                        <th>Link Lainnya</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($publications as $publication)
                    <?php $no++ ?>
                    <tr>
                        <td>{{ $no}}</td>
                        <td>
                            <a href="{{ route('publication.edit_from_dosen', ['id' => $publication->id]) }}"
                                class="btn btn-sm btn-info"><i class="mdi mdi-pencil"></i></a>
                            <a href="#" data-id="{{ $publication->id }}" class="btn btn-sm btn-danger swal-confirm">
                                <form action="{{ route('publication.delete', ['id' => $publication->id]) }}"
                                    method="POST" id="delete{{ $publication->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </td>
                        <td>{{ $publication->title }}</td>
                        <td>{{ $publication->link1 }}</td>
                        <td>{{ $publication->link2 }}</td>
                        <td>{{ $publication->link3 }}</td>
                        <td>{{ $publication->link4 }}</td>
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
    $( document ).ready(function() {
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
    });
</script>
@endsection