@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid m-5 all-view">
        <h3 class="pb-2">Edit Promo Code</h3>
        <form action="{{ route('promocode.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @foreach($promo as $promo)

            <div class="form-group">
                <label for="status" style="margin-right: 10px;">Status</label>
                <input type="hidden" name="id" value="{{$promo->id}}">
                <input data-id="{{$promo->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" {{ $promo->status == 1 ? 'checked' : '' }}> 
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="codeName">Name</label>
                    <input class="form-control" type="text" id="codeName" name="codeName" value="{{$promo->name}}" required> 
                </div>
                <div class="col">
                    <label for="code">code</label>
                    <input id="code" class="form-control" type="text" value="{{ $promo->code }}" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="codeDescription">Description</label>
                <input class="form-control" type="text" id="codeDescription" name="codeDescription" value="{{$promo->description}}" required>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="count">Redeem Count</label>
                    <input class="form-control" type="number" id="count" name="count" value="{{$promo->redeem_count}}" required> 
                </div>
                <div class="col">
                    <label for="limit">Redeem Limit</label>
                    <input class="form-control" type="number" id="limit" name="limit" value="{{ $promo->limit }}"required >
                </div>
            </div>
            
            <div class="form-group">
                <label for="expired_date">Expired Date</label>
                <input class="form-control" type="datetime-local" id="expired_date" name="expired_date" value="{{$promo->expires_at}}" required>
            </div>

            <div class="form-group">
				<label for="detail">Code Detail</label>
                <select id="detail" name="detail" class="form-control">
                    @foreach ($detail as $detail)
                        <option value="{{ $detail->id }}" {{ $promo->code_detail_id == $detail->id ? 'selected' : '' }}>{{ $detail->discount_type_name }}</option>
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
                
				<!-- <input class="form-control" type="text" id="type" name="type" required> -->
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            
            @endforeach
        </form>
    </div>
</div>


<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>

    $(document).ready(function(){
        $('.toggle-class').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let codeId = $(this).data('id');
            $.ajax({
                method: "GET",
                dataType: "json",
                url: '{{ route('promocode.status') }}',
                data: {'status': status, 'promoId': codeId},
                success: function (data) {
                    console.log('Error fetching details:', data);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        readOption();

        $('#detail').change(function () {
            readOption();
        });

        function readOption(){
            var selectedDetail = $('#detail').val();

            $.ajax({
                url: '../get_detail/' + selectedDetail, 
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#minimum_price').val(response.minimum_price);
                    $('#discount_amount').val(response.discount_amount);
                    $('#discount_type').val(response.discount_type_name);
                    $('#term_condition').val(response.term_condition_title);
                },
                error: function(error) {
                    console.log('Error fetching details:', error);
                }
            });
        }
    });
</script>
@endsection