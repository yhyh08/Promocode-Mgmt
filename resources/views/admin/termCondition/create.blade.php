@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add Term Condition</h3>
        <form action="{{ route('termCondition.create') }}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="title">Title</label>
				<input class="form-control" type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
				<label for="content">Content</label>
				<input class="form-control" type="text" id="content" name="content" >
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection