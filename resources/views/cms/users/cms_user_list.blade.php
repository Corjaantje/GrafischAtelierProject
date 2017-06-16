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
    @include('layouts.cms_navigation', array('currentPage'=>'Gebruikers'))
    <div class="container-cms">
        <br><br><br>
        <h2><b>Gebruiker overzicht</b> @include('layouts.tooltip', array('text'=>'Hier zie je het overzicht van alle gebruikers.')) </h2>
        <!--CONTENT IN HERE-->
        <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('cms_users_add')}}'">Nieuwe Gebruiker</button>
        <br>

        <table id="table-style">
            <tr id="table-row-style">
                <th id="table-header-style">Voornaam</th>
                <th id="table-header-style">Achternaam</th>
                <th id="table-header-style">Email</th>
                <th id="table-header-style">Adres</th>
                <th id="table-header-style">Rol</th>
                <th></th>
                <th></th>
            </tr>

            @foreach($users as $user)
                <tr id="table-row-style">
                    <td id="table-header-style">{{$user->first_name}}</td>
                    <td id="table-header-style">{{$user->last_name}}</td>
                    <td id="table-header-style">{{$user->email}}</td>
                    <td id="table-header-style">{{$user->address}}</td>
                    <td id="table-header-style">{{$user->role}}</td>
                    <td>

                        {{ Form::open(['route' => 'cms_users_edit']) }}
                        {{ Form::hidden('id', $user->id) }}
                        <input class="btn btn-primary" type="submit" value="Bewerken">
                        {{ Form::close()}}
                    </td>
                    <td>
                        {{ Form::open(['route' => 'cms_users_remove']) }}
                        {{ Form::hidden('id', $user->id) }}
                        @if($user->role !== 'admin')
                            <input class="btn btn-danger" type="submit" value="Verwijderen">
                        @endif
                        {{ Form::close()}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>