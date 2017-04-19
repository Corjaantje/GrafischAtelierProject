<?php 
	use App\Http\Controllers\ProductController;
	$controller = new ProductController();
	
	$formData = $controller->getFormData($Id);
	
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

			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 col-sm-offset-1 col-xs-10 col-xs-offset-1" >

					{{ Form::open(['route' => 'edit_product']) }}
					
						<!-- hidden "_token" is necessary for laravel, will throw tokenmismatch exception if not included -->
						{{ Form::hidden('_token', csrf_token()) }}
						
						{{ Form::hidden('Id', $Id) }}
						
						Naam: {{ Form::text('Name', $formData['name']) }} <br>
						Prijs: <input type="number" name="Price" min="0" value="{{ $formData['price']}}"/> <br>
						Beschrijving <br>
						{{ Form::textarea('Description', $formData['description'])}} <br>
						
						<input class="btn btn-primary"  type="submit" value="Opslaan">
						
					{{ Form::close() }}
					
					
				</div>

			</div>

		</div>
	@else

		<script>window.location.href = "{{ route('login') }}"</script>

	@endif
	</body>
</html>