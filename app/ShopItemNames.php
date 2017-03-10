<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopItemNames 
{
    
	private $Names;
	
	public function getNames(){
		
		if(isset($Names[1])){
			return $Names;
		}else{
			
			$Names[0] = "Empty";
			$Names[1] = "Ardi Frigge";
			$Names[2] = "Arnold van Griesven - ok";
			$Names[3] = "Carola Popma";
			$Names[4] = "Derk Thijs - jaarprent";
			$Names[5] = "Francine Steegs";
			$Names[6] = "Jan van Munster - Jaarprent 2011";
			$Names[7] = "Gelaarde vormen - n";
			$Names[8] = "Grafiek winkel januari";
			$Names[9] = "Guido Lippens - Jaarprent 2013";
			$Names[10] = "Han Klinkhamer - Jaarprent 2014";
			$Names[11] = "Jacomijn den Engelsen - Jaarprent ";
			$Names[12] = "Jacomijn den Engelsen - sleeping muse";
			$Names[13] = "Jan de Bie";
			
			return $Names;
		}
		
	}
	
}
