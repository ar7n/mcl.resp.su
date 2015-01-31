<?php

$this->set('title', 'Список Матчей');

if(empty($Match)){
    echo "<p>Матчи необъявлены</p>";
}
else{
    echo $this->element('tournaments/type',array('type'=>$Tournament['type']));
    /**
	 * SINGLE ELIMINATION  
	 */
	if($Tournament['type']=='single elimination'){
        $tours=array();
        foreach($Match as $match){
            $tours[$match['tour']][$match['group']][]=$match;
        }

        krsort($tours);

        $max_tours= log($Tournament['playoff_grid_size'],2);
        

        foreach($tours as $tour_num=>$group_matches){
            $k=$max_tours-$tour_num;

            foreach($group_matches as $group=>$matches){
				if($group=='third_place' && $Tournament['se_allow_third_place_match']==false ){
					continue;
				}
				//////////////////////////////////////////////////////////////inferno				
				//$label=getTourName($k,$group,$tour_num);
                $label=$this->Arena->getTourName($k,$group,$tour_num,0);
				/////////////////////////////////////////////////////////////\inferno				
                echo "<h4>$label</h4>";
				$params = array(
					'indexClass' => 'MatchesLines',
					'indexData' => $matches,
					'indexEntity' => 'Match',
					'indexOptions' => array('type'=>'line'),
				);
				if (!empty($indexActions)){
					$matches_id = Set::combine($matches, '{n}.id', '{n}.id');
					$actions = array_values(array_intersect_key($indexActions, $matches_id));
					$params['indexActions'] = $actions;				
				}
                echo $this->element('list', $params);
            }
        }
    }
	/**
	 * DOUBLE ELIMINATION 
	 */
	else if ($Tournament['type'] == 'double elimination'){
		$matches = array();
		$maxTour = 0;
		foreach($Match as $match){
			if ($match['group'] == 'final'){
				$final[] = $match;
				continue;
			} 
			else if ($match['group'] == 'lower'){
				$tour = floor($match['tour'] / 2);
			}
			else {
				$tour = $match['tour'];
			}
			$matches[$tour][$match['group']][] = $match;
			if ($tour > $maxTour){
				$maxTour = $tour;
			}
		}
        
        
        echo "<div class='double-elimination-matches-list'>";
        
		if (!empty($final)){
            echo "<h2>Финал</h2>";
			foreach ($final as $finalMatch){
				$params = array(
					'item' => $finalMatch, 
					'itemEntity' => 'Match',
					'itemOptions' => array('type'=>'line'),
				);		
				echo $this->Html->div('MatchesLines',$this->element('matches/item', $params));

			}
		}
        
        
               
		$tour_names = array('Верхняя сетка', 'Нижняя сетка');
		$tableCells = array_fill(0, $maxTour + 1, array());
		foreach ($matches as $tour => $tourMatches){
			$tableRow = array('Тур #'.($tour+1), 'upper' => NULL, 'lower' => NULL);
			foreach ($tourMatches as $group => $groupMatches){
				$tableCell = '';
				foreach ($groupMatches as $match){
					$params = array(
						'item' => $match, 
						'itemEntity' => 'Match',
						'itemOptions' => array('type'=>'line'),
					);
					$tableCell .= $this->element('matches/item', $params);
				}
				$tableRow[$group] = $tableCell;
			}
			$tableCells[$maxTour - $tour] = $tableRow;
		}	
		$finalCells = NULL;		

        
        foreach($tour_names as $i=>$name){
            echo "<h2>$name</h2>";
            
            foreach($tableCells as $rows){
                $matches=$rows[($i==0?'upper':'lower')];
                if(!empty($matches)){
                    echo "<h4>{$rows[0]}</h4>";
                    echo $this->Html->div('MatchesLines',$matches);
                }
            }
            
        }
        echo "<div class='clear'></div>";
        echo "</div>";
        
		//$table = $this->Html->tableHeaders($tableHeaders).$finalCells.$this->Html->tableCells($tableCells);
		//echo $this->Html->tag('table', $table,array('class'=>'MatchesLines'));
        
    }
	/**
	 * ROUND ROBIN 
	 */
    else if($Tournament['type']=='round robin'){
        foreach($Match as $match){
            
            $grouped_matches
                [$match['group']] 
                [$match['tour']]
                []=$match;
        }

        ksort($grouped_matches);

        foreach($grouped_matches as $group_name=>$tour_matches){
            echo $this->Html->tag('h2','Группа '.$group_name);
            foreach($tour_matches as $tour=>$list_matches){
                echo $this->Html->tag('h4','Тур №'.($tour+1));
				$params = array(
					'indexClass' => 'MatchesLines',
					'indexData' => $list_matches,
					'indexEntity' => 'Match',
					'indexOptions' => array('type'=>'line'),
				);
				if (!empty($indexActions)){
					$matches_id = Set::combine($list_matches, '{n}.id', '{n}.id');
					$actions = array_values(array_intersect_key($indexActions, $matches_id));
					$params['indexActions'] = $actions;				
				}                
                echo $this->element('list', $params);
            }
        }                
    }
	/**
	 * SWISS SYSTEM 
	 */
	elseif ($Tournament['type']=='swiss system') {
		foreach($Match as $match){            
            $tour_matches[$match['tour']][]=$match;
        }
        ksort($tour_matches);        
		foreach($tour_matches as $tour=>$list_matches){
			echo $this->Html->tag('h4','Тур №'.($tour+1));
			$params = array(
				'indexClass' => 'MatchesLines',
				'indexData' => $list_matches,
				'indexEntity' => 'Match',
				'indexOptions' => array('type'=>'line'),
			);
			if (!empty($indexActions)){
				$matches_id = Set::combine($list_matches, '{n}.id', '{n}.id');
				$actions = array_values(array_intersect_key($indexActions, $matches_id));
				$params['indexActions'] = $actions;				
			}
			echo $this->element('list', $params);
		}
              
	}
}
?>
