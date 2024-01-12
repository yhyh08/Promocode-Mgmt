<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script> 
        
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid m-5 all-view">                    
                    <h3 class="pb-2">Promo Code Detail </h3>
                    <form action="" method="" enctype="multipart/form-data">
                        
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

                        <div class="form-group">
                            <label for="count">Redeem Count</label>
                            <input class="form-control" type="text" id="count" name="count" value="{{$promo->redeem_count}}" readonly> 
                        </div>
                        <div class="form-group">
                            <label for="limit">Redeem Limit</label>
                            <input class="form-control" type="text" id="limit" name="limit" value="{{ $promo->limit }}"readonly >
                        </div>
                        
                        <div class="form-group">
                            <label for="expired_date">Expired Date</label>
                            <input class="form-control" type="text" id="expired_date" name="expired_date" value="{{$promo->expires_at}}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="detail">Code Detail</label>
                            <input class="form-control" type="text" id="detail" name="detail" value="{{ $type->name }}" readonly>

                            
                            <div class="form-group">
                                <label for="price">Minimum Price</label>
                                <input class="form-control" type="text" value="{{ $detail->minimum_price }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="amount">Discount Amount</label>
                                <input class="form-control" type="text" value="{{ $detail->discount_amount }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="type">Discount Type</label>
                                <input class="form-control" type="text" value="{{ $type->name}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="condition">Term condition</label>
                                <input class="form-control" type="text" value="{{ $term}}" readonly>
                            </div>
                        </div>
                        
                    </form>
                </div>      
            </div>
        </div>
    </body>
</html>

