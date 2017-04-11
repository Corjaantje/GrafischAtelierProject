<title>GA Den Bosch - {{ $title }}</title>

@section('navigation')
    <script>
        $(document).ready(function() {
            //todo NOT SURE WHAT THE FUNCTION OF THIS FILE IS?!

            //change the integers below to match the height of your upper dive, which I called
            //banner.  Just add a 1 to the last number.  console.log($(window).scrollTop())
            //to figure out what the scroll position is when exactly you want to fix the nav
            //bar or div or whatever.  I stuck in the console.log for you.  Just remove when
            //you know the position.
            $(window).scroll(function () {

                console.log($(window).scrollTop());

                if ($(window).scrollTop() > $(".navbar").height()) {
                    $('.navbar').addClass('navbar-fixed');
                }

                if ($(window).scrollTop() < $(".navbar").height()) {
                    $('.navbar').removeClass('navbar-fixed');
                }
            });
        });
    </script>
    <nav id="nav" class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../" id="logo"> <img src="../img/logo_ga.png" width="250px"> </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">

                <div class="socials">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </div>
            <ul>
                <li><a href="{{URL::route('nieuws')}}"> <b>Nieuws</b> </a></li>
                -
                <li><a href="{{URL::route('winkel')}}"> <b>Winkel</b> </a></li>
                -
                <li id="dropdown"><a href="{{URL::route('aan_de_slag')}}"> <b>Aan De Slag</b> </a>
                    <div id="dropdown-content">
                        <a href="{{URL::route('aan_de_slag')}}"><b>Workshops</b></a>
                        <a href="{{URL::route('scholen')}}"><b>Scholen</b></a>
                        <a href="{{URL::route('dagje_uit')}}"><b>Dagje uit</b></a>
                        <a href="{{URL::route('opfrissen')}}"><b>Opfrissen</b></a>
                    </div>
                </li>
                -
                <li><a href="../"> <b>Over Ons</b> </a></li>
            </ul>
            </div>
        </div>
    </nav>
@show
<!--
<nav id="navbar">
         <div>
         <ul>
             <li> <a href="/" id="logo" > <img src="img/logo_ga.png" width="250px"> </a> </li>
             <li> <a href="/"> <b>Nieuws</b> </a> </li> -
             <li> <a href="/"> <b>Winkel</b> </a> </li> -
             <li id="dropdown"> <a href="{{URL::route('aan_de_slag')}}"> <b>Aan De Slag</b> </a>
                 <div id="dropdown-content">
                     <a href="{{URL::route('aan_de_slag')}}"><b>Workshops</b></a>
                     <a href="{{URL::route('scholen')}}"><b>Scholen</b></a>
                     <a href="{{URL::route('dagje_uit')}}"><b>Dagje uit</b></a>
                     <a href="{{URL::route('opfrissen')}}"><b>Opfrissen</b></a>
                 </div>
             </li> -
             <li> <a href="/"> <b>Over Ons</b> </a> </li>
         </ul>
         </div>
     </nav>
-->