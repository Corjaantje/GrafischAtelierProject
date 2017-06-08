<title>GA - {{ $title }}</title>

@section('navigation')
<script>
    $(document).ready(function () {
        //change the integers below to match the height of your upper dive, which I called
        //banner.  Just add a 1 to the last number.  console.log($(window).scrollTop())
        //to figure out what the scroll position is when exactly you want to fix the nav
        //bar or div or whatever.  I stuck in the console.log for you.  Just remove when
        //you know the position.
//            $(window).scroll(function () {
//                if ($(window).scrollTop() > $(".navbar").height()) {
//                    $('.navbar').addClass('navbar-fixed');
//                }
//                if ($(window).scrollTop() < $(".navbar").height()) {
//                    $('.navbar').removeClass('navbar-fixed');
//                }
//
//            });
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
                @php
                $NavMainArray = App\HeaderNavigation::getMainNavigationArray();
                $NavSubArray = App\HeaderNavigation::getSubNavigationArray();
                $MainNavCount = $NavMainArray->count();
                $MainNavSubcounter = 0;
                @endphp

                @foreach ($NavMainArray as $data)

                @if($data->visible)
                <li id="dropdown"><a href="{{URL::route($data->link_as)}}"> <b>{{ $data->name }}</b> </a>
                    @php
                    $MainNavSubcounter += 1;
                    if($MainNavSubcounter < $MainNavCount)
                    {
                    echo "-";
                    }
                    @endphp
                    @endif

                    <div id="dropdown-content">
                        @foreach($NavSubArray as $subdata)
                        @if($subdata->parent_id == $data->id && $subdata->visible)
                        <a href="{{URL::route($subdata->link_as)}}"><b> {{ $subdata->name }}</b></a>
                        @endif
                        @endforeach
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
@show

<script src="{{ asset('js/app.js') }}"></script>