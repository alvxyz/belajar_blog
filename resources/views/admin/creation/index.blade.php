@extends('layouts.adminto')

@section('judulhalaman', 'Karya')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">List Karya</h4>
                    <p>Daftar Karya yang telah tersimpan</p>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('creation.create') }}" type="button" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i> Add
                        Karya</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Kategori Karya</th>
                        <th>Posisi</th>
                        <th>Foto Pembuat</th>
                        <th>Content</th>
                        <th>Thumbnail Video</th>
                        <th>Link Video</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($creations as $creation)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>
                            <a href="{{ route('creation.edit', ['id' => $creation->id]) }}"
                                class="btn btn-sm btn-info"><i class="mdi mdi-pencil"></i></a>
                            <a href="#" data-id="{{ $creation->id }}" class="btn btn-sm btn-danger swal-confirm">
                                <form action="{{ route('creation.delete', ['id' => $creation->id]) }}" method="POST"
                                    id="delete{{ $creation->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </td>
                        <td><img src="{{ asset($creation->image) }}" alt="{{ $creation->title }}" width="80px"></td>
                        <td>{{$creation->title }}</td>
                        <td>{{$creation->category_creation->name }}</td>
                        <td>{{$creation->position }}</td>
                        <td><img src="{{ asset($creation->creator_image) }}" alt="{{ $creation->title }}" width="80px">
                        </td>
                        <td>{{$creation->content }}</td>
                        <td><img src="{{ asset($creation->thumbnail) }}" alt="{{ $creation->title }}" width="80px">
                        </td>
                        <td>{{$creation->video }}</td>
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