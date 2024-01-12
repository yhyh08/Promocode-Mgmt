@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row m-3">
        @if(Session::has('success'))
            <div class="alert alert-success redeem-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @else
            <div class="alert alert-dangerous redeem-error" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <h2 class="pb-2">Redeem</h2>
        <div class="card pl-0 pr-0" style="width: 18rem;">
            <img src="{{ asset('img/gift-voucher.png') }}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Redeem Use</h5>
                <p class="card-text">Please enter the promocode here to use</p>
                <form action="{{ route('promocode.apply') }}" method="post" enctype='multipart/form-data' >
                    @csrf
                    <div class="form-group">
                    <input class="form-control" type="text" id="code" name="code">
                    </div>
                    <button type="submit" class="btn btn-success">Apply</button>
                </form>
            </div>
        </div>
    </div>

@endsection
