@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid m-5 all-view">
        <h3 class="pb-2">Add Code Detail</h3>
        <form action="{{ route('codeDetail.create') }}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="price">Minimun Price</label>
				<input class="form-control" type="number" id="price" name="price" required>
            </div>
            <div class="form-group">
				<label for="amount">Discount Amount</label>
				<input class="form-control" type="number" id="amount" name="amount" required>
            </div>
            <div class="form-group">
				<label for="type">Discount Type</label>
                <select name="type" class="form-control">
                    @foreach ($type as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="condition">Terms and Conditions</label>
                <small id="emailHelp" class="form-text text-muted">*Can multiple select the terms*</small>
                <select multiple class="form-control" name="condition[]">
                    @foreach ($condition as $condition)
                        <option value="{{ $condition->id }}">{{ $condition->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-clr">Add New</button>            
        </form>
    </div>
</div>

@endsection