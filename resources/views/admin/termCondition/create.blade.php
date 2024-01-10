@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid m-5 all-view">
        <h3 class="pb-2">Add Term Condition</h3>
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
            <button type="submit" class="btn btn-primary btn-clr">Add New</button>            
        </form>
    </div>
</div>

@endsection