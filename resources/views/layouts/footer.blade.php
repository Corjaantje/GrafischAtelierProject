@section('footer')
    @php$sponsors = App\Sponsor::all();@endphp
    @if(count($sponsors) > 0)
        @php$sponsor1 = $sponsors->random();@endphp
        @php$sponsor2 = null;@endphp
        @if(count($sponsors) > 1)
            @while($sponsor2 === null || $sponsor2 === $sponsor1)
                @php$sponsor2 = $sponsors->random();@endphp
            @endwhile
        @endif
    @else
        @php
            $sponsor1 = null;
            $sponsor2 = null;
        @endphp
    @endif
    <footer id="footer">
        <div id="footer-links" class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <ul>
                <li><a href="/"><b>Vacatures</b></a></li>
                <li><a href="/"><b>Vrienden Worden</b></a></li>
                <li><a href="/"><b>Vind Ons</b></a></li>
            </ul>
        </div>

        <!-- sponsor 1 en 2 -->
        <div id="footer-images" class="col-lg-2 col-md-2 col-sm-2 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            @if($sponsor1 !== null)
            <a href="{{$sponsor1->sponsor_url}}"><img style="margin-left: 30%" src="{{ URL::asset('img/Sponsors/'.$sponsor1->image)}}" height="100px" width="100px"></a>
            @endif
        </div>

        <div id="footer-images" class="col-lg-2 col-md-2 col-sm-2 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            @if($sponsor2 !== null)
                <a href="{{$sponsor2->sponsor_url}}"><img style="margin-left: 30%" src="{{ URL::asset('img/Sponsors/'.$sponsor2->image)}}" height="100px" width="100px"></a>
            @endif
        </div>
        <div id="footer-images" class="col-lg-4 col-md-4 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1">
            <img style="margin-left: 30%" src="{{ URL::asset('img/payments.png')}}" alt="payments" width="225px">
        </div>
    </footer>
@show