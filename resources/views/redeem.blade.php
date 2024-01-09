@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row m-3">
        <h2 class="pb-2">Redeem</h2>
        <div class="card pl-0 pr-0" style="width: 18rem;">
            <img src="{{ asset('img/gift-voucher.png') }}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Redeem Use</h5>
                <p class="card-text">Please enter the promocode here to use</p>
                <form>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>  

@endsection

