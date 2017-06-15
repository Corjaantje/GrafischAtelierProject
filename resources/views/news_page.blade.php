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
@include('layouts.header', array('title'=>'Nieuws'))
<div class="container">
    <h1 class="title text-center">Nieuws</h1>

    <div class="title text-center">
        {{ Form::open(['route' => 'nieuwsFilter', 'id' => 'form']) }}

        {{ Form::select('filter', $filterOptions, $selectedFilter, array('onchange' => 'sendForm()'))}} <br><br>

        {{ Form::close() }}
    </div>
    @if ($articles->count() > 0)
    @foreach ($articles as $article)
        @if( ($loop->index % 3) == 0 )
            <div class="row">
                @endif
                <div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                    <h1> {{ $article->title }}</h1>
                    <h4> <i>{{ \App\Newsfilter::find($article->filter_id)->name }} - {{ $article->date }}</i></h4>
                    <p> {{ $article->description }}</p><br>
                    @php echo substr($article->text, 0, 500)."..." @endphp <br>
                    <a href="artikel/{{$article->id}}">LEES MEER</a>
                </div>
                @if( ($loop->index % 3) == 2)
            </div>
        @endif
    @endforeach
</div>
    @else
        <h3>Er zijn geen nieuws artikelen om te laten zien.</h3>
    @endif
</div><br>
@include('layouts.footer')
<script> function sendForm(){document.getElementById('form').submit()}</script>
</body>

</html>