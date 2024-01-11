@extends('layouts.app')

@section('content')

<div class="container w-50 mt-5">
    <div class="card bg-dark text-white">
        <img class="card-img" src="{{ asset('img/neutral.png') }}" width="300px" alt="Card image">
        <div class="card-img-overlay">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text">Last updated 3 mins ago</p>
        </div>
    </div>
    <br>
    <div class="col text-right">
            <a href="{{route('voucher.print')}}" class="btn btn-success btn-xs d-inline-flex align-items-center px-4 ">print</a>
    </div>
</div>



@endsection    