@php
    use \App\Models\Enum\ProductStatusEnum;
@endphp

@extends('layouts.admin_layout')

@section('title', 'Добавить продукт')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="text-align:right;">Добавить продукт</h1>
                </div>
            </div>
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
                                    <label for="name">Название продукта</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Введите название продукта" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание продукта</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                           placeholder="Опишите продукт">
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена продукта</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                           placeholder="Цена продукта">
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Количество продукта</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity"
                                           placeholder="Количество продукта">
                                </div>
                                <div class="form-group">
                                    <label for="cat_id">Категория продукта</label>
                                    <select name="cat_id" class="form-control" required>
                                        <option value="" selected>Выберите категорию продукта</option>
                                        @foreach( $categories as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="brand_id">Бренд продукта</label>
                                    <select name="brand_id" class="form-control" required>
                                        <option value="" selected>Выберите бренд продукта</option>
                                        @foreach( $brands as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="country_id">Страна производитель продукта</label>
                                    <select name="country_id" class="form-control" required>
                                        <option value="" selected>Выберите страну производитель продукта</option>
                                        @foreach( $countries as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Статус продукта</label>
                                    <select name="status" class="form-control">
                                        @foreach( ProductStatusEnum::getProductStatusMap() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">Изображение продукта</label>
                                    <img src="/admin/img/no-image.png" class="imgUploaded m-md-4"
                                         style="display: block; width: 200px; height: 200px">
                                    <input type="text" name="img" id="feature_image" class="form-control"
                                           name="feature_image" value="" readonly>
                                    <a href="" class="popup_selector" data-inputid="feature_image">Выберите изображение</a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Подтвердить</button>
                                <button type="reset" class="btn btn-outline-info">Отменить</button>
                                <button type="reset" class="btn btn-outline-secondary"
                                        onclick="location.href='{{ route('product.index') }}';">Вернуться
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
