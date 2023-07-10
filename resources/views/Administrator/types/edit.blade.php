@extends('layouts.admin')

@section('content')
{{ App::setLocale('ru') }}

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{  trans('admin.type.title_eddit')}}</h2>
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
                    action="{{ route('types.update' , $item->id) }}"
                    enctype="multipart/form-data"
                    >
                    <input name="_method" type="hidden" value="PUT">
                    <input name="update" type="hidden" value="1">
                    @csrf
                    <div id="myTabContent" class="tab-content">


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12 "  for="image">
                                {{  trans('admin.type.image')}} 
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
                                    <div class="panel-heading">{{trans('admin.type.image')}}</div>
                                    <div class="panel-body">
                                        <div class="row" >
                                            <div class="col-md-4 " data-id="{{$item->id}}">
                                                <div class="thumbnail"  style="height:auto;">
                                                    <div class="image view view-first">
                                                        <img style="width: 45%; display: block;" src="{{asset($item->image)}}" 
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
                                {{  trans('admin.type.name')}}
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

                        <div class="form-group {{ $errors->has('description') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">
                                {{  trans('admin.type.description')}}
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
