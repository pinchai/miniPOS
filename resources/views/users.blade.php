@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('/admin/users/create') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">User Name</label>
                                    <input
                                        name="name"
                                        required
                                        type="text"
                                        class="form-control"
                                        id="formGroupExampleInput"
                                        placeholder="Enter user name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                        name="email"
                                        required
                                        type="email"
                                        class="form-control"
                                        id="Email"
                                        placeholder="Enter Email"

                                    >
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input
                                        name="password"
                                        required
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        placeholder="Enter password"
                                        autocomplete="off"
                                    >
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
                                        <th>E-mail</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
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
