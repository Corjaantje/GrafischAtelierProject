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
<?php session_start(); // place it on the top of the script ?>
<?php
$statusMsg = !empty($_SESSION['msg']) ? $_SESSION['msg'] : '';
unset($_SESSION['msg']);
echo $statusMsg;
?>
@include('layouts.header', array('title'=>'Aboneren'))

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Aboneren</div>
                <div class="panel-body">
                    <?php  if (isset($message)) {
                        if ($message == "U bent succesvol geaboneerd.")
                            {
                                echo "<p>";
                            }
                            else
                            {
                                echo "<p style=\"color: #ff0000;\">";
                            }
                        echo $message;
                        echo "</p>";
                        } ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-4">
                            <div style="text-align: end;">
                                <label>Voor naam:</label>
                                <br/>
                                <br/>
                                <label>Achter naam:</label>
                                <br/>
                                <br/>
                                <label>Email:</label>
                                <br/>
                                <br/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-xs-3">

                            {{Form::open(['route' => 'aboneren_aanvraag'])}}
                            <input type="text" name="firstName" style="margin-bottom: 20px;"/>
                            <br/>
                            <input type="text" name="lastName" style="margin-bottom: 20px;"/>
                            <br/>
                            <input type="text" name="email"  style="margin-bottom: 20px;"/>
                            <br/>
                            <input type="submit" name="submit" value="Aboneren" style="margin-left: 96px"/>
                            {{Form::close()}}
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>