@extends('layouts.app')

@section('content')

<div class="container w-50 mt-5">
    <a href="{{ url()->previous() }}" class="btn btn-light btn-xs d-inline-flex align-items-center mb-3"><i class="fs-4 bi-backspace pr-2"></i>Back</a>

    <div class="card bg-dark text-white text-center border-0">
        <img class="card-img" src="{{ asset('img/neutral.png') }}" width="300px" alt="voucher image">
        <div class="card-img-overlay row">
            @foreach($detail as $item)
                <h2 class="card-title font-weight-bold text-secondary">
                    {{ $item->discount_type_category }}
                </h2> 
                <h4 class="card-title text-danger">
                    {{ $item->discount_type_type }}
                </h4>  
                <h3 class="card-title text-danger font-weight-bold">
                    {{ $item->discount_amount }}
                </h3>
                <div class="card-text text-body term-text">
                    <p class="card-text text-black-50">Terms and conditions</p>
                    @foreach($item->term_condition_id as $value => $label)
                        {{ $label }}<br>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
