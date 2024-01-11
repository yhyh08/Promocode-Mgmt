@extends('layouts.app')

@section('content')
<div class="container-fluid m-5 all-view">
    <div class="row mb-3">
        <div class="col">
            <h3 class="pb-2">Manage Code Detail</h3>
        </div>
        <div class="col text-right">
            <a href="{{ route('codeDetail.add') }}" class="btn btn-success btn-xs d-inline-flex align-items-center px-4 "><i class="fs-4 bi-patch-plus pr-2"></i>Add</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mininum Price</th>
                <th>Amount</th>
                <th>Discount Type</th>
                <th>Term Condition</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail as $details)
            <tr>
                <td>{{$details->id}}</td>
                <td>{{$details->minimum_price}}</td>
                <td>{{$details->discount_amount}}</td>
                <td>{{$details->discount_type_name}}</td>
                <td>
                    @foreach($details->term_condition_id as $value => $label)
                        {{$label}} <br>
                    @endforeach  
                </td>
                <td>
                    <a href="{{ route('codeDetail.edit', ['id'=>$details->id]) }}" class="clr-icon"><i class="fs-4 bi-pencil-square"></i></a>
                    &nbsp;
                    <a href="{{ route('codeDetail.delete', ['id'=>$details->id] ) }}" class="clr-icon" onclick="return confirm('Are you sure need to delete this code')"><i class="fs-4 bi-trash3"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $detail->links() }}
    </div>
</div>

@endsection
