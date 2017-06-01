@php
$filters = App\Newsfilter::all();
@endphp
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

	@include('layouts.cms_navigation', array('currentPage'=>'Nieuwsfilters'))
	<div class="container-cms">
    <br><br><br>
	<h2><b>Nieuwsfilters overzicht</b> @include('tooltip', array('text'=>'Hier zie je het overzicht van de verschillende nieuwsfilters. Deze worden gebruikt om te filteren op bepaalde types nieuws.')) </h2>
	<!--CONTENT IN HERE-->
	<button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('cms_newsfilters_add')}}'">Nieuw Filter</button>
	<br>
	
	<table id="table-style">
	
		<tr id="table-row-style">
            <th id="table-header-style">Naam</th>
            <th></th>
            <th></th>
        </tr>
	
		@foreach($filters as $filter)
		
		<tr id="table-row-style">
            <td id="table-header-style">{{$filter->name}}</td>
            <td>
            	
                 {{ Form::open(['route' => 'cms_newsfilters_edit']) }}
                 {{ Form::hidden('id', $filter->id) }}
                 <input class="btn btn-primary" type="submit" value="Bewerken">
                 {{ Form::close()}}

            </td>
            <td>
            	{{ Form::open(['route' => 'cms_newsfilters_remove', 'onsubmit' => 'return confirm("Als u deze filter verwijderd worden alle artikelen uit deze categorie verplaatst naar de standaard categorie")']) }}
            	{{ Form::hidden('id', $filter->id) }}
            	<!-- dit zorgt ervoor dat de standaard filter niet verwijderd kan worden -->
            	@if($filter->id != 1)
            		<input class="btn btn-danger" type="submit" value="Verwijderen">
            	@endif
            	{{ Form::close()}}
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