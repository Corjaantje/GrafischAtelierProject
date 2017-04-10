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
    <?php
    $articles = App\NewsArticle::all();
    $controller = new \App\Http\Controllers\NewsArticleController();
    ?>
    <table id="table-style">
        <tr id="table-row-style">
            <th id="table-header-style">ID</th>
            <th id="table-header-style">Title</th>
            <th id="table-header-style">ImageURL</th>
            <th id="table-header-style">Description</th>
            <th id="table-header-style">Text</th>
            <th id="table-header-style">Date</th>
            <th id="table-header-style">Visible</th>
            <th></th>
        </tr>
        @foreach ($articles as $article)
            <tr id="table-row-style">
                <td id="table-data-style"> {{ $article->ID }}</td>
                <td id="table-data-style"> {{ $article->Title }}</td>
                <td id="table-data-style"> {{ $article->Image }}</td>
                <td id="table-data-style"> {{ $article->Description }}</td>
                <td id="table-data-style"> {{ $article->Text }}</td>
                <td id="table-data-style"> {{ $article->Date }}</td>
                <td id="table-data-style"> {{ $article->Visible }}</td>
                <td> <button type="button" onclick="window.location='{{URL::route('editNewsArticle', $article->ID)}}'">Edit</button></td>

            </tr>
        @endforeach
    </table>
</div>
</body>
</html>