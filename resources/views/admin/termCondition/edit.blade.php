@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Term Condition</h3>
        <form action="{{ route('termCondition.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @foreach($term as $term)
            <div class="form-group">
                <img src="" alt="" width="100" class="img-fluid"><br>
            <label for="title">Title</label>
            <input type="hidden" name="id" value="{{$term->id}}">
            <input class="form-control" type="text" id="title" name="title" required value="{{$term->title}}"> 
            
            </div>
            <label for="content">Content</label>
            <input class="form-control" type="text" id="content" name="content" value="{{$term->content}}"> 
            <button type="submit" class="btn btn-primary">Update</button>
            
            @endforeach
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection