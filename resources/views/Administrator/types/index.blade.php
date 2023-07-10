@php use Illuminate\Support\Str; @endphp
@extends('layouts.admin')
@section('content')

@if($items->count() > 0)
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel admin_container">
        <div class="x_title">
            <h2>{{ trans('admin.type.main_title') }}</h2>
            <a class="btn btn-primary btn-sm pull-right" href="{{ route('types.create') }}"> 
                <i class="fa fa-plus"></i> {{ trans('admin.type.add') }}
            </a>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if( Session::has('dane_add') )
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>{{ Session::get('dane_add') }}</strong>
            </div>
            @endif
            @if( Session::has('error_add') )
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>{{ Session::get('error_add') }}</strong>
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('admin.type.image') }}</th>
                        <th>{{ trans('admin.type.name') }}</th>
                        <th>{{ trans('admin.type.description') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    //if ($items->currentPage() !== 1) {
                        //$i = ($items->currentPage() - 1) * $items->perPage() + 1;
                    //}
                    ?>
                    @forelse ($items as $key =>  $item)
                    <tr style="cursor:move"  >
                        <td class="text-center sort" id="sort{{$key}}" data-id="{{$item->id}}" data-ordering ="{{ $item->sort }}">
                            {{$item->sort}}.{{ $i++ }}
                        </td>
                        <td>
                            <img src="{{$item->image}}" width="100" height="100" alt="img" />
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{ Str::limit($item->description, 40) }}
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm pull-right" 
                               href="{{ route('types.edit' , $item->id) }}"> <i class="fa fa-edit"></i> {{ trans('admin.edit') }}</a>
                            <button class="btn btn-danger btn-sm pull-right deleteItem" data-id="{{ $item->id }}"> <i class="fa fa-trash"></i> {{ trans('admin.remove') }}</button>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_title">
        <img src="/Administrator/images/not_found.png" alt="image" width="20" height="20" >
        {{ trans('admin.car.add') }}
        <a class="btn btn-primary btn-sm pull-right" href="{{ route('types.create') }}"> 
            <i class="fa fa-plus"></i> {{ trans('admin.add') }}
        </a>
        <div class="clearfix"></div>
    </div>
</div>
@endif
@endsection
@push('js')
<script>
    $('.change').change(function (e) {
        var ItemId = $(this).data('id');

        $.ajax({
            url: "{{ route('ChangeStatusType') }}",
            type: 'post',
            dataType: 'json',
            data: {'id': ItemId}
        }).done(function (data) {
            if (data.status) {
                new PNotify({
                    text: '{{ trans("admin.dane_add") }}',
                    type: 'success',
                    styling: 'bootstrap3'
                });
            } else {
                new PNotify({
                    text: '{{ trans("admin.dane_add") }}',
                    type: 'error',
                    styling: 'bootstrap3'
                });
            }
        });
    });


    $('.deleteItem').click(function (event) {
        event.preventDefault();
        var ItemId = $(this).data('id');
        var Item_This = $(this);
        bootbox.confirm("{{ trans('admin.question_done') }}", function (result) {
            if (result) {
                $.ajax({
                    url: "/admin/types/" + ItemId,
                    type: 'DELETE',
                    dataType: 'json'
                }).done(function (data) {
                    if (data.status) {
                        new PNotify({
                            text: '{{ trans("admin.dane_add") }}',
                            type: 'success',
                            styling: 'bootstrap3'
                        });

                        $(Item_This).parents('tr').hide().remove();

                    } else {
                        new PNotify({
                            text: '{{ trans("admin.dane_add") }}',
                            type: 'error',
                            styling: 'bootstrap3'
                        });
                    }
                });
            }
        });
    });


</script>
<script>

    function changeordering()
    {
        var multi = $('.sort');
        var arr = [];
        for (var i = 0; i < multi.length; i++)
        {
            arr.push([$('#sort' + i).attr('data-id'), $('#sort' + i).attr('data-ordering')]);
        }
        arr = JSON.stringify(arr);
        $.ajax({
            url: "{{ route('orderingType') }}",
            type: "POST",
            data: "_token={{csrf_token()}}" + "&ordering=" + arr
        })
                .done(function (data) {
                    console.log(data);
                });
    }

</script>
<script>
    $(document).ready(function () {

        $k = 0;
        $('.admin_container tbody').sortable({
            start: function (event, ui) {

                var start_pos = ui.item.index();
                ui.item.data('start_pos', start_pos);
            },
            update: function (event, ui) {
                var index = ui.item.index();
                var start_pos = ui.item.data('start_pos');

                //update the html of the moved item to the current index
                $('.admin_container tbody tr:nth-child(' + (index + 1) + ') .sort').html(index + $k + 1).attr('data-ordering', index + $k + 1);

                if (start_pos < index)
                {
                    //update the items before the re-ordered item
                    for (var i = index; i > 0; i--)
                    {
                        $('.admin_container tbody tr:nth-child(' + i + ') .sort').html(i + $k).attr('data-ordering', i + $k);

                    }
                } else {
                    //update the items after the re-ordered item
                    for (var i = index + 2; i <= $(".admin_container tbody tr").length; i++)
                    {
                        $('.admin_container tbody tr:nth-child(' + i + ') .sort').html(i + $k).attr('data-ordering', i + $k);
                    }
                }
                changeordering();
            }
        });
    });
</script>
@endpush
