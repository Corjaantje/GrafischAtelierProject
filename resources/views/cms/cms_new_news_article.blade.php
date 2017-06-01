@php
foreach(App\Newsfilter::all() as $filter)
{
	$filters[] = $filter->name;
}
@endphp
<!DOCTYPE html>
<html class="html-cms">
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
@include('layouts.cms_navigation', array('currentPage'=>'Nieuws'))
<div class="container-cms">
    <br><br><br>
    <h2><b>Nieuw nieuwsartikel</b> @include('tooltip', array('text'=>'Hier kun je nieuwe nieuwsartikelen aanmaken.')) </h2>
    <form action="nieuw_artikel" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value=" {{ csrf_token() }} ">
        <input type="hidden" name="id" value="-1"/>
        <br> <br>
        Titel: <br>
        <input type="text" name="title" value="" required> <br> <br>
        Afbeelding:
        <input type="file" accept=".jpeg, .jpg, .png" name="image" value=""> <br>
        Omschrijving: <br>
        <textarea rows="5" cols="60" name="description" required></textarea> <br>
        Tekst: <br>
        <textarea rows="5" cols="60" name="text" required></textarea>  <br>
        Datum:
        <input type="date" name="date" value="@php echo date('Y-m-d'); @endphp" required/> <br>
        Zichtbaar:


        <input type="checkbox" name="visible" value="1" checked> <br>
        Categorie: 
        {{ Form::select('filter_id', $filters) }} <br>
        <br>
        <input class="btn btn-primary" type="submit" value="Aanmaken"/>
    </form>
</div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>