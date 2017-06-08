<?php
use App\Http\Controllers\ProductController;

$controller = new ProductController();
$products = App\Product::all();
?>
        <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="html-cms">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="body-cms">
@include('layouts.cms_navigation', array('currentPage'=>'Producten'))

<div class="container-cms">
    <br><br><br>
    <h2><b>Producten in de
            winkel</b> @include('tooltip', array('text'=>'Dit is het overzicht van alle producten in de webshop met hun titel en prijs.'))
    </h2>
    <br>
    <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('product_creator')}}'">Nieuw
        Product
    </button>

    <table id="table-style">

        <tr id="table-row-style">

            <th id="table-header-style">Titel</th>
            <th id="table-header-style">Prijs</th>
            <th></th>
            <th></th>

        </tr>

        @foreach($products as $product)

            <tr id="table-row-style">

                <td id="table-data-style"> {{ $product->name }}</td>
                <td id="table-data-style"> &euro; {{ number_format($product->price, 2) }}</td>

                <td>
                    <button type="button" class="btn btn-primary"
                            onclick="window.location='{{URL::route('product_editor', $product->id)}}'">Bewerken
                    </button>
                </td>
                <td>
                    <form action="verwijderProduct/{{$product->id}}"><input type="submit" class="btn btn-danger"
                                                                            value="Verwijderen"/></form>
                </td>

            </tr>

        @endforeach

    </table>

</div>
</body>
</html>