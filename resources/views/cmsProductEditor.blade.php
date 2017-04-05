<?php 
	use App\Http\Controllers\ProductController;
	$id = -1;
	if(isset($_POST['Id']))
		$id = $_POST['Id']
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
		@include('layouts.cmsHeader', array('currentPage'=>'cmsProduct'))
		
		<div class="container">

			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 col-sm-offset-1 col-xs-10 col-xs-offset-1" >

					<form action="cmsCreateProduct" method="post">
			
						<input type="hidden" value="<?php echo $id?>" name="Id" />
			
						Naam: <input type="text" name="Name" /> <br>
						Prijs: <input type="number" name="Price" step="0.01"/><br>
						Beschrijving: <input type="text" name="Description"/><br>
				
						<input type="submit" value="Aanmaken"/>
				
					</form>
				</div>

			</div>

		</div>
		
	</body>
</html>