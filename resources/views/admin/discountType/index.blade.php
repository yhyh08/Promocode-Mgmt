@extends('layouts.app')

@section('content')
<div class="container-fluid m-5 all-view">
    <div class="row mb-3">
        <div class="col">
            <h3 class="pb-2">Manage Discount Type</h3>
        </div>
        <div class="col text-right">
            <a href="{{ route('discountType.add') }}" class="btn btn-success btn-xs d-inline-flex align-items-center px-4 "><i class="fs-4 bi-patch-plus pr-2"></i>Add</a>
        </div>
    </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Remark</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($type as $types)
                <tr>
                    <td>{{$types->id}}</td>
                    <td>{{$types->name}}</td>
                    <td>{{$types->category}}</td>
                    <td>{{$types->type}}</td>
                    <td>{{$types->remark}}</td>
                    <td>
                        <a href="{{ route('discountType.edit', ['id'=>$types->id]) }}" class="clr-icon"><i class="fs-4 bi-pencil-square"></i></a>
                        &nbsp;
                        <a href="{{ route('discountType.delete', ['id'=>$types->id] ) }}" class="clr-icon" onclick="return confirm('Are you sure need to delete this type')"><i class="fs-4 bi-trash3"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div class="d-flex justify-content-end">
        {{ $type->links() }}
    </div>
</div>

@endsection
