@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
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
                                    <a href="{{ route('index_create_category') }}">
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
                                        <th width="10">Image</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($item->image)
                                                    <img
                                                        style="width: 100%"
                                                        src="{{ asset('/images').'/'.$item->image }}"
                                                        class="img-fluid img-thumbnail"
                                                        alt="{{ $item->name }}"
                                                    >
                                                @endif
                                                @if($item->image == null)
                                                    <img
                                                        style="width: 100%"
                                                        src="{{ asset('default_image.png') }}"
                                                        class="img-fluid img-thumbnail"
                                                        alt="{{ $item->name }}"
                                                    >
                                                @endif
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <a href="{{ route('confirm_delete_category').'?id='.$item->id }}">
                                                    <button>
                                                        <i class="text-danger far fa-trash-alt"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('index_update_category').'?id='. $item->id}}">
                                                    <button>
                                                        <i class="text-success fas fa-edit"></i>
                                                    </button>
                                                </a>
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
