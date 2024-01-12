@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid m-5 all-view">
        <h3 class="pb-2">Edit Discount Type</h3>
        <form action="{{ route('discountType.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @foreach($type as $type)
            <div class="form-group">
                <label for="name">Name</label>
                <input type="hidden" name="id" value="{{$type->id}}">
                <input class="form-control" type="text" id="name" name="name" required value="{{$type->name}}"> 
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select  name="category" class="form-control">
                    @foreach ($category as $value => $label)
                        <option  value="{{ $value }}" {{ $type->category == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Discount Type</label>
                <select name="type" class="form-control">
                    @foreach ($method as $value => $label)
                        <option value="{{ $value }}" {{ $type->type == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="remark">Remark</label>
                <input class="form-control" type="text" id="remark" name="remark" value="{{$type->remark}}">
            </div>
            <button type="submit" class="btn btn-primary btn-clr">Update</button>
            @endforeach
        </form>
    </div>
</div>

@endsection