<title>GA Den Bosch - {{ $title }}</title>

@section('navigation')
    <script>
        $(document).ready(function () {
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

        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <nav id="nav" class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" id="logo"> <img src="{{ URL::asset('img/logo_ga.png') }}" width="250px"> </a>
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
                    <li><a href="{{URL::route('webshop')}}"> <b>Winkel</b> </a></li>
                    -
                    <li id="dropdown"><a href="{{URL::route('aan_de_slag')}}"> <b>Aan De Slag</b> </a>
                        <div id="dropdown-content">
                            <a href="{{URL::route('aan_de_slag')}}"><b>Workshops</b></a>
                            <a href="{{URL::route('scholen')}}"><b>Scholen</b></a>
                            <a href="{{URL::route('dagje_uit')}}"><b>Dagje uit</b></a>
                            <a href="{{URL::route('opfrissen')}}"><b>Opfrissen</b></a>
                            <a href="{{URL::route('werkplaats')}}"><b>Werkplaats</b></a>
                        </div>
                    </li>
                    -
                    <li><a href="{{URL::route('about')}}"> <b>Over Ons</b> </a></li>
                    -
                    <li><a href="{{URL::route('agenda')}}"> <b>Agenda</b> </a></li>
                    -
                    <li><a href="{{URL::route('archief')}}"> <b>Archief</b> </a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="auth_links"><a href="{{ route('register') }}"><b>Register</b></a></li>
                        <li class="auth_links"><a href="{{ route('login') }}"><b>Login</b></a></li>
                    @else
                        <li id="dropdown" class="auth_links"><b>{{ Auth::user()->name }} <span class="caret"></span></b>
                            <div id="dropdown-content">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@show

<script src="{{ asset('js/app.js') }}"></script>