@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product') }}">Product List</a></li>
                            <li class="breadcrumb-item active">Create Product</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form
                                method="post"
                                action="{{ route('create_product') }}"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12">
                                        {{--Image--}}
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Product Image</label>
                                            <input type="file" name="image" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        {{--Name--}}
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Product Name</label>
                                            <input
                                                name="name"
                                                required
                                                type="text"
                                                class="form-control"
                                                id="formGroupExampleInput"
                                                placeholder="Enter product name"
                                                value="{{ old('name') }}"
                                            >
                                        </div>
                                        {{--Category--}}
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select
                                                name="category_id"
                                                class="form-control"
                                                id="category_id"
                                            >
                                                @foreach($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        {{--Cost--}}
                                        <div class="form-group">
                                            <label for="Cost">Product Cost</label>
                                            <input
                                                name="cost"
                                                required
                                                type="text"
                                                class="form-control"
                                                id="Cost"
                                                placeholder="Enter product cost"
                                                value="{{ old('cost') }}"
                                            >
                                        </div>
                                        {{--Price--}}
                                        <div class="form-group">
                                            <label for="price">Product Price</label>
                                            <input
                                                name="price"
                                                required
                                                type="text"
                                                class="form-control"
                                                id="price"
                                                placeholder="Enter product price"
                                                value="{{ old('price') }}"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        {{--Stock Alert--}}
                                        <div class="form-group">
                                            <label for="stock_alert">Stock Alert</label>
                                            <input
                                                name="stock_alert"
                                                required
                                                type="number"
                                                class="form-control"
                                                id="stock_alert"
                                                placeholder="Enter product stock alert"
                                                value="{{ old('stock_alert') }}"
                                            >
                                        </div>
                                        {{--Description--}}
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Description</label>
                                            <textarea
                                                rows="8"
                                                name="description"
                                                class="form-control"
                                                id="formGroupExampleInput"
                                                placeholder="Enter product description"
                                            >{{ old('description') }}</textarea>
                                        </div>
                                    </div>
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
            </div>
        </div>
    </div>
@endsection
