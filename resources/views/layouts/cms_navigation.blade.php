@section('navigation')
    <div class="sidenav">
        <a href="/" id="logo"> <img src="{{ URL::asset('img/logo_ga_house.png') }}" width="50px"> </a>
        <a href="{{URL::route('cms_home')}}" class="{{ (($currentPage)) == "Home" ? 'active' : ' ' }}">Home</a>
        <br/>
        <a href="{{URL::route('cmsNews')}}" class="{{ (($currentPage)) == "Nieuws" ? 'active' : ' ' }}">Nieuws</a>
        <a href="{{URL::route('ProductList')}}" class="{{ (($currentPage)) == "Shops" ? 'active' : ' ' }}">Shops</a>
        <br/>
        <a href="#" class="{{ (($currentPage)) == "Paginas" ? 'active' : ' ' }}">Pagina's</a>
        <br/>
        <a href="{{URL::route('cms_header')}}" class="{{ (($currentPage)) == "Header" ? 'active' : ' ' }}">Header</a>
        <a href="#" class="{{ (($currentPage)) == "Bedankt" ? 'active' : ' ' }}">Bedankt</a>
        <a href="#" class="{{ (($currentPage)) == "Footer" ? 'active' : ' ' }}">Footer</a>
        <br/>
        <a href="#" class="{{ (($currentPage)) == "Klanten" ? 'active' : ' ' }}">Klanten</a>
        <a href="#" class="{{ (($currentPage)) == "Accounts" ? 'active' : ' ' }}">Accounts</a>
        <br/>
        <a href="/">Website</a>
        <a href="#">Logout</a>
    </div>
@show