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
@include('layouts.cms_navigation', array('currentPage'=>'Nieuws'))
<div class="container">

    <!--CONTENT IN HERE-->
    <!-- Knop om nieuwe artikelen aan te maken -->
    <br>
    <button type="button" onclick="window.location='{{URL::route('newNewsArticle')}}'">Nieuw artikel aanmaken</button>
    <br>

    <!-- Artikelen -->
    @php
    $articles = App\NewsArticle::all();
    $controller = new \App\Http\Controllers\NewsArticleController();
    @endphp

    <table id="table-style">
        <tr id="table-row-style">
            <th id="table-header-style">ID</th>
            <th id="table-header-style">Titel</th>
            <th id="table-header-style">Afbeelding</th>
            <th id="table-header-style">Omschrijving</th>
            <th id="table-header-style">Tekst</th>
            <th id="table-header-style">Datum</th>
            <th id="table-header-style">Zichtbaar?</th>
            <th></th>
        </tr>
        @foreach ($articles as $article)
            <tr id="table-row-style">
                <td id="table-data-style"> {{ $article->id }}</td>
                <td id="table-data-style"> {{ $article->title }}</td>
                <td id="table-data-style"> {{ $article->image }}</td>
                <td id="table-data-style"> {{ $article->description }}</td>
                <td id="table-data-style"> {{ $article->text }}</td>
                <td id="table-data-style"> {{ $article->date }}</td>
                <td id="table-data-style"> {{ $article->visible }}</td>
                <td> <button type="button" onclick="window.location='{{URL::route('editNewsArticle', $article->id)}}'">Wijzig</button></td>

            </tr>
        @endforeach
    </table>
</div>
</body>
</html>