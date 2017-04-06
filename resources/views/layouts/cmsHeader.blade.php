@section('navigation')
    <div class="sidenav">
        <a href="/" id="logo"> <img src="{{ URL::asset('img/logo_ga_house.png') }}" width="50px"> </a>
        <a href="#" class="{{ (($currentPage)) == "Home" ? 'active' : ' ' }}">Home</a>
        <br/>
        <a href="#" class="{{ (($currentPage)) == "Nieuws" ? 'active' : ' ' }}">Nieuws</a>
        <a href="#" class="{{ (($currentPage)) == "Shops" ? 'active' : ' ' }}">Shops</a>
        <br/>
        <a href="{{URL::route('cmsNews')}}" class="{{ (($currentPage)) == "Paginas" ? 'active' : ' ' }}">Pagina's</a> <!-- om te testen verwijst dit naar 'News' -->
        <br/>
        <a href="#" class="{{ (($currentPage)) == "Header" ? 'active' : ' ' }}">Header</a>
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