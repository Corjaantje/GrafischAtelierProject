<!DOCTYPE html>
<html class="html-cms">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="body-cms">
    @include('layouts.cms_navigation', array('currentPage'=>'CMS - Edit Sponsor'))
    <div  class="container-cms">
        {{ Form::open(['route' => 'edit_sponsor']) }}
            <input type="hidden" name="_token" value=" {{ csrf_token() }} " >
        <!-- $parts takes the current url, the url will be split on '/' and the last part will be taken, the ID -->
            @php
                $parts=parse_url(url()->current());
                $path_parts=explode('/', $parts['path']);
                $sponsor = App\Sponsor::where('id', '=', $path_parts[count($path_parts)-1] )->first();
            @endphp

            <input type="hidden" name="id" value="{{ $sponsor->id}}" />
            <br> <br>
            Naam: <br>
            <input type="text" name="Name" value="{{$sponsor->name}}" required> <br> <br>
            Afbeelding:
            <input type="file" accept=".jpeg, .jpg, .png" name="image" value="{{$sponsor->image}}" required> <br>
            Sponsor URL: <br>
            <input type="url" name="URL" value="{{$sponsor->sponsor_url}}" required> <br><br>
            <input class="btn btn-primary" type="submit" value="Opslaan"/>
        {{ Form::close() }}
    </div>
</body>
</html>