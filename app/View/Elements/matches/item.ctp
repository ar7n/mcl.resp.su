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
?>

<div class='MatchItem' data-match-id="<?=$item['id']?>">
    <?php
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
		echo $this->element('slots/item', array('item' => $winner_slot, 'itemOptions' => compact('show_score','link_to_match') + array('class'=>$winner_class, 'itemSize' => 'small'))); 
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
        
		if($counter){
			echo "<div class='schema-counter schema-counter-odd'>$counter</div>";
		}            
		echo $this->element('slots/item',  array('item' => $Slot[0], 'itemOptions' => compact('show_score','link_to_match') +array('class'=>$class0, 'itemSize' => 'small')));             
		if($counter){
			echo "<div class='schema-counter schema-counter-even'>".($counter+1)."</div>";
		}                        
		echo $this->element('slots/item',  array('item' => $Slot[1], 'itemOptions' => compact('show_score','link_to_match') + array('class'=>'last '.$class1,'itemSize' => 'small')));

        echo '<p class="MatchLink">';
        echo '<a class="MatchLink" href="matches/view/'.$item['id'].'">Подробнее</a>';
        echo "&nbsp;&nbsp;";
        echo "</p>";       
        echo '<div class="after"><span></span></div>';
   
    }
    //большой размер для просмотра матча
    else if ($type=='big'){

        if (!empty($Tournament)){
            echo "<p>Данный матч проходит в турнире &laquo;";
                echo $this->Html->link($Tournament['title'], array('controller' => 'tournaments', 'action' => 'view', $Tournament['id']));
            echo "&raquo;</p>";
        }	
		
        echo "<h4>Информация по матчу</h4>";		
        echo "<ul>";
        echo "<li>Статус: ".$status."</li>";
		
        //echo "<li>Время начала: ".__($item['start_time'],true)." (MSK)</li>";
        if ($item['finish_time']){
            echo "<li>Время окончания: ".__($item['finish_time'],true)." (MSK)</li>";
        }
        echo "</ul>";

        if ($item['conflict'] && !$item['accomplished']){
            echo "<p>Участники данного матча указали различающиеся результаты. Ожидается решение судьи.</p>";
        }
		else if ($item['conflict'] && $item['accomplished']){
            echo "<p>Участники данного матча указали различающиеся результаты. </p>";
        }
        if($item['description']){
            echo $this->Html->div('description', $item['description']);
        }

		// Вывод таблицы с учатниками и результатами
		echo $this->element('matches/scores', $item);

        // Вывод судьи матча
        echo "<h4>Судья матча</h4>";        
        if($item['user_id']!=0){
            echo $this->element('users/nick',$item['User']);
        }
        else{
            echo "<p>Судья матча не установлен</p>";
        }
        
        echo "<div>";
    }
    //Размер линии -- для списка матчей
    else if ($type=='line'){           		
		
		if (isset($slots) && !empty($slots)){
			
			$show_match=true;
			
			if(count($slots)==2){
				if($slots[0]['free']==1 || $slots[1]['free']==1){
					$show_match=false;
				}
			}			
			if($show_match){
				foreach($slots as $k=>$slot){
					$itemOptions=array();
					if($item['accomplished']){
						if($slot['winner']){
							$itemOptions['class'] = 'winner';
						}
						else{
							$itemOptions['class']='drawner';
						}
						if ($slot['disqualified']){
							$itemOptions['class']='disqualified';
						}
					}
					echo $this->element('slots/item',array(
						'item'=>$slot,
						'itemOptions'=>$itemOptions,
					));  
				}   
				echo "<div><a href=\"/matches/view/{$item['id']}\">".$status."</a></div>";
			}
		}

	}
    //вывод очков матча -- для круговой схемы
	else if ($type=='score'){
		echo "<a href='/matches/view/{$item['id']}'>";        
		if($Party[0] && $Party[1] && $item['accomplished']){
            if($Party[0]['Slot']['disqualified']==1 || $Party[1]['Slot']['disqualified']==1){
                echo 'WO';
            }
            else{
                $party1_games=$this->Arena->beautifyScores($Party[0]['Slot']['scores']);
                $party2_games=$this->Arena->beautifyScores($Party[1]['Slot']['scores']);       
                if($subtype==false || $subtype=='up'){
                    echo $party1_games.':'.$party2_games;
                }
                else{
                    echo $party2_games.':'.$party1_games;
                }
            }
		}
		else{
			echo '-:-';
		}
		echo "</a>";
	}

	if (isset($itemActions) && !empty($itemActions)){
        $actionClass = 'button';
        echo $this->element('item_actions', compact('itemActions', 'actionClass')); 
        echo "<div style=clear:both></div>";
    }
    ?>
</div>

<?
;
//////////////////////////////////////////////////////////////////////////inferno
if($this->name == "Matches") {
$itemParams = array(
    'data' => false,
    'item_type' => 'match',
	'item_format' => false,
    'Entity'=>'Match',
    'EntityId'=>false,
    'Item' => false,
    'User' => false,
    'show_navbar' => true,
    'show_comments'=>false,
    'in_widget' => false,
    'show_header' => false,
    'item_url' => false,
    'header' => false,
    'show_comments_count'=>false,
	'show_share_buttons'=>true,	
	'dont_show_time'=>true,
);
if (isset($itemActions)){
	$itemParams['itemActions'] =  $itemActions;
}    
echo $this->element('common/item', $itemParams);
}
/////////////////////////////////////////////////////////////////////////\inferno
?>
