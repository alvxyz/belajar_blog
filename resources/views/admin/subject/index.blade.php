@extends('layouts.adminto')

@section('judulhalaman', 'Mata Kuliah')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">List Mata Kuliah</h4>
                    <p>Daftar Mata Kuliah yang telah tersimpan</p>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('subject.create') }}" type="button" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i> Add
                        Mata Kuliah</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Kurikulum</th>
                        <th>Mata Kuliah</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($subjects as $subject)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>
                            <a href="{{ route('subject.edit', ['id' => $subject->id]) }}" class="btn btn-sm btn-info"><i
                                    class="mdi mdi-pencil"></i></a>
                            <a href="{{ route('subject.delete', ['id' => $subject->id]) }}" data-id="{{ $subject->id }}"
                                class="btn btn-sm btn-danger swal-confirm">
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </td>
                        <td>{{$subject->curriculum }}</td>
                        <td>{{$subject->subject }}</td>
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
    $(".swal-confirm").on('click', function(e) {
        
            e.preventDefault();
            const href = $(this).attr('href');

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
                    document.location.href = href;
                    
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