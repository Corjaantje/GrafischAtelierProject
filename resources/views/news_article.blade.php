<html>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
<script src="{{ URL::asset('js/app.js') }}"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
@include('layouts.header', array('title'=>'Artikel'))

	<div class="container">

		<div class="row">
			@php
				
				if ($Id !== null && ctype_digit($Id))
				{
					$itemNr = intval($Id);
					$article = App\NewsArticle::where('Id', '=', $Id)->first();

                    echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1\">";

                    echo "<h1>";
                    echo $article->title;
					echo "</h1>";

					echo "<p> <br> <strong>";
                    echo $article->description;
                    echo "</strong> <br> </p>";

                    echo "<p> <br>";
                    echo $article->text;
                    echo "</p>";

                    echo "</div>";
				}
				else
				{

					echo "<div class=\"col-lg-12 col-md-12 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1\">";

					echo "<h1>Oops something went wrong</h1>";

					echo "</div>";
				}

			@endphp
		</div>
	</div>
@include('layouts.footer')
</body>
</html>