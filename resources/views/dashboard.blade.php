@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col pl-0 pr-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-5 bg-body-tertiary">
                <div class="container-fluid justify-content-center">
                    <div class="row px-3 py-2">
                        <h3 class="p-0">Welcome back, {{ Auth::user()->name }} ! </h3>
                    </div>
                </div>
            </nav>

            <div class="row px-4">
                <h2 class="mb-3">Dashboard</h2>

                <div class="col-sm-3 mb-3">
                    <div class="card card-clr1">
                        <div class="card-body text-center">
                            <h3 class="card-title font-weight-bold">{{ $promocode }}</h3>
                            <p class="card-text">Total Promocode</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card card-clr2">
                        <div class="card-body text-center">
                            <h3 class="card-title font-weight-bold">{{ $detail }}</h3>
                            <p class="card-text">Total Code Detail</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card card-clr1">
                        <div class="card-body text-center">
                            <h3 class="card-title font-weight-bold">{{ $discount }}</h3>
                            <p class="card-text">Total Discount Type</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <div class="card card-clr2">
                        <div class="card-body text-center">
                            <h3 class="card-title font-weight-bold">{{ $terms }}</h3>
                            <p class="card-text">Total Terms and Conditions</p>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>    
</div>

@endsection
