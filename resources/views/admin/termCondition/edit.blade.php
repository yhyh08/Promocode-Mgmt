@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid m-5 all-view">
        <h3 class="pb-2">Edit Terms and Conditions</h3>
        <form action="{{ route('termCondition.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @foreach($term as $term)
            <div class="form-group">
                <label for="title">Title</label>
                <input type="hidden" name="id" value="{{$term->id}}">
                <input class="form-control" type="text" id="title" name="title" required value="{{$term->title}}"> 
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input class="form-control" type="text" id="content" name="content" value="{{$term->content}}"> 
            </div>
            <button type="submit" class="btn btn-primary btn-clr">Update</button>
            @endforeach
        </form>
    </div>
</div>

@endsection