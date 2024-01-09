@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add Discount Type</h3>
        <form action="{{ route('discountType.create') }}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
				<label for="category">Category</label>
                <select name="category" class="form-control">
                    @foreach ($category as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
				<!-- <input class="form-control" type="text" id="category" name="category" required> -->
            </div>
            <div class="form-group">
				<label for="type">Type</label>
                <select name="type" class="form-control">
                    @foreach ($type as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
				<!-- <input class="form-control" type="text" id="type" name="type" required> -->
            </div>
            <div class="form-group">
                <label for="remark">Remark</label>
                <input type="text" name="remark" id="remark" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection