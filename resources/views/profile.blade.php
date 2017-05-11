<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'Profiel - '.Auth::user()->username))

<div class="profile">
    <div class="row">
        <div class="profilePicture col-md-3">
            <img src="{{ URL::asset('img/defaultProfile.png') }}" alt="Profile" height="150px" width="150px">
        </div>
        <div class="userInfo col-md-6">
            @php
                echo "<h3>".$userinfo['username']."</h3>";
                echo $userinfo['role']."<br><br>";
                echo $userinfo['address']."<br>";
                echo $userinfo['mail'];
            @endphp
        </div>
    </div>
    <div class="row">
        <div class="userReservedTables col-md-6">
            <h3>Gereserveerde Tafels</h3>
            @php
                foreach ($reservedTables as $table)
                {
                    echo $table->start_date."<br>";
                }
            @endphp
    </div>
        <div class="userReservedCourses col-md-6">
            <h3>Gereserveerde Cursussen</h3>
            @php
                foreach ($reservedTables as $table)
                {
                    echo $table->start_date."<br>";
                }
            @endphp
        </div>
    </div>
</div>
@php
    /*
    User Information
        -Username
        -Email
        -Address

    Configuration
        -Edit Password
        -Edit Username
        -Edit Adress
        -Edit Email

    Reservations Div
        -Courses Reserved
        -Tables Reserved
    */
@endphp
@include('layouts.footer')
</body>
</html>

