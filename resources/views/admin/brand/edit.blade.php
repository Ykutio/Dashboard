@php
    use \App\Models\Enum\BrandStatusEnum;
@endphp

@extends('layouts.admin_layout')

@section('title', 'Редактировать бренд')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="text-align:right;">Редактировать бренд: {{ $brand['name'] }}</h1>
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
                        <form action="{{ route('product.update', $brand['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Название бренда</label>
                                    <input type="text" value="{{ $brand['name'] }}" class="form-control"
                                           id="name" name="name" placeholder="Введите название бренда" required>
                                </div>
                                <div class="form-group">
                                    <label for="country_id">Страна бренда</label>
                                    <select name="country_id" class="form-control" required>
                                        <option value="" selected>Выберите страну бренда</option>
                                        @foreach( $countries as $item)
                                            <option value="{{ $item['id'] }}"
                                                    @if($item['id'] == $brand['country_id']) selected @endif >{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="status">Статус бренда</label>
                                <select name="status" class="form-control">
                                    @foreach( BrandStatusEnum::getBrandStatusMap() as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Подтвердить</button>
                                <button type="reset" class="btn btn-outline-info">Отменить</button>
                                <button type="reset" class="btn btn-outline-secondary"
                                        onclick="location.href='{{ route('brand.index') }}';">Вернуться
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
