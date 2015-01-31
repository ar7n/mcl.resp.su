<?php

foreach($Party as $i=>$party){
	if(!$party['approved']){
		unset($Party[$i]);
	}

}


if (in_array(NULL, Set::extract('/group', $Party))){
	echo "<p>Сетка будет доступна после жеребьёвки</p>";
	return;
}

//записываем матчи в многомерный массив
//group, P1, P2
$grouped_matches=array();
foreach($Match as $match){
    $p1=0;
    if(isset($match['Party'][0]))
        $p1=$match['Party'][0]['id'];
    
    $p2=0;
    if(isset($match['Party'][1]))
        $p2=$match['Party'][1]['id'];
    
    if($p1 && $p2){
    
        $grouped_matches[$match['group']][]=$match;
   
   
    }
}

//записываем партии по группам
$grouped_parties=array();
foreach($Party as $party){
    $grouped_parties[$party['group']][$party['id']]=$party;
}

ksort($grouped_parties);

//загружаем очки и места
App::import('Model','Tournament');
$TournamentModel=new Tournament;
$scores=$TournamentModel->getResults($Tournament['id']);  

//вывод сеток
foreach($grouped_parties as $group=>$parties){
    if($group==''){
        continue;
    }

    $num_parties=count($parties);
	
    //инициализация таблицы
    $cells=array();
    $tmp_row = array_fill(0, $num_parties+3,'&nbsp;');
    $cells= array_fill(0, $num_parties+1, $tmp_row);
    
    //first row, first col, diagonal
    $cells[0][0]=array(
        $this->Html->tag('h2','Группа '.$group)
        ,array('class'=>'first_col')
    );
    $k=0;
    $parties_coord=array();
    foreach($parties as $party){
        $k++;
        $class='';
        $party_link=$this->element('parties/item',array('item'=>$party,'class'=>$class));
        
        //заполняем верхную строку, левый столбец и диагональ
        $cells[0][$k]=array($party_link,array('class'=>'top_party'));
        $cells[$k][0]=array($party_link,array('class'=>'left_party'));
        $cells[$k][$k]=array('&nbsp;',array('class'=>'diagonal'));
        
        $parties_coord[$party['id']]=$k;
    }

    //верхняя строка
    $cells[0][$num_parties+1]=array('Очки',array('class'=>'score_col'));
    $cells[0][$num_parties+2]=array('Места',array('class'=>'score_col','title'=>'Места участников'));
    //$cells[0][$num_parties+3]=array('Места 2',array('class'=>'score_col','title'=>'Конечные места'));

    //data
    $list_matches=array();
    if(isset($grouped_matches[$group])){
        $list_matches=$grouped_matches[$group];
    }
    
    foreach($list_matches as $match){
        $party1_id=$match['Party'][0]['id'];
        $party2_id=$match['Party'][1]['id'];
        
        $coor1=$parties_coord[$party1_id];
        $coor2=$parties_coord[$party2_id];
       
        $item=$match;
        unset($item['Party']);
        
        $match_score_up=$this->element('matches/item',array(
            'item'=>$item,
            'Party'=>$match['Party'],
            'type'=>'score',
            'subtype'=>'up'
        ));
        
        $match_score_down=$this->element('matches/item',array(
            'item'=>$item,
            'Party'=>$match['Party'],
            'type'=>'score',
            'subtype'=>'down'
        ));
        
        //верхняя половина матрицы
        $cells[$coor1][$coor2]=array($match_score_up,array('class'=>'score'));
        
        //нижняя половина
        $cells[$coor2][$coor1]=array($match_score_down,array('class'=>'score'));
    }

    //scores & places
	$places=$TournamentModel->getPlacesNum($scores['places'][$group]);

	foreach($parties_coord as $party_id=>$y){
		$cells[$y][$num_parties+1]=$scores['scores'][$group][$party_id];
		$cells[$y][$num_parties+2]=$places[$party_id];
	}
	
    
    $cells=$this->Html->tableCells($cells);
    
    echo $this->Html->tag('table',$cells);

}
?>
<script>
    
    
    //автоматическое задание ширины для центральных колонок
    /*$(document).ready(function(){
        all_width=0;
        parties=$(".MatchScheme .round-robin .top_party").length;
        
        $(".MatchScheme .round-robin .top_party").each(function(){
            all_width+=$(this).width();
        });
        
        $(".MatchScheme .round-robin .top_party").width(all_width/parties);
        
        
    });*/
    
    
</script>
