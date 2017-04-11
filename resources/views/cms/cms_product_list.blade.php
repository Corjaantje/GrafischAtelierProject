<?php
use App\Http\Controllers\ProductController;
$controller = new ProductController();
$products = App\Product::all();
?>
<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
		<script src="{{ URL::asset('js/app.js') }}"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		@include('layouts.cms_navigation', array('currentPage'=>'cmsProduct'))
		
		<div class="container">

			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 col-sm-offset-1 col-xs-10 col-xs-offset-1" >

					
					<table id="table-style">
					
						<tr id="table-row-style">
						
							<th id="table-header-style">Titel</th>
							<th id="table-header-style">Prijs</th>
							<th></th>
							<th></th>
							
						</tr>
						
						@foreach($products as $product)
						
							<tr id="table-row-style">
							
								<td id="table-data-style"> {{ $product->Name }}</td>
								<td id="table-data-style"> {{ $product->Price }}</td>
								
								<td> <button type="button" onclick="window.location='{{URL::route('cmsProductEditor', $product->ID)}}'">Bewerk</button> </td>
								<td> <form action="verwijderProduct/{{$product->ID}}"><input type="submit" value="verwijder"/></form> </td>
							
							</tr>
						
						@endforeach
					
					</table>
					
                    <button type="button" onclick="window.location='{{URL::route('cmsProductEditor', -1)}}'">Nieuw Product</button>

					
				</div>

			</div>

		</div>
		
	</body>
</html>