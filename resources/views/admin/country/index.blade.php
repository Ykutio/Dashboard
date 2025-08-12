@extends('layouts.admin_layout')

@section('title', 'Все страны')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="text-align:right;">Все страны</h1>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-default-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{ session( 'success') }}</h4>
                </div>
            @endif
            @if(session('info'))
                <div class="alert alert-danger alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{ session( 'info') }}</h4>
                </div>
            @endif
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 2%">
                                #
                            </th>
                            <th style="width: 10%">
                                Название
                            </th>
                            <th style="width: 10%" class="text-center">
                                Статус
                            </th>
                            <th style="width: 10%" class="text-center">
                                Дата создания
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $countries as $key => $country )
                            <tr>
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td>
                                    {{ $country['name'] }}
                                </td>
                                <td class="project-state">
                                    @if( $country['status'] == 'active' )
                                        <span class="badge badge-success">Активный</span>
                                    @endif
                                    @if( $country['status'] == 'inactive' )
                                        <span class="badge badge-danger">Не Активный</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $country['created_at'] }}
                                </td>
                                <td class="project-actions text-right">
                                    <div class="container">
                                        <div class="row justify-content-end">
                                            <div class="col-12 col-sm-6 col-md-8" style="">
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('country.edit', $country['id']) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Редактировать
                                                </a>
                                            </div>

                                            <div class="col-6 col-md-4" style="">
                                                <form action="{{ route('country.destroy', $country['id']) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Удалить
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    {{ $countries->links() }}
@endsection
