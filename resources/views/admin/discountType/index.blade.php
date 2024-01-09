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
                    <td>Name</td>
                    <td>Category</td>
                    <td>Type</td>
                    <td>Remark</td>
                </tr>
            </thead>
            <tbody>
                @foreach($type as $type)
                <tr>
                    <td>{{$type->id}}</td>
                    <td>{{$type->name}}</td>
                    <td>{{$type->category}}</td>
                    <td>{{$type->type}}</td>
                    <td>{{$type->remark}}</td>
                    <td>
                        <a href="{{ route('discountType.edit', ['id'=>$type->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                        &nbsp;
                        <a href="{{ route('discountType.delete', ['id'=>$type->id] ) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure need to delete this type')">Delete</a>
                        
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
