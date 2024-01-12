@extends('layouts.app')

@section('content')
<div class="container-fluid m-5 all-view">
    <div class="row mb-3">
        <div class="col">
            <h3 class="pb-2">Manage Promocode</h3>
        </div>
        <div class="col text-right">
            <a href="{{ route('promocode.add') }}" class="btn btn-success btn-xs d-inline-flex align-items-center px-4 "><i class="fs-4 bi-patch-plus pr-2"></i>Add</a>
        </div>
    </div>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Code</th>
                <th>Redeem Count</th>
                <th>Expires At</th>
                <th>Status</th>
                <th>Print</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promocode as $promocodes)
            <tr>
                <td>{{$promocodes->id}}</td>
                <td>{{$promocodes->name}}</td>
                <td>{{$promocodes->description}}</td>
                <td>{{$promocodes->code}}</td>
                <td>{{$promocodes->redeem_count}}</td>
                <td>{{$promocodes->expires_at}}</td>
                <td>
                
                    <!-- <input type="checkbox" data-id="{{ $promocodes->id }}" name="status" class="js-switch" {{ $promocodes->status == 1 ? 'checked' : '' }}> -->

                    <input data-id="{{$promocodes->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" {{ $promocodes->status == 1 ? 'checked' : '' }}> 
                </td>
                <td>
                    <a href="{{ route('promocode.voucher', ['id'=>$promocodes->id]) }}" class="clr-icon"><i class="fs-4 bi-printer"></i></a>
                </td>
                <td>
                    <a href="{{ route('promocode.shows', ['id'=>$promocodes->id]) }}" class="clr-icon"><i class="fs-4 bi-book"></i></a>
                    &nbsp;
                    <a href="{{ route('promocode.edit', ['id'=>$promocodes->id]) }}" class="clr-icon"><i class="fs-4 bi-pencil-square"></i></a>
                    &nbsp;
                    <a href="{{ route('promocode.delete', ['id'=>$promocodes->id] ) }}" class="clr-icon" onclick="return confirm('Are you sure need to delete this code')"><i class="fs-4 bi-trash3"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $promocode->links() }}
    </div>
</div>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>

    $(function(){
        $('.toggle-class').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let codeId = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('promocode.status') }}',
                data: {'status': status, 'promoId': codeId},
                success: function (data) {
                    console.log(data.message);
                }
            });
        });
    });
</script>

@endsection
