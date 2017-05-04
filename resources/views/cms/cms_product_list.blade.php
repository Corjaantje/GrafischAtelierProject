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
@if (Auth::check() && Auth::user()->role == "admin")
    @include('layouts.cms_navigation', array('currentPage'=>'cmsProduct'))

    <div class="container-cms">

		<h2><b>Product overzicht</b></h2>
        <br>
        <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('product_creator')}}'">Nieuw Product</button>

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
                        <form action="verwijderProduct/{{$product->id}}"><input type="submit" class="btn btn-danger" value="Verwijderen"/></form>
                    </td>

                </tr>

            @endforeach

        </table>

    </div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>