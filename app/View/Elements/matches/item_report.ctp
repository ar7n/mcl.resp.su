<?
if(!isset($item) && isset($Match)){
    $item=$Match;
}
if (isset($item['Party'])){
	$Party = $item['Party'];
}
if (isset($item['Slot'])){
	$Slot = $item['Slot'];
}
if(!isset($item['Party'])&&isset($Party)){
    $item['Party']=$Party;
}

if (!$item['conflict'] && !$item['accomplished']){
	$status = 'pending';
}
else if (!$item['conflict'] && $item['accomplished']){
	$status = 'accomplished';
}
else if ($item['conflict'] && !$item['accomplished']){
	$status = 'conflict';
}
else if ($item['conflict'] && $item['accomplished']){
	$status = 'accomplished (unprincipled conflict)';
}
$status = __($status, TRUE);

if(!isset($counter)){
    $counter=false;
}

$show_score=$item['accomplished'];

if($show_score && isset($item['Slot'])){
    if(isset($item['Slot'][0]) && isset($item['Slot'][1])){
        if($item['Slot'][0]['free'] || $item['Slot'][1]['free']){
            $show_score=false;
        }
        elseif($item['Slot'][0]['party_id']==false || $item['Slot'][1]['party_id']==false){
            $show_score=false;
        }
        elseif($item['Slot'][0]['disqualified'] || $item['Slot'][1]['disqualified']){
            $show_score=false;
        }                        
    }
}

if(!empty($item['Slot']) ){
    $slots[0]=isset($item['Slot'][0])?$item['Slot'][0]:false;
    $slots[1]=isset($item['Slot'][1])?$item['Slot'][1]:false;
}

//Если некоторые из мест отсутсвуют, то помечаем слот как пустой.
if(!isset($Party[0])){
	$Party[0]=false;
}
if(!isset($Party[1])){
	$Party[1]=false;
}
//обрабатываем порядок следования слотов
if($Party && $Party[0]['Slot']['position'] == 1){
	list($Party[0],$Party[1])=array($Party[1],$Party[0]);
}

    if(!isset($type))
        $type='big';

    if(!isset($subtype))
        $subtype=false;

    if (isset($itemOptions)){
        extract($itemOptions);
    }

    $link_to_match=true;
    
    //Маленький размер -- для схемы
	if ($type == 'small_winner'){		           
                
		$winner_class = '';
		$winner_slot = false;
        if ($item['conflict'] && !$item['accomplished']){
            $winner_class = 'conflict';
        }
        else if($Party[0] && $Party[0]['Slot']['winner']){
            $winner_class = 'winner';
			$winner_slot=$Slot[0];
        }
        else if($Party[1] && $Party[1]['Slot']['winner']){
            $winner_class = 'winner';
            $winner_slot=$Slot[1];
        }		               
		$show_score=false;         
		
		if(isset($winner_slot['Party']['name']))$winner_slot['Party']['name']=$winner_slot['Party']['name']; else $winner_slot['Party']['name']="";
		
		echo $winner_slot['Party']['name']."?????";
	} 
    else if($type == 'small'){               

        $class0 = $class1 = '';
        
		if ($item['conflict'] && !$item['accomplished']){
            $class0 = $class1 = 'conflict';
        }
        else if($Party[0] && $Party[0]['Slot']['winner']){
            $class0='winner';
        }
        else if($Party[1] && $Party[1]['Slot']['winner']){
            $class1='winner';
        }
		else if ($item['accomplished']){
			$class0=$class1='drawner';
		}        
        
		if(isset($Slot[0]['Party']['name']))$Slot[0]['Party']['name']=$Slot[0]['Party']['name']; else $Slot[0]['Party']['name']="";
         
		echo $Slot[0]['Party']['name']."?????";
                     
		if(isset($Slot[1]['Party']['name']))$Slot[1]['Party']['name']=$Slot[1]['Party']['name']; else $Slot[1]['Party']['name']="";
					 
		echo "?????".($Slot[1]['Party']['name']?$Slot[1]['Party']['name']:'пусто');
    }
 
?>
