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
    @include('layouts.cms_navigation', array('currentPage'=>'Sponsors'))
    <div class="container-cms">
        @if(Session::has('msg'))
            <br>
            <div class="alert alert-danger">
                <a class="close" data-dismiss="alert"></a>
                <strong>Verkeerd bestandstype</strong> {!! Session::get('msg') !!}
            </div>
        @endif
        <br><br><br>
        <h2><b>Sponsor overzicht</b> @include('layouts.tooltip', array('text'=>'Dit is het overzicht van alle sponsors. Ook zie je het logo, de naam en hun website.')) </h2>
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
                    <td id="table-data-style"><img src="{{URL::asset('/img/Sponsors/'.$sponsor->image)}}" height="50px" width="100px"/></td>
                    <td id="table-data-style">{{$sponsor->name}}</td>
                    <td id="table-data-style">{{$sponsor->sponsor_url}}</td>
                    <td id="table-data-style"><button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('editSponsor', $sponsor->id)}}'">Bewerken</button></td> <!--Todo: linken naar sponsor wijzigen-->
                    <td id="table-data-style">
                        {{ Form::open(['route' => 'cms_sponsor_delete', 'onsubmit' => 'return confirm("Weet u zeker dat u deze sponsor wilt verwijderen?")']) }}
                        {{ Form::hidden('id', $sponsor->id) }}
                        <input class="btn btn-danger" type="submit" value="Verwijderen">
                        {{ Form::close()}}
                    </td>
                </tr>

            @endforeach
        </table>
    </div>
</body>
</html>