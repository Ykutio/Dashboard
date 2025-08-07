@php
    use App\Models\Enum\CategoryStatusEnum;

    /*
     * @var array $category
     */
@endphp
@extends('layouts.admin_layout')

@section('title', 'Редактирование категории')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="text-align:right;">Редактировать категорию: {{ $category['name'] }}</h1>
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
                        <form action="{{ route('category.update', $category['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Категория</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ $category['name'] }}" placeholder="Введите название категории"
                                           required>
                                    <label for="status">Статус</label>
                                    <select name="status" class="form-control">
                                        @foreach( CategoryStatusEnum::getCategoryStatusMap() as $key => $value)
                                            @php
                                                $selected = '';
                                            @endphp
                                            @if($category['status'] === $key )
                                                @php
                                                    $selected = 'selected';
                                                @endphp
                                            @endif
                                            <option {{ $selected }} value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Подтвердить</button>
                                <button type="reset" class="btn btn-outline-info">Отменить</button>
                                <button type="reset" class="btn btn-outline-secondary"
                                        onclick="location.href='{{ route('category.index') }}';">Вернуться
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
