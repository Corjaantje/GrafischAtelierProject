@section('footer')
    <footer id="footer">
        <div id="footer-links" class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <ul>
                <li><a href="/"><b>Vacatures</b></a></li>
                <li><a href="/"><b>Vrienden Worden</b></a></li>
                <li><a href="/"><b>Vind Ons</b></a></li>
            </ul>
        </div>
        <div id="footer-images" class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <img style="margin-left: 30%" src="{{ URL::asset('img/w2f_logo.png') }}" alt="w2f logo" width="250px">
        </div>
        <div id="footer-images" class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <img style="margin-left: 30%" src="{{ URL::asset('img/payments.png') }}" alt="payments" width="225px">
        </div>
    </footer>
@show