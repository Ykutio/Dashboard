@php
    use \App\Models\Enum\ProductStatusEnum;
@endphp

@extends('layouts.admin_layout')

@section('title', 'Add product')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="text-align:right;">Add new product</h1>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-default-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{ session( 'success') }}</h4>
                </div>
            @endif
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Product name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter product name" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Product description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                           placeholder="Enter product description">
                                </div>
                                <div class="form-group">
                                    <label for="price">Product price</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                           placeholder="Enter product price">
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Product quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity"
                                           placeholder="Enter product quantity">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Product category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="" selected>Select product category</option>
                                        @foreach( $categories as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="brand_id">Product brand</label>
                                    <select name="brand_id" class="form-control" required>
                                        <option value="" selected>Select product brand</option>
                                        @foreach( $brands as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="country_id">Product country</label>
                                    <select name="country_id" class="form-control" required>
                                        <option value="" selected>Select product country</option>
                                        @foreach( $countries as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Product status</label>
                                    <select name="status" class="form-control">
                                        @foreach( ProductStatusEnum::getProductStatusMap() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">Product image</label>
                                    <img src="/admin/img/no-image.png" class="imgUploaded m-md-4"
                                         style="display: block; width: 200px; height: 200px">
                                    <input type="text" name="img" id="feature_image" class="form-control"
                                           name="feature_image" value="" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image">Select product image</a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <button type="reset" class="btn btn-outline-info">Cansel</button>
                                <button type="reset" class="btn btn-outline-secondary"
                                        onclick="location.href='{{ route('product.index') }}';">Back
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
