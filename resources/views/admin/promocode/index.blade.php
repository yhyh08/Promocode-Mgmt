@extends('layout')
@section('content')
<script>
    function cal(){
        var names=document.getElementsByName('subtotal[]');
        var subtotal=0;
        var cboxes=document.getElementsByName('cid[]');
        var len=cboxes.length; //get number  of cid[] checkbox inside the page
        for(var i=0;i<len;i++){
            if(cboxes[i].checked){  //calculate if checked
                subtotal=parseFloat(names[i].value)+parseFloat(subtotal);
            }
        }
        document.getElementById('sub').value=subtotal.toFixed(2); //convert 2 decimal place      
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Code</td>
                    <td>Redeem Count</td>
                    <td>Expires At</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($promocode as $promocode)
                <tr>
                    <td>{{$promocode->id}}</td>
                    <td>{{$promocode->name}}</td>
                    <td>{{$promocode->description}}</td>
                    <td>{{$promocode->code}}</td>
                    <td>{{$promocode->redeem_count}}</td>
                    <td>{{$promocode->expires_at}}</td>
                    <td>
                        <input type="checkbox" data-id="{{ $promocode->id }}" name="status" class="js-switch" {{ $promocode->status == 1 ? 'checked' : '' }} >
                    </td>
                    <td>
                        <a href="{{ route('promocode.edit', ['id'=>$promocode->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                        &nbsp;
                        <a href="{{ route('promocode.delete', ['id'=>$promocode->id] ) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure need to delete this code')">Delete</a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-2">
    <br><br>
        <h3>Apply</h3>

        <form action="{{ route('promocode.apply') }}" method="post" enctype='multipart/form-data' >
            @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>&nbsp;</td>
                    <td>Name</td>                    
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td> 
                </tr>
            </thead> 
            <tbody>
               
                <tr>
                    <td>
                    <input type="checkbox" name="cid[]" id="cid[]" value="" onclick="cal()">
                    <input type="hidden" name="subtotal[]" id="subtotal[]" value="100">

                        <img src="" alt="" width="100" class="img-fluid"></td>
                    <td>test1</td>
                    <td>11</td>
                    <td>1</td> 
                    <td id='price'>100</td> 
                </tr>
                
                <tr align="right">
                    <td colspan="3">&nbsp;</td>
                    <td>RM<i> </i> <input type="text" value="0" name="sub" id="sub" size="7" readonly /></td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>

        @if(Session::has('success'))
            <div class="alert alert-success" role="aleart">
                {{ Session::get('success') }}
            </div>
        @else
            <div class="alert alert-dangerous" role="aleart">
                {{ Session::get('error') }}
            </div>
        @endif
        
            <div class="form-group">
				<label for="code">Redeem Code</label>
				<input class="form-control" type="text" id="code" name="code" required>
            </div>
            <button type="submit" class="btn btn-primary">Apply</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-6"></div>
</div>

@endsection
