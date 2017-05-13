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
@if (Auth::check() && Auth::user()->role == "admin")
    @include('layouts.cms_navigation', array('currentPage'=>'cmsSponsors'))
    <div  class="container-cms">
        {{ Form::open(['route' => 'edit_sponsor']) }}
            <input type="hidden" name="_token" value=" {{ csrf_token() }} " >
            @php
                $parts=parse_url(url()->current());
                $path_parts=explode('/', $parts['path']);
                $sponsor = App\Sponsor::where('id', '=', $path_parts[count($path_parts)-1] )->first();
            @endphp

            <input type="hidden" name="id" value="{{ $sponsor->id}}" />
            <br> <br>
            Name: <br>
            <input type="text" name="name" value="{{$sponsor->name}}" required> <br> <br>
            Image:
            <input type="file" accept=".jpeg, .jpg, .png" name="image" value="{{$sponsor->image}}"> <br>
            Sponsor URL: <br>
            <input type="text" name="sponsor_url" value="{{$sponsor->sponsor_url}}" required> <br>
            @php
                if($sponsor->visible == 1)
                {
                      echo 'Zichtbaar <input type="checkbox" checked="true"name="visible"/> <br><br>';
                }
                else
                {
                      echo 'Zichtbaar <input type="checkbox" name="visible"/> <br><br>';
                }
            @endphp
            <input class="btn btn-primary" type="submit" value="Opslaan"/>
        {{ Form::close() }}
    </div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>