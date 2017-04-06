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
    ?>
    <h1> {{ $message }}</h1>
    <br>
    @foreach ($NavMainArray as $data)
        {{ Form::open(['route' => 'cms_header_store']) }}

        <?php $options = ["" => ""] + App\HeaderNavigation::where('id', '<>', $data->id)->whereNull('parent_id')->pluck('name', 'id')->all();
        echo $data->id;?>
        {{ Form::hidden('id', $data->id) }}

        Naam: {{ Form::text('name', $data->name) }}
        Zichtbaar {{ Form::checkbox('visible', 1, $data->visible) }}
        Item van {{  Form::select('parent_id', $options, $data->parent_id)}}
        <input type="submit" name="priorityUp" id="priorityUp" value="▲">
        <input type="submit" name="priorityDown" id="priorityDown" value="▼">

        <b>{{$data->priority}}</b> <!-- TODO REMOVE NUMBER-->
        <input type="submit" name="save" id="save" value="Opslaan">

        {{ Form::close() }}
        <br><br>

    @endforeach


</div>
</body>
</html>