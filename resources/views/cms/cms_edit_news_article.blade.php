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
    @include('layouts.cms_navigation', array('currentPage'=>'Nieuws'))
            <div  class="container-cms">
                <form action="wijzig_artikel" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value=" {{ csrf_token() }} " >
                    <!-- Het $parts gedeelte pakt de huidige url, split hem vervolgens op '/' en neemt daar het laatste deel van, oftewel het ID -->
                    @php
                        $parts=parse_url(url()->current());
                        $path_parts=explode('/', $parts['path']);
                        $article = App\NewsArticle::where('id', '=', $path_parts[count($path_parts)-1] )->first();
                    @endphp

                    <input type="hidden" name="id" value="{{ $article->id}}" />
                    <br> <br>
                    Titel: <br>
                        <input type="text" name="title" value="{{$article->title}}"> <br> <br>
                    Afbeelding:
                        <input type="file" accept=".jpeg, .jpg, .png" name="image" value="{{$article->image}}"> <br>
                    Omschrijving: <br>
                        <textarea rows="5" cols="60" name="description">{{$article->description}} </textarea> <br>
                    Tekst: <br>
                        <textarea rows="5" cols="60" name="text"> {{$article->text}} </textarea>  <br>
                    Datum:
                        <input type="date" name="date" value="{{$article->date}}" /> <br>
                    Zichtbaar?: <br>
                        <input type="checkbox" name="visible" value="{{$article->visible}}" checked> <br>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Wijzigen"/>
                </form>
            </div>
    @else

        <script>window.location.href = "{{ route('login') }}"</script>

    @endif
    </body>
</html>