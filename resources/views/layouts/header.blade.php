 <title>GA Den Bosch - {{ $title }}</title>

 @section('navigation')
     <div id="nav">
         <ul>
             <li> <a href="/" id="logo" > <img src="img/logo_ga.png" width="250px"> </a> </li>
             <li> <a href="/"> <b>Nieuws</b> </a> </li> -
             <li> <a href="/"> <b>Winkel</b> </a> </li> -
             <li id="dropdown"> <a href="/"> <b>Aan De Slag</b> </a>
                 <div id="dropdown-content">
                     <a href="/"><b>Workshops</b></a>
                     <a href="/"><b>Scholen</b></a>
                     <a href="/"><b>Dagje uit</b></a>
                     <a href="/"><b>Opfrissen</b></a>
                 </div>
             </li> -
             <li> <a href="/"> <b>Over Ons</b> </a> </li>
         </ul>
     </div>
 @show
