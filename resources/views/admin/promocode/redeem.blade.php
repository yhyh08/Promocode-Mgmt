@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>User</td>
                    <td>Code</td>
                    <td>Redeem Date</td>
                </tr>
            </thead>
            <tbody>
                @foreach($redeem as $redeem)
                <tr>
                    <td>{{$redeem->id}}</td>
                    <td>{{$redeem->user_id}}</td>
                    <td>{{$redeem->code}}</td>
                    <td>{{$redeem->redeem_date}}</td>
                    <td>
                        <a href="{{ route('redeem.delete', ['id'=>$redeem->id] ) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure need to delete this type')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-6"></div>
</div>

@endsection
