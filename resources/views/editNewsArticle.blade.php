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
    @include('layouts.cmsHeader', array('currentPage'=>'Paginas'))



            <div class="container">
                <form action="cmsEditArticle" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value=" {{ csrf_token() }} " >
                        <?php
                            $parts=parse_url(url()->current());
                            $path_parts=explode('/', $parts['path']);
                            $article = App\NewsArticle::where('ID', '=', $path_parts[count($path_parts)-1] )->first();
                        ?>
                    <input type="hidden" value="{{ $article->ID}}" />
                    Titel: <br>
                        <input type="text" name="title" value="{{$article->Title}}"> <br> <br>
                    Image:
                        <input type="file" accept=".jpeg, .jpg, .png" name="image" value="{{$article->Image}}"> <br>
                    Description: <br>
                        <textarea rows="5" cols="60" name="description">{{$article->Description}} </textarea> <br>
                    Text: <br>
                        <textarea rows="5" cols="60" name="text"> {{$article->Text}} </textarea>  <br>
                    Visible: <br>
                        <input type="text" name="visible" value="{{$article->Visible}}"> <br>
                    <br>
                    <input type="submit" value="Wijzigen"/>
                </form>
            </div>
    </body>
</html>