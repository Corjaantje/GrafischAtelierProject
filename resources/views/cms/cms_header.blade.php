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

    <br>
        {!! Form::open(['route' => 'cms_header_store']) !!}
        @foreach ($NavMainArray as $data)

            Naam <input type="text" name="Name" value="{{$data->name}}"> -
            Zichtbaar <input type="checkbox" name="Visible" @if($data->visible)checked @endif > -
            Item van
            <select>
                <option value=""></option>
                @foreach($NavMainArray as $subdata)
                    @if($data->id != $subdata->id)
                        <option value="{{$data->parent_id}}"
                                @if($data->parent_id == $subdata->id) selected @endif>{{$subdata->name}}</option>
                    @endif
                @endforeach
            </select> -
            <button type="submit" value="up">▲</button>
            <button type="submit" value="down">▼</button>
            <b>{{$data->priority}}</b> <!-- TODO REMOVE NUMBER-->

            <br><br>

        @endforeach
        <button type="submit" value="Save">Opslaan</button>

        {!! Form::close() !!}

</div>
</body>
</html>