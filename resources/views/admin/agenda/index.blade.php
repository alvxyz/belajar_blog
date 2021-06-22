@extends('layouts.adminto')

@section('judulhalaman', 'Agenda')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">List Agenda</h4>
                    <p>Daftar Agenda yang telah tersimpan</p>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('agenda.create') }}" type="button" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i> Add
                        Agenda</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>Nama Agenda</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Penyelenggara</th>
                        <th>Link Pendaftaran</th>
                        <th>Kontent</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($agenda as $agenda)
                    <?php $no++ ?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>
                            <a href="{{ route('agenda.edit', ['id' => $agenda->id]) }}" class="btn btn-sm btn-info"><i
                                    class="mdi mdi-pencil"></i></a>
                            <a href="{{ route('agenda.delete', ['id' => $agenda->id]) }}" data-id="{{ $agenda->id }}"
                                class="btn btn-sm btn-danger swal-confirm">
                                <i class="mdi mdi-delete"></i>
                            </a>
                        </td>
                        <td><img src="{{ asset($agenda->image) }}" alt="{{ $agenda->title }}" width="80px"></td>
                        <td>{{$agenda->title }}</td>
                        <td>{{ Carbon\Carbon::parse($agenda->date_start)->isoFormat('Do MMMM YYYY') }}
                            @if($agenda->date_end)
                            - {{ Carbon\Carbon::parse($agenda->date_end)->isoFormat('Do MMMM YYYY') }}
                            @endif
                        </td>
                        <td>{{$agenda->time_start }} - {{ $agenda->time_end }}</td>
                        <td>{{$agenda->place }}</td>
                        <td>{{$agenda->organizer }}</td>
                        <td>{{$agenda->link }}</td>
                        <td>{{$agenda->content }}</td>
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