<!DOCTYPE html>
<html>
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
                <form action="cmsEditArticle" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value=" {{ csrf_token() }} " >
                    <!-- Het $parts gedeelte pakt de huidige url, split hem vervolgens op '/' en neemt daar het laatste deel van, oftewel het ID -->
                    <?php

                            $parts=parse_url(url()->current());
                            $path_parts=explode('/', $parts['path']);
                            $article = App\NewsArticle::where('ID', '=', $path_parts[count($path_parts)-1] )->first();
                        ?>
                    <input type="hidden" name="ID" value="{{ $article->ID}}" />
                    <br> <br>
                    Titel: <br>
                        <input type="text" name="Title" value="{{$article->Title}}"> <br> <br>
                    Image:
                        <input type="file" accept=".jpeg, .jpg, .png" name="Image" value="{{$article->Image}}"> <br>
                    Description: <br>
                        <textarea rows="5" cols="60" name="Description">{{$article->Description}} </textarea> <br>
                    Text: <br>
                        <textarea rows="5" cols="60" name="Text"> {{$article->Text}} </textarea>  <br>
                    Date:
                        <input type="date" name="Date" value="{{$article->Date}}" /> <br>
                    Visible: <br>
                        <input type="checkbox" name="Visible" value="{{$article->Visible}}" checked> <br>
                    <br>
                    <input type="submit" value="Wijzigen"/>
                </form>
            </div>
    </body>
</html>