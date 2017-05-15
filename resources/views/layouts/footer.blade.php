@section('footer')
    @php
    $sponsors = App\Sponsor::all();
    @endphp
    <footer id="footer">
        <div id="footer-links" class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <ul>
                <li><a href="/"><b>Vacatures</b></a></li>
                <li><a href="/"><b>Vrienden Worden</b></a></li>
                <li><a href="/"><b>Vind Ons</b></a></li>
            </ul>
        </div>
        @foreach ($sponsors as $sponsor)
        <div id="footer-images" class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <a href="{{$sponsor->sponsor_url}}"><img style="margin-left: 30%" src="{{ URL::asset('img/Sponsors/'.$sponsor->image) }}" height="100px" width="100px"></a>
        </div>
        @endforeach
        <div id="footer-images" class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <img style="margin-left: 30%" src="{{ URL::asset('img/payments.png') }}" alt="payments" width="225px">
        </div>
    </footer>
@show