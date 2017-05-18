<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">

</head>
<body>
<?php session_start(); // place it on the top of the script ?>
<?php
$statusMsg = !empty($_SESSION['msg']) ? $_SESSION['msg'] : '';
unset($_SESSION['msg']);
echo $statusMsg;
?>
@include('layouts.header', array('title'=>'Aboneren'))
{{Form::open(['route' => 'aboneren_aanvraag'])}}
<p><label>First Name: </label><input type="text" name="firstName"/></p>
<p><label>Last Name: </label><input type="text" name="lastName"/></p>
<p><label>Email: </label><input type="text" name="email"/></p>
<p><input type="submit" name="submit" value="SUBSCRIBE"/></p>
{{Form::close()}}

<p><?php  if (isset($message))
    {
        echo $message;
    } ?> </p>

</body>
</html>