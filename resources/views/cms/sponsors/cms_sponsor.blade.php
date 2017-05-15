@php
    $sponsors = App\Sponsor::all();
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
</head>
<body class="body-cms">
@if (Auth::check() && Auth::user()->role == "admin")
    @include('layouts.cms_navigation', array('currentPage'=>'Sponsor Overzicht'))
    <div class="container-cms">
        <br><br>
        <button type="button" class="btn btn-primary"  onclick="window.location='{{URL::route('cms_createSponsors')}}'">Sponsor toevoegen</button>  <!--Todo: linken naar sponsor aanmaken-->

        <table id="table-style">
            <tr id="table-row-style">
                <th id="table-header-style">Logo</th>
                <th id="table-header-style">Naam</th>
                <th id="table-header-style">Website</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($sponsors as $sponsor)
                <tr id="table-row-style">
                    <td id="table-data-style"><img src="{{URL::asset('/img/Sponsors/'.$sponsor->image)}}" height="50px" width="50px"/></td>
                    <td id="table-data-style">{{$sponsor->name}}</td>
                    <td id="table-data-style">{{$sponsor->sponsor_url}}</td>
                    <td id="table-data-style"><button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('editSponsor', $sponsor->id)}}'">Bewerken</button></td> <!--Todo: linken naar sponsor wijzigen-->
                    <td id="table-data-style"><button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('editNewsArticle', $sponsor->id)}}'">Verwijderen</button></td> <!--Todo: Linken naar sponsor verwijderen-->
                </tr>

            @endforeach
        </table>
    </div>
@endif
</body>
</html>