@extends('layouts.admin')
@section('content')
<a href="{{ route('types.index') }}">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-caret-square-o-right"></i>
            </div>
            <div class="count">{{$types}}</div>

            <h3>{{  trans('admin.type.main_title')}}</h3>
        </div>
    </div> 
</a>
<a href="{{ route('countries.index') }}">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-caret-square-o-right"></i>
            </div>
            <div class="count">{{$countries}}</div>

            <h3>{{  trans('admin.country.main_title')}}</h3>
        </div>
    </div> 
</a>
<a href="{{ route('weapons.index') }}">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-caret-square-o-right"></i>
            </div>
            <div class="count">{{$weapons}}</div>

            <h3>{{  trans('admin.weapon.main_title')}}</h3>
        </div>
    </div>
</a>
@endsection