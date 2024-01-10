<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
    }

    #sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      background-color: #333;
      padding-top: 20px;
    }

    #sidebar a {
      padding: 10px;
      text-decoration: none;
      font-size: 18px;
      color: #fff;
      display: block;
      transition: 0.3s;
    }

    #sidebar a:hover {
      background-color: #555;
    }

    
  </style>
</head>
<body>


<div class="container-fluid">
        @yield('content')
</div>

<script>
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
</body>
</html>
