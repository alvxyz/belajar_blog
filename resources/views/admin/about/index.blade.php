@extends('layouts.adminto')

@section('judulhalaman', 'Tentang Prodi')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">List Tentang Prodi</h4>
                    <p>Daftar Tentang Prodi yang telah tersimpan</p>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('about.create') }}" type="button" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i> Add
                        Tentang Prodi</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Periode</th>
                        <th>KOnten</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($abouts as $about)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>
                            <a href="{{ route('about.edit', ['id' => $about->id]) }}" class="btn btn-sm btn-info"><i
                                    class="mdi mdi-pencil"></i></a>
                            <a href="#" data-id="{{ $about->id }}" class="btn btn-sm btn-danger swal-confirm">
                                <form action="{{ route('about.delete', ['id' => $about->id]) }}" method="POST"
                                    id="delete{{ $about->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </td>
                        <td>{{$about->period }}</td>
                        <td>{{$about->content }}</td>
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