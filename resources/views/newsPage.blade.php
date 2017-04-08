<!DOCTYPE html>
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
@include('layouts.header', array('title'=>'Nieuws'))
	<div class="container">
		<h1 class="title text-center">Nieuws</h1>

        <?php

        $articles = App\NewsArticle::Where('Visible', '=', '1')->get();
        ?>

		@foreach ($articles as $article)
			<div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1\">
				<h1> {{ $article->Title }}</h1>
				<img src="https://i.vimeocdn.com/portrait/58832_300x300" />
				<p> {{$article->Description}}</p>
				<?php
				$id = $article->ID
						?>
				<a href="artikel/{{$id}}">LEES MEER</a>
			</div>
		@endforeach
	</div>
@include('layouts.footer')
</body>

</html>