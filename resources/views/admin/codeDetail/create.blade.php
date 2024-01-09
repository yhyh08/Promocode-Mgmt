@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add Code Detail</h3>
        <form action="{{ route('codeDetail.create') }}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="price">Minimun Price</label>
				<input class="form-control" type="number" id="price" name="price" required>
            </div>
            <div class="form-group">
				<label for="amount">Discount amount</label>
				<input class="form-control" type="number" id="amount" name="amount" required>
            </div>
            <div class="form-group">
				<label for="type">Discount Type</label>
                <select name="type" class="form-control">
                    @foreach ($type as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
				<!-- <input class="form-control" type="text" id="category" name="category" required> -->
            </div>
            <div class="form-group">
				<label for="condition">Term Condition</label>
                <select name="condition" class="form-control">
                    @foreach ($condition as $condition)
                        <option value="{{ $condition->id }}">{{ $condition->title }}</option>
                    @endforeach
                </select>
				<!-- <input class="form-control" type="text" id="type" name="type" required> -->
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection