<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'Archive'));

<div class="title text-center">
    <h1>Archief</h1>
</div>

<div class="container">
    <div class="content">
        @for($i = 0; $i < 10; $i++)
            <div class="archive-block">
                <img class="archive-image" src="img/logo_ga_house.png" height="150" width="150">
                <div class="archive-text">
                    <br>
                    <!-- Deze tekst moet geteld worden op aantal karakters zodat dit niet te veel wordt, indien te groot -> afsluiten met "..."-->
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    <br>
                    <!-- Deze link moet gekoppeld worden aan het desbetreffende product, waarschijnlijk op basis van id waarover ook geloopt wordt-->
                    <a class="view-more" href="/archive">Bekijk artikel</a>
                </div>
            </div>
        @endfor

        <div class="view-more">
            <!-- Reload page with +10 articles -->
            <a href="/archive">Show more...</a>
        </div>
    </div>
</div>

@include('layouts.footer')
</body>

</html>