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
                    <td>Title</td>
                    <td>Content</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($term as $term)
                <tr>
                    <td>{{$term->id}}</td>
                    <td>{{$term->title}}</td>
                    <td>{{$term->content}}</td>
                    <td>
                        <a href="{{ route('termCondition.edit', ['id'=>$term->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                        &nbsp;
                        <a href="{{ route('termCondition.delete', ['id'=>$term->id] ) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure need to delete this code')">Delete</a>
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
