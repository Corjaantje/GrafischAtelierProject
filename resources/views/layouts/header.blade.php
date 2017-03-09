 <title>GA Den Bosch - {{ $title }}</title>

 @section('navigation')
     <div id="nav">
         <ul>
             <li> <a href="/" id="logo" > <img src="img/logo_ga.png" width="250px"> </a> </li>
             <li> <a href="/"> <b>Nieuws</b> </a> </li> -
             <li> <a href="/"> <b>Winkel</b> </a> </li> -
             <li id="dropdown"> <a href="{{URL::route('aan_de_slag')}}"> <b>Aan De Slag</b> </a>
                 <div id="dropdown-content">
                     <a href="{{URL::route('aan_de_slag')}}"><b>Workshops</b></a>
                     <a href="{{URL::route('scholen')}}"><b>Scholen</b></a>
                     <a href="{{URL::route('dagje_uit')}}"><b>Dagje uit</b></a>
                     <a href="{{URL::route('opfrissen')}}"><b>Opfrissen</b></a>
                 </div>
             </li> -
             <li> <a href="/"> <b>Over Ons</b> </a> </li>
         </ul>
     </div>
 @show
