@extends('layouts.admin')

@section('content')
<!--@dump($items)-->
{{ App::setLocale('ru') }}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{  trans('admin.weapon.title_add')}}</h2>
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
                <form id="demo-form2"  class="form-horizontal form-label-left" 
                      method="post" enctype="multipart/form-data" 
                      action="{{ route('weapons.store') }}">
                    @csrf
                    <div id="myTabContent" class="tab-content">


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 "  for="first-name">
                                {{  trans('admin.weapon.image')}} 
                                <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" accept=".jpg, .jpeg, .png" id="first-name" 
                                       name="file" data-fileuploader-limit="1" required  
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

                        <div class="form-group {{ $errors->has('name') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
                                {{  trans('admin.weapon.name')}}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" 
                                       value="{{old('name')}}" 
                                       name="name" 
                                       class="form-control col-md-7 col-xs-12"
                                       required
                                       >
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('types_name') ? 'bad' : '' }}">
                            <label @php echo $errors->has( 'brand' ) ? 'style="color: red"' : ''; @endphp class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                    {{trans('admin.weapon.type') }}
                                    <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="type"  >
                                        <option value="0">{{trans('admin.weapon.select_type') }}</option>
                                        @forelse($types as  $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">
                                {{  trans('admin.weapon.description')}}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" 
                                       value="{{old('description')}}" 
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
                                       value="{{old('tacktical_descr')}}" 
                                       name="tacktical_descr" 
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
                                    <option value="0">{{trans('admin.weapon.select_country') }}</option>
                                    @foreach($countries as  $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('price') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">
                                {{  trans('admin.weapon.price')}}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" 
                                       value="{{old('price')}}" 
                                       name="price" 
                                       class="form-control col-md-7 col-xs-12"
                                       required
                                       >
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('quantity') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">
                                {{  trans('admin.weapon.quantity')}}
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" 
                                       value="{{old('quantity')}}" 
                                       name="quantity" 
                                       class="form-control col-md-7 col-xs-12"
                                       required
                                       >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                    {{ trans('admin.publish') }}
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="checkbox" class="flat" name="status" />
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
