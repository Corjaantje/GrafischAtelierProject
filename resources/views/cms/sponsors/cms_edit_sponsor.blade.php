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
    @include('layouts.cms_navigation', array('currentPage'=>'Sponsors'))
    <div  class="container-cms">
        <br><br><br>
        <h2><b>Sponsor bewerken</b> @include('tooltip', array('text'=>'Hier kun je een bestaande sponsor bewerken.')) </h2>
        <form action="{{ route('edit_sponsor') }}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <!-- $parts takes the current url, the url will be split on '/' and the last part will be taken, the ID -->
                @php
                    $parts=parse_url(url()->current());
                    $path_parts=explode('/', $parts['path']);
                    $sponsor = App\Sponsor::where('id', '=', $path_parts[count($path_parts)-1] )->first();
                @endphp

            <input type="hidden" name="id" value="{{ $sponsor->id}}" />
            Naam: <input type="text" name="Name" value="{{ $sponsor->name }}" required /><br><br>
            Sponsor URL: <input type="url" name="URL" value="{{ $sponsor->sponsor_url }}" required  /><br><br>
            Afbeelding: <input type="file" name="Image" value="{{ $sponsor->image }}" required /><br><br>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>