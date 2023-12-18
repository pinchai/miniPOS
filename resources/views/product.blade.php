@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="create_category">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Name</label>
                                    <input required type="text" class="form-control" id="formGroupExampleInput"
                                           placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Description</label>
                                    <textarea rows="3" class="form-control" id="formGroupExampleInput2"
                                              placeholder="Enter category name"></textarea>
                                </div>
                                <button type="reset" class="btn btn-secondary float-left">
                                    <i class="fas fa-times"></i>
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="far fa-save"></i>
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>Drink description</td>
                                            <td>
                                                <button>
                                                    <i class="text-danger far fa-trash-alt"></i>
                                                </button>
                                                <button>
                                                    <i class="text-success fas fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
