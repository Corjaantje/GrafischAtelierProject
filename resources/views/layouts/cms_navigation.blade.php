@section('navigation')
    <div class="sidenav">
        <a href="/" id="logo"> <img src="{{ URL::asset('img/logo_ga_house.png') }}" width="50px"> </a>
        <a href="{{URL::route('cms_home')}}" class="{{ (($currentPage)) == "Home" ? 'active' : ' ' }}"><b>Home</b></a>
        <br/>
        <a href="{{URL::route('cms_news')}}" class="{{ (($currentPage)) == "Nieuws" ? 'active' : ' ' }}"><b>Nieuws</b></a>
        <a href="{{URL::route('cms_product_list')}}" class="{{ (($currentPage)) == "Shops" ? 'active' : ' ' }}"><b>Shops</b></a>
        <br/>
        <a href="#" class="{{ (($currentPage)) == "Paginas" ? 'active' : ' ' }}"><i>Pagina's</i></a>
        <br/>
        <a href="{{URL::route('cms_header')}}" class="{{ (($currentPage)) == "Header" ? 'active' : ' ' }}"><b>Header</b></a>
        <a href="#" class="{{ (($currentPage)) == "Bedankt" ? 'active' : ' ' }}"><i>Bedankt</i></a>
        <a href="#" class="{{ (($currentPage)) == "Footer" ? 'active' : ' ' }}"><i>Footer</i></a>
        <br/>
        <a href="#" class="{{ (($currentPage)) == "Klanten" ? 'active' : ' ' }}"><i>Klanten</i></a>
        <a href="#" class="{{ (($currentPage)) == "Accounts" ? 'active' : ' ' }}"><i>Accounts</i></a>
        <br/>
        <a href="/"><b>Website</b></a>
        <a href="/"><b>Logout</b></a> <!--todo add logout route -->
    </div>
@show