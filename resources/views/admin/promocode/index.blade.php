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
                    <input type="checkbox" data-id="{{ $promocodes->id }}" name="status" class="js-switch" {{ $promocodes->status == 1 ? 'checked' : '' }} >
                </td>
                <td>
                    <a href="{{ route('promocode.voucher', ['id'=>$promocodes->id]) }}" class="clr-icon"><i class="fs-4 bi-printer"></i></a>
                </td>
                <td>
                    <a href="{{ route('promocode.show', ['id'=>$promocodes->id]) }}" class="clr-icon"><i class="fs-4 bi-pencil-square"></i></a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
    });

    $(document).ready(function(){
        $('.js-switch').change(function () {
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
