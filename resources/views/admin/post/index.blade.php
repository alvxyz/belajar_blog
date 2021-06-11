@extends('layouts.adminto')

@section('judulhalaman', 'Berita')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row mb-2">
                <div class="col-6">
                    <h4 class="mt-0 mb-2 header-title">List Berita</h4>
                    <p>Daftar berita yang telah tersimpan</p>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('post.create') }}" type="button" class="btn btn-primary"><i
                            class="mdi mdi-plus-circle"></i> Add
                        Post</a>
                </div>
            </div>
            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Category</th>
                        <th>Tag</th>
                        <th>Content</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0 ?>
                    @foreach ($posts as $post)
                    <?php $no++ ?>
                    <tr>
                        <td>{{ $no }}</td>
                        <td>
                            <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-info"><i
                                    class="mdi mdi-pencil"></i></a>
                            <a href="{{ route('post.trash', ['id' => $post->id]) }}" class="btn btn-sm btn-danger"><i
                                    class="mdi mdi-delete"></i></a>
                        </td>
                        <td>
                            <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="80px">
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->users->name }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                            <ul>
                                <span class="badge badge-pill badge-primary">{{ $tag->tag }}</span>
                            </ul>
                            @endforeach
                        </td>
                        <td>{{ substr($post->content, 0, 50) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->

@endsection