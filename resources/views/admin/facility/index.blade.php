@extends('layouts.adminto')

@section('judulhalaman', 'Fasilitas')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">List Fasilitas</h4>
                    <p>Daftar Fasilitas yang telah tersimpan</p>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('facility.create') }}" type="button" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i> Add
                        Fasilitas</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Konten</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($facilitys as $facility)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>
                            <a href="{{ route('facility.edit', ['id' => $facility->id]) }}"
                                class="btn btn-sm btn-info"><i class="mdi mdi-pencil"></i></a>
                            <a href="#" data-id="{{ $facility->id }}" class="btn btn-sm btn-danger swal-confirm">
                                <form action="{{ route('facility.delete', ['id' => $facility->id]) }}" method="POST"
                                    id="delete{{ $facility->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </td>
                        <td><img src="{{ asset($facility->image) }}" alt="{{ $facility->name }}" width="80px"></td>
                        <td>{{$facility->name }}</td>
                        <td>{{$facility->content }}</td>
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