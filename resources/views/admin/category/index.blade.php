@extends('layouts.adminto')

@section('judulhalaman', 'Kategori')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">List Kategori</h4>
                    <p>Daftar kategori yang telah tersimpan</p>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('category.create') }}" type="button" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i> Add
                        Kategori</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Nama</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($categories as $category)
                    <?php $no++ ?>
                    <tr>
                        <td>{{ $no}}</td>
                        <td>
                            <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                                class="btn btn-sm btn-info"><i class="mdi mdi-pencil"></i></a>
                            <a href="{{ route('category.delete', ['id' => $category->id]) }}"
                                class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>
                        </td>
                        <td>{{ $category->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

@endsection