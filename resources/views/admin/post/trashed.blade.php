@extends('layouts.adminto')

@section('judulhalaman', 'Berita')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">List Arsip Berita</h4>
                    <p>Daftar berita yang disimpan, namun tidak ditampilkan</p>
                </div>
                <div class="col-6 text-right">

                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Kreator</th>
                        <th>Kategori</th>
                        <th>Konten</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($posts as $post)
                    <?php $no++ ?>
                    <tr>
                        <td>{{ $no }}</td>
                        <td>
                            <a href=" {{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-sm btn-info"><i
                                    class="mdi mdi-recycle"></i></a>
                            <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-sm btn-danger"><i
                                    class="mdi mdi-delete"></i></a>
                        </td>
                        <td>
                            <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="50px">
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->users->name }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ substr($post->content, 0, 100) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

@endsection