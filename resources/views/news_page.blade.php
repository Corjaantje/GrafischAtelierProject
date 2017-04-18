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

        @php
        $articles = App\NewsArticle::Where('visible', '=', '1')->get();
        @endphp

		@foreach ($articles as $article)
			@if( ($loop->index % 3) == 0 )
			<div class="row">
			@endif
				<div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
					<h1> {{ $article->title }}</h1>
					<img src="{{ URL::to('/') }}/img/default.png" />
					<p> {{ $article->description }}</p>
					@php
					$id = $article->id
					@endphp
					<a href="artikel/{{$id}}">LEES MEER</a>
				</div>
			@if( ($loop->index % 3) == 2)
			</div>
			@endif
		@endforeach
	</div>
	</div>
@include('layouts.footer')
</body>

</html>