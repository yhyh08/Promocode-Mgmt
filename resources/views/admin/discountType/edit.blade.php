@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Discount Type</h3>
        <form action="{{ route('discountType.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @foreach($type as $type)
            <div class="form-group">
                <img src="" alt="" width="100" class="img-fluid"><br>
            <label for="name">Name</label>
            <input type="hidden" name="id" value="{{$type->id}}">
            <input class="form-control" type="text" id="name" name="name" required value="{{$type->name}}"> 
            
            </div>
            <label for="category">Category</label>
            <select  name="category" class="form-control">
                    @foreach ($category as $value => $label)
                        <option  value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            <!-- <input class="form-control" type="text" id="category" name="category" required value="{{$type->category}}">  -->
            <div class="form-group">
            <label for="type">Discount Type</label>
            <select name="type" class="form-control">
                    @foreach ($method as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            <!-- <input class="form-control" type="text" id="type" name="type" required value="{{$type->type}}"> -->
            </div>
            <div class="form-group">
            <label for="remark">Remark</label>
            <input class="form-control" type="text" id="remark" name="remark" value="{{$type->remark}}">
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            
            @endforeach
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection