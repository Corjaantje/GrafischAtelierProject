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
		<script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
		</script>
	</head>
	<body class="body-cms">
	@if (Auth::check() && Auth::user()->role == "admin")
		@include('layouts.cms_navigation', array('currentPage'=>'Producten'))
		
		<div class="container-cms">

			<br><br><br>
			<h2><b>Product bewerken</b> @include('tooltip', array('text'=>'Hier kun je bestaande producten uit de webshop wijzigen.')) </h2>
			<br>

			{{ Form::open(['route' => 'edit_product', 'files' => true]) }}
					
				<!-- hidden "_token" is necessary for laravel, will throw tokenmismatch exception if not included -->
				{{ Form::hidden('_token', csrf_token()) }}
					
				{{ Form::hidden('Id', $Id) }}
						
				Naam: {{ Form::text('Name', $formData['name'],array('required' => 'required')) }} <br>
				Prijs: <input type="number" name="Price" min="0" value="{{ $formData['price']}}" step="any" required/> <br>
				Beschrijving <br>
				{{ Form::textarea('Description', $formData['description'],array('required' => 'required'))}} <br>
       			Afbeelding:
        		<input type="file" accept=".jpeg, .jpg, .png" name="Image" value=""> <br>
						
				<input class="btn btn-primary"  type="submit" value="Opslaan">
						
			{{ Form::close() }}
					
		</div>
	@else

		<script>window.location.href = "{{ route('login') }}"</script>

	@endif
	</body>
</html>