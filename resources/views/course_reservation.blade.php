@php
    use App\Http\Controllers\CoursesController;

    if(isset($_POST['id'])){

        $course = App\Course::find($_POST['id']);

        $controller = new CoursesController();
    }
    else {
        echo "<script>window.location.href = \"{{ route('courses') }}\"</script>";
    }
@endphp
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

@if (Auth::check())
<div class="container">

<div class="title">
    <h1>Cursus "{{ $course->name }}"</h1>
</div>
<div>



</div>

</div>

@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif

@include('layouts.footer')
</body>