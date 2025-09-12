@php
    use App\Models\Brand\Enum\BrandStatusEnum;

$currentPage = $brands->currentPage();
$perPage = $brands->perPage();
@endphp
@extends('layouts.admin_layout')

@section('title', 'All brands')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="text-align:right;">All brands</h1>
                </div>
            </div>
            <form action="{{ route('brand.index') }}" method="GET">
                <div class="row mb-2">
                    <select name="country_id" class="form-control-sm" style="margin-right: 10px; margin-left: 7px">
                        <option value="">All countries</option>
                        @foreach( $countries as $value)
                            @php
                                $selected = '';
                                if(
                                    isset($filters['country_id'])
                                    && (int)$filters['country_id'] === $value['id']
                                    ){
                                    $selected = 'selected';
                                }
                            @endphp
                            <option {{ $selected }} value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                        @endforeach
                    </select>
                    <select name="status" class="form-control-sm" style="margin-right: 10px; margin-left: 7px">
                        <option value="">All statuses</option>
                        @foreach( BrandStatusEnum::getBrandStatusMap() as $key => $value)
                            @php
                                $selected = '';
                                if(isset($filters['status']) && $filters['status'] === $key){
                                    $selected = 'selected';
                                }
                            @endphp
                            <option {{ $selected }} value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Apply filter</button>
                </div>
            </form>
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
                            <th style="width: 2%" class="text-center">
                                №
                            </th>
                            <th style="width: 10%" class="text-center">
                                Name
                            </th>
                            <th style="width: 10%" class="text-center">
                                Country
                            </th>
                            <th style="width: 10%" class="text-center">
                                Status
                            </th>
                            <th style="width: 10%" class="text-center">
                                Created
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = $currentPage === 1 ? 0 : ($currentPage - 1) * $perPage;
                        @endphp
                        @foreach( $brands as $key => $brand )
                            <tr>
                                <td>
                                    {{ ++$i }}
                                </td>
                                <td>
                                    {{ $brand['name'] }}
                                </td>
                                <td>
                                    {{ $brand->country['name'] }}
                                </td>
                                <td class="project-state">
                                    @if($brand['status'] == 'active')
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                    @if( $brand['status'] == 'inactive' )
                                        <span class="badge badge-danger">Not Active</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $brand['created_at'] }}
                                </td>
                                <td class="project-actions text-right">
                                    <div class="container">
                                        <div class="row justify-content-end">
                                            <div class="col-12 col-sm-6 col-md-8" style="">
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('brand.edit', $brand['id']) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="col-6 col-md-4" style="">
                                                <form action="{{ route('brand.destroy', $brand['id']) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
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
    {{ $brands->withQueryString()->links() }}
@endsection
