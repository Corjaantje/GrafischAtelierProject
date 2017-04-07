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
@include('layouts.cms_navigation', array('currentPage'=>'Header'))
<div class="container">
    <?php
    $NavMainArray = App\HeaderNavigation::getAllNavigationArray();
    $disableUpArrow = App\HeaderNavigation::getDisabledPriorityUpArray();
    $disableDownArrow = App\HeaderNavigation::getDisabledPriorityDownArray();
    ?>
    <h2> Header beheer {{ $message }}</h2>
    <br>
    @foreach ($NavMainArray as $data)

        {{ Form::open(['route' => 'cms_header_store']) }}
        <?php
        if ($data->parent_id != null) {
            echo "&emsp; &emsp; ";
        }
        ?>
        <?php $options = ["" => ""] + App\HeaderNavigation::where('id', '<>', $data->id)->whereNull('parent_id')->pluck('name', 'id')->all()?>
        {{ Form::hidden('id', $data->id) }}
        {{ Form::hidden('priority', $data->priority) }}

        Naam: {{ Form::text('name', $data->name) }}
        Zichtbaar {{ Form::checkbox('visible', 1, $data->visible) }}
        Item van {{  Form::select('parent_id', $options, $data->parent_id)}}

        @if(!in_array($data->priority, $disableUpArrow))
            <input type="submit" name="priorityUp" id="priorityUp" value="▲">
            @else
            &emsp; &emsp;
        @endif
        @if(!in_array($data->priority, $disableDownArrow))
            <input type="submit" name="priorityDown" id="priorityDown" value="▼">
            @else
            &emsp; &emsp;
        @endif
        <input type="submit" name="store" id="store" value="Opslaan">

        {{ Form::close() }}
        <br>

    @endforeach


</div>
</body>
</html>