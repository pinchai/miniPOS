@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Confirm Action</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user') }}">User List</a></li>
                            <li class="breadcrumb-item active">Confirm Action</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            Do you want to delete user <strong>{{ $data->name }}</strong>?
                            <ul>
                                @if($data->profile)
                                    <li style="list-style: none">
                                        <img
                                            style="width: 50%"
                                            src="{{ asset('/images').'/'.$data->profile }}"
                                            class="img-fluid img-thumbnail"
                                            alt="{{ $data->name }}"
                                        >
                                    </li>
                                @endif
                                <li>Name: {{ $data->name }}</li>
                                <li>Phone: {{ $data->phone }}</li>
                                <li>Email: {{ $data->email }}</li>
                            </ul>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('user') }}">
                                        <button type="reset" class="btn btn-secondary float-left">
                                            <i class="fas fa-times"></i>
                                            Cancel
                                        </button>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <form method="post" action="{{ url('/admin/users/delete') }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $data->id }}">
                                        <button type="submit" class="btn btn-danger float-right">
                                            <i class="far fa-trash-alt"></i>
                                            Yes Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
