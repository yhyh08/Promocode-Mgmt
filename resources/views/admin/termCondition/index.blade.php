@extends('layouts.app')

@section('content')
<div class="container-fluid m-5 all-view">
    <div class="row mb-3">
        <div class="col">
            <h3 class="pb-2">Manage Terms and Conditions</h3>
        </div>
        <div class="col text-right">
            <a href="{{ route('termCondition.add') }}" class="btn btn-success btn-xs d-inline-flex align-items-center px-4 "><i class="fs-4 bi-patch-plus pr-2"></i>Add</a>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($term as $terms)
            <tr>
                <td>{{$terms->id}}</td>
                <td>{{$terms->title}}</td>
                <td>{{$terms->content}}</td>
                <td>
                    <a href="{{ route('termCondition.edit', ['id'=>$terms->id]) }}" class="clr-icon"><i class="fs-4 bi-pencil-square"></i></a>
                    &nbsp;
                    <a href="{{ route('termCondition.delete', ['id'=>$terms->id] ) }}" class="clr-icon" onclick="return confirm('Are you sure need to delete this terms')"><i class="fs-4 bi-trash3"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $term->links() }}
    </div>
</div>
@endsection
