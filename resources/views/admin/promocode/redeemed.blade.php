@extends('layouts.app')

@section('content')
<div class="container-fluid m-5 all-view">
    <div class="row mb-3">
        <div class="col">
            <h3 class="pb-2">Redeemed</h3>
        </div>
        <div class="col text-right">
            <a href="{{ route('redeem') }}" class="btn btn-success btn-xs d-inline-flex align-items-center px-4 "><i class="fs-4 bi-patch-plus pr-2"></i>Redeem</a>
        </div>
    </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Code</th>
                    <th>Redeem Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($redeemed as $redeems)
                <tr>
                    <td>{{$redeems->id}}</td>
                    <td>{{$redeems->user_id}}</td>
                    <td>{{$redeems->code}}</td>
                    <td>{{$redeems->redeem_date}}</td>
                    <td>
                        <a href="{{ route('redeem.delete', ['id'=>$redeems->id] ) }}" class="clr-icon" onclick="return confirm('Are you sure need to delete')"><i class="fs-4 bi-trash3"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div class="d-flex justify-content-end">
        {{ $redeemed->links() }}
    </div>
</div>

@endsection
