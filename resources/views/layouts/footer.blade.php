@section('footer')
    <div id="footer">
        <div id="links">
            <ul>
                <li><a href="/"><b>Vacatures</b></a></li>
                <li><a href="/"><b>Vrienden Worden</b></a></li>
                <li><a href="/"><b>Vind Ons</b></a></li>
            </ul>
        </div>
        <div id="footerimages">
            <img id="w2f" src="{{ URL::asset('img/w2f_logo.png') }}" alt="w2f logo" width="250px">
            <img src="{{ URL::asset('img/payments.png') }}" alt="payments" width="225px">
        </div>
    </div>
@show