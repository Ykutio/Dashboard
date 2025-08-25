@php
    use App\Models\Brand\Enum\BrandStatusEnum;
@endphp

@extends('layouts.admin_layout')

@section('title', 'Add brand')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="text-align:right;">Add new brand</h1>
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
                        <form action="{{ route('brand.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Brand name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter brand name" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="country_id">Brand country</label>
                                    <select name="country_id" class="form-control" required>
                                        <option value="" selected>Enter brand country</option>
                                        @foreach( $countries as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="status">Brand status</label>
                                <select name="status" class="form-control">
                                    @foreach( BrandStatusEnum::getBrandStatusMap() as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <button type="reset" class="btn btn-outline-info">Cansel</button>
                                <button type="reset" class="btn btn-outline-secondary"
                                        onclick="location.href='{{ route('brand.index') }}';">Back
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
