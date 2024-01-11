@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container-fluid m-5 all-view">
        <a href="{{ url()->previous() }}" class="btn btn-info btn-xs d-inline-flex align-items-center mb-3"><i class="fs-4 bi-backspace pr-2"></i>Back</a>

        <h3 class="pb-2">Show Detail Promo Code</h3>
        <form action="" method="" enctype="multipart/form-data">
            @foreach($promo as $promo)

            <div class="form-group">
                <input type="hidden" name="id" value="{{$promo->id}}">
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="codeName">Name</label>
                    <input class="form-control" type="text" id="codeName" name="codeName" value="{{$promo->name}}" readonly> 
                </div>
                <div class="col">
                    <label for="code">code</label>
                    <input id="code" class="form-control" type="text" value="{{ $promo->code }}" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for="codeDescription">Description</label>
                <input class="form-control" type="text" id="codeDescription" name="codeDescription" value="{{$promo->description}}" readonly>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="count">Redeem Count</label>
                    <input class="form-control" type="number" id="count" name="count" value="{{$promo->redeem_count}}" readonly> 
                </div>
                <div class="col">
                    <label for="limit">Redeem Limit</label>
                    <input class="form-control" type="number" id="limit" name="limit" value="{{ $promo->limit }}"readonly >
                </div>
            </div>
            
            <div class="form-group">
                <label for="expired_date">Expired Date</label>
                <input class="form-control" type="date" id="expired_date" name="expired_date" value="{{$promo->expires_at}}" readonly>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="checkbox" data-id="{{ $promo->id }}" name="status" readonly class="js-switch" {{ $promo->status == 1 ? 'checked' : '' }} >
            </div>

            <div class="form-group">
				<label for="detail">Code Detail</label>
                <select id="detail" name="detail" class="form-control" readonly>
                    @foreach ($detail as $detail)
                        <option value="" readonly>{{ $detail->discount_type_name }}</option>
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
            @endforeach
        </form>
    </div>
</div>

{{-- <script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
    });

    $(document).ready(function(){
        $('.js-switch').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let codeId = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('promocode.status') }}',
                data: {'status': status, 'promoId': codeId},
                success: function (data) {
                    console.log(data.message);
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
</script> --}}
@endsection