@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid m-5 all-view">
        <h3 class="pb-2">Edit Promo Code</h3>
        <form action="{{ route('promocode.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @foreach($promo as $promo)
            <div class="form-group">
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
            <button type="submit" class="btn btn-primary btn-clr">Update</button>
            @endforeach
        </form>
    </div>
</div>

@endsection