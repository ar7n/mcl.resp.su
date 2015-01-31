<?php
class ArenaHelper extends AppHelper {        
	function beautifyScores($scores){
		if (fmod($scores, 1) == 0.5){
			$scores = floor($scores).'&#189';
		}	
		else {
			$scores = floor($scores);
		}
		return $scores;
	}
///////////////////////////////////////////////////////////////////////inferno
	function getTourName($k,$group,$tour_num,$n)
		{
			$label='';
			
			if($group=='third_place') $label='Матч за третье место';
			
			if($group=='main')
				{		
					switch($k)
						{
							case 1:
							$label='Финал'.($n=='1'?' (2 чел.)':'');
							break;
							
							case 2;
							$label='Полуфинал'.($n=='1'?' (4 чел.)':'');
							break;							
			
							default :
							$drob = pow(2,$k - 2)*2;
							$chel = pow(2,$k);
							$label='1/'.$drob.' Финала'.($n=='1'?' ('.$chel.' чел.)':'');
						}
				}
				
			
			//if($group=='upper' || $group=='lower')
				//{
					//$label=($tour_num+1).'-й тур';
					//$label.=' '.($group=='upper'?' верх. сетка':' нижн. сетка');
				//}
				
			if($group=='final')
				{
					$label='Суперфинал'.($n=='1'?' (2 чел.)':'');
				}
			
			if($group=='upper')
				{
					switch($k)
						{
							case 1:
							$label='Финал'.($n=='1'?' (2 чел.) верхняя сетка':'');
							break;
							
							case 2;
							$label='Полуфинал'.($n=='1'?' (4 чел.) верхняя сетка':'');
							break;							
			
							default :
							$drob = pow(2,$k - 2)*2;
							$chel = pow(2,$k);
							$label='1/'.$drob.' Финала'.($n=='1'?' ('.$chel.' чел.)  верх. сетка':'');
						}
				}
			if($group=='lower')			
				{
					switch($k)
						{
							case 1:
							$label='Финал'.($n=='1'?' (2 чел.) нижняя сетка':'');
							break;
							
							case 2;
							$label='Полуфинал'.($n=='1'?' (4 чел.) нижняя сетка':'');
							break;							
			
							default :
							$drob = pow(2,$k - 2)*2;
							$chel = pow(2,$k);
							$label='1/'.$drob.' Финала'.($n=='1'?' ('.$chel.' чел.) нижняя сетка':'');
						}
				}
			
			return $label;
		}
//////////////////////////////////////////////////////////////////////\inferno
}
?>