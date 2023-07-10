@extends('layouts.admin')

@section('content')
{{ App::setLocale('ru') }}

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{  trans('admin.weapon.title_eddit')}}</h2>
            <div class="clearfix"></div>
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
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <form 
                    id="demo-form2"  
                    class="form-horizontal form-label-left" 
                    method="POST"
                    action="{{ route('weapons.update' , $item->id) }}"
                    enctype="multipart/form-data"
                    >
                    <input name="_method" type="hidden" value="PUT">
                    <input name="update" type="hidden" value="1">
                    @csrf
                    <div id="myTabContent" class="tab-content">


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 "  for="image">
                                {{  trans('admin.weapon.image')}} 
                                <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" accept=".jpg, .jpeg, .png" id="image" 
                                       name="file" data-fileuploader-limit="1"  
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                            <p>{{trans('admin.format')}}</p>
                            <p>{{trans('admin.maxsize')}}</p>
                            @if($errors->has('fileuploader-list-file'))
                            <p style="color: red" >{{trans('admin.selectimage')}}</p>
                            @elseif($errors->has('file.*'))
                            <p style="color: red" >{{trans('admin.notvalidimage')}}</p>
                            @endif
                        </div>
                        @if(isset($item->image))
                        <div class="form-group" id="imageCont">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="panel panel-default" style="border-radius:0">
                                    <div class="panel-heading">{{trans('admin.weapon.image')}}</div>
                                    <div class="panel-body">
                                        <div class="row" >
                                            <div class="col-md-4 " data-id="{{$item->id}}">
                                                <div class="thumbnail"  style="height:auto;">
                                                    <div class="image view view-first">
                                                        <img style="width: 100%; display: block;" src="{{asset($item->image)}}" 
                                                             alt="image" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="form-group {{ $errors->has('name') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                {{  trans('admin.weapon.name')}}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" 
                                       value="@if(!empty($item->name)){{  $item->name }} @else{{old('name')}} @endif" 
                                       name="name" 
                                       class="form-control col-md-7 col-xs-12"
                                       required
                                       >
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('country_name') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">
                                {{  trans('admin.weapon.country_name')}}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="country"  >
                                    <option value="0">{{ $itemTypeCountry->country_name }}</option>
                                    @foreach($countries as  $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">
                                {{  trans('admin.weapon.description')}}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" 
                                       value="@if(!empty($item->description)){{  $item->description }} @else{{old('description')}} @endif" 
                                       name="description" 
                                       class="form-control col-md-7 col-xs-12"
                                       required
                                       >
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('tacktical_descr') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tacktical_descr">
                                {{  trans('admin.weapon.tacktical_descr')}}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" 
                                       value="@if(!empty($item->tacktical_descr)){{  $item->tacktical_descr }} @else{{old('tacktical_descr')}} @endif" 
                                       name="tacktical_descr" 
                                       class="form-control col-md-7 col-xs-12"
                                       required
                                       >
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('price') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">
                                {{ trans('admin.weapon.price') }}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text"
                                       value="@if(!empty($item->price)){{ $item->price }} @else{{old('price')}} @endif" 
                                       name="price" 
                                       class="form-control col-md-7 col-xs-12"
                                       required
                                       >
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('types_name') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">
                                {{  trans('admin.weapon.select_type')}}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="type">
                                    <option value="0">{{ $itemTypeCountry->types_name }}</option>
                                    @foreach($types as  $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                    {{ trans('admin.publish') }}
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="checkbox" class="flat" {{ $item->status ? 'checked' : ''  }} name="status" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    {{  trans('admin.addsave')}}</button>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
<script>

    $(document).ready(function ()
    {
        $('input[name="file"]').fileuploader({
            addMore: false,
            maxSize: 1 //1MB
        });
    });

</script>
@endpush
