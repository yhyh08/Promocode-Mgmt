@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid m-5 all-view">
        <h3 class="pb-2">Add New Promo Code</h3>
        <form action="{{ route('promocode.create') }}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="codeName">Code Name</label>
				<input class="form-control" type="text" id="codeName" name="codeName" required>
            </div>
            <div class="form-group">
				<label for="codeDescription">Description</label>
				<input class="form-control" type="text" id="codeDescription" name="codeDescription" >
            </div>
            <div class="form-group">
				<label for="limit">Limit</label>
				<input class="form-control" type="number" id="limit" name="limit" >
            </div>
            <div class="form-group">
                <label for="expired_date">Expired Date</label>
                <input type="date" name="expired_date" id="expired_date" class="form-control" required>
            </div>
            
            <div class="form-group">
				<label for="detail">Code Detail</label>
                <select id="detail" name="detail" class="form-control">
                    @foreach ($detail as $detail)
                        <option value="{{ $detail->id }}">{{ $detail->discount_type_name }}</option>
                    @endforeach
                </select>
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="price">Minimum Price</label>
                        <input id="minimum_price" class="form-control" type="text" value="" readonly>
                    </div>
                    <div class="col">
                        <label for="amount">Discount Amount</label>
                        <input id="discount_amount" class="form-control" type="text" value="" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="type">Discount Type</label>
                        <input id="discount_type" class="form-control" type="text" value="" readonly>
                    </div>
                    <div class="col">
                        <label for="condition">Term condition</label>
                        <input id="term_condition" class="form-control" type="text" value="" readonly>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-clr">Add New</button>            
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
        readOption();

        $('#detail').change(function () {
            readOption();
        });

        function readOption(){
            var selectedDetail = $('#detail').val();

            $.ajax({
                url: 'get_detail/' + selectedDetail, 
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#minimum_price').val(response.minimum_price);
                    $('#discount_amount').val(response.discount_amount);
                    $('#discount_type').val(response.discount_type_name);
                    // $('#term_condition').val(response.term_condition_title);
                },
                error: function(error) {
                    console.log('Error fetching details:', error);
                }
            });
        }
    });
</script>

@endsection