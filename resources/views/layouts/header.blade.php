<html>
    <head>
        <title>GA Den Bosch - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
    @section('navigation')
        <div id="nav">
            <img src="img/logo_ga.png" width="250px">
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>

            </ul>
            <a href="/"><b>Nieuws</b></a> -
            <a href="/"><b>Winkel</b></a> -
            <a href="/"><b>Aan De Slag</b></a> -
            <a href="/"><b>Over Ons</b>
                <ul>
                    <li><a href="/"> test</a></li>
                </ul>
            </a>
        </div>
    @show
    <div class="container">
        @yield('content')
    </div>
    </body>
</html>