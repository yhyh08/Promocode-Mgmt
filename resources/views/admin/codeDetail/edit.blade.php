@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Code Detail</h3>
        <form action="{{ route('codeDetail.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @foreach($detail as $detail)
            <div class="form-group">
                <img src="" alt="" width="100" class="img-fluid"><br>
            <label for="price">Minimum Price</label>
            <input type="hidden" name="id" value="{{$detail->id}}">
            <input class="form-control" type="number" id="price" name="price" required value="{{$detail->minimum_price}}">
            
            <label for="amount">Discount Amount</label>
            <input class="form-control" type="number" id="amount" name="amount" required value="{{$detail->discount_amount}}"> 
            
            </div>
            <label for="type">Discount Type</label>
            <select  name="type" class="form-control">
                    @foreach ($type as $type)
                        <option  value="{{ $type->id }}" {{ $detail->discount_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            <div class="form-group">
            <label for="condition">Term Condition</label>
            <select name="condition" class="form-control">
                    @foreach ($condition as $condition )
                        <option value="{{ $condition->id }}" {{ $detail->term_condition_id == $condition->id ? 'selected' : '' }} >{{ $condition->title }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            
            @endforeach
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection