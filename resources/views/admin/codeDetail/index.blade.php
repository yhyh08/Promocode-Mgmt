@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Mininum Price</td>
                    <td>amount</td>
                    <td>Discount Type</td>
                    <td>Term Condition</td>
                </tr>
            </thead>
            <tbody>
                @foreach($detail as $detail)
                <tr>
                    <td>{{$detail->id}}</td>
                    <td>{{$detail->minimum_price}}</td>
                    <td>{{$detail->discount_amount}}</td>
                    <td>{{$detail->discount_type_name}}</td>
                    <td>{{$detail->term_condition_title}}</td>
                    <td>
                        <a href="{{ route('codeDetail.edit', ['id'=>$detail->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                        &nbsp;
                        <a href="{{ route('codeDetail.delete', ['id'=>$detail->id] ) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure need to delete this type')">Delete</a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-6"></div>
</div>

@endsection
