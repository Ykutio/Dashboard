@php
    use App\Models\Enum\CategoryStatusEnum;

    /*
     * @var array $country
     */
@endphp
@extends('layouts.admin_layout')

@section('title', 'Редактирование страны')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="text-align:right;">Редактировать страну: {{ $country['name'] }}</h1>
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
                        <form action="{{ route('country.update', $country['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Название страны</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ $country['name'] }}" placeholder="Введите название страны"
                                           required>
                                    <label for="country">Статус</label>
                                    <select name="status" class="form-control">
                                        @foreach( CategoryStatusEnum::getCategoryStatusMap() as $key => $value)
                                            @php
                                                $selected = '';
                                            @endphp
                                            @if($country['status'] === $key )
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
                                        onclick="location.href='{{ route('country.index') }}';">Вернуться
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
