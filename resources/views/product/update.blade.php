@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category') }}">Category List</a></li>
                            <li class="breadcrumb-item active">Update Category</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('update_category') }}" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <center>
                                        <img
                                            style="width: 20%"
                                            class="img-fluid img-thumbnail"
                                            src="{{ asset('images').'/'.$data->image }}"
                                        >
                                    </center>
                                </div>
                                <input type="hidden" value="{{ $data->id }}" name="id">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">New Category Image</label>
                                    <input type="file" name="image" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Category Name</label>
                                    <input
                                        name="name"
                                        required
                                        type="text"
                                        class="form-control"
                                        id="formGroupExampleInput"
                                        placeholder="Enter category name"
                                        value="{{ $data->name }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Description</label>
                                    <textarea
                                        rows="4"
                                        name="description"
                                        class="form-control"
                                        id="formGroupExampleInput"
                                        placeholder="Enter category description"
                                    >{{ $data->description }}</textarea>
                                </div>
                                <button type="reset" class="btn btn-secondary float-left">
                                    <i class="fas fa-times"></i>
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="far fa-save"></i>
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
