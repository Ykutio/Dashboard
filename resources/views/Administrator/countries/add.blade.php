@extends('layouts.admin')

@section('content')
<!--@dump($items)-->
{{ App::setLocale('ru') }}
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{  trans('admin.country.title_add')}}</h2>
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
                      action="{{ route('countries.store') }}">
                    @csrf
                    <div id="myTabContent" class="tab-content">

                        <div class="form-group {{ $errors->has('name') ? 'bad' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">
                                {{  trans('admin.country.name')}}
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
