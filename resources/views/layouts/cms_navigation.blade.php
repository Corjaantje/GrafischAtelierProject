<title>CMS - GA Den Bosch - {{ $currentPage }}</title>

@section('navigation')
    <div class="sidenav">
        <a href="/" id="logo"> <img src="{{ URL::asset('img/logo_ga_house.png') }}" width="50px"> </a>
        <a href="{{URL::route('cms_home')}}" class="{{ (($currentPage)) == "Home" ? 'active' : ' ' }}"><b>Home</b></a>
        <br/>
        <a href="{{URL::route('cms_news')}}"
           class="{{ (($currentPage)) == "Nieuws" ? 'active' : ' ' }}"><b>Nieuws</b></a>
        <a href="{{URL::route('cms_product_list')}}"
           class="{{ (($currentPage)) == "Shops" ? 'active' : ' ' }}"><b>Shops</b></a>
        <a href="{{URL::route('cms_header')}}"
           class="{{ (($currentPage)) == "Navigatie" ? 'active' : ' ' }}"><b>Navigatie</b></a>
            <a href="{{URL::route('cms_courses_list')}}"
               class="{{ (($currentPage)) == "Cursus Overzicht" ? 'active' : ' ' }}"><b>Cursus</b></a>
            <br>

        <div id="courseDropdown" class="collapse">
            <a href="{{URL::route('cms_courses_add')}}"
            class="{{ (($currentPage)) == "Cursus Toevoegen" ? 'active' : ' ' }}"><b>Toevoegen</b></a>
        </div>
        <br>
        <br>
        <a href="/"><b>Terug</b></a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <b>Uitloggen</b>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
@show