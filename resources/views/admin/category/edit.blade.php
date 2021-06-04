@extends('layouts.adminto')

@section('judulhalaman', 'Category')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="mt-0 mb-2 header-title">Edit Cateogry <strong>{{ $category->name }}</strong> </h4>

            <div class="p-2">
                <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST"
                    class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                        <div class="col-md-10">
                            <input name="name" type="text" id="simpleinput" class="form-control"
                                placeholder="Insert Category Name" value="{{ $category->name }}">
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