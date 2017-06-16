<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
@include('layouts.header', array('title'=>'webshop'))
<div class="container">
    <div class="row">
        @php
            $products = App\Product::all()
        @endphp
        <h3 class="title">&nbsp Webshop</h3>
        @if ($products->count() > 0)

            @foreach($products as $product)

                @php
                    $productnr = $product->id;
                    $productTitle = $product->name;
                    $productPrice = $product->price;
                    $productDescription = $product->description;
                    $fileName = URL::asset('img/Producten/'.$product->image);
                @endphp

                <div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                    <img src="{{$fileName}}" style="width: 100%;" data-toggle='modal' data-target="#{{$productnr}}">
                    <br>
                    <br>
                    <b>Productnaam</b>: {{$productTitle}}
                    <br>
                    <b>Prijs</b>: &euro;{{ $productPrice }}
                    <br>
                    <b>Beschrijving</b>: {{$productDescription}}
                    <br>
                    <div class='modal fade' id="{{$productnr}}" role='dialog'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                    <h4 class='modal-title modalProductTitle'>{{$productTitle}}</h4>
                                </div>
                                <div class='modal-body'>
                                    <img src="{{$fileName}}" class="modalImage" height="50%" width="80%">
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h3>Er zijn geen producten om te laten zien.</h3>
        @endif
    </div>
</div>
<br>
@include('layouts.footer')
</body>
</html>
