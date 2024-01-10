@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid m-5 all-view">
        <h3 class="pb-2">Add New Promo Code</h3>
        <form action="{{ route('promocode.create') }}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="codename">Code Name</label>
				<input class="form-control" type="text" id="codeName" name="codeName" required>
            </div>
            <div class="form-group">
				<label for="codeDescription">Description</label>
				<input class="form-control" type="text" id="codeDescription" name="codeDescription" >
            </div>
            <div class="form-group">
				<label for="limit">Limit</label>
				<input class="form-control" type="number" id="limit" name="limit" >
            </div>
            <div class="form-group">
                <label for="expired_date">Expired Date</label>
                <input type="date" name="expired_date" id="expired_date" class="form-control" required>
            </div>
            <div class="form-group">
				<label for="detail">Code Detail</label>
                
                @foreach ($detail as $detail)
                <select name="detail" class="form-control">
                    
                        <option value="{{ $detail->id }}">{{ $detail->discount_type_name }}</option>
                    
                </select>
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="price">Minimum Price</label>
                        <input class="form-control" type="text" value="{{ $detail->minimum_price }}" readonly>
                    </div>
                    <div class="col">
                        <label for="amount">Discount Amount</label>
                        <input class="form-control" type="text" value="{{ $detail->discount_amount }}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="type">Discount Type</label>
                        <input class="form-control" type="text" value="{{ $detail->discount_type_name }}" readonly>
                    </div>
                    <div class="col">
                        <label for="condition">Term condition</label>
                        <input class="form-control" type="text" value="{{ $detail->term_condition_title }}" readonly>
                    </div>
                </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary btn-clr">Add New</button>            
        </form>
    </div>
</div>

@endsection