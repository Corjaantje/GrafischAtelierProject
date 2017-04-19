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
@include('layouts.cms_navigation', array('currentPage'=>'Header'))
<div class="container-cms">
    @php
        $NavMainArray = App\HeaderNavigation::getAllNavigationArray();
        $disableUpArrow = App\HeaderNavigation::getDisabledPriorityUpArray();
        $disableDownArrow = App\HeaderNavigation::getDisabledPriorityDownArray();
    @endphp
    <h2 style="display:inline-block"><b>Header beheer</b> &nbsp</h2>
    <h2 style="display: inline-block;" class="greenText"> {{ $message }}</h2>
    <br>
    @foreach ($NavMainArray as $data)

        {{ Form::open(['route' => 'cms_header_store']) }}
        @php
            if ($data->parent_id != null) {
                echo "&emsp; &emsp; ";
            }

            $options = ["" => ""] + App\HeaderNavigation::where('id', '<>', $data->id)->whereNull('parent_id')->pluck('name', 'id')->all()
        @endphp

        {{ Form::hidden('id', $data->id) }}
        {{ Form::hidden('priority', $data->priority) }}
        Naam: {{ Form::text('name', $data->name) }}
        Zichtbaar {{ Form::checkbox('visible', 1, $data->visible) }}
        Item van {{  Form::select('parent_id', $options, $data->parent_id, array('class' => 'formText'))}}

        @if(!in_array($data->priority, $disableUpArrow))
            <input type="submit" class="btn btn-basic"  name="priorityUp" id="priorityUp" value="▲">
            @else
            &emsp; &emsp;
        @endif
        @if(!in_array($data->priority, $disableDownArrow))
            <input type="submit" class="btn btn-basic" name="priorityDown" id="priorityDown" value="▼">
            @else
            &emsp; &emsp;
        @endif
        <input class="btn btn-primary"  type="submit" name="store" id="store" value="Opslaan">

        {{ Form::close() }}
        <br>

    @endforeach


</div>
@else

    <script>window.location.href = "{{ route('login') }}"</script>

@endif
</body>
</html>