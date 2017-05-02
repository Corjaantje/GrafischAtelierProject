<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'Home'))
<div class="container">
    @php
        $courses = App\Course::Where('visible', '1')->get();
    @endphp
    <h1>Cursussen</h1>
    @foreach ($courses as $course)
        @if( ($loop->index % 3) == 0 )
            <div class="row">
                @endif
                <div class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
                    @php
                    echo "<h3>".$course->name." - ".\App\Courses_has_user::getSignedUp($course->id)."/".$course->max_signups." ingeschreven </h3>";
                    echo "<h4>".$course->start_date." - ".$course->end_date."</h4>";
                    echo "<h4>Door ".$course->coursegiver_name."</h4>";
                    echo "<p>".$course->description." </p>";

                    @endphp
                </div>
                @if( ($loop->index % 3) == 2)
            </div>
        @endif
    @endforeach
</div>
</div>
@include('layouts.footer')
</body>
</html>

