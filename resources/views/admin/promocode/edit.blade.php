@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Promo Code </h3>
        <form action="{{ route('promocode.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @foreach($promo as $promo)
            <div class="form-group">
                <img src="" alt="" width="100" class="img-fluid"><br>
            <label for="codeName">Name</label>
            <input type="hidden" name="id" value="{{$promo->id}}">
            <input class="form-control" type="text" id="codeName" name="codeName" required value="{{$promo->name}}"> 
            
            </div>
            <div class="form-group">
            <label for="codeDescription">Description</label>
            <input class="form-control" type="text" id="codeDescription" name="codeDescription" required value="{{$promo->description}}">
            </div>
            <!-- <div class="form-group">
            <label for="status">Status</label>
            <input class="form-control" type="number" id="status" name="status"  required value="{{$promo->status}}">
            </div> -->
            <div class="form-group">
            <label for="expired_date">Expired Date</label>
            <input class="form-control" type="date" id="expired_date" name="expired_date" required value="{{$promo->expires_at}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            
            @endforeach
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection