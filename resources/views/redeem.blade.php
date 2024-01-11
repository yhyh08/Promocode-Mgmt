@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row m-3">
        @if(Session::has('success'))
            <div class="alert alert-success" role="aleart">
                {{ Session::get('success') }}
            </div>
        @else
            <div class="alert alert-dangerous" role="aleart">
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
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <button type="submit" class="btn btn-success">Apply</button>
                </form>
            </div>
        </div>
    </div>

        {{-- <h3>Apply</h3>

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
        <form action="{{ route('promocode.apply') }}" method="post" enctype='multipart/form-data' >
            @csrf
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
</script> --}}

@endsection

