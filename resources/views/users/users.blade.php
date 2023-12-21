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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <a href="{{ route('create_user') }}">
                                        <button type="button" class="btn btn-primary">
                                            <i class="fas fa-plus-circle"></i>
                                            Add
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th width="10">No.</th>
                                        <th width="10">Profile</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($item->profile)
                                                    <img
                                                        style="width: 100%"
                                                        src="{{ asset('/images').'/'.$item->profile }}"
                                                        class="img-fluid img-thumbnail"
                                                        alt="{{ $item->name }}"
                                                    >
                                                @endif
                                                @if($item->profile == null)
                                                    <img
                                                        style="width: 100%"
                                                        src="{{ asset('default_image.png') }}"
                                                        class="img-fluid img-thumbnail"
                                                        alt="{{ $item->name }}"
                                                    >
                                                @endif
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <a href="{{ route('confirm_delete').'?id='.$item->id }}">
                                                    <button>
                                                        <i class="text-danger far fa-trash-alt"></i>
                                                    </button>
                                                </a>
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
