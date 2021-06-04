@extends('layouts.adminto')

@section('judulhalaman', 'Post')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Post</h4>

            <div class="p-2">
                <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST"
                    enctype="multipart/form-data" class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                        <div class="col-md-10">
                            <input name="title" type="text" id="simpleinput" class="form-control"
                                value="{{ $post->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="category_id">Category</label>
                        <div class="col-md-10">
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                @foreach ($categories as $category)
                                @if($post->category_id == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="tag">Tag</label>
                        <div class="col-md-10">
                            <select class="multiple-input" name="tags[]" multiple="multiple">
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" @foreach ($post->tags as $nilai_tag)
                                    @if($tag->id == $nilai_tag->id)
                                    selected
                                    @endif
                                    @endforeach>
                                    {{ $tag->tag }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Content</label>
                        <div class="col-md-10">
                            <textarea name="content" class="form-control" rows="5" id="editor"
                                name="content">{{ $post->content }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Image</label>
                        <div class="col-md-10">
                            <input name="featured" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="col-md-2"></span>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div> <!-- end row -->

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.multiple-input').select2();
    });
</script>
@endsection