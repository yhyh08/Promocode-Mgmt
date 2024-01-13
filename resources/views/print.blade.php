<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="icon" href="{{asset('img/sitelogo.png')}}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script> 
    </head>
    <style>
        .print-view{
            width: 80%;
        }
    </style>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid m-5 print-view">                    
                    <h3 class="pb-2">Promo Code Detail </h3>
                    <table class="table table-striped w-80 ">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/gift-voucher.png'))) }}" width="200px" class="mb-3">

                        <tr>
                            <th>ID</th>
                            <td>{{ $promo->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $promo->name }}</td>
                        </tr>
                        <tr>
                            <th>Code</th>
                            <td>{{ $promo->code }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $promo->description }}</td>
                        </tr>
                        <tr>
                            <th>Redeem Count</th>
                            <td>{{ $promo->redeem_count }}</td>
                        </tr>
                        <tr>
                            <th>Redeem Limit</th>
                            <td>{{ $promo->limit }}</td>
                        </tr>
                        <tr>
                            <th>Expired Date</th>
                            <td>{{ $promo->expires_at }}</td>
                        </tr>
                        <tr>
                            <th>Code Detail</th>
                            <td>{{ $type->name }}</td>
                        </tr>
                        <tr>
                            <th>Minimum Price</th>
                            <td>{{ $detail->minimum_price }}</td>
                        </tr>
                        <tr>
                            <th>Discount Amount</th>
                            <td>{{ $detail->discount_amount }}</td>
                        </tr>
                        <tr>
                            <th>Discount Type</th>
                            <td>{{ $type->name }}</td>
                        </tr>
                        <tr>
                            <th>Term condition</th>
                            <td>{{ $term }}</td>
                        </tr>
                    </table>
                </div>      
            </div>
        </div>
    </body>
</html>
