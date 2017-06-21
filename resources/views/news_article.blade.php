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
		<div class="col-lg-3 col-md-3 col-sm-4 col-sm-offset-0 col-xs-4"></div>

		<div class="col-lg-6 col-md-6 col-sm-4 col-sm-offset-0 col-xs-4">
		<h3>{{$article->title}}</h3>
		<p><i>{{$article->date}}</i></p>
			<p><b>{{$article->description}}</b></p>
		<p>{{$article->text}}<br></p>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-4 col-sm-offset-0 col-xs-4">
			<img src="{{URL::asset('img/NieuwsArtikelen/'.$article->image)}}"/>
		</div>
	</div>
@include('layouts.footer')
</body>
</html>