@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid m-5 all-view">
        <h3 class="pb-2">Edit Code Detail</h3>
        <form action="{{ route('codeDetail.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @foreach($detail as $detail)
            <div class="form-group">
                <label for="price">Minimum Price</label>
                <input type="hidden" name="id" value="{{$detail->id}}">
                <input class="form-control" type="number" id="price" name="price" required value="{{$detail->minimum_price}}">
            </div>    
            <div class="form-group">    
                <label for="amount">Discount Amount</label>
                <input class="form-control" type="number" id="amount" name="amount" required value="{{$detail->discount_amount}}"> 
            </div>
            <div class="form-group">
                <label for="type">Discount Type</label>
                <select  name="type" class="form-control">
                    @foreach ($type as $type)
                        <option  value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                <!-- <input class="form-control" type="text" id="category" name="category" required value="{{$type->category}}">  -->
            </div>
            <div class="form-group">
                <label for="condition">Terms and Conditions</label>
                <select multiple class="form-control" name="condition[]">
                    @foreach ($condition as $condition)
                        <option value="{{ $condition->id }}">{{ $condition->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-clr">Update</button>
            @endforeach
        </form>
    </div>
</div>

@endsection