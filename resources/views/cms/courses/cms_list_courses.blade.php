@php
    $courses = App\Course::all();
@endphp
        <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="html-cms">
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

    @include('layouts.cms_navigation', array('currentPage'=>'Cursus Overzicht'))
    <div class="container-cms">

        <h2><b>Cursus overzicht</b></h2>
        <!--CONTENT IN HERE-->
        <button type="button" class="btn btn-primary" onclick="window.location='{{URL::route('cms_courses_add')}}'">
            Nieuwe Cursus
        </button>
        <table id="table-style">

            <tr id="table-row-style">
                <th id="table-header-style">Titel</th>
                <th id="table-header-style">Prijs</th>
                <th id="table-header-style">Start</th>
                <th id="table-header-style">Eind</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($courses as $course)
                <?php
                $price = number_format($course->price, 2)
                ?>
                <tr id="table-row-style">
                    <td id="table-data-style"> {{ $course->name }}</td>
                    <td id="table-data-style">&euro; {{ $price }}</td>
                    <td id="table-data-style"> {{ $course->start_date }}</td>
                    <td id="table-data-style"> {{ $course->end_date }}</td>
                    <td>
                        {{ Form::open(['route' => 'cms_courses_edit']) }}
                        {{ Form::hidden('id', $course->id) }}
                        <input class="btn btn-primary" type="submit" value="Bewerken">
                        {{ Form::close()}}

                    </td>
                    <td>
                        {{ Form::open(['route' => 'cms_courses_delete', 'onsubmit' => 'return confirm("Weet u zeker dat u deze cursus wilt verwijderen?")']) }}
                        {{ Form::hidden('id', $course->id) }}
                        <input class="btn btn-danger" type="submit" value="Verwijderen">
                        {{ Form::close()}}
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </table>
        <br>
        <!---->
    </div>
@else
    <script>window.location.href = "{{ route('login') }}"</script>
@endif
</body>
</html>