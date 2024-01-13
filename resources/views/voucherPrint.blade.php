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
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    </head>
    <style>
        .term-text{
            font-size: 10px;
        }
    </style>
    <body>
        <div class="container w-50 mt-5">
            <div class="card bg-dark text-white text-center border-0">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/neutral.png'))) }}" height="300px">

                <div class="card-img-overlay row">
                    @foreach($detail as $item)
                        <h3 class="card-title font-weight-bold text-secondary">
                            {{ $item->discount_type_category }}
                        </h3> 
                        <h4 class="card-title text-danger">
                            {{ $item->discount_type_type }}
                        </h4>  
                        <h3 class="card-title text-danger font-weight-bold">
                            {{ $item->discount_amount }}
                        </h3>
                        <div class="card-text text-body term-text">
                            <p class="card-text text-black-50">Terms and conditions</p>
                            @foreach($item->term_condition_id as $value => $label)
                                {{ $label }}<br>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>

